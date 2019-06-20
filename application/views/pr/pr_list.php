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
                                    <li><span class="bread-blod">PR List</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="addpr" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Add PR</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>pr/insert_pr" enctype="multipart/form-data">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">PR No.:</p>
                            <input type="text" name="pr_no" class="form-control">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Date Received:</p>
                            <input type="date" name="date_rec" class="form-control">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Department:</p>
                            <select name='department' class="form-control">
                                <option value='' selected>-Select Department-</option>
                                <?php foreach($department AS $d){ ?>
                                    <option value="<?php echo $d->department_id; ?>">
                                    <?php echo $d->department_name; ?>
                                    </option>
                                <?php }  ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Enduse:</p>
                            <select name='enduse' class="form-control">
                                <option value='' selected>-Select End Use-</option>
                                <?php foreach($enduse AS $end){ ?>
                                    <option value="<?php echo $end->enduse_id; ?>">
                                    <?php echo $end->enduse_name; ?>
                                    </option>
                                <?php }  ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Purpose:</p>
                            <select name='purpose' class="form-control">
                                <option value='' selected>-Select Purpose-</option>
                                <?php foreach($purpose AS $purp){ ?>
                                    <option value="<?php echo $purp->purpose_id; ?>">
                                    <?php echo $purp->purpose_name; ?>
                                    </option>
                                <?php }  ?> 
                            </select>
                        </div>
                          <div class="form-group">
                            <p class="m-b-0">Requested by:</p>
                            <select name='requested_by' class="form-control">
                                <option value='' selected>-Select Employee-</option>
                                <?php foreach($employee AS $emp){ ?>
                                    <option value="<?php echo $emp->employee_id; ?>">
                                    <?php echo $emp->employee_name; ?>
                                    </option>
                                <?php }  ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Urgency Number:</p>
                            <input type="number" name="urnum" class="form-control">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Urgency Description:</p>
                            <textarea name = "urdes" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Attachment 1:</p>
                            <input type="file" name="pic1">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Attachment 2:</p>
                            <input type="file" name="pic2">
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
    <div class="admin-dashone-data-table-area">
        <div class="container-fluid">
             <form name="myform" action="<?php echo base_url(); ?>index.php/aoq/add_aoq" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd p-b-0" >
                                <div class="main-sparkline8-hd">
                                    <h1>PR List</h1>
                                    <small>PURCHASE REQUEST</small> 
                                    <div class="sparkline8-outline-icon">
                                        <a type='button' class="btn btn-custon-three btn-primary"  data-toggle="modal" data-target="#addpr"> 
                                            <span class="fa fa-plus p-l-0"></span> Add PR
                                        </a>
                                        <a href="<?php echo base_url(); ?>pr/cancelled_pr" class="btn btn-custon-three btn-danger"><span class="p-l-0 fa fa-ban"></span> Cancelled PR</a>
                                    </div>
                                </div>
                            </div>                       
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>PR NO</th>
                                                <th>Date Received</th>
                                                <th>Department</th>
                                                <th>Urgency Number</th>
                                                <th>Urgency Description</th>
                                                <th>Requestor</th>
                                                <th><center><span class="fa fa-bars"></span></center></th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php 
                                                if(!empty($head)){
                                                foreach($head AS $p){ 
                                                   
                                            ?>                                       
                                            <tr>
                                                <td><?php echo $p['pr_no']; ?></td>
                                                <td><?php echo $p['pr_date']; ?></td>
                                                <td><?php echo $p['department']; ?></td>
                                                <td ><center><?php echo $p['urgency_num']; ?></center></td>
                                                <td><?php echo $p['urgency_des']; ?></td>
                                                <td><?php echo $p['requestor']; ?></td>
                                                <td>
                                                    <center>
                                                        <a href="<?php echo base_url(); ?>index.php/pr/purchase_request/<?php echo $p['pr_id']; ?>" class="btn btn-custon-three btn-warning btn-xs">
                                                        <span class="fa fa-eye"></span>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>index.php/pr/cancel_pr/<?php echo $p['pr_id']; ?>" class="btn btn-custon-three btn-danger btn-xs">
                                                            <span class="p-l-0 fa fa-ban"></span>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php } }  ?>                       
                                        </tbody>
                                    </table>
                                </div>                           
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <!-- Data table area End-->