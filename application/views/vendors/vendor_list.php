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
                                    <li><span class="bread-blod">Vendor List</span>
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
                                <h1>Vendor List</h1>
                                <div class="sparkline8-outline-icon">
                                    <a class="btn btn-custon-three btn-primary" href="#" data-toggle="modal" data-target="#addVendor">
                                        <span class="fa fa-plus p-l-0"></span>
                                        Add Vendor
                                    </a>
                                    <a class="btn btn-custon-three btn-success" href="#" data-toggle="modal" data-target="#searchVendor">
                                        <span class="fa fa-search p-l-0"></span>
                                        Search Vendor
                                    </a>
                                    <div id="addVendor" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header header-color-modal bg-color-1">
                                                    <h4 class="modal-title">Add New Item</h4>
                                                    <div class="modal-close-area modal-close-df">
                                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                    </div>
                                                </div>
                                                <form>
                                                    <div class=" p-l-20 p-r-20 modal-body-lowpad">
                                                        <div class="form-group">
                                                            <p class="m-b-0">Vendor:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Specification:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Address:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Phone:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Terms:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Type:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Notes:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Status:</p>
                                                            <select type="text" name="" class="form-control">
                                                                <option>hello</option>
                                                            </select>
                                                        </div>
                                                        <center>
                                                            <a href="#" class="btn btn-custon-three btn-primary btn-block">Save</a>
                                                        </center>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="searchVendor" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header header-color-modal bg-color-2">
                                                    <h4 class="modal-title">BG Color Header Modal</h4>
                                                    <div class="modal-close-area modal-close-df">
                                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                    </div>
                                                </div>
                                                <form>
                                                    <div class=" p-l-20 p-r-20 modal-body-lowpad">
                                                        <div class="form-group">
                                                            <p class="m-b-0">Vendor:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Specification:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Address:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Phone:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Terms:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Type:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Notes:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Status:</p>
                                                            <select type="text" name="" class="form-control">
                                                                <option>hello</option>
                                                            </select>
                                                        </div>
                                                        <center>
                                                            <a href="#" class="btn btn-custon-three btn-success btn-block"><span class="fa fa-search"></span> Search</a>
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
                                <div id="toolbar">
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-checkbox="true"></th>
                                            <th>Vendor</th>
                                            <th>Product/Servie</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Terms</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Status</th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a href="" class="btn-link txt-primary" onclick="vendorDetails('<?php echo base_url(); ?>')">Item Names</a>
                                            </td>
                                            <td>Amvescap plc</td>
                                            <td>15%</td>
                                            <td>15%</td>
                                            <td>15%</td>
                                            <td>15%</td>
                                            <td>15%</td>
                                            <td>15%</td>
                                            <td>
                                                <center>
                                                    <a href="" onclick="updateVendor('<?php echo base_url(); ?>')" class="btn btn-custon-three btn-info btn-xs">
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                    <a href="" class="btn btn-custon-three btn-danger btn-xs">
                                                        <span class="fa fa-times"></span>
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
            </div>
        </div>
    </div>
    <!-- Data table area End-->