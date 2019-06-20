    <div id="filter_pr" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title"><span class="fa fa-filter"></span>Filter</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>" enctype="multipart/form-data">
                    <div class="modal-body-lowpad">                        
                        <div class="form-group">
                            <p class="m-b-0">PR No:</p>
                            <input type="text" name="" class="form-control">
                        </div>   
                        <div class="form-group">
                            <p class="m-b-0">Date of PO:</p>
                            <input type="date" name="" class="form-control">
                        </div>    
                        <div class="form-group">
                            <p class="m-b-0">PO No:</p>
                            <input type="text" name="" class="form-control">
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
                            <p class="m-b-0">Requestor:</p>
                            <input type="text" name="" class="form-control">
                        </div>   
                        <div class="form-group">
                            <p class="m-b-0">Description:</p>
                            <input type="text" name="" class="form-control">
                        </div>      
                        <div class="form-group">
                            <p class="m-b-0">Supplier:</p>
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
                                    PO Summary <b style="color:blue"><?php echo $date; ?></b>
                                </h1>
                                <small class="p-l-25">&nbsp;PURCHASE ORDER</small> 
                                <div class="sparkline8-outline-icon">
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
                                            <th>PR No.</th>
                                            <th>Purpose</th>
                                            <th>Enduse</th>
                                            <th>Date Of PO</th>
                                            <th>PO No.</th>
                                            <th>Requested By</th>
                                            <th>Qty</th>
                                            <th>UOM</th>
                                            <th>Item Description</th>
                                            <th>Status</th>
                                            <th>Supplier </th>
                                            <th>Payment Term</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                            <th>Remarks</th>										
                                        </tr>
                                    </thead>
                                    <tbody>                                      
                                        <tr>
                                            <td>asd</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>                       
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function goBack() {
            window.history.back();
        }
    </script>
    
    <!-- Data table area End-->