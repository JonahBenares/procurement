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
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>RFQ List</h1>
                                <div class="sparkline8-outline-icon">
                                    <a class="btn btn-custon-three btn-primary" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl">
                                        <span class="fa fa-plus p-l-0"></span>
                                        Create AOQ
                                    </a>
                                    <div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header header-color-modal bg-color-1">
                                                    <h4 class="modal-title">Create AOQ</h4>
                                                    <div class="modal-close-area modal-close-df">
                                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                    </div>
                                                </div>
                                                <form>
                                                    <div class="modal-body-lowpad">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <p class="m-b-0">Date:</p>
                                                                    <input type="date" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <p class="m-b-0">PR #:</p>
                                                                    <input type="text" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                        <div class="form-group">
                                                            <p class="m-b-0">Department:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Enduse:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Purpose:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Date needed:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Requested by:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Remarks:</p>
                                                            <textarea cols="3" name="" class="form-control" ></textarea>
                                                        </div>
                                                        <center>
                                                            <a href="<?php echo base_url(); ?>index.php/aoq/aoq_prnt" class="btn btn-custon-three btn-primary btn-block">Proceed</a>
                                                        </center>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%"><input type="checkbox" class="form-control" name=""></th>
                                            <th>RFQ #</th>
                                            <th>Supplier</th>
                                            <th>RFQ Date</th>
                                            <th>Items</th>
                                            <th width="5%"><center><span class="fa fa-bars"></span></center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(!empty($list)){
                                    foreach($list AS $li) { 
                                        $item='';
                                        foreach($items AS $it){ 
                                            if($it['rfq_id']==$li['rfq_id']){
                                                $item .= $it['item_name']. ", ";
                                            }
                                        }
                                        $item = substr($item, 0, -2);
                                                ?>
                                        <tr>
                                            <td><input type="checkbox" class="form-control" name=""></td>
                                            <td><?php echo $li['rfq_no']; ?></td>
                                            <td><?php echo $li['supplier']; ?></td>
                                            <td><?php echo date('M d, Y',strtotime($li['rfq_date'])); ?></td>
                                            <td>
                                                <?php echo $item; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="" onclick="incomingRfq('<?php echo base_url(); ?>')" class="btn btn-custon-three btn-warning btn-xs">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
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
            </div>
        </div>
    </div>
    <!-- Data table area End-->