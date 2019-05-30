  	<script src="<?php echo base_url(); ?>assets/js/po.js"></script> 
  	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Procurement System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon
    		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/message/logo4.ico">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mixins.css">
	    <script src="<?php echo base_url(); ?>assets/js/all-scripts.js"></script> 
	</head>

  	<style type="text/css">
        html, body{
            background: #2d2c2c!important;
            font-size:12px!important;
        }
        .pad{
        	padding:0px 250px 0px 250px
        }
        .table-bordered>tbody>tr>td, 
        .table-bordered>tbody>tr>th, 
        .table-bordered>tfoot>tr>td, 
        .table-bordered>tfoot>tr>th, 
        .table-bordered>thead>tr>td, 
        .table-bordered>thead>tr>th,
        .all-border
        {
		    border: 1px solid #000!important;
		}
		.f13{
			font-size:13px!important;
		}
		.f12{
			font-size:12px!important;
		}
		.bor-btm{
			border-bottom: 1px solid #000;
		}
		.bor-right{
			border-right: 1px solid #000;
		}
		.sel-des{
			border: 0px!important;
		}
		@media print{
			.pad{
        	padding:0px 0px 0px 0px
        	}
			#prnt_btn,#item-btn,#pr-btn{
				display: none;
			}
			.emphasis{
				border: 0px solid #fff!important;
			}
			html, body{
	            background: #fff!important;
	            font-size:12px!important;
	        }
	        #prhide{
				display: none!important;
			}
		}
		.text-white{
			color: #fff;
		}
		.select-des{			
		    -webkit-appearance: none;
		    border: 0px;
		}
	
		.emphasis{
			border-bottom: 2px solid red;
		}
		.text-red{
			color: red;
		}
		.nomarg{
			margin: 0px 2px 0px 2px;
		}

    </style>
    <!-- Modal -->
	<div class="modal fade" id="add-pr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add PR
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</h5>					
				</div>
				<form method="POST" action="<?php echo base_url(); ?>po/add_pr">
					<div class="modal-body">
						<div class="form-group">
							<h5 class="nomarg">PR No:</h5>
							<h5 class="nomarg"><b><input type="" class="form-control" name=""></b></h5>
						</div>
						<div class="form-group">
							<h5 class="nomarg">Requestor:</h5>
							<h5 class="nomarg"><b><input type="" class="form-control" name=""></b></h5>
						</div>
						<div class="form-group">
							<h5 class="nomarg">Purpose:</h5>
							<h5 class="nomarg"><b><input type="" class="form-control" name=""></b></h5>
						</div>

						<div class="form-group">
							<h5 class="nomarg">Enduse:</h5>
							<h5 class="nomarg"><b><input type="" class="form-control" name=""></b></h5>
						</div>
						<input type="hidden" class="form-control" name="po_id" id="po_id">
					</div>
					<div class="modal-footer">
					</div>
				</form>
			</div>
		</div>
	</div>

	

    <div  class="pad">

    	<form method='POST' action=''>  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="abtn-group">
						<a href="javascript:history.go(-1)" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-100 p-r-100"><span class="fa fa-print"></span> Print</a>
						<input type='submit' class="btn btn-primary btn-md p-l-100 p-r-100" value="Save">	
					</div>
					<p class="text-white">Instructions: When printing PURCHASE ORDER make sure the following options are set correctly -- <u>Browser</u>: Chrome, <u>Layout</u>: Portrait, <u>Paper Size</u>: A4, <u>Margin</u> : Default, <u>Scale</u>: 100</p>
				</center>
			</div>
	    	<div style="background: #fff;">    		  			
		    	<table class="table-borddered" width="100%" style="border:2px solid #000">
		    		<tr>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    			<td width="5%"><br></td>
		    		</tr>
		    		<tr>
		    			<td colspan="5" align="center"><img width="150px" src="<?php echo base_url(); ?>assets/img/logo_cenpri.png"></td>
		    			<td colspan="15"><h4 style="margin: 0px"><b>CENTRAL NEGROS POWER RELIABILITY, INC.</b></h4></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center">Office: 88 Corner Rizal-Mabini Sts., Bacolod City</td></tr>
		    		<tr><td class="f13" colspan="20" align="center">Tel. No.: (034) 435-1932/476-7382</td></tr>
		    		<tr><td class="f13" colspan="20" align="center">Telefax: (034) 435-1932</td></tr>
		    		<tr><td class="f13" colspan="20" align="center">Plant Site: Purok San Jose, Barangay Calumangan, Bago City</td></tr>
		    		<tr><td colspan="20" align="center"><h4><b>PURCHASE ORDER</b></h4></td></tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>
		    	<?php foreach($head AS $h){ ?>
		    		<tr>
		    			<td colspan="3"><h6 class="nomarg"><b>Date</b></h6></td>
		    			<td colspan="12"><h6 class="nomarg"><b><?php echo date('F j, Y', strtotime($h['po_date'])); ?></b></h6></td>
		    			<td colspan="5"><h6 class="nomarg"><b>P.O. No.: <?php echo $h['po_no']; ?></b></h6></td>
		    		</tr>	
		    		<tr>
		    			<td colspan="3"><h6 class="nomarg"><b>Supplier:</b></h6></td>
		    			<td colspan="12"><h6 class="nomarg bor-btm"><b><?php echo $h['supplier']; ?></b></h6></td>
		    			<td colspan="5"><h6 class="nomarg"><b></b></h6></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><h6 class="nomarg"><b>Address:</b></h6></td>
		    			<td colspan="12"><h6 class="nomarg bor-btm"><b><?php echo $h['address']; ?></b></h6></td>
		    			<td colspan="5"><h6 class="nomarg"><b></b></h6></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><h6 class="nomarg"><b>Contact Person:</b></h6></td>
		    			<td colspan="12"><h6 class="nomarg bor-btm"><b><?php echo $h['contact']; ?></b></h6></td>
		    			<td colspan="5"><h6 class="nomarg"><b></b></h6></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><h6 class="nomarg"><b>Telephone #:</b></h6></td>
		    			<td colspan="12"><h6 class="nomarg bor-btm"><b><?php echo $h['phone']; ?></b></h6></td>
		    			<td colspan="5"><h6 class="nomarg"><b></b></h6></td>
		    		</tr>
		    	<?php } ?>
		    		<tr id="pr-btn">
		    			<td colspan="20" style="padding-left: 10px">
		    				<div class="btn-group" id="prhide">
			    				<a class="addPR btn btn-primary btn-xs" onclick="addPo('<?php echo base_url(); ?>','<?php echo $po_id ?>','<?php echo $supplier ?>')" data-id="">
								  Add PO
								</a>
								<a class="addPR btn btn-warning btn-xs" data-toggle="modal" href="#add-pr" data-id="" data-target="#add-pr">
								  Add PR
								</a>
							</div>
		    			</td>
		    		</tr>	
		    		<!-- LOOp Here -->  	
		    		<tr>
		    			<td class="f13" colspan="20" align="center" style="padding: 10px!important">
		    				<table  class="table-borddered" width="100%" style="border:1px solid #000;">
		    					<tr>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    		</tr>
		    					<tr>
					    			<td colspan="" class="all-border" align="center"><b>#</b></td>
					    			<td colspan="" class="all-border" align="center"><b>Qty</b></td>
					    			<td colspan="" class="all-border" align="center"><b>Unit</b></td>
					    			<td colspan="12" class="all-border" align="center"><b>Description</b></td>
					    			<td colspan="2" class="all-border" align="center"><b>Unit Price</b></td>
					    			<td colspan="3" class="all-border" align="center"></td>
					    		</tr>	
					    		<tr>
					    			<td colspan="" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="12" class="bor-right" align="left"><b>asd</b></td>
					    			<td colspan="2" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="3" class="bor-right" align="right"><b>asd</b></td>
					    		</tr> 
					    		<tr>
					    			<td colspan="" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="12" class="bor-right" align="left"><b>asd</b></td>
					    			<td colspan="2" class="bor-right" align="center"><b>asd</b></td>
					    			<td colspan="3" class="bor-right" align="right"><b>asd</b></td>
					    		</tr> 

					    		<tr>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b><br></b></td>
					    			<td colspan="12" class="bor-right" align="left"><b></b></td>
					    			<td colspan="2" class="bor-right" align="center"><b></b></td>
					    			<td colspan="3" class="bor-right" align="right"><b></b></td>
					    		</tr> 
					    		<tr>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="12" class="bor-right" align="left">
					    				<b>
					    					<p class="f12 nomarg">Purpose:</p>
					    					<p class="f12 nomarg">End Use:</p>
					    					<p class="f12 nomarg">PR No:</p>
					    					<p class="f12 nomarg">Requestor:</p>
						    			</b>
						    		</td>
					    			<td colspan="2" class="bor-right" align="center"><b></b></td>
					    			<td colspan="3" class="bor-right" align="right"><b></b></td>
					    		</tr> 

					    		<tr>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b><br></b></td>
					    			<td colspan="12" class="bor-right" align="left"><b></b></td>
					    			<td colspan="2" class="bor-right" align="center"><b></b></td>
					    			<td colspan="3" class="bor-right" align="right"><b></b></td>
					    		</tr> 
					    		<tr>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="" class="bor-right" align="center"><b></b></td>
					    			<td colspan="12" class="bor-right" align="left">
					    				<b>
					    					<p class="f12 nomarg">Purpose:</p>
					    					<p class="f12 nomarg">End Use:</p>
					    					<p class="f12 nomarg">PR No:</p>
					    					<p class="f12 nomarg">Requestor:</p>
						    			</b>
						    		</td>
					    			<td colspan="2" class="bor-right" align="center"><b></b></td>
					    			<td colspan="3" class="bor-right" align="right"><b></b></td>
					    		</tr> 

		    				</table>
			    		</td>
			    	</tr>
			    	<!-- LOOp Here --> 
			    	
			    	<tr>
		    			<td class="f13" colspan="20" align="center" style="padding: 10px!important">
		    				<table  class="table-bodrdered" width="100%" style="border:0px solid #000;">
		    					<tr>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    			<td width="5%"></td>
					    		</tr>
					    		<tr>
					    			<td colspan="17" class="all-border" align="right"><b class="nomarg">GRAND TOTAL</b></td>
					    			<td colspan="3" class="all-border" align="right"><b class="nomarg"><span class="pull-left">₱</span><span id='grandtotal'></span></b></td>
					    		</tr>
		    				</table>
			    		</td>
			    	</tr>
			    	<tr>
		    			<td class="f13" colspan="20" style="padding: 10px!important">
		    				<p class="f12 nomarg">Note:</p>
		    				<p class="f12 nomarg">Item No. 1 is a repeat Order of PO No. 20819-8937</p>
		    				<p class="f12 nomarg">Item No. 1 is a repeat Order of PO No. 20819-8937</p>
		    				<p class="f12 nomarg">Item No. 1 is a repeat Order of PO No. 20819-8937</p>
		    				<p class="f12 nomarg">Item No. 1 is a repeat Order of PO No. 20819-8937</p>
		    				<p class="f12 nomarg">Item No. 1 is a repeat Order of PO No. 20819-8937</p>
		    				<p class="f12 nomarg">Item No. 1 is a repeat Order of PO No. 20819-8937</p>
			    		</td>
			    	</tr>
		    		<tr>
		    			<td colspan="20" style="padding: 10px!important">
		    				Terms & Conditions:<br>
		    				1. Price is inclusive of taxes.<br>
		    				2. PO No. must appear on all copies of Invoices, Delivery Receipt & Correspondences submitted.<br>
		    				3. Sub-standard items shall be returned to supplier @ no cost to CENPRI.<br>
		    				4. Payment term: COD<br>
		    				5. Delivery Term: Exstock of Supplier.
		    			</td>
		    		</tr>
		    		<tr><td colspan="20"><br></td></tr>
		    		<tr>
		    			<td colspan="2"></td>
		    			<td colspan="7"><b>Prepared by:</b></td>
		    			<td colspan="2"></td>
		    			<td colspan="7"><b>Approved by:</b></td>
		    			<td colspan="2"></td>
		    		</tr>
		    		<tr>
		    			<td colspan="2"></td>
		    			<td colspan="7" class="bor-btm"><b><br></b></td>
		    			<td colspan="2"></td>
		    			<td colspan="7" class="bor-btm"><b><br></b></td>
		    			<td colspan="2"></td>
		    		</tr>
		    		<tr>
		    			<td colspan="2"></td>
		    			<td colspan="7"><b></b></td>
		    			<td colspan="2"></td>
		    			<td colspan="7"><b>
		    			<select name='approved' class="select-des emphasis" style="width: 100%">
			    			<option value=''>-Select Employee-</option>
			    				<option value=''></option>
		    			</select></b></td>
		    			<td colspan="2"></td>
		    		</tr>
		    		<tr><td colspan="20"><br></td></tr>
		    		<tr>
		    			<td colspan="4"></td>
		    			<td colspan="2"><b>Conforme:</b></td>
		    			<td colspan="8" class="bor-btm"><b></b></td>
		    			<td colspan="6"></td>
		    		</tr>
		    		<tr>
		    			<td colspan="4"></td>
		    			<td colspan="2"><b></b></td>
		    			<td colspan="8" align="center"><b>Supplier's Signature Over Printed Name</b></td>
		    			<td colspan="6"></td>
		    		</tr>
		    		<tr><td colspan="20"><br></td></tr>
		    		<tr><td colspan="20"><br></td></tr>
		    	</table>	    
	    	</div>
    	</form>
    </div>
    <script type="text/javascript">
    	function printPage() {
		  window.print();
		}
    </script>