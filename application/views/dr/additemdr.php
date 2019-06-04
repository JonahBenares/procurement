    <!-- <?php $CI =& get_instance(); ?> -->
    <style type="text/css">
        html, body.materialdesign {
            background: #2d2c2c;
        }
        .td{
            padding: 0px!important;            
        }
    </style>
    <div class="admin-dashone-data-table-area m-t-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="hr-bold"></div>
                        <div class="sparkline8-graph" style="text-align: left">
                            <form method='POST' action="<?php echo base_url(); ?>">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div class="form-group">
                                    <h5 class="nomarg">Supplier:</h5>
                                    <h5 class="nomarg">
                                         <select name='requested_by' class="form-control">
                                            <option value='' selected>-Select Supplier-</option>
                                                <option value="">
                                                </option>
                                        </select>
                                    </h5>
                                </div>
                                <div class="form-group">
                                    <h5 class="nomarg">Item Description:</h5>
                                    <h5 class="nomarg">
                                        <select name='purpose' class="form-control">
                                            <option value='' selected>-Select Item Description-</option>
                                                <option value="">
                                                </option>
                                        </select>
                                    </h5>
                                </div>
                                <div class="form-group">
                                    <h5 class="nomarg">Delivered:</h5>
                                    <h5 class="nomarg"><input type="number" name="" class="form-control"></h5>
                                </div>  
                                <div class="form-group">
                                    <h5 class="nomarg">UOM:</h5>
                                    <h5 class="nomarg"><input type="text" name="" class="form-control"></h5>
                                </div>
                                <div class="form-group">
                                    <h5 class="nomarg">Remarks:</h5>
                                    <h5 class="nomarg"><textarea type="text" name="" class="form-control"></textarea></h5>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Save changes">
                            </div>
                        </form>
                        </div>   
                        <div class="hr-bold"></div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>