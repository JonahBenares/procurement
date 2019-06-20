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
                                    <li><span class="bread-blod">JOR List</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="createRFQ" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Create RFQ</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>">
                    <div class="modal-body-lowpad">
                        <div class="form-group">
                            <p class="m-b-0">Date Needed:</p>
                            <input type="date" name="dr_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <p class="m-b-0">Vendor:</p>
                            <select class="form-control">
                                <option>--Select Vendor--</option>
                            </select>
                        </div>
                        <center>
                           
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Proceed">
                            <a href="<?php echo base_url(); ?>index.php/jo_rfq/rfquotation" class="dropdown-item">Proceed</a>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="addJOR" class="modal modal-adminpro-general default-popup-PrimaryModal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Add JOR</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form method="POST" action = "<?php echo base_url();?>">
                    <div class="modal-body-lowpad">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p class="m-b-0">JO Request to:</p>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <p class="m-b-0">JO No:</p>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <p class="m-b-0">Date prepared:</p>
                                    <input type="date" name="" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <p class="m-b-0">Department:</p>
                                    <input type="text" name="" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <p class="m-b-0">Purpose:</p>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <p class="m-b-0">Urgency:</p>
                                    <select class="form-control">
                                        <option>--Select Vendor--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p class="m-b-0">Duration:</p>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <p class="m-b-0">Completion Date:</p>
                                    <input type="date" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <p class="m-b-0">Delivery Date:</p>
                                    <input type="date" name="" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <p class="m-b-0"><b>Upload</b> JOR:</p>
                                    <input type="File" name="" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <p class="m-b-0"><b>Upload</b> Damage Report:</p>
                                    <input type="File" name="" class="form-control">
                                </div>
                               <div class="form-group">
                                    <p class="m-b-0">Handled by:</p>
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p class="m-b-0">Remarks:</p>
                                    <textarea class="form-control"></textarea> 
                                </div>
                            </div>
                        </div>
                        <center>
                           
                            <input type = "submit" class="btn btn-custon-three btn-primary btn-block" value = "Proceed">
                            <a href="<?php echo base_url(); ?>index.php/jo_jor/joborder_request" class="dropdown-item">Proceed</a>
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
                                <h1>JOR List</h1>
                                <small>JOB ORDER <b>REQUEST</b></small> 
                                <div class="sparkline8-outline-icon">
                                    <a class="btn btn-custon-three btn-primary"  data-toggle="modal" data-target="#addJOR"> 
                                        <span class="fa fa-plus p-l-0"></span> Add JOR
                                    </a>
                                </div>
                            </div>
                        </div>                       
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th>JO No</th>
                                            <th>Date Prepared</th>
                                            <th>JO Request to</th>
                                            <th><center><span class="fa fa-bars"></span></center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><td>
                                                <center>
                                                    <a type='button' class="btn btn-custon-three btn-info btn-xs"  data-toggle="modal" data-target="#createRFQ"> 
                                                        <span class="fa fa-plus-circle p-l-0"></span>
                                                    </a>
                                                     <a href="<?php echo base_url(); ?>dr/dr_prnt" class="btn btn-custon-three btn-warning btn-xs" >
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>dr/dr_prnt" class="btn btn-custon-three btn-danger btn-xs" >
                                                        <span class="fa fa-ban"></span>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>                       
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