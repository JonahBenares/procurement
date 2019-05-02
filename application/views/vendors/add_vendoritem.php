
    <div class="admin-dashone-data-table-area m-t-15">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12" style="">
                    <div class="sparkline8-list shadow-reset">
                        <div style="height: 10px;    background: linear-gradient(to right, #ff9966 0%, #ff66cc 100%);}"></div>
                        <div class="sparkline8-graph">
                            <h5>Add Item/s to Vendor:</h5>
                            <h4><u>Vendor Name</u></h4>
                            <div class="datatable-dashv1-list custom-datatable-overright">  
                                <form>
                                    <table width="100%">
                                        <tbody>
                                        <?php for($x=1;$x<=10;$x++){ ?>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <p class="m-b-0">Item #<?php echo $x; ?>:</p>
                                                        <select name="item<?php echo $x; ?>" class="form-control" >
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </td>     
                                            </tr>
                                        <?php } ?>    
                                            <tr>
                                                <td><a href="" class="btn btn-custon-three btn-primary btn-block"><span class="fa fa-plus"></span> Add Item/s</a></td>
                                            </tr>                                
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>                      
                        <div style="height: 10px; background: linear-gradient(to right, #ff9966 0%, #ff66cc 100%);}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>