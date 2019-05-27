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
        @media print{
        	.pad{
        	padding:0px 0px 0px 0px
        	}
        }
        .served{
        	background-image: url('../../../assets/img/served.png')!important;
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
		.f10{
			font-size:10px!important;
		}
		.bor-btm{
			border-bottom: 1px solid #000;
		}
		.sel-des{
			border: 0px!important;
			width: 100%;
		}
		@media print{
			#prnt_btn, .reco{
				display: none;
			}
			html, body{
	            background: #fff!important;
	            font-size:12px!important;
	        }
			.served{
	        	background-image: url('../../../assets/img/served.png')!important;
	        	background-repeat:no-repeat!important;
	        	background-size: contain!important;
	        	background-position: center center!important;
	        }
		}
		.text-white{
			color: #fff;
		}
		.emphasis{
			/*border-bottom: 1px solid red!important;*/
			background-color: #ffe5e5!important;
		}
    </style>
    <div  class="pad">
    	<form method='POST' action="<?php echo base_url(); ?>rfq/complete_rfq">  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="" onclick="return quitBox('quit');" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
						<?php if($completed==1){ ?>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-100 p-r-100"><span class="fa fa-print"></span> Print</a>
						<?php } if($completed==0){ ?>
						<input type='submit' class="btn btn-primary btn-md p-l-100 p-r-100" value="Save"> 	
						<?php } ?>	
					</div>
					<h4 class="text-white"> <b>INCOMING</b> RFQ</h4>
					<p class="text-white">Instructions: When printing REQUEST FOR QUOTATION make sure the following options are set correctly -- <u>Browser</u>: Chrome, <u>Layout</u>: Portrait, <u>Paper Size</u>: A4, <u>Margin</u> : Default, <u>Scale</u>: 100</p>
				</center>
			</div>
	    	<div style="background: #fff;" <?php echo (($served == 1) ? 'class="served"' : ''); ?>>    		  			
		    	<table class="table-bodrdered" width="100%" style="border:2px solid #000">
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
		    		<?php foreach($head AS $h){ ?>
		    		<tr>
		    			<td class="f13" colspan="2">Date:</td>
		    			<td class="f13 bor-btm" colspan="8"><?php echo date('F j, Y', strtotime($h['rfq_date'])); ?></td>
		    			<td class="f13" colspan="1"></td>
		    			<td class="f13" colspan="3">RFQ No.:</td>
		    			<td class="f13 bor-btm" colspan="6"><?php echo $h['rfq_no']; ?></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"></td></tr>
		    		<tr>
		    			<td class="f13" colspan="2">Supplier:</td>
		    			<td class="f13 bor-btm" colspan="8"><?php echo $h['supplier']; ?></td>
		    			<td class="f13" colspan="1"></td>
		    			<td class="f13" colspan="3">Tel. No.:</td>
		    			<td class="f13 bor-btm" colspan="6"><?php echo $h['phone']; ?></td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"></td></tr>	    		
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	  
		    	<?php } ?>  		
		    		<tr>
		    			<td colspan="20">
		    				<table class="table-bordered" width="100%">
		    					<tr>
		    						<td class="f13" align="center" width="5%"><b>Qty</b></td>
		    						<td class="f13" align="center"><b>Unit</b></td>
		    						<td class="f13" align="center"><b>Item Description</b></td>
		    						<td class="f13" align="center"><b>Brand/Offer</b></td>
		    						<td class="f13" align="center" width="20%"><b>Unit Price</b></td>
		    						<!-- <td class="f13 reco" align="center" width="5%"><b>Reco</b></td> -->
		    					</tr>
		    					<?php
		    					$x=1; 
		    				 if($completed==0){ 
		    					foreach($detail AS $item){ ?>
		    					<tr>
		    						<td class="f13" align="center" rowspan='3'><?php echo $x; ?></td>
		    						<td class="f13" align="center" rowspan='3'><?php echo $item['unit']; ?></td>
		    						<td class="f13" align="center" rowspan='3' style='width:35%'><?php echo $item['item']; ?></td>
		    						<td class="f13" align="center">		    						
		    							<input type="text" name="offer<?php echo $x; ?>_1" class="sel-des emphasis" autocomplete="off" >		    					
		    						</td>
		    						<td class="f13" align="center">		    					
		    							<input type="text" name="price<?php echo $x; ?>_1" class="sel-des emphasis" autocomplete="off"  onkeypress="return isNumberKey(this, event)">		    							
		    						</td>		    					
		    					</tr>
		    					<tr>		    					
		    						<td class="f13" align="center">
		    						<?php if($completed==0){ ?>
		    							<input type="text" name="offer<?php echo $x; ?>_2" class="sel-des emphasis" autocomplete="off" >
		    						<?php } else {
		    							echo $item['offer'];
		    						} ?>
		    						</td>
		    						<td class="f13" align="center">		    						
		    							<input type="text" name="price<?php echo $x; ?>_2" class="sel-des emphasis" autocomplete="off"  onkeypress="return isNumberKey(this, event)">		    						
		    						</td>		    					
		    					</tr>
		    					<tr>
		    						<td class="f13" align="center">
		    						<?php if($completed==0){ ?>
		    							<input type="text" name="offer<?php echo $x; ?>_3" class="sel-des emphasis" autocomplete="off" >
		    						<?php } else {
		    							echo $item['offer'];
		    						} ?>
		    						</td>
		    						<td class="f13" align="center">
		    						
		    							<input type="text" name="price<?php echo $x; ?>_3" class="sel-des emphasis" autocomplete="off"  onkeypress="return isNumberKey(this, event)">
		    							
		    						</td>
		    					
		    					</tr>
		    					<input type='hidden' name='detail_id<?php echo $x; ?>' value='<?php echo $item['detail_id']; ?>'>
		    				<?php
		    				$x++;
		    				 } 
		    				} else { 
		    					$a=1;
		    					$c=1;
		    					$b=1;
		    					foreach($complete AS $com){ 

		    						//echo $a . " == " . $c . "<br>";
		    						if($a==$c) { ?>
		    						<tr>
		    						<td class="f13" align="center" style='width:5%' rowspan="<?php echo $com['row']; ?>"><?php echo $b; ?></td>
		    						<td class="f13" align="center" style='width:5%'  rowspan="<?php echo $com['row']; ?>" ><?php echo $com['unit']; ?></td>
		    						<td class="f13" style='width:40%' rowspan="<?php echo $com['row']; ?>"><?php echo $com['item']; ?></td>
		    						<td class='f13' style='width:40%'><?php echo $com['offer']; ?></td>
		    						<td class='f13' style='width:10%; text-align: center'><?php echo number_format($com['price'],2); ?></td>
		    						</tr>
		    						<?php $b++;	$c=$c+$com['row'];  } else { ?>
		    							<tr>
		    								<td class='f13' style='width:40%'><?php echo $com['offer']; ?></td>
		    								<td class='f13' style='width:10%; text-align: center'><?php echo number_format($com['price'],2); ?></td>
		    							</tr>

		    						<?php } 
		    						
		    						
		    							?>
		    						 
		    						
		    				<?php	
		    				$a++;  } 
		    				 } ?>
		    				<input type='hidden' name='count' value='<?php echo $x; ?>'>
		    				</table>
		    			</td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	    		
		    		<?php foreach($head AS $h){ ?>
		    		<tr><td class="f13" colspan="20">1. Quotation must be submitted on or before <?php echo date('F j, Y', strtotime($h['due_date'])); ?></td></tr>	    
		    		<?php } ?>	
		    		<tr><td class="f13" colspan="20">2. Please Fill - Up :</td></tr>	    	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">- a. Price Validity</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7">
		    			<?php if($completed==0){ ?>
		    				<input type="text" name="validity" class="sel-des emphasis" autocomplete="off">
		    			<?php } else {
		    				echo $h['validity'];
		    			} ?>
		    			</td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">- b. Payment Terms</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7">
		    			<?php if($completed==0){ ?>
		    				<input type="text" name="terms" class="sel-des emphasis" autocomplete="off">
		    			<?php } else {
		    				echo $h['terms'];
		    			} ?>
		    			</td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">- c. Date of Delivery</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7">
		    			<?php if($completed==0){ ?>
		    				<input type="date" name="delivery_date" class="sel-des emphasis" autocomplete="off">
		    			<?php } else {
		    				echo (!empty($h['delivery_date']) ? date('F j, Y', strtotime($h['delivery_date'])) : '');
		    			} ?></td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">&nbsp; d. Item's Warranty</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7">
		    			<?php if($completed==0){ ?>
		    				<input type="text" name="warranty" class="sel-des emphasis" autocomplete="off">
		    			<?php } else {
		    				echo $h['warranty'];
		    			} ?>
		    			</td>
		    			<td class="f13" colspan="3"></td>

		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="5">&nbsp; e. Company's TIN Number</td>
		    			<td class="f13" colspan="3"></td>
		    			<td class="f13 bor-btm" colspan="7">
		    			<?php if($completed==0){ ?>
		    				<input type="text" name="tin" class="sel-des emphasis">
		    			<?php } else {
		    				echo $h['tin'];
		    			} ?>
		    			</td>
		    			<td class="f13" colspan="3"></td>
		    		</tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="18">&nbsp; f. Vat 
		    			<?php if($completed==0){ ?>
		    				<input type="checkbox" name="vat" value='1' class='emphasis' > 
		    			<?php } else { 
		    				if($h['vat']==1){
								echo "<span class='fa fa-check'></span>";
							}
		    			} ?>
		    				</td>
		    		</tr>
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">Prepared by:</td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">Noted by:</td>
		    			<td class="f13" colspan="2"></td>
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
		    		<?php foreach($head AS $h){ ?>
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">
		    				<center><?php echo $h['prepared']; ?></center>
		    			</td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">
		    				<center><?php echo $h['noted']; ?></center>
		    			</td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="4">
		    				<center><?php echo $h['approved']; ?></center>
		    			</td>
		    			<td class="f13" colspan="2"></td>
		    		</tr>  	
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>	
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="2">
		    				Conforme:
		    			</td>
		    			<td class="f13 bor-btm" colspan="6"></td>
		    			<td class="f13" colspan="6"></td>
		    			<td class="f13" colspan="4">
		    			</td>
		    		</tr>  
		    		<?php  } ?>
		    		<tr>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="2"></td>
		    			<td class="f13" colspan="7" align="center">Supplier's Signature Over Printed Name</td>
		    			<td class="f13" colspan="5"></td>
		    			<td class="f13" colspan="4">
		    			</td>
		    		</tr> 
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>		
		    	</table>		    
	    	</div>
	    	<input type='hidden' name='rfq_id' value="<?php echo $rfq_id; ?>">
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