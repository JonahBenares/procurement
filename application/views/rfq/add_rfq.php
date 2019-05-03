
    <div class="admin-dashone-data-table-area m-t-15">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12" style="">
                    <div class="sparkline8-list shadow-reset">
                        <div style="height: 10px;    background: linear-gradient(to right, #ff9966 0%, #ff66cc 100%);}"></div>
                        <div class="sparkline8-graph">
                            <h3>Create RFQ</h3>
                            <div class="datatable-dashv1-list custom-datatable-overright">  
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <form>
                                                    <div class="modal-body-lowpad">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <p class="m-b-0">Date:</p>
                                                                    <input type="date" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <p class="m-b-0">PR #:</p>
                                                                    <input type="text" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                        <div class="form-group">
                                                            <p class="m-b-0">Department:</p>
                                                            <select name='department' class="form-control">
                                                                <option value='' selected>-Select Department-</option>
                                                                <?php foreach($department AS $dept){ ?>
                                                                    <option value="<?php echo $dept->department_id; ?>">
                                                                    <?php echo $dept->department_name; ?>
                                                                    </option>
                                                                <?php }  ?> 
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Enduse:</p>
                                                            <select name='enduse' class="form-control">
                                                                <option value='' selected>-Select End Use-</option>
                                                                <?php foreach($enduse AS $end){ ?>
                                                                    <option value="<?php echo $end->enduse_id; ?>">
                                                                    <?php echo $end->enduse_name; ?>
                                                                    </option>
                                                                <?php }  ?> 
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Purpose:</p>
                                                            <select name='purpose' class="form-control">
                                                                <option value='' selected>-Select Purpose-</option>
                                                                <?php foreach($purpose AS $purp){ ?>
                                                                    <option value="<?php echo $purp->purpose_id; ?>">
                                                                    <?php echo $purp->purpose_name; ?>
                                                                    </option>
                                                                <?php }  ?> 
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Date needed:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Requested by:</p>
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="m-b-0">Remarks:</p>
                                                            <textarea cols="3" name="" class="form-control" ></textarea>
                                                        </div>
                                                        <center>
                                                            <a href="<?php echo base_url(); ?>index.php/aoq/aoq_prnt" class="btn btn-custon-three btn-primary btn-block">Proceed</a>
                                                        </center>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>                      
                        <div style="height: 10px; background: linear-gradient(to right, #ff9966 0%, #ff66cc 100%);}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>