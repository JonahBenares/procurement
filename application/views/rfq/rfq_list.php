 
 <script type="text/javascript">
 $( document ).ready(function() {
    $("#createAOQ").attr("disabled", true);
    var $checkboxes = $('input[type="checkbox"]');
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        if(countCheckedCheckboxes  > 5){
           this.checked = false;
           alert('You can only choose up to 5 RFQs.');
        } 
         if(countCheckedCheckboxes  > 2){
            $('#createAOQ').removeAttr("disabled");
         }
    });
 });

  function toggle_multi(source) {
      checkboxes_multi = document.getElementsByClassName('rfq_list');
      for(var i=0, n=checkboxes_multi.length;i<n;i++) {
        checkboxes_multi[i].checked = source.checked;
      }
    }
 </script>   
   
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
         <form name="myform" action="<?php echo base_url(); ?>index.php/aoq/add_aoq" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd p-b-0" >
                            <div class="main-sparkline8-hd">
                                <h1>RFQ List</h1>
                                <small>REQUEST FOR QUOTATION</small> 
                                <div class="sparkline8-outline-icon">
                                <input type='submit' id='createAOQ' class="btn btn-custon-three btn-primary" value='Create AOQ' > 
                                  <!--   <a class="btn btn-custon-three btn-primary" href=">
                                        <span class="fa fa-plus p-l-0"></span>
                                        Create AOQ
                                    </a> -->
                                </div>
                            </div>
                        </div>
                       
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%"><input type="checkbox" class="form-control" name="" onClick="toggle_multi(this)"></th>
                                            <th>RFQ #</th>
                                            <th>Supplier</th>
                                            <th>RFQ Date</th>
                                            <th>Items</th>
                                            <th width="10%"><center><span class="fa fa-bars"></span></center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(!empty($list)){
                                    foreach($list AS $li) { 
                                        $item='';
                                        foreach($items AS $it){ 
                                            if($it['rfq_id']==$li['rfq_id']){
                                                $item .="- ".$it['item_name']. "<br> ";
                                            }
                                        }
                                        $item = substr($item, 0, -2);
                                                ?>
                                        <tr>
                                        <?php if($li['served']==0){ ?>
                                            <td>
                                            <?php if($li['completed']==1){ ?>
                                            <input type="checkbox" class="form-control rfq_list" name="rfq[]" value="<?php echo $li['rfq_id']; ?>">
                                            <?php } ?></td>
                                            <td><?php echo $li['rfq_no']; ?></td>
                                            <td><?php echo $li['supplier']; ?></td>
                                            <td><?php echo date('M d, Y',strtotime($li['rfq_date'])); ?></td>
                                            <td>
                                                <?php echo $item; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="javascript:void(0)" onclick="incomingRfq('<?php echo base_url(); ?>','<?php echo $li['rfq_id']; ?>')" class="btn btn-custon-three btn-warning btn-xs">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>rfq/update_served/<?php echo $li['rfq_id']?>" class="btn btn-custon-three btn-success btn-xs" >served
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>       
                                    <?php } }
                                    } ?>                                 
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