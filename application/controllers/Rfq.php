<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rfq extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('super_model');
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	  function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }

	}

	public function create_rfq(){
		$vendor_id = $this->input->post('vendor_id');
		$item_id = $this->input->post('item_id');
		$timestamp = date("Y-m-d H:i:s");

		$rows_head = $this->super_model->count_rows("rfq_head");
		if($rows_head==0){
			$rfq_id=1;
		} else {
			$max = $this->super_model->get_max("rfq_head", "rfq_id");
			$rfq_id = $max+1;
		}

		$rfq_format = date("Ym");
        //$prefix= $this->super_model->select_column_custom_where("rfq_head", "rfq_no", "create_date LIKE '%$rfq_format%'");
        $rfqdet=implode("-", $rfq_format);
        $rows=$this->super_model->count_custom_where("rfq_head","create_date LIKE '$rfqdet%'");
        if($rows==0){
            $rfq_no= $rfq_format."-1001";
        } else {
            $series = $this->super_model->get_max("rfq_series", "series","year_month LIKE '$rfqdet%'");
            $next=$series+1;
            $rfq_no = $rfq_format."-".$next;
        }

        $rfqdetails=explode("-", $rfq_no);
        $rfq_prefix1=$rfqdetails[0];
        $rfq_prefix=$rfq_prefix1;
        $series = $rfqdetails[1];

        $rfq_data= array(
            'year_month'=>$rfq_prefix,
            'series'=>$series
        );
        $this->super_model->insert_into("rfq_series", $rfq_data);

		$head = array(
			'rfq_id'=>$rfq_id,
			'rfq_date'=>$timestamp,
			'supplier_id'=>$vendor_id,
			'rfq_no'=>$rfq_no,
			'prepared_by'=>$_SESSION['user_id'],
			'create_date'=>$timestamp
		);
		if($this->super_model->insert_into("rfq_head", $head)){
			foreach($item_id AS $id){
				foreach($this->super_model->select_row_where('item','item_id',$id) AS $u){
					$uom = $u->unit_id;
				}
				$details = array(
					'rfq_id'=>$rfq_id,
					'item_id'=>$id,
					'unit_id'=>$uom,
				);

			 $this->super_model->insert_into("rfq_detail", $details);
			}
		}
	
		redirect(base_url().'rfq/rfq_outgoing/'.$rfq_id);
	}

	 public function rfq_outgoing(){
	 	$rfq_id=$this->uri->segment(3);
	 	$data['rfq_id']=$rfq_id;
	 	foreach($this->super_model->select_row_where("rfq_head", "rfq_id", $rfq_id) AS $head){
	 		$data['noted_by']=$head->noted_by;
	 		$data['approved_by']=$head->approved_by;
	 		$noted=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->noted_by); 
	 		$approved=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->approved_by);
	 		$data['pr']=$this->super_model->select_custom_where("pr_head", "cancelled='0'");
	 		$pr_no=$this->super_model->select_column_where('pr_head','pr_no','pr_id', $head->pr_id);
	 		$data['head'][] = array(
	 			'due_date'=>$head->due_date,
	 			'rfq_date'=>$head->rfq_date,
	 			'pr_no'=>$pr_no,
	 			'notes'=>$head->notes,
	 			'rfq_no'=>$head->rfq_no,
	 			'supplier'=>$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $head->supplier_id),
	 			'phone'=>$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $head->supplier_id),
	 			'noted'=>$noted,
	 			'approved'=>$approved,
	 			'saved'=>$head->saved
	 		);
	 	}

	 	foreach($this->super_model->select_row_where("rfq_detail", "rfq_id", $rfq_id) AS $detail){
	 		$item=$this->super_model->select_column_where('item','item_name','item_id', $detail->item_id) .', '.$this->super_model->select_column_where('item','item_specs','item_id', $detail->item_id);
	 		//$item='';
	 		$data['detail'][] = array(
	 			'item'=>$item,
	 			'unit'=>$this->super_model->select_column_where('unit','unit_name','unit_id', $detail->unit_id) 
	 		);
	 	}

	 	$data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");


        $this->load->view('rfq/rfq_outgoing',$data);
    }

    public function save_rfq(){
    	$rfq_id = $this->input->post('rfq_id');
    	$data = array(
    		'pr_id'=>$this->input->post('pr_no'),
    		'notes'=>$this->input->post('notes'),
    		'due_date'=>$this->input->post('due_date'),
    		'noted_by'=>$this->input->post('noted'),
    		'approved_by'=>$this->input->post('approved'),
    		'saved'=>1
    	);

    	if($this->super_model->update_where("rfq_head", $data, "rfq_id", $rfq_id)){
    		redirect(base_url().'rfq/rfq_outgoing/'.$rfq_id, 'refresh');
    	}
    }
    

	public function rfq_list(){
		$data =array();
		foreach($this->super_model->select_custom_where("rfq_head", "saved='1' AND cancelled ='0' ORDER BY rfq_id DESC") AS $rfq){
			$supplier = $this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $rfq->supplier_id);
			$pr_no=$this->super_model->select_column_where('pr_head','pr_no','pr_id', $rfq->pr_id);
			$data['list'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'pr_no'=>$pr_no,
				'rfq_no'=>$rfq->rfq_no,
				'rfq_date'=>$rfq->rfq_date,
				'notes'=>$rfq->notes,
				'supplier'=>$supplier,
				'completed'=>$rfq->completed,
				'served'=>$rfq->served
			);

			foreach($this->super_model->select_custom_where_group("rfq_detail", "rfq_id ='$rfq->rfq_id'", "item_id") AS $it){
				$item = $this->super_model->select_column_where('item','item_name','item_id', $it->item_id);
				$specs = $this->super_model->select_column_where('item','item_specs','item_id', $it->item_id);
				//$item_name .= $item. ", ";
				$data['items'][] = array(
					'rfq_id'=>$it->rfq_id,
					'item_name'=>$item,
					'specs'=>$specs
				);
			}

		}
	
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('rfq/rfq_list',$data);
        $this->load->view('template/footer');
    }

    public function served_rfq(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data=array();
        foreach($this->super_model->select_custom_where("rfq_head", "saved='1' ORDER BY rfq_id DESC") AS $rfq){
			$supplier = $this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $rfq->supplier_id);
			$data['list'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'rfq_no'=>$rfq->rfq_no,
				'rfq_date'=>$rfq->rfq_date,
				'date_served'=>$rfq->date_served,
				'supplier'=>$supplier,
				'completed'=>$rfq->completed,
				'served'=>$rfq->served
			);

			foreach($this->super_model->select_row_where("rfq_detail", "rfq_id", $rfq->rfq_id) AS $it){
				$item = $this->super_model->select_column_where('item','item_name','item_id', $it->item_id);
				//$item_name .= $item. ", ";
				$data['items'][] = array(
					'rfq_id'=>$it->rfq_id,
					'item_name'=>$item
				);
			}

		}
        $this->load->view('rfq/served_rfq',$data);
        $this->load->view('template/footer');
    }

    public function update_served(){
    	$rfq_id=$this->uri->segment(3);
    	$data = array(
    		'date_served'=>date('Y-m-d H:i:s'),
    		'served'=>1
    	);

    	if($this->super_model->update_where("rfq_head", $data, "rfq_id", $rfq_id)){
    		redirect(base_url().'rfq/rfq_list', 'refresh');
    	}
    }

    public function rfq_incoming(){
    	$rfq_id=$this->uri->segment(3);
    	$data['rfq_id']=$rfq_id;
    	$data['completed'] = $this->super_model->select_column_where('rfq_head','completed','rfq_id', $rfq_id);
    	$data['served'] = $this->super_model->select_column_where('rfq_head','served','rfq_id', $rfq_id);
    	$data['cancelled'] = $this->super_model->select_column_where('rfq_head','cancelled','rfq_id', $rfq_id);
    	$data['revised'] = $this->super_model->select_column_where('rfq_head','revised','rfq_id', $rfq_id);
    	$data['revision_no'] = $this->super_model->select_column_where('rfq_head','revision_no','rfq_id', $rfq_id);
	 	foreach($this->super_model->select_row_where("rfq_head", "rfq_id", $rfq_id) AS $head){
	 		$noted=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->noted_by); 
	 		$approved=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->approved_by);
	 		$prepared=$this->super_model->select_column_where('users','fullname','user_id', $head->prepared_by);
	 		$pr_no=$this->super_model->select_column_where('pr_head','pr_no','pr_id', $head->pr_id);
	 		$data['head'][] = array(
	 			'due_date'=>$head->due_date,
	 			'rfq_date'=>$head->rfq_date,
	 			'rfq_no'=>$head->rfq_no,
	 			'pr_no'=>$pr_no,
	 			'notes'=>$head->notes,
	 			'supplier'=>$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $head->supplier_id),
	 			'phone'=>$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $head->supplier_id),
	 			'validity'=>$head->price_validity,
	 			'terms'=>$head->payment_terms,
	 			'delivery_date'=>$head->delivery_date,
	 			'warranty'=>$head->warranty,
	 			'tin'=>$head->supplier_tin,
	 			'vat'=>$head->vat,
	 			'prepared'=>$prepared,
	 			'noted'=>$noted,
	 			'approved'=>$approved,
	 			'saved'=>$head->saved,

	 		);
	 	}

	 	foreach($this->super_model->select_row_where("rfq_detail", "rfq_id", $rfq_id) AS $detail){
	 		$item=$this->super_model->select_column_where('item','item_name','item_id', $detail->item_id) .', '.$this->super_model->select_column_where('item','item_specs','item_id', $detail->item_id);
	 		//$item='';
	 		$data['detail'][] = array(
	 			'detail_id'=>$detail->rfq_detail_id,
	 			'item'=>$item,
	 			'offer'=>$detail->offer,
	 			'price'=>$detail->unit_price,
	 			'reco'=>$detail->recommended,
	 			'unit'=>$this->super_model->select_column_where('unit','unit_name','unit_id', $detail->unit_id) 
	 		);
	 	}


	 	/*foreach($this->super_model->select_custom_where_group('rfq_detail', "rfq_id = '$rfq_id'", "item_id") AS $com){*/
	 		foreach($this->super_model->custom_query("SELECT * FROM rfq_detail WHERE rfq_id = '$rfq_id' ORDER BY item_id ASC") AS $com){
	 		//echo $com->item_id;
	 		$item=$this->super_model->select_column_where('item','item_name','item_id', $com->item_id) .', '.$this->super_model->select_column_where('item','item_specs','item_id', $com->item_id);

	 		$rows_item =$this->super_model->count_custom_where("rfq_detail","rfq_id = '$rfq_id' AND item_id ='$com->item_id'");
	 		//echo $rows_item . "<br>";
	 	
	 		$data['complete'][] = array(
	 			'detail_id'=>$com->rfq_detail_id,
	 			'item'=>$item,
	 			'unit'=>$this->super_model->select_column_where('unit','unit_name','unit_id', $com->unit_id),
	 			'row'=>$rows_item,
	 			'offer'=>$com->offer,
	 			'price'=>$com->unit_price,
	 			'row'=>$rows_item
	 		);

	 		/*foreach($this->super_model->custom_query("SELECT * FROM rfq_detail WHERE rfq_id='$rfq_id' AND item_id = '$com->item_id' AND rfq_detail_id !='$com->rfq_detail_id'") AS $others){
	 			$data['others'][] = array(
	 				'offer'=>$others->offer,
	 				'price'=>$others->unit_price,
	 			);
	 		}*/
	 	}
	 	$this->load->view('template/header');
        $this->load->view('rfq/rfq_incoming', $data);
        $this->load->view('template/footer');
    }


 /*   public function save_revision_rfq(){
    	$detail_id = $this->input->post('detail_id');
    	$offer = $this->input->post('offer');
    	$price = $this->input->post('price');

    	
    }*/

    public function complete_rfq(){
    	$rfq_id = $this->input->post('rfq_id');
    	$count = $this->input->post('count');
    	$head = array(
    		'price_validity'=>$this->input->post('validity'),
    		'payment_terms'=>$this->input->post('terms'),
    		'delivery_date'=>$this->input->post('delivery_date'),
    		'warranty'=>$this->input->post('warranty'),
    		'supplier_tin'=>$this->input->post('tin'),
    		'vat'=>$this->input->post('vat'),
    		'completed'=>'1'
    	);

    	if($this->super_model->update_where("rfq_head", $head, "rfq_id", $rfq_id)){
    		for($a=1; $a<=$count; $a++){

    			$offer=$this->input->post('offer'.$a.'_1');
    			$price=$this->input->post('price'.$a.'_1');
    			//$reco=$this->input->post('reco'.$a);
    			$detailid=$this->input->post('detail_id'.$a);
	    		$details = array(
	    			'offer'=>$offer,
	    			'unit_price'=>$price,
	    			//'recommended'=>$reco
	    		);
	    		$this->super_model->update_where("rfq_detail", $details, "rfq_detail_id", $detailid);

	    		for($b=2;$b<=3;$b++){
	    			$offer1=$this->input->post('offer'.$a.'_'.$b);
	    			$price1=$this->input->post('price'.$a.'_'.$b);
	    			//$reco=$this->input->post('reco'.$a);
	    			$detailids=$this->input->post('detail_id'.$a);
	    			
	    			$item_id = $this->super_model->select_column_where('rfq_detail','item_id','rfq_detail_id', $detailids);
	    			$unit_id = $this->super_model->select_column_where('rfq_detail','unit_id','rfq_detail_id', $detailids);
		    		$details_insert = array(
		    			'rfq_id'=>$rfq_id,
		    			'item_id'=>$item_id,
		    			'unit_id'=>$unit_id,
		    			'offer'=>$offer1,
		    			'unit_price'=>$price1,
		    		);
		    		if(!empty($offer1)){
		    		 $this->super_model->insert_into("rfq_detail", $details_insert);
		    		}
	    		}
    		}
    	}

    	redirect(base_url().'rfq/rfq_incoming/'.$rfq_id, 'refresh');

    }


    public function override_rfq(){
        $rfq_id=$this->uri->segment(3);
        $data=array(
            'saved'=>0
        );
        if($this->super_model->update_where("rfq_head", $data, "rfq_id", $rfq_id)){
            redirect(base_url().'rfq/rfq_outgoing/'.$rfq_id);
        }
    }


     public function override_rfq_incoming(){
        $rfq_id=$this->uri->segment(3);
        $data=array(
            'completed'=>0
        );
        if($this->super_model->update_where("rfq_head", $data, "rfq_id", $rfq_id)){
            redirect(base_url().'rfq/rfq_incoming/'.$rfq_id, 'refresh');
        }
    }


    public function cancel_rfq(){
        $rfq_id=$this->input->post('rfq_id');
        $date=date('Y-m-d H:i:s');
        $data=array(
            'cancelled'=>1,
            'cancel_reason'=>$this->input->post('reason'),
            'cancelled_date'=>$date
        );
        if($this->super_model->update_where("rfq_head", $data, "rfq_id", $rfq_id)){
            redirect(base_url().'rfq/rfq_list/'.$rfq_id);
        }
    }


    public function cancelled_rfq(){
    		$data =array();
		foreach($this->super_model->select_custom_where("rfq_head", "saved='1' AND cancelled ='1' ORDER BY rfq_id DESC") AS $rfq){
			$supplier = $this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $rfq->supplier_id);

			$data['list'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'pr_no'=>$rfq->pr_no,
				'rfq_no'=>$rfq->rfq_no,
				'rfq_date'=>$rfq->rfq_date,
				'notes'=>$rfq->notes,
				'supplier'=>$supplier,
				'completed'=>$rfq->completed,
				'served'=>$rfq->served
			);

			foreach($this->super_model->select_custom_where_group("rfq_detail", "rfq_id ='$rfq->rfq_id'", "item_id") AS $it){
				$item = $this->super_model->select_column_where('item','item_name','item_id', $it->item_id);
				$specs = $this->super_model->select_column_where('item','item_specs','item_id', $it->item_id);
				//$item_name .= $item. ", ";
				$data['items'][] = array(
					'rfq_id'=>$it->rfq_id,
					'item_name'=>$item,
					'specs'=>$specs
				);
			}

		}
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('rfq/cancelled_rfq',$data);
        $this->load->view('template/footer');
    }

    public function revise_rfq(){
		$rfq_id=$this->input->post('rfq_id');

   		$revision_no = $this->super_model->get_max("rfq_head", "revision_no","rfq_id = '$rfq_id'");
   		$new_rev_no = $revision_no+1;

   		$update_head = array(
   			'revised'=>1,
   			'revision_no'=>$new_rev_no
   		);
   		$this->super_model->update_where("rfq_head", $update_head, "rfq_id", $rfq_id);

    	foreach($this->super_model->select_row_where("rfq_head", "rfq_id", $rfq_id) AS $head){

    		$rfq_head= array(
    			'rfq_id'=>$rfq_id,
    			'rfq_no'=>$head->rfq_no,
    			'pr_no'=>$head->pr_no,
    			'rfq_date'=>$head->rfq_date,
    			'supplier_id'=>$head->supplier_id,
    			'due_date'=>$head->due_date,
    			'price_validity'=>$head->price_validity,
    			'payment_terms'=>$head->payment_terms,
    			'delivery_date'=>$head->delivery_date,
    			'warranty'=>$head->warranty,
    			'supplier_tin'=>$head->supplier_tin,
    			'prepared_by'=>$head->prepared_by,
    			'noted_by'=>$head->noted_by,
    			'approved_by'=>$head->approved_by,
    			'revision_no'=>$head->revision_no,
    			'revise_reason'=>$this->input->post('reason'),
    			'saved'=>1,
    			'completed'=>1

    		);

    		$this->super_model->insert_into("revised_rfq_head", $rfq_head);

    	}

    	foreach($this->super_model->select_row_where("rfq_detail", "rfq_id", $rfq_id) AS $det){
    		 $detail = array(
    		 	'rfq_id'=>$rfq_id,
    		 	'item_id'=>$det->item_id,
    		 	'unit_id'=>$det->unit_id,
    		 	'offer'=>$det->offer,
    		 	'unit_price'=>$det->unit_price,

    		 );
    		 $this->super_model->insert_into("revised_rfq_detail", $detail);
    	}

    	redirect(base_url().'rfq/rfq_incoming/'.$rfq_id);

    }

    public function duplicate_rfq(){
    	$rfq_id=$this->input->post('rfq_id');
    	$pr_no=$this->input->post('pr_no');
    	$notes=$this->input->post('notes');

		$rows_head = $this->super_model->count_rows("rfq_head");
		if($rows_head==0){
			$new_rfq_id=1;
		} else {
			$max = $this->super_model->get_max("rfq_head", "rfq_id");
			$new_rfq_id = $max+1;
		}


		$rfq_format = date("Y-m");
        $rfq_form=date("Ym");
       // $rfqdet=implode("-", $rfq_format);
        $rows=$this->super_model->count_custom_where("rfq_head","create_date LIKE '$rfq_format%'");
        if($rows==0){
            $rfq_no= $rfq_form."-1001";
        } else {
            $series = $this->super_model->get_max("rfq_series", "series","year_month LIKE '$rfq_form%'");
            $next=$series+1;
            $rfq_no = $rfq_form."-".$next;
        }

        $rfqdetails=explode("-", $rfq_no);
        $rfq_prefix1=$rfqdetails[0];
        $rfq_prefix=$rfq_prefix1;
        $series = $rfqdetails[1];

        $rfq_data= array(
            'year_month'=>$rfq_prefix,
            'series'=>$series
        );

        $this->super_model->insert_into("rfq_series", $rfq_data);



    	foreach($this->super_model->select_row_where("rfq_head", "rfq_id", $rfq_id) AS $head){

    	
    		$rfq_head= array(
    			'rfq_id'=>$new_rfq_id,
    			'rfq_no'=>$rfq_no,
    			'pr_no'=>$pr_no,
    			'rfq_date'=>$head->rfq_date,
    			'supplier_id'=>$head->supplier_id,
    			'due_date'=>$head->due_date,
    			'price_validity'=>$head->price_validity,
    			'payment_terms'=>$head->payment_terms,
    			'delivery_date'=>$head->delivery_date,
    			'warranty'=>$head->warranty,
    			'supplier_tin'=>$head->supplier_tin,
    			'prepared_by'=>$head->prepared_by,
    			'noted_by'=>$head->noted_by,
    			'approved_by'=>$head->approved_by,
    			'notes'=>$notes,
    			'saved'=>1,
    			'completed'=>1

    		);

    		$this->super_model->insert_into("rfq_head", $rfq_head);

    	}



    	foreach($this->super_model->select_row_where("rfq_detail", "rfq_id", $rfq_id) AS $det){
    		 $detail = array(
    		 	'rfq_id'=>$new_rfq_id,
    		 	'item_id'=>$det->item_id,
    		 	'unit_id'=>$det->unit_id,
    		 	'offer'=>$det->offer,
    		 	'unit_price'=>$det->unit_price,

    		 );
    		 $this->super_model->insert_into("rfq_detail", $detail);
    	}

    	   redirect(base_url().'rfq/rfq_list/', 'refresh');

    }

    public function save_revision_rfq(){
    	$rfq_id = $this->input->post('rfq_id');
    	$detail_id = $this->input->post('detail_id');
    	$offer = $this->input->post('offer');
    	$price = $this->input->post('price');

    	$data=array(
    		'offer'=>$offer,
    		'unit_price'=>$price
    	);
    	$this->super_model->update_where("rfq_detail", $data, "rfq_detail_id", $detail_id);

    	$this->super_model->update_where("aoq_reco", $data, "rfq_detail_id", $detail_id);

    	 redirect(base_url().'rfq/rfq_incoming/'.$rfq_id, 'refresh');

    	
    }

    public function save_revisions(){
    	$rfq_id = $this->uri->segment(3);
    	$head = array(
    		'revised'=>0
    	);

    	if($this->super_model->update_where("rfq_head", $head, "rfq_id", $rfq_id)){
    		 redirect(base_url().'rfq/rfq_incoming/'.$rfq_id, 'refresh');
    	}

    }

}

?>