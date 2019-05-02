  	<style type="text/css">
        html, body{
            background: #2d2c2c!important;
            font-size:12px!important;
        }
        .pad{
        	padding:0px 30px 0px 30px
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
		.table-borbold{
			border: 2px solid #000!important;
		}
		.table-borreg{
			border: 1px solid #000!important;
		}
		.f10{
			font-size:11px!important;
		}
		.f9{
			font-size:9px!important;
		}
		.bor-btm{
			border-bottom: 1px solid #000!important;
		}
		.sel-des{
			border: 0px!important;
		}
		@media print{
			html, body{
	            background: #fff!important;
	            font-size:12px!important;
	        }
			#prnt_btn{
				display: none;
			}
			#add_btn{
				display: none;
			}
			.f10{
				font-size:10px!important;
			}
			.text-red{
				color: red!important;
			}
			.yellow-back{
			background-image: url('../../assets/img/yellow.png')!important;
			}
			.green-back{
				background-image: url('../../assets/img/green.png')!important;
			}
		}
		.text-white{
			color: #fff;
		}
		.text-red{
			color: red;
		}
		.yellow-back{
			background-image: url('../../assets/img/yellow.png');
		}
		.green-back{
			background-image: url('../../assets/img/green.png');
		}
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mixins.css">
    <div  class="pad">
    	<form>  
    		<div id="prnt_btn">
	    		<center>
			    	<div class="btn-group">
						<a href="" class="btn btn-success btn-md p-l-100 p-r-100"><span class="fa fa-arrow-left"></span> Back</a>
						<a  onclick="printPage()" class="btn btn-warning btn-md p-l-100 p-r-100"><span class="fa fa-print"></span> Print</a>
						<a href="" class="btn btn-primary btn-md p-l-100 p-r-100"><span class="fa fa-floppy-o"></span> Save</a>    				
					</div>
					<p class="text-white p-l-250 p-r-250">Instructions: When printing ABSTRACT OF QUOTATION make sure the following options are set correctly -- <u>Browser</u>: Chrome, <u>Layout</u>: Landscape, <u>Paper Size</u>: A4 <u>Margin</u> : Custom (top: 0.11" , right:0.40", bottom: 0.11", left: 0.11") <u>Scale</u>: 100 and the option: Background graphics is checked</p>
				</center>
			</div>
	    	<div style="background: #fff;">    		  			
		    	<table class="table-bordedred" width="100%" style="background: #fff;border: 1px solid #000">
		    		<tr>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    			<td width="3%"><br></td>
		    		</tr>		    	
		    		<tr><td colspan="33" class="f10"  align="center"><h5><b>ABSTRACT OF QUOTATION</b></h5></td></tr>
		    		<tr>
		    			<td colspan="4" class="f10" align="right">Department: &nbsp;</td>
		    			<td colspan="13" class="f10" >Test Tsest tsets test </td>		    			
		    			<td colspan="3" class="f10" align="right">Date: &nbsp;</td>
		    			<td colspan="13" class="f10" >Purposeasds</td>
		    		</tr>	
		    		<tr>
		    			<td colspan="4" class="f10" align="right">Purpose: &nbsp;</td>
		    			<td colspan="13" class="f10" >Test Tsest tsets test </td>		    			
		    			<td colspan="3"class="f10" align="right">PR #: &nbsp;</td>
		    			<td colspan="13" class="f10" >Purposesasad </td>
		    		</tr>
		    		<tr>
		    			<td colspan="4" class="f10" align="right">Enduse: &nbsp;</td>
		    			<td colspan="13" class="f10" >Test Tsest tsets test </td>		    			
		    			<td colspan="3"class="f10" align="right">Date Needed: &nbsp;</td>
		    			<td colspan="13" class="f10" >Purasdpose</td>
		    		</tr>	
		    		<tr>
		    			<td colspan="4" class="f10"  align="right">Requested by: &nbsp;</td>
		    			<td colspan="29" class="f10" >Test Tsest tsets test </td>
		    		</tr>
		    		<!-- <tr><td class="f10"  align="center"><br></td></tr> -->
		    		<tr><td class="f10" colspan="33" align="center"><br></td></tr>
		    		<tr>
		    			<td colspan="8" class="f10"  align="center"><button id="add_btn" class="btn btn-primary">Add Item</button></td>


		    			<!-- loop ka here -->
		    			<td colspan="5" class="f10 table-borbold"  align="center">
		    				<b>Visayan Construction Supply</b><br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    			<!-- and delete the other two below salamats -->

		    			<td colspan="5" class="f10 table-borbold"  align="center">
		    				Visayan Construction Supply<br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    			<td colspan="5" class="f10 table-borbold"  align="center">
		    				Visayan Construction Supply<br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    			<td colspan="5" class="f10 table-borbold"  align="center">
		    				Visayan Construction Supply<br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    			<td colspan="5" class="f10 table-borbold"  align="center">
		    				Visayan Construction Supply<br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    		</tr>
		    		<tr>
		    			<td class="f9 table-borbold "align="center"><b class="p-r-10 p-l-10">#</td>
		    			<td colspan="5" class="f9 table-borbold" align="center"><b>DESCRIPTION</td>
		    			<td class="f9 table-borbold" align="center"><b>QTY</td>
		    			<td class="f9 table-borbold" align="center"><b>UOM</td>

		    			<td colspan="2" class="f9 table-borbold" align="center"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>

		    			<td colspan="2" class="f9 table-borbold" align="center"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>

		    			<td colspan="2" class="f9 table-borbold" align="center"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>

		    			<td colspan="2" class="f9 table-borbold" align="center"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>

		    			<td colspan="2" class="f9 table-borbold" align="center"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>

		    			
		    		</tr>
		    		<tr>
		    			<td class="f10 table-borreg" align="center">99</td>
		    			<td colspan="5" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention, Belt Repair, Metal Rebuilding, Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg" align="center">14</td>
		    			<td class="f10 table-borreg" align="center">length</td>

		    			<!-- loop ka here -->
		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>
		    			<!-- and delete the other two below salamats -->

		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>

		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>

		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>

		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>

		    			<!-- <td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg text-red" align="center"></td>

		    			<td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg text-red" align="center"></td> -->
		    		</tr>
		    		<tr>
		    			<td class="f10 table-borreg" align="center">99</td>
		    			<td colspan="5" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention, Belt Repair, Metal Rebuilding, Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg" align="center">14</td>
		    			<td class="f10 table-borreg" align="center">length</td>

		    			<!-- loop ka here -->
		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>
		    			<!-- and delete the other two below salamats -->

		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>

		    			<td colspan="2" class="f10 table-borreg" align="left"> Adhesives, Threadlockers/Threadsealants, Wear Prevention,<b class="text-red"> Belt Repair, Metal Rebuilding,</b> Floor Repair/Grouting</td>
		    			<td class="f10 table-borreg yellow-back" align="center">170.00</td>
		    			<td class="f10 table-borreg green-back" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>

		    			<td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg text-red" align="center"></td>

		    			<td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg text-red" align="center"></td>
		    		</tr>
		    		<tr>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td colspan="5" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>

		    			<!-- loop ka here -->
		    			<td colspan="2" class="f10 table-borreg" align="left"><br></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<!-- and delete the other two below salamats -->

		    			<td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>

		    			<td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>

		    			<td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>

		    			<td colspan="2" class="f10 table-borreg" align="left"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center"></td>
		    		</tr>
		    		<tr>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td colspan="7" class="f10 table-borreg text-red" align="center"><b>REMARK</b></td>

		    			<!-- loop ka here -->
		    			<td colspan="5" class="f10 table-borreg" align="left"><br></td>
		    			<!-- and delete the other two below salamats -->

		    			<td colspan="5" class="f10 table-borreg" align="left"><br></td>
		    			<td colspan="5" class="f10 table-borreg" align="left"><br></td>
		    			<td colspan="5" class="f10 table-borreg" align="left"><br></td>
		    			<td colspan="5" class="f10 table-borreg" align="left"><br></td>
		    		</tr>
		    		<tr><td class="f10" colspan="33" align="center"><br></td></tr>
		    		<tr>
		    			<td class="" align="center">a.</td>
		    			<td colspan="7" class="f10" align="center">Price Validity</td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    		</tr>
		    		<tr>
		    			<td class="" align="center">b.</td>
		    			<td colspan="7" class="f10" align="center">Payment Terms</td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    		</tr>
		    		<tr>
		    			<td class="" align="center">c.</td>
		    			<td colspan="7" class="f10" align="center">Date of Delivery</td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    		</tr>
		    		<tr>
		    			<td class="" align="center">d.</td>
		    			<td colspan="7" class="f10" align="center">Item's Warranty</td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    			<td colspan="2" class="f10 bor-btm" align="left"><br></td>
		    			<td colspan="3" class="f10" align="left"><br></td>
		    		</tr>
		    		<tr><td class="f10" colspan="33" align="center"><br></td></tr>
		    		<tr>
		    			<td colspan="2"  class="" align="center"></td>
		    			<td colspan="5" class="f10" align="center">Prepared by:</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    			<td colspan="3" class="f10" align="center">Award Recommended by:</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    			<td colspan="3" class="f10" align="center">Noted by:</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    			<td colspan="3" class="f10" align="center">Approved by:</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    		</tr>
		    		<tr><td class="f10" colspan="33" align="center"><br></td></tr>
		    		<tr>
		    			<td colspan="2"  class="" align="center"></td>
		    			<td colspan="5" class="f10 bor-btm" align="center">Someone</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    			<td colspan="3" class="f10 bor-btm" align="center">Someone</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    			<td colspan="3" class="f10 bor-btm" align="center">Someone</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    			<td colspan="3" class="f10 bor-btm" align="center">Someone</td>
		    			<td colspan="2" class="f10" align="left"><br></td>
		    		</tr>
		    		<tr><td class="f10" colspan="33" align="center"><br></td></tr>
		    		<tr>
		    			<td colspan="2"  class="" align="center"></td>
		    			<td colspan="2"  class="" align="center"></td>
		    			<td colspan="3"  class="" align="center">LEGEND:</td>
		    			<td colspan="1"  class="" align="center"></td>
		    			<td colspan="1"  class="green-back" align="center"></td>
		    			<td colspan="1"  class="" align="center"></td>
		    			<td colspan="4"  class="" align="left">Recommended Award</td>
		    		</tr>
		    		<tr>
		    			<td colspan="2"  class="" align="center"></td>
		    			<td colspan="2"  class="" align="center"></td>
		    			<td colspan="3"  class="" align="center"></td>
		    			<td colspan="1"  class="" align="center"></td>
		    			<td colspan="1"  class="yellow-back" align="center"></td>
		    			<td colspan="1"  class="" align="center"></td>
		    			<td colspan="4"  class="" align="left">Lowest Price</td>
		    		</tr>
		    		<tr><td class="f10" colspan="33" align="center"><br></td></tr>

		    	</table>
		    	<!-- <table class="table-bordered" width="100%" style="border:2px solid #000">
		    		<tr>
		    			<td width="5%"><br></td>
		    			<td width="2%"><br></td>
		    			<td width="3%"><br></td>
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
		    		<tr><td class="f10"  align="center"><h5><b>ABSTRACT OF QUOTATION</b></h5></td></tr>
		    		<tr>
		    			<td class="f10" colspan="2" align="right">Department: &nbsp;</td>
		    			<td class="f10" colspan="9">Test Tsest tsets test </td>		    			
		    			<td class="f10" colspan="2" align="right">Date: &nbsp;</td>
		    			<td class="f10" colspan="8">Purposeasds</td>
		    		</tr>	
		    		<tr>
		    			<td class="f10" colspan="2" align="right">Purpose: &nbsp;</td>
		    			<td class="f10" colspan="9">Test Tsest tsets test </td>		    			
		    			<td class="f10" colspan="2" align="right">PR #: &nbsp;</td>
		    			<td class="f10" colspan="8">Purposesasad </td>
		    		</tr>
		    		<tr>
		    			<td class="f10" colspan="2" align="right">Enduse: &nbsp;</td>
		    			<td class="f10" colspan="9">Test Tsest tsets test </td>		    			
		    			<td class="f10" colspan="2" align="right">Date Needed: &nbsp;</td>
		    			<td class="f10" colspan="8">Purasdpose</td>
		    		</tr>	
		    		<tr>
		    			<td class="f10" colspan="2" align="right">Requested by: &nbsp;</td>
		    			<td class="f10" colspan="19">Test Tsest tsets test </td>
		    		</tr>
		    		<tr>
		    			<td class="f10" colspan="6" align="center"></td>


		    			loop ka here 
		    			<td class="f10 table-borbold" colspan="5" align="center">
		    				<b>Visayan Construction Supply</b><br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    			and delete the other two below salamats

		    			<td class="f10 table-borbold" colspan="5" align="center">
		    				Visayan Construction Supply<br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    			<td class="f10 table-borbold" colspan="5" align="center">
		    				Visayan Construction Supply<br>
		    				Mrs. Chua<br>
		    				434-7277
		    			</td>
		    		</tr>
		    		<tr>
		    			<td class="f9 table-borbold" align="center"></td>
		    			<td class="f9 table-borbold" align="center"><b>#</td>
		    			<td class="f9 table-borbold" align="center" colspan="2"><b>DESCRIPTION</td>
		    			<td class="f9 table-borbold" align="center"><b>QTY</td>
		    			<td class="f9 table-borbold" align="center"><b>UOM</td>
		    			<td class="f9 table-borbold" align="center" colspan="2"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>
		    			<td class="f9 table-borbold" align="center" colspan="2"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>
		    			<td class="f9 table-borbold" align="center" colspan="2"><b>OFFER</b></td>
		    			<td class="f9 table-borbold" align="center"><b>U/P</b></td>
		    			<td class="f9 table-borbold" align="center"><b>AMOUNT</b></td>
		    			<td class="f9 table-borbold" align="center"><b>COMMENTS</b></td>
		    		</tr>
		    		<tr>
		    			<td class="f10 table-borreg" align="center"></td>
		    			<td class="f10 table-borreg" align="center">1</td>
		    			<td class="f10 table-borreg" align="left" colspan="2">Deformed steel BAr. 12mm dia x 6 m. gr 33</td>
		    			<td class="f10 table-borreg" align="center">14</td>
		    			<td class="f10 table-borreg" align="center">length</td>

		    			loop ka here 
		    			<td class="f10 table-borreg" align="left" colspan="2">Deformed steel BAr. 12mm dia x 6 m. gr 33</td>
		    			<td class="f10 table-borreg" align="center">170.00</td>
		    			<td class="f10 table-borreg" align="center">2380.00</td>
		    			<td class="f10 table-borreg text-red" align="center">complying</td>
		    			 and delete the other two below salamats

		    			<td class="f10 table-borreg" align="left" colspan="2">Deformed steel BAr. 12mm dia x 6 m. gr 33</td>
		    			<td class="f10 table-borreg" align="center">170.00</td>
		    			<td class="f10 table-borreg" align="center">2380.00</td>
		    			<td class="f10 table-borreg" align="center">complying</td>

		    			<td class="f10 table-borreg" align="left" colspan="2">Deformed steel BAr. 12mm dia x 6 m. gr 33</td>
		    			<td class="f10 table-borreg" align="center">170.00</td>
		    			<td class="f10 table-borreg" align="center">2380.00</td>
		    			<td class="f10 table-borreg" align="center">complying</td>
		    		</tr>
		    	</table> -->		    
	    	</div>
    	</form>
    </div>
    <script type="text/javascript">
    	function printPage() {
		  window.print();
		}
    </script>