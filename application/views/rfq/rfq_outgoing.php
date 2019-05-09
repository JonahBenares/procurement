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
			#prnt_btn{
				display: none;
			}
			.emphasis{
				border: 0px solid #fff!important;
			}
			html, body{
	            background: #fff!important;
	            font-size:12px!important;
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
    <?php 
  
    foreach($head AS $h){
    	$date=$h['rfq_date'];
    	$supplier=$h['supplier'];
    	$rfq_no=$h['rfq_no'];
    	$phone=$h['phone'];
    	$saved=$h['saved'];
  ?>
    	<form method='POST' action='<?php echo base_url(); ?>rfq/save_rfq'>  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="" onclick="return quitBox('quit');" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
						<?php if($saved==1){ ?>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-100 p-r-100"><span class="fa fa-print"></span> Print</a>
						<?php }  if($saved==0){?>
						<input type='submit' class="btn btn-primary btn-md p-l-100 p-r-100" value="Save">  		
						<?php } ?>		
					</div>
					<h4 class="text-white"><b>OUTGOING</b> RFQ</h4>
					<p class="text-white">Instructions: When printing REQUEST FOR QUOTATION make sure the following options are set correctly -- <u>Browser</u>: Chrome, <u>Layout</u>: Portrait, <u>Paper Size</u>: A4, <u>Margin</u> : Default, <u>Scale</u>: 100</p>
				</center>
			</div>
	    	<div style="background: #fff;">    		  			
		    	<table class="table-boSrdered" width="100%" style="border:2px solid #000">
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
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>
		    		<tr><td colspan="20" align="center"><b>REQUEST FOR QUOTATION</b></td></tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>
		    		<tr>
		    			<td class="f13" colspan="2">Date:</td>
		    			<td class="f13 bor-btm" colspan="8"><?php echo date('F j, Y', strtotime($date)); ?></td>
		    			<td class="f13" colspan="1"></td>
		    			<td class="f13" colspan="3">RFQ No.:</td>
		    			<td class="f13 bor-btm" colspan="6"><?php echo $rfq_no; ?></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"></td></tr>
		    		<tr>
		    			<td class="f13" colspan="2">Supplier:</td>
		    			<td class="f13 bor-btm" colspan="8"><?php echo $supplier; ?></td>
		    			<td class="f13" colspan="1"></td>
		    			<td class="f13" colspan="3">Tel. No.:</td>
		    			<td class="f13 bor-btm" colspan="6"><?php echo $phone; ?></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"></td></tr>	    		
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	    		
		    		<tr>
		    <?php } ?>
		    			<td colspan="20">
		    				<table class="table-bordered" width="100%">
		    					<tr>
		    						<td class="f13" align="center" width="5%"><b>Qty</b></td>
		    						<td class="f13" align="center"><b>Unit</b></td>
		    						<td class="f13" align="center"><b>Item Description</b></td>
		    						<td class="f13" align="center"><b>Brand/Offer</b></td>
		    						<td class="f13" align="center"><b>Unit Price</b></td>
		    					</tr>
		    				<?php foreach($detail AS $item){ ?>
		    					<tr>
		    						<td class="f13" align="center">1</td>
		    						<td class="f13" align="center"><?php echo $item['unit']; ?></td>
		    						<td class="f13" align="left" style='width:50%;padding-left: 2px'><?php echo $item['item']; ?></td>
		    						<td class="f13" align="center"></td>
		    						<td class="f13" align="center"></td>
		    					</tr>
		    				<?php } ?>
		    				</table>
		    			</td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	    		
 			<?php foreach($head AS $h){ ?>
		    		<tr>
		    			
		    			
		    			<td class="f13" colspan="20">1. Quotation must be submitted on or before
		    			<?php if($h['saved']==0){ ?>
		    			 <input class="emphasis" type="date" name="due_date" >
		    			 <?php } else { 
		    			 	echo date('F j, Y', strtotime($h['due_date']));
		    			  } ?>
		    			 </td></tr>	    	
		    		<tr><td class="f13" colspan="20">2. Please Fill - Up :</td></tr>	    	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">- a. Price Validity</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">- b. Payment Terms</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">- c. Date of Delivery</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">&nbsp; d. Item's Warranty</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">&nbsp; e. Company's TIN Number</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">&nbsp; d. Item's Warranty</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7"></td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="18">&nbsp; f. Vat <input type="checkbox" name=""> ||  non-Vat <input type="checkbox" name=""></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">Prepared by:</td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">Noted by:</td>
		    			<td class="f13" colspan="2">

		    			</td>
		    			<td class="f13" colspan="4">Approved by:</td>
		    			<td class="f13" colspan="2"></td>
		    		</tr>	  
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13 bor-btm" colspan="4"><br></td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13 bor-btm" colspan="4"><br></td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13 bor-btm" colspan="4"><br></td>
		    			<td class="f13" colspan="2"></td>
		    		</tr>  	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">
		    			<center><?php echo $_SESSION['fullname']; ?></center>
		    			</td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">
		    			<?php if($h['saved']==0){ ?>
		    			<select name='noted' class="select-des emphasis">
			    			<option value=''>-Select Employee-</option>
			    			<?php foreach($employee AS $emp){ ?>
			    				<option value='<?php echo $emp->employee_id; ?>'><?php echo $emp->employee_name; ?></option>
			    			<?php } ?>
		    			</select>
		    			<?php } else { 
		    				echo "<center>".$h['noted']."</center>";
		    			} ?>
		    			</td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">
		    			<?php if($h['saved']==0){ ?>
		    				<select name='approved' class="select-des emphasis">
			    			<option value=''>-Select Employee-</option>
			    			<?php foreach($employee AS $emp){ ?>
			    				<option value='<?php echo $emp->employee_id; ?>'><?php echo $emp->employee_name; ?></option>
			    			<?php } ?>
		    			</select>
		    			<?php } else { 
		    				echo "<center>".$h['approved']."</center>";
		    			} ?>
		    			</td>
		    			<td class="f13" colspan="2"></td>
		    		</tr>  	
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="2">
		    				Conforme:
		    			</td>
		    			<td class="f13 bor-btm" colspan="8"></td>
		    			<td class="f13" colspan="4"></td>
		    			<td class="f13" colspan="4">
		    			</td>
		    		</tr>  
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="7" align="center">Supplier's Signature Over Printed Name</td>
		    			<td class="f13" colspan="5"></td>
		    			<td class="f13" colspan="4">
		    			</td>
		    		</tr> 
		    		<?php } ?>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>		
		    	</table>		    
	    	</div>
	    	<input type='hidden' name='rfq_id' value='<?php echo $rfq_id; ?>'>
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