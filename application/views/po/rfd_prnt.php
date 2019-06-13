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
    
    <div  class="pad">
    <?php 
    if($saved==0){
    	$url = 'save_rfd';
    } else if($saved==1 && $revised==1){
    	$url = 'update_rfd';
    } ?>
    	<form method='POST' action='<?php echo base_url(); ?>po/<?php echo $url; ?>'>  
    		<div  id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="javascript:history.go(-1)" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
						<?php

						 if($saved==1 &&  $revised ==0){ ?>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-100 p-r-100"><span class="fa fa-print"></span> Print</a>
						<?php } else if(($saved==1 && $revised ==1) || $saved==0) { ?>
						<input type='submit' class="btn btn-primary btn-md p-l-100 p-r-100" value="Save">	
						<?php } ?>
					</div>
					<p class="text-white">Instructions: When printing DELIVERY RECEIPT make sure the following options are set correctly -- <u>Browser</u>: Chrome, <u>Layout</u>: Portrait, <u>Paper Size</u>: A4 <u>Margin</u> : Default <u>Scale</u>: 100 and the option: Background graphics is checked</p>
				</center>
			</div>
	    	<div style="background: #fff;" <?php echo (($cancelled==1) ? 'class="cancel"' : ''); ?>>    		  			
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
		    			<?php if($saved==0){ ?>
		    			<input type="text" style="width:100%" name="company" autocomplete="off">
		    			<?php } else { 
		    				echo "<b class='nomarg'>" . $company . "</b>";
		    			 } ?></td>
		    			<td colspan="3" align="right"><b class="nomarg">APV No.:</b></td>
		    			<td colspan="5" class="bor-btm">
		    			<?php if($saved==0){ ?>
		    				<input type="text" style="width:100%" name="apv_no" autocomplete="off">
		    			<?php } else { 
		    				echo "<b class='nomarg'>" . $apv_no  . "</b>";
		    			 } ?></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><b class="nomarg">Pay To:</b></td>
		    			<td colspan="9" class="bor-btm"><b class="nomarg">
		    			<?php if($saved==0){ 
		    			 	echo $supplier;
		    			} else { 
		    				echo $pay_to;
		    			 } ?></b></td>
		    			<td colspan="3" align="right"><b class="nomarg">Date:</b></td>
		    			<td colspan="5" class="bor-btm">
		    			<?php if($saved==0){ ?>
		    				<input type="date" style="width:100%" name="rfd_date" >
		    			<?php } else if($saved==1 && $revised==1){ ?>
		    				<input type="date" style="width:100%" name="rfd_date" value="<?php echo $rfd_date; ?>">
		    			 <?php } else if($saved==1 && $revised==0) { 
		    				echo "<b class='nomarg'>" . date('F j, Y', strtotime($rfd_date)). "</b>" ;
		    			 } ?></b></td>
		    		</tr>
		    		<tr>
		    			<td colspan="3"><b class="nomarg">Check Name:</b></td>
		    			<td colspan="9" class="bor-btm">
		    			<?php if($saved==0){ ?>
		    			<input type="text" style="width:100%" name="check_name" value="<?php echo $supplier; ?>" autocomplete="off">
		    			<?php } else { 
		    				echo "<b class='nomarg'>" . $check_name . "</b>";
		    			 } ?></td>
		    			<td colspan="3" align="right"><b class="nomarg">Due Date:</b></td>
		    			<td colspan="5" class="bor-btm">
		    				<?php if($saved==0){ ?>
		    				<input type="date" style="width:100%" name="due_date" >
		    			<?php } else if($saved==1 && $revised==1){ ?>
		    				<input type="date" style="width:100%" name="due_date" value="<?php echo $due_date; ?>">
		    			 <?php } else if($saved==1 && $revised==0) { 
		    				echo "<b class='nomarg'>" . date('F j, Y', strtotime($due_date)) . "</b>";
		    			 } ?></td>
		    		</tr>
		    		<tr>
		    			<td></td>
		    			<td class="bor-btm" align="center">
		    			<?php if($saved==0){ ?>
		    				<input type="radio"  name="cash" value='1'>
		    			<?php } else { 
		    				if($cash==1) echo "<span class='fa fa-check'></span>";
		    			} ?></td>
		    			<td><b class="nomarg">Cash</b></td>
		    			<td class="bor-btm" align="center">
		    			<?php if($saved==0){ ?>
		    			<input type="radio" name="cash" value='2'>
		    			<?php } else { 
		    				if($check==1) echo "<span class='fa fa-check'></span>";
		    			} ?>
		    			</td>
		    			<td><b class="nomarg">Check</b></td>
		    			<td></td>
		    			<td colspan="2"><b class="nomarg">Bank / no.</b></td>
		    			<td colspan="4" class="bor-btm">
		    			<?php if($saved==0){ ?>
		    			<input type="text" style="width:100%" name="bank_no" autocomplete="off">
		    			<?php } else { 
		    				echo "<b class='nomarg'>" . $bank_no  ;
		    			 } ?></td>
		    			<td colspan="3" align="right"><b class="nomarg">Check Due:</b></td>
		    			<td colspan="5" class="bor-btm">
		    				<?php if($saved==0){ ?>
		    				<input type="date" style="width:100%" name="check_due" >
		    			<?php } else if($saved==1 && $revised==1){ ?>
		    				<input type="date" style="width:100%" name="check_due" value="<?php echo $check_date; ?>">
		    			 <?php } else if($saved==1 && $revised==0) { 
		    				echo "<b class='nomarg'>" .  date('F j, Y', strtotime($check_date))  . "</b>";
		    			 } ?></td>
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
		    			<td align="left" colspan="17" class="bor-right"><b class="nomarg">Payment for:</b></td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<?php
		    		$x=0;
		    		if(!empty($items)){
			    		 foreach($items AS $it){ 
			    			$total = $it['price'] * $it['quantity']; 
			    			$gross[]=$total;?>
			    		<tr>
			    			<td align="left" colspan="17" class="bor-right">
			    				<b class="nomarg"><?php echo $it['quantity'] . " " . $it['uom']. ", ". $it['item'] . " " . $it['item_specs'].", @Php " . number_format($it['price'],2) . " per " . $it['uom']; ?></b>
			    			</td>
			    			<td align="right" colspan="3">
			    				<span class="pull-left nomarg">₱</span>
			    				<span class="nomarg" id=''><b><?php echo number_format($total,2); ?></b></span>
			    			</td>
			    		</tr>
			    		<?php $x++;
			    		} 

			    		if($vat==1){
			    			$less_amount = array_sum($gross) / 1.12 * ($ewt/100);
			    		}else {
			    			$less_amount = array_sum($gross) * ($ewt/100);
			    		}

			    		$net = array_sum($gross) - $less_amount;
			    		
		    		}
		    		?>
		    		<input type="hidden" name="pay_to" value="<?php echo $supplier; ?>">
		    		<input type='hidden' name='gross_amount' value="<?php echo array_sum($gross); ?>">
		    		<input type='hidden' name='less_amount' value="<?php echo $less_amount; ?>">
		    		<input type='hidden' name='net_amount' value="<?php echo $net; ?>">
		    		<?php if($x>1){ ?>
		    		<tr>
		    			<td align="right" colspan="17" class="bor-right"><b class="nomarg">Subtotal</b></td>
		    			<td align="right" colspan="3" class=" bor-top">
		    				<span class="pull-left nomarg">₱</span>
		    				<span class="nomarg" id=''><b style="font-weight: 900"><?php echo number_format(array_sum($gross),2); ?></b></span>
		    			</td>
		    		</tr>
		    		<?php } ?>
		    		<tr>
		    			<td align="right" colspan="17" class="bor-right"><b class="nomarg">Less: <?php echo $ewt; ?>% EWT</b></td>
		    			<td align="right" colspan="3">
		    				<span class="pull-left nomarg">₱</span>
		    				<span class="nomarg" id=''><b style="font-weight: 900">(<?php echo number_format($less_amount,2); ?>)</b></span>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td align="right" colspan="17" class="bor-right"><b class="nomarg"><?php if($vat==1) { echo 'Vatable'; }else { echo 'Non-Vatable'; }  ?></b></td>
		    		</tr>
		    		<?php 
		    		if(!empty($detail)){
		    		foreach($detail AS $det){ ?>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">Purpose: <?php echo $det['purpose']; ?></b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">End Use: <?php echo $det['enduse']; ?></b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td align="left" colspan="17" class="bor-right">
		    				<b class="nomarg">Requestor: <?php echo $det['requestor']; ?>; <?php echo $det['pr_no']; ?></b>
		    			</td>
		    			<td align="right" colspan="3"></td>
		    		</tr>
		    		<tr>
		    			<td align="center" colspan="17" class="bor-right"><br></td>
		    			<td align="center" colspan="3"><br></td>
		    		</tr>
		    		<?php } 
		    	    } ?>
		    		
		    		<tr>
		    			<td align="left" colspan="7" ><b class="nomarg">P.O. No: <?php echo $po_no; ?></b></td>
		    			<td align="right" colspan="10" class="bor-right"><b class="nomarg" style="font-weight: 900">Total Amount Due</b></td>
		    			<td align="right" colspan="3" style="border-bottom: 2px solid #000">
		    				<span class="pull-left nomarg">₱</span>
		    				<?php if(!empty($items)){ ?>
		    				<span class="nomarg" id=''><b style="font-weight: 900"><?php echo number_format($net,2); ?></b></span>
		    				<?php } ?>
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
		    			<td colspan="5"><b class="nomarg"><?php echo $prepared; ?></b></td>
		    			<td colspan="5">
		    			<b>
		    			<?php if($saved==0){ ?>
		    			<select name='checked' class="select-des emphasis">
			    			<option value=''>-Select Employee-</option>
			    			<?php foreach($employee AS $emp){ ?>
			    				<option value='<?php echo $emp->employee_id; ?>'><?php echo $emp->employee_name; ?></option>
			    			<?php } ?>
		    			</select>
		    			<?php } else {
		    				echo $checked;
		    			} ?>
		    			</b>
		    			</td>
		    			<td colspan="5">
		    			<b>
		    			<?php if($saved==0){ ?>
		    			<select name='endorsed' class="select-des emphasis">
			    			<option value=''>-Select Employee-</option>
			    			<?php foreach($employee AS $emp){ ?>
			    				<option value='<?php echo $emp->employee_id; ?>'><?php echo $emp->employee_name; ?></option>
			    			<?php } ?>
		    			</select>
		    			<?php } else {
		    				echo $endorsed;
		    			} ?>
		    			</b>
		    			</td>
		    			<td colspan="5">
		    			<b>
		    			<?php if($saved==0){ ?>
		    			<select name='approved' class="select-des emphasis">
			    			<option value=''>-Select Employee-</option>
			    			<?php foreach($employee AS $emp){ ?>
			    				<option value='<?php echo $emp->employee_id; ?>'><?php echo $emp->employee_name; ?></option>
			    			<?php } ?>
		    			</select>
		    			<?php } else {
		    				echo $approved;
		    			} ?>
		    			</b>
		    			</td>
		    		</tr>	    		
		    		<tr><td class="f13" colspan="20" align="center"><br></td></tr>		
		    	</table>		    
	    	</div>
	    	<input type='hidden' name='po_id' value='<?php echo $po_id; ?>'>
	    	<input type='hidden' name='supplier_id' value='<?php echo $supplier_id; ?>'>
    	</form>
    </div>
    <script type="text/javascript">
    	function printPage() {
		  window.print();
		}
    </script>