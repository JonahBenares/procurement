function itemDetails(baseurl,id) {
    window.open(baseurl+"index.php/items/item_details/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=45,left=25,width=1300,height=600");
}
function updateItem(baseurl,id) {
    window.open(baseurl+"index.php/items/update_item/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function vendorDetails(baseurl,id) {
    window.open(baseurl+"index.php/vendors/vendor_details/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=45,left=25,width=1300,height=600");
}
function viewVendor(baseurl,id) {
    window.open(baseurl+"index.php/vendors/view_vendors_per_item/"+id, "_blank","toolbar=yes,scrollbars=yes,resizable=yes, top=100,left=80,width=1200,height=400");
}
function updateVendor(baseurl,id) {
    window.open(baseurl+"index.php/vendors/update_vendor/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function addVendorItem(baseurl,id) {
    window.open(baseurl+"index.php/vendors/add_vendoritem/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function updateDepartment(baseurl,id) {
    window.open(baseurl+"index.php/masterfile/update_department/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function updateEmployee(baseurl,id) {
    window.open(baseurl+"index.php/masterfile/update_employee/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function updateUnit(baseurl,id) {
    window.open(baseurl+"index.php/masterfile/update_unit/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function updatePurpose(baseurl,id) {
    window.open(baseurl+"index.php/masterfile/update_purpose/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function updateEnduse(baseurl,id) {
    window.open(baseurl+"index.php/masterfile/update_enduse/"+id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=450,width=500,height=500");
}
function incomingRfq(baseurl) {
    window.open(baseurl+"index.php/rfq/rfq_incoming/", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=45,left=25,width=1300,height=600");
}
function confirmationDelete(anchor){
    var conf = confirm('Are you sure you want to delete this record?');
    if(conf)
    window.location=anchor.attr("href");
}

