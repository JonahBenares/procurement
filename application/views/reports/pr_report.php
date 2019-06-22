     <script type="text/javascript">
        $(document).on("click", ".addremarks", function () {
             var pr_details_id = $(this).data('id');
             var year = $(this).data('year');
             var month = $(this).data('month');
             var remarks = $(this).data('remarks');
             $(".modal #pr_details_id").val(pr_details_id);
             $(".modal #year").val(year);
             $(".modal #month").val(month);
             $(".modal #remarks").val(remarks);
          
        });
    </script>
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
                                    <a type='button' class="btn btn-custon-three btn-info"  data-toggle="modal" data-target="#filter_pr"> 
                                        <span class="fa fa-print p-l-0"></span> Export to Excel
                                    </a>
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
                                            <td><?php echo $p['remarks']; ?></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs addremarks" data-toggle="modal" data-target="#addremarks" title='Add Remarks' data-id="<?php echo $p['pr_details_id']; ?>" data-year="<?php echo $year; ?>" data-month="<?php echo $month; ?>" data-remarks="<?php echo $p['remarks']; ?>">
                                                        <span class="fa fa-plus"></span>
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
                <form method='POST' action="<?php echo base_url(); ?>reports/add_remarks">
                    <div class="modal-body">
                        <textarea class="form-control" rows="5" name='remarks' id='remarks'></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type='hidden' name='pr_details_id' id='pr_details_id'>
                        <input type='hidden' name='year' id='year'>
                        <input type='hidden' name='month' id='month'>
                        <input type="submit" class="btn btn-primary btn-block" value='Save changes'>
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