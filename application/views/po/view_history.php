<div class="modal fade" id="polink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">History of <b><?php echo $head['po_no'];?></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>                                                                
            </div>
            <div class="modal-body">
            <?php foreach($revise AS $r){ ;?>
                <a href="<?php echo base_url(); ?>po/purchase_order_saved_r/<?php echo $head['po_id'];?>/<?php echo $r['revision_no'];?>" target="_blank" class="btn btn-link btn-link-shad btn-block"><?php echo $r['po_no'];?>
                    <span class="pull-right"><?php echo date("Y-m-d", strtotime($r['revised_date']));?></span>
                </a>
            <?php } ?>
            <input type="text" name="poid" id="poid" >
            </div>
        </div>
    </div>
</div>