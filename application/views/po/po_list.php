     <script src="<?php echo base_url(); ?>assets/js/po.js"></script> 
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
                                    <li><span class="bread-blod">PO List</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="addrepPO" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Add <b>Repeat</b> Order</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>index.php/po/create_reorderpo">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">Date:</p>
                            <input type="date" name="po_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">PO NO:</p>
                            <input type="text" name="po_no" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Supplier:</p>
                            <select name="supplier" id='supplier' onchange="chooseSupplier()" class="form-control">
                            <option value='' selected>-Choose Supplier/Vendor-</option>
                            <?php foreach($supplier AS $sup){ ?>
                                <option value="<?php echo $sup->vendor_id; ?>"><?php echo $sup->vendor_name; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Address:</p>
                            <b><span id='address'></span></b>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Contact Person:</p>
                            <b><span id='contact'></span></b>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Telephone #:</p>
                            <b><span id='phone'></span></b>
                        </div>
                         <div class="form-group">
                            <p class="m-b-0">Notes:</p>
                            <textarea name="notes" class="form-control"></textarea>
                        </div>
                        <center>
                           
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Proceed">
                            <!-- <a href="<?php echo base_url(); ?>index.php/po/reporder_prnt" class="dropdown-item">Repeat Order</a> -->
                        </center>
                    </div>
                    <input type='hidden' name='baseurl' id='baseurl' value="<?php echo base_url(); ?>">
                </form>
            </div>
        </div>
    </div>
    <div id="addPO" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Add PO</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>index.php/po/create_po">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">Date:</p>
                            <input type="date" name="po_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">PO NO:</p>
                            <input type="text" name="po_no" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Supplier:</p>
                            <select name="supplier" id='supplier' onchange="chooseSupplier()" class="form-control">
                            <option value='' selected>-Choose Supplier/Vendor-</option>
                            <?php foreach($supplier AS $sup){ ?>
                                <option value="<?php echo $sup->vendor_id; ?>"><?php echo $sup->vendor_name; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Address:</p>
                            <b><span id='address'></span></b>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Contact Person:</p>
                            <b><span id='contact'></span></b>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Telephone #:</p>
                            <b><span id='phone'></span></b>
                        </div>
                         <div class="form-group">
                            <p class="m-b-0">Notes:</p>
                            <textarea name="notes" class="form-control"></textarea>
                        </div>
                        <center>
                           
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Save">
                        </center>
                    </div>
                    <input type='hidden' name='baseurl' id='baseurl' value="<?php echo base_url(); ?>">
                </form>
            </div>
        </div>
    </div>
    <div id="cancelPO" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Cancel PO</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>po/cancel_po">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">Reason for Cancelling PO:</p>
                            <textarea name="reason" class="form-control"></textarea>
                        </div>
                        <center>       
                            <input type = "hidden" id='po_id' name='po_id' >                 
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Save">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <div id="cancelDuplicatePO" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Cancel and Duplicate PO</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>po/cancel_and_duplicate">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">Reason for Cancelling PO:</p>
                            <textarea name="reason" class="form-control"></textarea>
                        </div>
                        <center>       
                            <input type = "hidden" id='po_id' name='po_id' >                 
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Save">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="admin-dashone-data-table-area">
        <div class="container-fluid">
         <form name="myform" action="<?php echo base_url(); ?>index.php/aoq/add_aoq" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>PO List</h1>
                                <small>PURCHASE ORDER</small>
                                <div class="sparkline8-outline-icon">
                                <a href="<?php echo base_url(); ?>po/cancelled_po" class="btn btn-custon-three btn-danger"><span class="p-l-0 fa fa-ban"></span> Cancelled PO</a> 
                                <a type='button' class="btn btn-custon-three btn-info" data-toggle="modal" data-target="#addrepPO">
                                    <span class="fa fa-repeat p-l-0 "> </span> Add Repeat Order
                                </a>
                                <a type='button' class="btn btn-custon-three btn-primary" data-toggle="modal" data-target="#addPO">
                                    <span class="fa fa-plus p-l-0"></span> Add PO
                                </a>
                                  <!--   <a class="btn btn-custon-three btn-primary" href=">
                                        <span class="fa fa-plus p-l-0"></span>
                                        Create AOQ
                                    </a> -->
                                </div>
                            </div>
                        </div>
                       
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th>PO Date</th>
                                            <th>PO #</th>
                                            <th>Supplier</th>
                                            <th>PR #</th>
                                            <th>Status</th>
                                            <th>Mode of Purchase</th>
                                            <th><center><span class="fa fa-bars"></span></center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(!empty($header)){
                                    foreach($header AS $head){ ?>
                                        <tr>
                                            <td><?php echo date('F j, Y', strtotime($head['po_date'])); ?></td>
                                            <td>                                                
                                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#polink">
                                                    <?php echo $head['po_no']; ?>
                                                </button>

                                                <div class="modal fade" id="polink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">History of <b><?php echo $head['po_no'];?></b>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </h5>                                                                
                                                            </div>
                                                            <div class="modal-body">
                                                            <?php foreach($revise AS $r){ ?>
                                                                <a href="<?php echo base_url(); ?>po/purchase_order_saved_r/<?php echo $r['po_id'];?>/<?php echo $r['revision_no'];?>" target="_blank" class="btn btn-link btn-link-shad btn-block"><?php echo $r['po_no'];?>
                                                                    <span class="pull-right"><?php echo date("Y-m-d", strtotime($r['revised_date']));?></span>
                                                                </a>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $head['supplier']; ?></td>
                                            <td><?php echo $head['pr']; ?></td>
                                            <td><?php echo (($head['rfd']==0) ? '<span class="label label-warning">Pending RFD</span>' : ''); ?></td>
                                            <td></td>
                                            <td>
                                                <center>
                                                     <a href="<?php echo base_url(); ?>po/purchase_order_saved/<?php echo $head['po_id']; ?>" class="btn btn-custon-three btn-warning btn-xs" title='Vsiew'>
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a class="cancelDuplicatePO btn btn-custon-three btn-info btn-xs" data-toggle="modal" data-target="#cancelDuplicatePO" data-id="<?php echo $head['po_id']; ?>" title="Cancel and Duplicate">
                                                        <span class="fa fa-ban"></span> 
                                                        <span class="fa fa-files-o"></span>
                                                    </a>
                                                    <a class="cancelPO btn btn-custon-three btn-danger btn-xs" data-toggle="modal" data-target="#cancelPO" data-id="<?php echo $head['po_id']; ?>"><span class="fa fa-ban" title="Cancel"></span></a>
                                                    <!--<a href="" class="btn btn-custon-three btn-danger btn-xs"  data-toggle="modal" data-target="#cancelPO" title="WITH MODAL REASON">Cancel</a>-->
                                                </center>
                                            </td>
                                        </tr>  
                                        <?php } 
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