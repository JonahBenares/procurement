function chooseSupplier()
{

   var loc= document.getElementById("baseurl").value;
   var redirect = loc+'index.php/po/getsupplier';
    var supplier = document.getElementById("supplier").value;

      $.ajax({
            type: 'POST',
            url: redirect,
            data: 'supplier='+supplier,
            dataType: 'json',
            success: function(response){
              
               document.getElementById("address").innerHTML  = response.address;
               document.getElementById("phone").innerHTML  = response.phone;
               document.getElementById("contact").innerHTML  = response.contact;
            
           }
        }); 
}
function getPRInfo()
{

   var loc= document.getElementById("baseurl").value;
   var redirect = loc+'index.php/po/getpr';
   var pr = document.getElementById("pr").value;
   
      $.ajax({
            type: 'POST',
            url: redirect,
            data: 'pr='+pr,
            dataType: 'json',
            success: function(response){
              
               document.getElementById("purpose").innerHTML  = response.purpose;
               document.getElementById("enduse").innerHTML  = response.enduse;
               document.getElementById("requestor").innerHTML  = response.requestor;
                document.getElementById("purpose_id").value  = response.purpose_id;
               document.getElementById("enduse_id").value  = response.enduse_id;
               document.getElementById("requested_by").value  = response.requestor_id;
            
           }
        }); 
}
$(document).on("click", ".addPR", function () {
     var po_id = $(this).data('id');
     $(".modal-body #po_id").val(po_id);
  
});