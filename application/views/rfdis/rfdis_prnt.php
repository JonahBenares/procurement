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
	    <script src="<?php echo base_url(); ?>assets/js/rfdis.js"></script> 
	</head>

  	<style type="text/css">
        html, body{
            background: #2d2c2c!important;
            font-size:12px!important;
        }
        .pad{
        	padding:0px 250px 0px 250px
        }
        .cancel{
        	background-image: url('../../assets/img/cancel.png')!important;
        	background-repeat:no-repeat!important;
        	background-size: contain!important;
        	background-position: center center!important;
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
		.bor-btm{
			border-bottom: 1px solid #000;
		}
		.bor-top{
			border-top: 1px solid #000;
		}
		.bor-right{
			border-right: 1px solid #000;
		}
		.sel-des{
			border: 0px!important;
		}
		@media print{
			html, body{
	            background: #fff!important;
	            font-size:12px!important;
	        }
			.pad{
        	padding:0px 0px 0px 0px
        	}
			#prnt_btn{
				display: none;
			}
			.emphasis{
				border: 0px solid #fff!important;
			}
			.text-red{
				color: red!important;
			}
			#hide,#hidde{
				display: none;
			}
			.bor-right{
				border-right: 1px solid #000;
			}
			.cancel{
	        	background-image: url('../assets/img/cancel.png')!important;
	        	background-repeat:no-repeat!important;
	        	background-size: contain!important;
	        	background-position: center center!important;
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
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add 
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</h5>					
				</div>
				<div class="modal-body">
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-block">Save changes</button>
				</div>
			</div>
		</div>
	</div>
    <div  class="pad">
    	<form method='POST' action='<?php echo base_url(); ?>'>  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="javascript:history.go(-1)" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-100 p-r-100"><span class="fa fa-print"></span> Print</a>
					</div>
					<p class="text-white">Instructions: When printing DELIVERY RECEIPT make sure the following options are set correctly -- <u>Browser</u>: Chrome, <u>Layout</u>: Portrait, <u>Paper Size</u>: A4 <u>Margin</u> : Default <u>Scale</u>: 100 and the option: Background graphics is checked</p>
				</center>
			</div>
	    	<div style="background: #fff;" >    		  			
		    	<table class="table-borddered" width="100%" style="border:1px solid #000">
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
		    			<td colspan="15"><h4 style="margin-left: 30px"><b>CENTRAL NEGROS POWER RELIABILITY, INC.</b></h4></td>
		    		</tr>
		    		<tr><td colspan="20" align="center"><h5><b>REQUEST FOR DISBURSEMENT</b></h5></td></tr>
		    		<!-- <tr><td class="f13" colspan="20" align="center"><br></td></tr> -->
		    		<tr>
		    			<td colspan="3"><b class="nomarg">Company:</b></td>
		    			<td colspan="9" class="bor-btm">
		    				<b class='nomarg'></b>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><b class="nomarg">Pay To:</b></td>
		    			<td colspan="9" class="bor-btm"><b class="nomarg"></b></td>
		    			<td colspan="3" align="right"><b class="nomarg">Date:</b></td>
		    			<td colspan="5" class="bor-btm"><b class='nomarg'></b></b></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><b class="nomarg">Check Name:</b></td>
		    			<td colspan="9" class="bor-btm"><b class='nomarg'></b></td>
		    			<td colspan="3" align="right"><b class="nomarg">Due Date:</b></td>
		    			<td colspan="5" class="bor-btm"><b class='nomarg'></b></td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td class="bor-btm" align="center"><span class='fa fa-check'></span></td>
		    			<td><b class="nomarg">Cash</b></td>
		    			<td class="bor-btm" align="center"><span class='fa fa-check'></span></td>
		    			<td><b class="nomarg">Check</b></td>
		    			<td></td>
		    			<td colspan="2"><b class="nomarg">Bank / no.</b></td>
		    			<td colspan="4" class="bor-btm"><b class='nomarg'></b></td>
		    			<td colspan="3" align="right"><b class="nomarg">Check Due:</b></td>
		    			<td colspan="5" class="bor-btm"><b class='nomarg'></b></td>
		    		</tr>
		    		<tr>
		    			<td colspan="20"><br></td>
		    		</tr>
		    		<tr>
		    			<td class="all-border" align="center" colspan="17"><b class="nomarg">Explanation</b></td>
		    			<td class="all-border" align="center" colspan="3"><b class="nomarg">Remarks</b></td>
		    		</tr>
		    		<tr>
		    			<td align="center" colspan="17" class="bor-right"><br></td>
		    			<td align="center" colspan="3"><br></td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">Payment for: 
		    				<a class="btn btn-xs btn-primary" id="hidde" onclick="additemrfd('<?php echo base_url(); ?>')" >Add Item/s</a>
		    				</b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">		    				
		    				<b class="nomarg">10 , Cutting Disc 4", @Php 34.00 per	</b>
		    			</td>
		    			<td align="right" colspan="3">
		    				<span class="pull-left nomarg">₱</span>
		    				<span class="nomarg" id=''><b>340.00</b></span>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">		    				
		    				<b class="nomarg">10 , Cutting Disc 4", @Php 34.00 per	</b>
		    			</td>
		    			<td align="right" colspan="3">
		    				<span class="pull-left nomarg">₱</span>
		    				<span class="nomarg" id=''><b>340.00</b></span>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">		    				
		    				<b class="nomarg">10 , Cutting Disc 4", @Php 34.00 per	</b>
		    			</td>
		    			<td align="right" colspan="3">
		    				<span class="pull-left nomarg">₱</span>
		    				<span class="nomarg" id=''><b>340.00</b></span>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td align="right" colspan="17" class="bor-right"><b class="nomarg">Less: 1% EWT</b></td>
		    			<td align="right" colspan="3">
		    				<span class="pull-left nomarg">₱ </span>
		    				<span class="nomarg" id=''><b style="font-weight: 900"></b></span>
		    			</td>
		    		</tr>
		    		<tr id="hide">
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">
		    					<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-xs btn-primary" onclick="" >Add Purpose/ EndUse/ Requestor</button>
		    				</b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>		    		
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">Purpose: </b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">End Use: </b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">Requestor: </b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td align="center" colspan="17" class="bor-right"><br></td>
		    			<td align="center" colspan="3"><br></td>
		    		</tr>
		    		
		    		<tr>
		    			<td align="left" colspan="7" ><b class="nomarg"></b></td>
		    			<td align="right" colspan="10" class="bor-right"><b class="nomarg" style="font-weight: 900">Total Amount Due</b></td>
		    			<td align="right" colspan="3" style="border-bottom: 2px solid #000">
		    				<span class="pull-left nomarg">₱</span>
		    				<span class="nomarg" id=''><b style="font-weight: 900"></b></span>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td align="center" colspan="17" class="bor-right bor-btm"><br></td>
		    			<td align="center" colspan="3" class="bor-btm"><br></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>
		    		<tr>
		    			<td colspan="5"><b class="nomarg">Prepared by:</b></td>
		    			<td colspan="5"><b>Checked by:</b></td>
		    			<td colspan="5"><b>Endorsed by:</b></td>
		    			<td colspan="5"><b>Approved by:</b></td>
		    		</tr>	
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr>
		    			<td colspan="5"><b class="nomarg"></b></td>
		    			<td colspan="5"><b></b></td>
		    			<td colspan="5"><b></b></td>
		    			<td colspan="5"><b></b></td>
		    		</tr>	    		
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>		
		    	</table>		    
	    	</div>
	    	<input type='hidden' name='po_id' value=''>
    	</form>
    </div>
    <script type="text/javascript">
    	function printPage() {
		  window.print();
		}
    </script>