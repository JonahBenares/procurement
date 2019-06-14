    <script src="<?php echo base_url(); ?>assets/js/pr.js"></script> 
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
                                    <li><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard">Home</a> 
                                        <span class="bread-slash">/</span>
                                    </li>
                                     <li><a href="<?php echo base_url(); ?>index.php/pr/pr_list">PR List</a> 
                                        <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Purchase Request</span>
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
                                    <h1>PR No: <b>PR-IT1001-2019</b> </h1>
                                    <h5>Date: June 21, 1990</h5>                                     
                                    <div class="sparkline8-outline-icon">
                                        <a type='button' class="btn btn-custon-three btn-primary" onclick="prAdditem('<?php echo base_url(); ?>')"> 
                                            <span class="fa fa-plus p-l-0"></span> Add Item
                                        </a>
                                        <!-- if cancel ang item -->
                                        <a readonly class="btn btn-danger">Cancelled</a>
                                    </div>
                                </div>
                            </div>                       
                            <div class="sparkline8-graph">
                                <form>
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <table class="table table-bordered table-hovered">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Qty</th>
                                                    <th width="5%"><center><span class="fa fa-bars"></span></center></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                        
                                                <tr>
                                                    <td>das</td>
                                                    <td>asda</td>
                                                    <td>
                                                        <center>
                                                            <a href="" class="btn btn-custon-three btn-danger btn-xs">
                                                            <span class="fa fa-times"></span>
                                                            </a>
                                                        </center>
                                                    </td>
                                                </tr>                       
                                            </tbody>
                                        </table>
                                    </div>                      
                                    <center><button class="btn btn-custon-three btn-primary btn-block ">Save PR</button></center>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <!-- Data table area End-->