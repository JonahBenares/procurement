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
             <form name="myform" action="<?php echo base_url(); ?>index.php/pr/saved_pr" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd p-b-0" >
                                <div class="main-sparkline8-hd">
                                    <?php foreach($head AS $h){ ?>
                                    <h1>PR No: <b><?php echo $h['pr_no']; ?></b> </h1>
                                    <h5>Date: <?php echo $h['pr_date']; ?></h5> 
                                    <div class = "row">
                                        <div class = "col-lg-4">
                                            <label> Attachment 1: </label>
                                            <div class="thumbnail">
                                                <a href='uploads/<?php echo $h['pr_attach1']; ?>' id = "cert_href1" class='display' ><?php echo $h['pr_attach1']; ?></a>
                                                <!-- <img id="pic1" class="pictures" src="<?php echo (empty($h['pr_attach1']) ? base_url().'assets/default/default-img.jpg' : base_url().'uploads/'.$h['pr_attach1']); ?>" alt="your image" /> -->
                                            </div>
                                        </div>
                                        <div class = "col-lg-4">
                                            <label> Attachment 2: </label>
                                            <div class="thumbnail">
                                                <a href='uploads/<?php echo $h['pr_attach2']; ?>' id = "cert_href2" class='display' ><?php echo $h['pr_attach2']; ?></a>
                                                <!-- <img id="pic1" class="pictures" src="<?php echo (empty($h['pr_attach2']) ? base_url().'assets/img/default-img.jpg' : base_url().'uploads/'.$h['pr_attach2']); ?>" alt="your image" /> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>                                
                                    <div class="sparkline8-outline-icon">
                                        <?php if($saved==0 && $cancelled==0){ ?>
                                            <a type='button' class="btn btn-custon-three btn-primary" onclick="prAdditem('<?php echo base_url(); ?>','<?php echo $pr_id; ?>')"> 
                                                <span class="fa fa-plus p-l-0"></span> Add Item
                                            </a>
                                        <?php } ?>
                                        <!-- if cancel ang item -->
                                        <?php if($cancelled==1){ ?>
                                            <a readonly class="btn btn-danger">Cancelled</a>
                                        <?php } ?>
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
                                                    <?php if($saved==0 && $cancelled==0){ ?>
                                                    <th width="5%"><center><span class="fa fa-bars"></span></center></th>
                                                    <?php }?>
                                                </tr>
                                            </thead>
                                            <tbody>    
                                                <?php foreach($details AS $d){ ?>                                    
                                                <tr>
                                                    <td><?php echo $d['item'];?></td>
                                                    <td><?php echo $d['qty'];?></td>
                                                    <?php if($saved==0 && $cancelled==0){ ?>
                                                    <td>
                                                        <center>
                                                            <a href="<?php echo base_url(); ?>index.php/pr/delete_item/<?php echo $d['pr_details_id'];?>/<?php echo $pr_id; ?>" class="btn btn-custon-three btn-danger btn-xs">
                                                                <span class="fa fa-times"></span>
                                                            </a>
                                                        </center>
                                                    </td>
                                                    <?php } ?>
                                                </tr> 
                                                <?php } ?>                      
                                            </tbody>
                                        </table>
                                    </div>  
                                    <input type="hidden" name="pr_id" value = '<?php echo $pr_id; ?>'>
                                    <?php if($saved==0 && $cancelled==0){ ?>                    
                                        <center><button class="btn btn-custon-three btn-primary btn-block ">Save PR</button></center>
                                    <?php } ?>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <!-- Data table area End-->