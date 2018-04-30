<?php 

//echo phpinfo();
/*
$acl = array("admin/roles", "user");

$acl_enjson=json_encode($acl);

echo print_r($acl_enjson); die;

$acl_dejson=json_decode($acl_enjson);

echo print_r($acl_dejson); die;
*/





?>

<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   
     <td>name<input class="form-control autocomplete_txt" type='text' data-type="countryname" id='countryname_1' name='countryname[]'/></td>
          <td>code<input class="form-control autocomplete_txt" type='text' data-type="country_code" id='country_code_1' name='country_code[]'/> </td>
		  
		  
		  
          <script type="text/javascript">

          	$(document).on('focus','.autocomplete_txt',function(){   
  type = $(this).data('type');
  
  if(type =='countryname' )autoType='name'; 
  if(type =='country_code' )autoType='sortname'; 


  
   $(this).autocomplete({   
       minLength: 0,
       source: function( request, response ) {  alert('hiiiii');
            $.ajax({
                url: "{{ route('order.searchAddressAjax') }}",
                dataType: "json",
                data: {
                    term : request.term,
                    type : type,
                },
                success: function(data) {
                    var array = $.map(data, function (item) {
                       return {
                           label: item[autoType],
                           value: item[autoType],
                           data : item
                       }
                   });
                    response(array)
                }
            });
       },
       select: function( event, ui ) {
           var data = ui.item.data;           
           id_arr = $(this).attr('id');
           id = id_arr.split("_");
           elementId = id[id.length-1];
           $('#countryname_'+elementId).val(data.name);
           $('#country_code_'+elementId).val(data.sortname);
       }
   });
   
   
});
</script>