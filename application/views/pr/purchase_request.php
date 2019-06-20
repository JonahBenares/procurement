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
                            <div class="sparkline8-graph">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="main-sparkline8-hd" style="text-align: left!important">
                                            <?php foreach($head AS $h){ ?>
                                            <h1>PR No: <b><?php echo $h['pr_no']; ?></b> </h1>
                                            <h5>Date: <?php echo $h['pr_date']; ?></h5> 
                                            <h5>Enduse: <?php echo $h['enduse']; ?></h5> 
                                            <h5>Purpose: <?php echo $h['purpose']; ?></h5> 
                                            <h5>Department: <?php echo $h['department']; ?></h5> 
                                            <h5>Requestor: <?php echo $h['requestor']; ?></h5> 
                                            <h5>Urgency Description: <?php echo $h['urgency_des']; ?></h5> 
                                            <div class = "row">
                                                <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                                                    <label> Attachment 1:</label>
                                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="<?php echo $h['pr_attach1']; ?>" data-caption="<?php echo $h['pr_attach1']; ?>" data-image="../../uploads/<?php echo $h['pr_attach1']; ?>" data-target="#attachment1">
                                                        <img class="img-responsive" src="../../uploads/<?php echo $h['pr_attach1']; ?>" alt="<?php echo $h['pr_attach1']; ?>">
                                                    </a>
                                                </div>
                                                <div class="modal fade" id="attachment1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="image-gallery-image" class="img-responsive" src="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- asdasdasdasdasssssssssssssssssssssssssssssss -->
                                                <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                                                    <label> Attachment 2:</label>
                                                    <a class="thumbnail thumbs" href="#" data-image-id="" data-toggle="modal" data-title="<?php echo $h['pr_attach2']; ?>" data-caption="<?php echo $h['pr_attach2']; ?>" data-image="../../uploads/<?php echo $h['pr_attach2']; ?>" data-target="#attachment2">
                                                        <img class="img-responsive" src="../../uploads/<?php echo $h['pr_attach2']; ?>" alt="<?php echo $h['pr_attach2']; ?>">
                                                    </a>
                                                </div>

                                                <div class="modal fade" id="attachment2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title" id="image-gallery-title2"></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="image-gallery-image2" class="img-responsive" src="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                            </div>
                                            <?php } ?>                                
                                            <div class="sparkline8-outline-icon">
                                                <?php if($saved==1 && $cancelled==0){ ?>
                                                <a  href='<?php echo base_url(); ?>pr/override_pr/<?php echo $pr_id; ?>' onclick="return confirm('Are you sure you want to Override PR?')" class="btn btn-info btn-md p-l-25 p-r-25"><span class="fa fa-pencil"></span> Override <u><b>PR</b></u></a>
                                                <?php } ?>
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
                                    <div class="col-lg-6">
                                        <form>
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table class="table table-bordered table-hovered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th>
                                                            <th width="15%">Qty</th>
                                                            <?php if($saved==0 && $cancelled==0){ ?>
                                                            <th width="5%"><center><span class="fa fa-bars"></span></center></th>
                                                            <?php }?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>    
                                                        <?php foreach($details AS $d){ ?>                                    
                                                        <tr>
                                                            <td><?php echo $d['item']. ", ". $d['specs'];?></td>
                                                            <td><?php echo $d['qty'];?></td>
                                                            <?php if($saved==0 && $cancelled==0){ ?>
                                                            <td>
                                                                <center>
                                                                    <a href="<?php echo base_url(); ?>index.php/pr/delete_item/<?php echo $d['pr_details_id'];?>/<?php echo $pr_id; ?>" onclick="return confirm('Are you sure you want to delete item?')" class="btn btn-custon-three btn-danger btn-xs">
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
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <!-- Data table area End-->

    <script type="text/javascript">
        $(document).ready(function(){

            loadGallery(true, 'a.thumbnail');

            function loadGallery(setIDs, setClickAttr){
                var current_image,
                    selector,
                    counter = 0;

                function updateGallery(selector) {
                    var $sel = selector;
                    current_image = $sel.data('image-id');
                    $('#image-gallery-caption').text($sel.data('caption'));
                    $('#image-gallery-title').text($sel.data('title'));
                    $('#image-gallery-image').attr('src', $sel.data('image'));
                    disableButtons(counter, $sel.data('image-id'));
                }

                if(setIDs == true){
                    $('[data-image-id]').each(function(){
                        counter++;
                        $(this).attr('data-image-id',counter);
                    });
                }
                $(setClickAttr).on('click',function(){
                    updateGallery($(this));
                });
            }
        });


        $(document).ready(function(){

            loadGallery1(true, 'a.thumbs');

            function loadGallery1(setIDs, setClickAttr){
                var current_image,
                    selector,
                    counter = 0;

                function updateGallery1(selector) {
                    var $sel = selector;
                    current_image = $sel.data('image-id');
                    $('#image-gallery-caption').text($sel.data('caption'));
                    $('#image-gallery-title2').text($sel.data('title'));
                    $('#image-gallery-image2').attr('src', $sel.data('image'));
                    disableButtons(counter, $sel.data('image-id'));
                }

                if(setIDs == true){
                    $('[data-image-id]').each(function(){
                        counter++;
                        $(this).attr('data-image-id',counter);
                    });
                }
                $(setClickAttr).on('click',function(){
                    updateGallery1($(this));
                });
            }
        });

       
    </script>