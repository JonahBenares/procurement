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
	</head>

  	<style type="text/css">
        html, body{
            background: #2d2c2c!important;
            font-size:12px!important;
        }
        .pad{
        	padding:0px 250px 0px 250px
        }
        @media print{
        	.pad{
        	padding:0px 0px 0px 0px
        	}
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
		.sel-des{
			border: 0px!important;
		}
		@media print{
			#prnt_btn{
				display: none;
			}
			.emphasis{
				border: 0px solid #fff!important;
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
    
    <div  class="pad">

    	<form method='POST' action=''>  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="javascript:history.go(-1)" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-100 p-r-100"><span class="fa fa-print"></span> Print</a>
						<input type='submit' class="btn btn-primary btn-md p-l-100 p-r-100" value="Save">	
					</div>
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
		    		<tr>
		    			<td colspan="3"><h5 class="nomarg"><b>Date</b></h5></td>
		    			<td colspan="13"><h5 class="nomarg"><b>April 26, 2019</b></h5></td>
		    			<td colspan="4"><h5 class="nomarg"><b>P.O. No. PR-191-4763</b></h5></td>
		    		</tr>	
		    		<tr>
		    			<td colspan="3"><h5 class="nomarg"><b>Supplier:</b></h5></td>
		    			<td colspan="13"><h5 class="nomarg bor-btm"><b>A-ONE INDUSTRIAL SALES</b></h5></td>
		    			<td colspan="4"><h5 class="nomarg"><b></b></h5></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><h5 class="nomarg"><b>Address:</b></h5></td>
		    			<td colspan="13"><h5 class="nomarg bor-btm"><b>Lopez Jaena St., Libertad, Bacolod</b></h5></td>
		    			<td colspan="4"><h5 class="nomarg"><b></b></h5></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><h5 class="nomarg"><b>Contact Person:</b></h5></td>
		    			<td colspan="13"><h5 class="nomarg bor-btm"><b>Ms. Marge</b></h5></td>
		    			<td colspan="4"><h5 class="nomarg"><b></b></h5></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><h5 class="nomarg"><b>Telephone #:</b></h5></td>
		    			<td colspan="13"><h5 class="nomarg bor-btm"><b>(034) 432-0652 / 4761127</b></h5></td>
		    			<td colspan="4"><h5 class="nomarg"><b></b></h5></td>
		    		</tr>	    		
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>		
		    		<tr>
		    			<td colspan="" class="all-border" align="center"><b>#</b></td>
		    			<td colspan="" class="all-border" align="center"><b>Qty</b></td>
		    			<td colspan="" class="all-border" align="center"><b>Unit</b></td>
		    			<td colspan="12" class="all-border" align="center"><b>Description</b></td>
		    			<td colspan="2" class="all-border" align="center"><b>Unit Price</b></td>
		    			<td colspan="3" class="all-border" align="center"></td>
		    		</tr>
		    		<tr>
		    			<td colspan="" class="all-border" align="center"><b>1</b></td>
		    			<td colspan="" class="all-border" align="center"><b>999</b></td>
		    			<td colspan="" class="all-border" align="center"><b>set</b></td>
		    			<td colspan="12" class="all-border" align="left"><b class="nomarg">Power Tools; Brand:Ken, Model:69135</b></td>
		    			<td colspan="2" class="all-border" align="center"><b>299,790.00</b></td>
		    			<td colspan="3" class="all-border" align="right"><b class="nomarg">299,790.00</b></td>
		    		</tr>
		    		<tr>
		    			<td colspan="" class="all-border" align="center"><b>1</b></td>
		    			<td colspan="" class="all-border" align="center"><b>999</b></td>
		    			<td colspan="" class="all-border" align="center"><b>set</b></td>
		    			<td colspan="12" class="all-border" align="left"><b class="nomarg">Acetylene cutting outfit; Brand:Supercut</b></td>
		    			<td colspan="2" class="all-border" align="center"><b>4,790.00</b></td>
		    			<td colspan="3" class="all-border" align="right"><b class="nomarg">4,790.00</b></td>
		    		</tr>
		    		<tr>
		    			<td colspan="" class="all-border" align="center"><b></b></td>
		    			<td colspan="" class="all-border" align="center"><b></b></td>
		    			<td colspan="" class="all-border" align="center"><b></b></td>
		    			<td colspan="12" class="all-border" align="left">
		    				<b class="nomarg">
		    					<br>
		    					Purpose: Consumables, Tools and Equipment's for Spare Stator Rewinding<br>
		    					Enduse: Spare Ideal Generator<br>
		    					Requestor: Julius Pangilinan / Kennah Sasamoto<br>
		    					PR No: PR-191-2019		    					
		    					
		    				</b>
		    			</td>
		    			<td colspan="2" class="all-border" align="center"><b></b></td>
		    			<td colspan="3" class="all-border" align="right"><b class="nomarg"></b></td>
		    		</tr>
		    		<tr>
		    			<td colspan="17" class="all-border" align="right"><b class="nomarg">TOTAL</b></td>
		    			<td colspan="3" class="all-border" align="right"><b class="nomarg"><span class="pull-left">₱</span>1,999,790.00</b></td>
		    		</tr>
		    		<tr>
		    			<td colspan="20">
		    				<i>Price & Stocks verified as of 04.22.19</i>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td colspan="20" >
		    				<br>Terms & Conditions:<br>
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
		    			<td colspan="7"><b>Someone here</b></td>
		    			<td colspan="2"></td>
		    			<td colspan="7"><b>Someone here</b></td>
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
	    	<input type='hidden' name='rfq_id' value=''>
    	</form>
    </div>
    <script type="text/javascript">
    	function printPage() {
		  window.print();
		}
    </script>