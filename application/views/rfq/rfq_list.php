 
 <script type="text/javascript">
 $( document ).ready(function() {
    $("#createAOQ").attr("disabled", true);
    var $checkboxes = $('input[type="checkbox"]');
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        if(countCheckedCheckboxes  > 5){
           this.checked = false;
           alert('You can only choose up to 5 RFQs.');
        } 
         if(countCheckedCheckboxes  >= 1){
            $('#createAOQ').removeAttr("disabled");
         }
    });
 });

$(document).on("click", ".cancelRFQ", function () {
     var rfq_id = $(this).data('id');
     $(".modal #rfq_id").val(rfq_id);
  
});

$(document).on("click", ".duplicateRFQ", function () {
     var rfq_id = $(this).data('id');
     $(".modal #rfq_id").val(rfq_id);
  
});
$(document).on("click", ".reviseRFQ", function () {
     var rfq_id = $(this).data('id');
     $(".modal #rfq_id").val(rfq_id);
  
});
  function toggle_multi(source) {
      checkboxes_multi = document.getElementsByClassName('rfq_list');
      for(var i=0, n=checkboxes_multi.length;i<n;i++) {
        checkboxes_multi[i].checked = source.checked;
      }
    }
 </script>   

    <div id="cancelRFQ" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Cancel RFQ</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>rfq/cancel_rfq">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">Reason for Cancelling RFQ:</p>
                            <textarea name="reason" class="form-control"></textarea>
                        </div>
                        <center>       
                            <input type = "hidden" id='rfq_id' name='rfq_id' >                 
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Save">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="reviseRFQ" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Revise RFQ</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>rfq/revise_rfq">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">Reason for Revising RFQ:</p>
                            <textarea name="reason" class="form-control"></textarea>
                        </div>
                        <center>       
                            <input type = "hidden" id='rfq_id' name='rfq_id' >                 
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Save">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>

       <div id="duplicateRFQ" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Duplicate RFQ</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>rfq/duplicate_rfq">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">PR No:</p>
                            <!-- <input type='text' name="pr_no" class="form-control"> -->
                            <select name='pr_no' class="form-control">
                                <option value="" selected=""></option>
                                <?php foreach($pr AS $p){ ?>
                                <option value="<?php echo $p->pr_id; ?>"><?php echo $p->pr_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <p class="m-b-0">Notes:</p>
                             <textarea name="notes" class="form-control"></textarea>
                        </div>
                        <center>       
                            <input type = "hidden" id='rfq_id' name='rfq_id' >                 
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Save">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <div class="breadcome-area mg-b-30 small-dn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcome-heading">
                                    <form role="search" class="">
                                        <input type="text" placeholder="Search..." class="form-control">
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <ul class="breadcome-menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">RFQ List</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="admin-dashone-data-table-area">
        <div class="container-fluid">
         <form name="myform" action="<?php echo base_url(); ?>index.php/aoq/add_aoq" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd p-b-0" >
                            <div class="main-sparkline8-hd">
                                <h1>RFQ List</h1>
                                <small>REQUEST FOR QUOTATION</small> 
                                <div class="sparkline8-outline-icon">
                                <input type='submit' id='createAOQ' class="btn btn-custon-three btn-primary" value='Create AOQ' >
                                <a href="<?php echo base_url(); ?>index.php/rfq/served_rfq" class="btn btn-custon-three btn-success" ><span class="fa fa-archive p-l-0"></span> Served RFQ</a> 
                                <a href="<?php echo base_url(); ?>rfq/cancelled_rfq" class="btn btn-custon-three btn-danger"><span class="p-l-0 fa fa-ban"></span> Cancelled RFQ</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%"><input type="checkbox" class="form-control" name="" onClick="toggle_multi(this)"></th>
                                            <th width="10%">RFQ #</th>
                                            <th width="10%">PR #</th>
                                            <th>Supplier</th>
                                            <th width="10%">RFQ Date</th>
                                            <th width="30%">Items</th>
                                            <th width="10%">Notes</th>
                                            <th width="15%"><center><span class="fa fa-bars"></span></center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(!empty($list)){
                                    foreach($list AS $li) { 
                                        $item='';
                                        foreach($items AS $it){ 
                                            if($it['rfq_id']==$li['rfq_id']){
                                                $item .="<b>- ".$it['item_name']. "</b>, " .$it['specs']. "<br> ";
                                            }
                                        }
                                        $item = substr($item, 0, -2);
                                                ?>
                                        <tr>
                                        <?php if($li['served']==0){ ?>
                                            <td>
                                            <?php if($li['completed']==1){ ?>
                                            <input type="checkbox" class="form-control rfq_list" name="rfq[]" value="<?php echo $li['rfq_id']; ?>">
                                            <?php } ?></td>
                                            <td><?php echo $li['rfq_no']; ?></td>
                                            <td><?php echo $li['pr_no']; ?></td>
                                            <td><?php echo $li['supplier']; ?></td>
                                            <td><?php echo date('M d, Y',strtotime($li['rfq_date'])); ?></td>
                                            <td>
                                                <span style='text-align: left;'> <?php echo $item; ?></span>
                                            </td>
                                            <td style='font-size: 12px'><?php echo $li['notes']; ?></td>
                                            <td>
                                                <center>
                                                    <a href="javascript:void(0)" onclick="incomingRfq('<?php echo base_url(); ?>','<?php echo $li['rfq_id']; ?>')" class="btn btn-custon-three btn-warning btn-xs">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                     <?php if($li['completed']==1){ ?>
                                                     <a class="duplicateRFQ btn btn-custon-three btn-info btn-xs" title="Duplicate" data-toggle="modal" data-target="#duplicateRFQ" data-id="<?php echo $li['rfq_id']; ?>">
                                                        <span class="fa fa-files-o"></span>
                                                    </a>
                                                      <a class="reviseRFQ btn btn-custon-three btn-secondary btn-xs" title="Revise" data-toggle="modal" data-target="#reviseRFQ" data-id="<?php echo $li['rfq_id']; ?>">
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                    <?php } ?>
                                                     <a class="cancelRFQ btn btn-custon-three btn-danger btn-xs" data-toggle="modal" data-target="#cancelRFQ" data-id="<?php echo $li['rfq_id']; ?>"><span class="fa fa-ban" title="Cancel"></span></a>

                                                    <a href="<?php echo base_url(); ?>rfq/update_served/<?php echo $li['rfq_id']?>" class="btn btn-custon-three btn-success btn-xs" onclick="return confirm('Are you sure?')" title="Served"><span class=" fa fa-archive"></span>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>       
                                    <?php } }
                                    } ?>                                 
                                    </tbody>
                                </table>

                            </div>
                           
                        </div>
                    </div>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <!-- Data table area End-->