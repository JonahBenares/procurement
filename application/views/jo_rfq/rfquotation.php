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
        .table-bordered>thead>tr>th
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
			#prnt_btn, #printnotes{
				display: none;
			}
			.emphasis{
				border: 0px solid #fff!important;
			}
			html, body{
	            background: #fff!important;
	            font-size:12px!important;
	        }
	        .cancel{
	        	background-image: url('../../assets/img/cancel.png')!important;
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
    </style>
    
    <div  class="pad">
    	<form method='POST' action='<?php echo base_url(); ?>rfq/save_rfq'>  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="" onclick="return quitBox('quit');" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
							<a  href='<?php echo base_url(); ?>rfq/override_rfq/<?php echo $rfq_id; ?>' onclick="return confirm('Are you sure you want to override RFQ?')" class="btn btn-info btn-md p-l-25 p-r-25"><span class="fa fa-pencil"></span> Override <u><b>RFQ</b></u></a>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-50 p-r-50"><span class="fa fa-print"></span> Print</a>
						<input type='submit' class="btn btn-primary btn-md p-l-100 p-r-100" value="Save">  	
					</div>
					<h4 class="text-white"><b>OUTGOING</b> RFQ <b>For JOB ORDER</b></h4>
					<p class="text-white">Instructions: When printing REQUEST FOR QUOTATION make sure the following options are set correctly -- <u>Browser</u>: Chrome, <u>Layout</u>: Portrait, <u>Paper Size</u>: A4, <u>Margin</u> : Default, <u>Scale</u>: 100</p>
				</center>
			</div>
	    	<div style="background: #fff;">    		  			
		    	<table class="table-borsdered" width="100%" style="border:2px solid #000">
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
		    		<tr><td colspan="20" align="center"><h4><b>REQUEST FOR QUOTATION</b></h4></td></tr>
		    		<tr>
		    			<td class="f13" colspan="3">Date Prepared:</td>
		    			<td class="f13 bor-btm" colspan="8"></td>
		    			<td class="f13" colspan="1"></td>
		    			<td class="f13" colspan="3">CENJO JO No.:</td>
		    			<td class="f13 bor-btm" colspan="5"><b>CENJO EM046-19</b></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"></td></tr>
		    		<tr>
		    			<td class="f13" colspan="3">Date Needed:</td>
		    			<td class="f13 bor-btm" colspan="8"></td>
		    			<td class="f13" colspan="1"></td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="6"></td>
		    		</tr>		    		
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	    		
		    		<tr>
		    			<td class="f13" colspan="20" align="center" style="border:2px solid #000">
			    			<h5 style="margin: 5px"><b>SERVICING AND REPAIR OF HYDRAULIC JACK</b></h5>
			    		</td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><i><small>PROJECT TITLE/DESCRIPTION</small></i></td></tr>		    		
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>		    		
		    		<tr>
		    			<td colspan="20">
		    				<table class="table-borddered" width="100%">
		    					<tr>
		    						<td width="65%" class="f13 p-l-5" align="left"><b>Scope of Work:</b></td>
		    						<td width="5%" class="f13" align="center"><b>Qty</b></td>
		    						<td width="10%" class="f13" align="center"><b>UM</b></td>
		    						<td width="20%" class="f13" align="center"><b>Unit Cost</b></td>
		    					</tr>
		    					<tr>
		    						<td class="f13 p-l-5" align="left">Check up, repair and replacement of damage parts of Hydraulic Jack, 10 tons</td>
		    						<td class="f13" align="center">99999</td>
		    						<td class="f13" align="center">kilo</td>
		    						<td class="f13 emphasis" align="center"><input type="text" name="" ></td>
		    					</tr>
		    					<tr>
		    						<td class="f13 p-l-5" align="left">
		    							Brand: Enerpac<br>
		    							Model: R0106<br>
		    							SN: E4816K
		    						</td>
		    						<td class="f13" align="center"></td>
		    						<td class="f13" align="center"></td>
		    						<td class="f13" align="center"></td>
		    					</tr>
		    				</table>
		    			</td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr>
		    			<td class="f13" colspan="20" align="center" style="border:1px solid #000">
			    			<h5 style="margin: 5px"><b>Contractors Offer:</b></h5>
			    		</td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>    	
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">Company Name:</td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">Company Address:</td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">TIN:</td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">Telephone No:</td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr><td class="f13 p-l-5 p-t-10 p-b-10" colspan="20" align="left">Note: Kindly indicate Term of payment, duration of work and warranty</td></tr>
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">Terms of Payment:</td>
		    			<td class="f13 emphasis" colspan="7"><input type="text" name="" class="btn-block"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">Work Duration:</td>
		    			<td class="f13 emphasis" colspan="7"><input type="text" name="" class="btn-block"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">Warranty:</td>
		    			<td class="f13 emphasis" colspan="7"><input type="text" name="" class="btn-block"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr>
		    			<td class="f13 p-l-5" colspan="3">Conforme:</td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13" colspan="7" align="center">Supplier's Signature Over Printed Name</td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>    	
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>  
		    		<tr>
		    			<td class="f13 p-l-5" colspan="7">Requested by:</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr> 
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr> 
		    		<tr>
		    			<td class="f13" colspan="7" style="border-bottom: 1px solid #000"></td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td class="f13 p-l-5" colspan="7"><b>Imelda P. Espera</b></td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td class="f13 p-l-5" colspan="7">Purchasing Department</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td class="f13 p-l-5" colspan="7">Tel. No. 435-1932/0918-6760758</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>    	
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>    	
		    	</table>		    
	    	</div>
    	</form>
    </div>
    <script type="text/javascript">
    	function printPage() {
		  window.print();
		}
		function quitBox(cmd)
		{   
		    if (cmd=='quit')
		    {
		    	self.opener.location.reload();
		        open(location, '_self').close();

		    }   
		    return false;   
		}
    </script>