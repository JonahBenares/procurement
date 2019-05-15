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

$(document).on("click", ".cancelPO", function () {
     var po_id = $(this).data('id');
     $(".modal #po_id").val(po_id);
  
});

$(document).on("click", ".cancelDuplicatePO", function () {
     var po_id = $(this).data('id');
     $(".modal #po_id").val(po_id);
  
});


function addItemPo(baseurl,pr) {
    window.open(baseurl+"index.php/po/add_itempo/"+pr, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=800,height=500");
}

function changePrice(count,countPR){
   var price = document.getElementById("price"+count).value;
   var qty = document.getElementById("quantity"+count).value;
   var tprice = parseFloat(price) * parseFloat(qty);

   document.getElementById("tprice"+count).value  =tprice;

    /*var total_pr=0;
    $(".tprice").each(function(){
          total_pr += parseFloat($(this).val());
    });*/

   //  document.getElementById("total_pr"+countPR).value  =total_pr;
    var grandtotal=0;
    $(".tprice").each(function(){
          grandtotal += parseFloat($(this).val());
    });
   
     document.getElementById("grandtotal").innerHTML  =grandtotal;
}

