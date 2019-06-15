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
                                    <li><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard">Home</a> <span class="bread-slash">/</span></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/jo_jor/jor_list">JOR List</a> <span class="bread-slash">/</span></li>
                                    <li><span class="bread-blod">Job Order Request</span></li>
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
                           <!--  <div class="sparkline8-hd p-b-0" >
                                <div class="main-sparkline8-hd">
                                    <h1>JOR List</h1>
                                    <small>JOB ORDER <b>REQUEST</b></small> 
                                    <div class="sparkline8-outline-icon">
                                        
                                    </div>
                                </div>
                            </div>        -->                
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div class="row">
                                        <div class="col-lg-6" style="border-right:1px solid #bdbdbd">
                                            <table class="table-bordsered" width="100%">
                                                <tr>
                                                    <td width="30%">Jo Request To:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Jo No:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Date Prepared:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Department:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Purpose:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Urgency:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Duration:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Completion Date:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Delivery Date:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Completion Date:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Remarks:</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            <br>
                                            <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="The car i dream about" data-caption="Name of file (JOR)" data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0ByLTnK4c6IJyFxR61IcHJIgbS1nC1WvH4QVKoVvdiSZBrdiw" data-target="#image-gallery">
                                                    <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0ByLTnK4c6IJyFxR61IcHJIgbS1nC1WvH4QVKoVvdiSZBrdiw" alt="A alt text">
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="Name of file (Damage report)" data-image="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" data-target="#image-gallery">
                                                    <img class="img-responsive" src="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" alt="Another alt text">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="image-gallery-title"></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img id="image-gallery-image" class="img-responsive" src="">
                                                    </div>
                                                    <!-- <div class="modal-footer">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                                                        </div>
                                                        <div class="col-md-8 text-justify" >                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="col-lg-6">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-primary btn-custon-three" data-toggle="modal" data-target="#addService">
                                                Add Service
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="text-align: left!important">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add Service
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </h5>                                                                
                                                            </div>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        Scope of Work:
                                                                        <textarea class="form-control" rows="5"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        Qty:
                                                                        <input type="number" name="" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        U/M:
                                                                        <input type="number" name="" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary btn-block">Add</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table-bordered table table-hovered">
                                                <tr>
                                                    <td>Scope of Work</td>
                                                    <td width="15%">Qty</td>
                                                    <td width="15%">U/M</td>
                                                </tr>
                                                <tr>
                                                    <td>asdas</td>
                                                    <td>asd</td>
                                                    <td>asdasd</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <a class="btn btn-info btn-custon-three btn-block">Save</a>
                                        </div>          
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

            //This function disables buttons when needed
            function disableButtons(counter_max, counter_current){
                $('#show-previous-image, #show-next-image').show();
                if(counter_max == counter_current){
                    $('#show-next-image').hide();
                } else if (counter_current == 1){
                    $('#show-previous-image').hide();
                }
            }

            /**
             *
             * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
             * @param setClickAttr  Sets the attribute for the click handler.
             */

            function loadGallery(setIDs, setClickAttr){
                var current_image,
                    selector,
                    counter = 0;

                $('#show-next-image, #show-previous-image').click(function(){
                    if($(this).attr('id') == 'show-previous-image'){
                        current_image--;
                    } else {
                        current_image++;
                    }

                    selector = $('[data-image-id="' + current_image + '"]');
                    updateGallery(selector);
                });

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
    </script>