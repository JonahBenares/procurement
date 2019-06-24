    <div id="filter_pr" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title"><span class="fa fa-filter"></span>Filter</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>pr/insert_pr" enctype="multipart/form-data">
                    <div class="modal-body-lowpad">                        
                        <div class="form-group">
                            <p class="m-b-0">Date Received/Email:</p>
                            <input type="date" name="" class="form-control">
                        </div>    
                        <div class="form-group">
                            <p class="m-b-0">Purpose:</p>
                            <input type="text" name="" class="form-control">
                        </div>   
                        <div class="form-group">
                            <p class="m-b-0">EndUse:</p>
                            <input type="text" name="" class="form-control">
                        </div>   
                        <div class="form-group">
                            <p class="m-b-0">PR No:</p>
                            <input type="text" name="" class="form-control">
                        </div>   
                        <div class="form-group">
                            <p class="m-b-0">Requestor:</p>
                            <input type="text" name="" class="form-control">
                        </div>   
                        <div class="form-group">
                            <p class="m-b-0">Description:</p>
                            <input type="text" name="" class="form-control">
                        </div>                      
                        <center>                           
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Proceed">
                           <!--  <a href="<?php echo base_url(); ?>index.php/pr/purchase_request">Proceed</a> -->
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="admin-dashone-data-table-area m-t-15 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd p-b-0" >
                            <div class="main-sparkline8-hd">
                                <h1><button onclick="goBack()" class=" btn btn-xs btn-success"><span class="fa fa-arrow-left"></span></button>
                                    PR Summary <b style="color:blue"><?php echo $date; ?></b>
                                </h1>
                                <small class="p-l-25">&nbsp;PURCHASE REQUEST</small> 
                                <div class="sparkline8-outline-icon">
                                    <?php if(!empty($filt)){ ?>
                                        <a href="<?php echo base_url(); ?>reports/export_po/<?php echo $year; ?>/<?php echo $month; ?>/<?php echo $pr_no; ?>/<?php echo $date_po; ?>/<?php echo $po_no; ?>/<?php echo $purpose; ?>/<?php echo $enduse; ?>/<?php echo $requestor; ?>/<?php echo $description; ?>/<?php echo $supplier; ?>" class="btn btn-custon-three btn-info"> 
                                            <span class="fa fa-upload"></span> Export to Excel
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(); ?>reports/export_po/<?php echo $year; ?>/<?php echo $month; ?>" class="btn btn-custon-three btn-info"> 
                                            <span class="fa fa-upload"></span> Export to Excel
                                        </a>
                                    <?php } ?>
                                    <a type='button' class="btn btn-custon-three btn-success"  data-toggle="modal" data-target="#filter_pr"> 
                                        <span class="fa fa-filter p-l-0"></span> Filter
                                    </a>
                                </div>
                            </div>
                        </div>                       
                        <div class="sparkline8-graph" >
                            <div class="datatable-dashv1-list custom-datatable-overright" style="overflow-x: scroll;">
                                <table class="table-bordered" width="200%">
                                    <thead>
                                       
                                        <tr>
                                            <th>Date Received/ Emailed</th>
                                            <th>Purpose</th>
                                            <th>Enduse</th>
                                            <th>PR No.</th>
                                            <th>Requestor</th>
                                            <th>WH Stocks</th>
                                            <th>Item NO.</th>
                                            <th>Qty</th>
                                            <th>Description</th>
                                            <th>Ro/ with AOQ </th>
                                            <th>Status Remarks</th>
                                            <th>Status
                                            <!-- Pending
												For Approval
												Partial
												Fully Served
												Cancelled -->
											</th>
                                            <th>Remarks</th>
                                            <th>End User's Comments</th>	
                                            <th><span class="fa fa-bars"></span></th>										
                                        </tr>
                                       
                                    </thead>
                                    <tbody>    
                                     <?php 
                                     if(!empty($pr)){
                                     foreach($pr AS $p){ 
                                        ?>                                  
                                        <tr>
                                            <td><?php echo date('m-d-y', strtotime($p['pr_date'])); ?></td>
                                            <td><?php echo $p['purpose']; ?></td>
                                            <td><?php echo $p['enduse']; ?></td>
                                            <td><?php echo $p['pr_no']; ?></td>
                                            <td><?php echo $p['requestor']; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $p['qty']; ?></td>
                                            <td><?php echo $p['item_name']. ", " . $p['item_specs']; ?></td>
                                            <td></td>
                                            <td><?php echo $p['status_remarks']; ?></td>
                                            <td><?php echo $p['status']; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs " data-toggle="modal" data-target="#addremarks">
                                                        <span class="fa fa-plus"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-secondary btn-xs " data-toggle="modal" data-target="#updateremarks">
                                                        <span class="text-white fa fa-pencil"></span>
                                                    </button>
                                                </div>
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
            </div>
        </div>
    </div>
    <div class="modal fade" id="addremarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Remarks
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>    
                </div>
                <form>
                    <div class="modal-body">
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateremarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Remarks
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>    
                </div>
                <form>
                    <div class="modal-body">
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block text-white">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function goBack() {
            window.history.back();
        }
    </script>

    
    <!-- Data table area End-->