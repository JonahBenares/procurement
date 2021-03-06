    
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="<?php echo base_url(); ?>index.php/Masterfile/dashboard"><img src="<?php echo base_url(); ?>assets/img/message/logo4.jpg" alt="" />
                    </a>
                    <h3 style="letter-spacing: 2px;font-weight: 800;font-size: 15px;margin-bottom: 0px">PROCUREMENT</h3>
                    <p style="letter-spacing: 3px;">SYSTEM</p>
                    <strong><i>P</i></strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/Masterfile/dashboard"  role="button" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-home"></i>
                                <span class="mini-dn">Dashboard</span> 
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-bars"></i> 
                                <span class="mini-dn">Masterfile</span> 
                                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX p-t-0" style="width: 180px">
                                <a href="<?php echo base_url(); ?>index.php/items/item_list" class="dropdown-item">Items</a>
                                <a href="<?php echo base_url(); ?>index.php/vendors/vendor_list" class="dropdown-item">Vendors</a>
                                <a href="<?php echo base_url(); ?>index.php/masterfile/employee_list" class="dropdown-item">Employee</a>
                                <a href="<?php echo base_url(); ?>index.php/masterfile/department_list" class="dropdown-item">Department</a>
                                <a href="<?php echo base_url(); ?>index.php/masterfile/unit_list" class="dropdown-item">Unit</a>
                                <a href="<?php echo base_url(); ?>index.php/masterfile/purpose_list" class="dropdown-item">Purpose</a>
                                <a href="<?php echo base_url(); ?>index.php/masterfile/enduse_list" class="dropdown-item">Enduse</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-th-large"></i> 
                                <span class="mini-dn">PO Transactions</span> 
                                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX p-t-0">
                                <a href="<?php echo base_url(); ?>index.php/pr/pr_list"  role="button" class="nav-link dropdown-toggle" title="Purchase Request">
                                    <i class="fa big-icon fa-file-o"></i>
                                    <span class="mini-dn">Purchase Request</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/rfq/rfq_list"  role="button" class="nav-link dropdown-toggle" title="Request for Quotation">
                                    <i class="fa big-icon fa-pencil-square-o"></i>
                                    <span class="mini-dn">Request For Quotation</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/aoq/aoq_list"  role="button" class="nav-link dropdown-toggle" title="Abstract of Quotation">
                                    <i class="fa big-icon fa-folder"></i>
                                    <span class="mini-dn">Abstract of Quotation</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/po/po_list"  role="button" class="nav-link dropdown-toggle" title="Purchase Order">
                                    <i class="fa big-icon fa-shopping-cart"></i>
                                    <span class="mini-dn">Purchase Order</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/rfdis/rfdis_list"  role="button" class="nav-link dropdown-toggle" title="Request for Disbursement">
                                    <i class="fa big-icon fa-list-alt "></i>
                                    <span class="mini-dn">Request for Disbursement</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/dr/dr_list"  role="button" class="nav-link dropdown-toggle" title="Delivery Receipt">
                                    <i class="fa big-icon fa-truck "></i>
                                    <span class="mini-dn">Delivery Receipt</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-th-list"></i> 
                                <span class="mini-dn">JO Transactions</span> 
                                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX p-t-0">
                                <a href="<?php echo base_url(); ?>index.php/jo_jor/jor_list"  role="button" class="nav-link dropdown-toggle" title="Job Order Request">
                                    <i class="fa big-icon fa-file-o"></i>
                                    <span class="mini-dn">Job Order Request</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/jo_rfq/rfq_list"  role="button" class="nav-link dropdown-toggle" title="Request for Quotation">
                                    <i class="fa big-icon fa-pencil-square-o"></i>
                                    <span class="mini-dn">Request For Quotation</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/jo_aoq/aoq_list"  role="button" class="nav-link dropdown-toggle" title="Abstract of Quotation">
                                    <i class="fa big-icon fa-folder"></i>
                                    <span class="mini-dn">Abstract of Quotation</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/jo_jo/jo_list"  role="button" class="nav-link dropdown-toggle" title="Job Order">
                                    <i class="fa big-icon fa-file-text"></i>
                                    <span class="mini-dn"> Job Order</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/jo_po/po_list"  role="button" class="nav-link dropdown-toggle" title="Purchase Order">
                                    <i class="fa big-icon fa-shopping-cart"></i>
                                    <span class="mini-dn">Purchase Order</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/jo_rfdis/rfdis_list"  role="button" class="nav-link dropdown-toggle" title="Request for Disbursement">
                                    <i class="fa big-icon fa-list-alt "></i>
                                    <span class="mini-dn">Request for Disbursement</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/jo_dr/dr_list"  role="button" class="nav-link dropdown-toggle" title="Delivery Receipt">
                                    <i class="fa big-icon fa-truck "></i>
                                    <span class="mini-dn">Delivery Receipt</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/jo_ar/ar_list"  role="button" class="nav-link dropdown-toggle" title="Acknowledgement Receipt">
                                    <i class="fa big-icon fa-clipboard"></i>
                                    <span class="mini-dn">Acknowledgement Receipt</span> 
                                    <span class="indicator-right-menu mini-dn"></span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-bar-chart"></i> 
                                <span class="mini-dn">Reports</span> 
                                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX p-t-0" style="width: 180px">
                                <a class="dropdown-item" data-toggle="modal" data-target="#pr_modal">PR Summary</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#po_modal">PO Summary</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <div class="content-inner-all"><!-- ara sa footer </div> -->
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="img/logo/log.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <!-- <div class="header-top-menu tabl-d-n">
                                    <ul class="nav navbar-nav mai-top-nav">
                                        <li class="nav-item dropdown">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Templates <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                            <div role="menu" class="dropdown-menu animated flipInX">
                                                <a href="<?php echo base_url(); ?>index.php/po/purchase_order" class="dropdown-item">Purchase Order</a>
                                                <a href="<?php echo base_url(); ?>index.php/po/delivery_receipt" class="dropdown-item">Delivery Receipt</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name"><?php echo $_SESSION['username'];?></span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li><a href="#"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>My Account</a>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-money author-log-ic"></span>User Billing</a>
                                                </li>
                                                <li><a href="#"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Settings</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>index.php/masterfile/user_logout"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="pr_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Choose Month and Year (<u><b>PR</b></u> Summary Report)
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>                            
                        </div>
                        <form method='POST' action="<?php echo base_url(); ?>reports/generate_pr_summary" target='_blank'>
                            <div class="modal-body">
                                <div class="form-group">
                                    Choose Year:
                                    <select class="form-control" name="year" required="required">
                                        <option value='' selected="selected">-Select Year-</option>
                                        <?php
                                        $curr_year = date('Y'); 
                                        for($x=2019;$x<=$curr_year;$x++){ ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Choose Month:
                                    <select class="form-control" name="month">
                                        <option value='' selected="selected">-Select Month-</option>
                                        <option value='01'>January</option>
                                        <option value='02'>February</option>
                                        <option value='03'>March</option>
                                        <option value='04'>April</option>
                                        <option value='05'>May</option>
                                        <option value='06'>June</option>
                                        <option value='07'>July</option>
                                        <option value='08'>August</option>
                                        <option value='09'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary btn-block" value='Proceed'>
                                <!-- <a href="<?php echo base_url(); ?>index.php/reports/pr_report"  class="btn btn-primary " target="_blank">Proceed</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="po_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Choose Month and Year (<u><b>PO</b></u> Summary Report)
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>                            
                        </div>
                        <form method='POST' action="<?php echo base_url(); ?>reports/generate_po_summary" target='_blank'>
                            <div class="modal-body">
                                <div class="form-group">
                                    Choose Year:
                                    <select class="form-control" name="year">
                                        <option value='' selected="selected">-Select Year-</option>
                                        <?php
                                        $curr_year = date('Y'); 
                                        for($x=2019;$x<=$curr_year;$x++){ ?>
                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Choose Month:
                                    <select class="form-control" name="month">
                                        <option value='' selected="selected">-Select Month-</option>
                                        <option value='01'>January</option>
                                        <option value='02'>February</option>
                                        <option value='03'>March</option>
                                        <option value='04'>April</option>
                                        <option value='05'>May</option>
                                        <option value='06'>June</option>
                                        <option value='07'>July</option>
                                        <option value='08'>August</option>
                                        <option value='09'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary btn-block" value='Proceed'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->
            <!-- Breadcome start-->
            
        