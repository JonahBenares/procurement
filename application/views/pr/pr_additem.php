    <style type="text/css">
        html, body.materialdesign {
            background: #2d2c2c;
        }
    </style>
    <div class="admin-dashone-data-table-area m-t-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="hr-bold"></div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <h4>PR Add Item</h4>
                                <form method="POST" action = "<?php echo base_url();?>pr/insert_items">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td width="1%">#</td>
                                                <th>Item Name</th>
                                                <th width="25%">Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $z=1; for($x=1;$x<=10;$x++){ ?>
                                            <tr>
                                                <td style="padding-bottom: 1px!important"><?php echo $z; ?></td>
                                                <td style="padding: 0px!important">
                                                    <select class="form-control" name = "item<?php echo $x; ?>">
                                                        <option value = ''>--Select Item--</option>
                                                        <?php foreach($item AS $i){ ?>
                                                        <option value = "<?php echo $i->item_id;?>"><?php echo $i->item_name." - ".$i->brand_name." - ".$i->item_specs; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td style="padding: 0px!important">
                                                    <input type="number" name="qty<?php echo $x; ?>" class="form-control">
                                                </td>
                                            </tr> 
                                            <?php $z++; } ?>       
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="pr_id" value="<?php echo $pr_id;?>" class="form-control"> 
                                    <button class="btn btn-primary btn-block" type = "submit">Save</button>
                                </form>
                            </div>
                        </div>   
                        <div class="hr-bold"></div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>