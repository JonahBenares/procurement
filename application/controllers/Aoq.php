<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aoq extends CI_Controller {

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

	public function aoq_list(){
		$supplier='';
		$data=array();
		foreach($this->super_model->select_row_where("aoq_header", "saved", "1") AS $list){

			$department=$this->super_model->select_column_where('department','department_name','department_id', $list->department_id);
			$enduse=$this->super_model->select_column_where('enduse','enduse_name','enduse_id', $list->enduse_id);
			$requested=$this->super_model->select_column_where('employees','employee_name','employee_id', $list->requested_by);
			$data['header'][]=array(
				'aoq_id'=>$list->aoq_id,
				'aoq_date'=>$list->aoq_date,
				'pr'=>$list->pr_no,
				'department'=>$department,
				'enduse'=>$enduse,
				'date_needed'=>$list->date_needed,
				'requestor'=>$requested,
				'saved'=>$list->saved,
				'completed'=>$list->completed
			);

			foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $list->aoq_id) AS $rfq){
				$supplier_id=$this->super_model->select_column_where('rfq_head','supplier_id','rfq_id', $rfq->rfq_id);
				$supplier.="-".$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $supplier_id). "<br> ";
				
			}
			$sup = substr($supplier, 0, -2);
			$data['supplier']=$sup;
		}

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('aoq/aoq_list',$data);
        $this->load->view('template/footer');
    }

	public function add_aoq(){
    	$data['rfq'] = $this->input->post('rfq');
    	$data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
    	$data['department']=$this->super_model->select_all_order_by("department", "department_name", "ASC");
		$data['enduse']=$this->super_model->select_all_order_by("enduse", "enduse_name", "ASC");
		$data['purpose']=$this->super_model->select_all_order_by("purpose", "purpose_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('aoq/add_aoq',$data);
        $this->load->view('template/footer');
    }


    public function insert_aoq(){
    	$rfq = $this->input->post('rfq');
		$date = date('Y-m-d H:i:s');

		$rows_head = $this->super_model->count_rows("aoq_header");
		if($rows_head==0){
			$aoq_id=1;
		} else {
			$max = $this->super_model->get_max("aoq_header", "aoq_id");
			$aoq_id = $max+1;
		}

		$head = array(
			'aoq_id'=>$aoq_id,
			'aoq_date'=>$this->input->post('aoq_date'),
			'pr_no'=>$this->input->post('pr'),
			'department_id'=>$this->input->post('department'),
			'enduse_id'=>$this->input->post('enduse'),
			'purpose_id'=>$this->input->post('purpose'),
			'date_needed'=>$this->input->post('date_needed'),
			'requested_by'=>$this->input->post('requested_by'),
			'remarks'=>$this->input->post('remarks'),
			'prepared_by'=>$_SESSION['user_id'],
			'create_date'=>$date
		);

		if($this->super_model->insert_into("aoq_header", $head)){
			foreach($rfq AS $r){
				$rfq_list = array(
					'aoq_id'=>$aoq_id,
					'rfq_id'=>$r
				);
				$this->super_model->insert_into("aoq_rfq", $rfq_list);
			}
		}

		$count = count($rfq);
		if($count==3){
			redirect(base_url().'aoq/aoq_prnt/'.$aoq_id);
		} else if($count==4){
			redirect(base_url().'aoq/aoq_prnt_four/'.$aoq_id);
		} else if($count==5){
			redirect(base_url().'aoq/aoq_prnt_five/'.$aoq_id);
		}

    }

	public function aoq_prnt(){
		$aoq_id=$this->uri->segment(3);
		$data['aoq_id']=$aoq_id;
		foreach($this->super_model->select_row_where("aoq_header", "aoq_id", $aoq_id) AS $head){
			$department=$this->super_model->select_column_where('department','department_name','department_id', $head->department_id);
			$enduse=$this->super_model->select_column_where('enduse','enduse_name','enduse_id', $head->enduse_id);
			$purpose=$this->super_model->select_column_where('purpose','purpose_name','purpose_id', $head->purpose_id);
			$requested=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->requested_by);
			$noted=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->noted_by);
			$approved=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->approved_by);
			$prepared=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->prepared_by);
			$data['head'][] = array(
				'aoq_id'=>$head->aoq_id,
				'aoq_date'=>$head->aoq_date,
				'pr'=>$head->pr_no,
				'department'=>$department,
				'enduse'=>$enduse,
				'purpose'=>$purpose,
				'date_needed'=>$head->date_needed,
				'requested'=>$requested,
				'remarks'=>$head->remarks,
				'prepared'=>$prepared,



			);
			$data['noted'] = $noted;
			$data['approved'] = $approved;
			$data['requested'] = $requested;
			$data['saved']=$head->saved;
			$data['completed']=$head->completed;
		}

		foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $aoq_id) AS $rfq){
			//echo $rfq->rfq_id;
			$supplier_id=$this->super_model->select_column_where('rfq_head','supplier_id','rfq_id', $rfq->rfq_id);
			$supplier=$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $supplier_id);
			$contact=$this->super_model->select_column_where('vendor_head','contact_person','vendor_id', $supplier_id);
			$phone=$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $supplier_id);
			$validity=$this->super_model->select_column_where('rfq_head','price_validity','rfq_id', $rfq->rfq_id);
			$terms=$this->super_model->select_column_where('rfq_head','payment_terms','rfq_id', $rfq->rfq_id);
			$delivery=$this->super_model->select_column_where('rfq_head','delivery_date','rfq_id', $rfq->rfq_id);
			$warranty=$this->super_model->select_column_where('rfq_head','warranty','rfq_id', $rfq->rfq_id);
			$data['supplier'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'supplier_id'=>$supplier_id,
				'supplier_name'=>$supplier,
				'contact'=>$contact,
				'phone'=>$phone,
				'validity'=>$validity,
				'terms'=>$terms,
				'delivery'=>$delivery,
				'warranty'=>$warranty
			);
		}

		foreach($this->super_model->select_row_where("aoq_items", "aoq_id", $aoq_id) AS $items){
			$item_name=$this->super_model->select_column_where('item','item_name','item_id', $items->item_id);
			$specs=$this->super_model->select_column_where('item','item_specs','item_id', $items->item_id);
			$uom=$this->super_model->select_column_where('item','uom','item_id', $items->item_id);
			$min =$this->super_model->get_min_where('rfq_detail','unit_price',"item_id = '$items->item_id' AND unit_price != '0'");
			
			$item = $item_name . ", " .$specs;
			$data['aoq_item'][]=array(
				'item_id'=>$items->item_id,
				'item'=>$item,
				'uom'=>$uom,
				'qty'=>$items->quantity,
				'min'=>$min
			);
		}

		$data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
		$data['items']=$this->super_model->select_all_order_by("item", "item_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('aoq/aoq_prnt',$data);
        $this->load->view('template/footer');
    }

    public function aoq_save(){
    	$aoq_id=$this->input->post('aoq_id');
    	$count=$this->input->post('count');
    	foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $aoq_id) AS $rfq){
    		$r = array(
    			'aoq_done'=>'1'
    		);
    		$this->super_model->update_where("rfq_head", $r, "rfq_id", $rfq->rfq_id);
    	}

    	$head = array(
    		'noted_by'=>$this->input->post('noted'),
    		'approved_by'=>$this->input->post('approved'),
    		'saved'=>'1'
    	);


    	if($this->super_model->update_where("aoq_header", $head, "aoq_id", $aoq_id)){
    		if($count==3){
    			redirect(base_url().'aoq/aoq_prnt/'.$aoq_id, 'refresh');
    		} else if($count==4){
    			redirect(base_url().'aoq/aoq_prnt_four/'.$aoq_id, 'refresh');
    		} else if($count==5){
    			redirect(base_url().'aoq/aoq_prnt_five/'.$aoq_id, 'refresh');
    		}
    	}
    }

    public function aoq_complete(){
    	$aoq_id=$this->input->post('aoq_id');
    	$count_item=$this->input->post('count_item');
    	$count_comment=$this->input->post('count_comment');
    	$count=$this->input->post('count');


    	for($a=1;$a<$count_comment;$a++){
    		$comment = $this->input->post('comments'.$a);
    		$supplier=$this->input->post('supplier'.$a);
    		$item=$this->input->post('item'.$a);
    		$com = array(
    			'supplier_id'=>$supplier,
    			'item_id'=>$item,
    			'comment'=>$comment,
    			'aoq_id'=>$aoq_id
    		);
    		$this->super_model->insert_into("aoq_comments", $com);
    	}


    	for($x=1;$x<$count_item;$x++){
    		$reco =$this->input->post('reco'.$x);
    		
    		$reco = explode("_",$reco);
    		$supplier = $reco[0];
    		$item = $reco[1];
    		$price = $reco[2];
    		$qty = $reco[3];

    		$data = array(
    			'supplier_id'=>$supplier,
    			'item_id'=>$item,
    			'reco'=>'1',
    			'aoq_id'=>$aoq_id,
    			'unit_price'=>$price,
    			'quantity'=>$qty
    		);

    		$this->super_model->insert_into("aoq_reco", $data);

    	}

    	$head = array(
    		'completed'=>1
    	);

    	if($this->super_model->update_where("aoq_header", $head, "aoq_id", $aoq_id)){
	    	if($count==3){
				redirect(base_url().'aoq/aoq_prnt/'.$aoq_id, 'refresh');
			} else if($count==4){
				redirect(base_url().'aoq/aoq_prnt_four/'.$aoq_id, 'refresh');
			} else if($count==5){
				redirect(base_url().'aoq/aoq_prnt_five/'.$aoq_id, 'refresh');
			}
		}
    }

    public function aoq_prnt_five(){
		$aoq_id=$this->uri->segment(3);
		$data['aoq_id']=$aoq_id;
		foreach($this->super_model->select_row_where("aoq_header", "aoq_id", $aoq_id) AS $head){
			$department=$this->super_model->select_column_where('department','department_name','department_id', $head->department_id);
			$enduse=$this->super_model->select_column_where('enduse','enduse_name','enduse_id', $head->enduse_id);
			$purpose=$this->super_model->select_column_where('purpose','purpose_name','purpose_id', $head->purpose_id);
			$requested=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->requested_by);
			$noted=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->noted_by);
			$approved=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->approved_by);
			$prepared=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->prepared_by);
			$data['head'][] = array(
				'aoq_id'=>$head->aoq_id,
				'aoq_date'=>$head->aoq_date,
				'pr'=>$head->pr_no,
				'department'=>$department,
				'enduse'=>$enduse,
				'purpose'=>$purpose,
				'date_needed'=>$head->date_needed,
				'requested'=>$requested,
				'remarks'=>$head->remarks,
				'prepared'=>$prepared,

			);
			$data['noted'] = $noted;
			$data['approved'] = $approved;
			$data['requested'] = $requested;
			$data['saved']=$head->saved;
			$data['completed']=$head->completed;
		}

		foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $aoq_id) AS $rfq){
			//echo $rfq->rfq_id;
			$supplier_id=$this->super_model->select_column_where('rfq_head','supplier_id','rfq_id', $rfq->rfq_id);
			$supplier=$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $supplier_id);
			$contact=$this->super_model->select_column_where('vendor_head','contact_person','vendor_id', $supplier_id);
			$phone=$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $supplier_id);
			$validity=$this->super_model->select_column_where('rfq_head','price_validity','rfq_id', $rfq->rfq_id);
			$terms=$this->super_model->select_column_where('rfq_head','payment_terms','rfq_id', $rfq->rfq_id);
			$delivery=$this->super_model->select_column_where('rfq_head','delivery_date','rfq_id', $rfq->rfq_id);
			$warranty=$this->super_model->select_column_where('rfq_head','warranty','rfq_id', $rfq->rfq_id);
			$data['supplier'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'supplier_id'=>$supplier_id,
				'supplier_name'=>$supplier,
				'contact'=>$contact,
				'phone'=>$phone,
				'validity'=>$validity,
				'terms'=>$terms,
				'delivery'=>$delivery,
				'warranty'=>$warranty
			);
		}

		foreach($this->super_model->select_row_where("aoq_items", "aoq_id", $aoq_id) AS $items){
			$item_name=$this->super_model->select_column_where('item','item_name','item_id', $items->item_id);
			$specs=$this->super_model->select_column_where('item','item_specs','item_id', $items->item_id);
			$uom=$this->super_model->select_column_where('item','uom','item_id', $items->item_id);
			$min =$this->super_model->get_min_where('rfq_detail','unit_price',"item_id = '$items->item_id' AND unit_price != '0'");
			
			$item = $item_name . ", " .$specs;
			$data['aoq_item'][]=array(
				'item_id'=>$items->item_id,
				'item'=>$item,
				'uom'=>$uom,
				'qty'=>$items->quantity,
				'min'=>$min
			);
		}

		$data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
		$data['items']=$this->super_model->select_all_order_by("item", "item_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('aoq/aoq_prnt_five',$data);
        $this->load->view('template/footer');
    }

     public function aoq_prnt_four(){
		$aoq_id=$this->uri->segment(3);
		$data['aoq_id']=$aoq_id;
		foreach($this->super_model->select_row_where("aoq_header", "aoq_id", $aoq_id) AS $head){
			$department=$this->super_model->select_column_where('department','department_name','department_id', $head->department_id);
			$enduse=$this->super_model->select_column_where('enduse','enduse_name','enduse_id', $head->enduse_id);
			$purpose=$this->super_model->select_column_where('purpose','purpose_name','purpose_id', $head->purpose_id);
			$requested=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->requested_by);
			$noted=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->noted_by);
			$approved=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->approved_by);
			$prepared=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->prepared_by);
			$data['head'][] = array(
				'aoq_id'=>$head->aoq_id,
				'aoq_date'=>$head->aoq_date,
				'pr'=>$head->pr_no,
				'department'=>$department,
				'enduse'=>$enduse,
				'purpose'=>$purpose,
				'date_needed'=>$head->date_needed,
				'requested'=>$requested,
				'remarks'=>$head->remarks,
				'prepared'=>$prepared,

			);
			$data['noted'] = $noted;
			$data['approved'] = $approved;
			$data['requested'] = $requested;
			$data['saved']=$head->saved;
			$data['completed']=$head->completed;
		}

		foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $aoq_id) AS $rfq){
			//echo $rfq->rfq_id;
			$supplier_id=$this->super_model->select_column_where('rfq_head','supplier_id','rfq_id', $rfq->rfq_id);
			$supplier=$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $supplier_id);
			$contact=$this->super_model->select_column_where('vendor_head','contact_person','vendor_id', $supplier_id);
			$phone=$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $supplier_id);
			$validity=$this->super_model->select_column_where('rfq_head','price_validity','rfq_id', $rfq->rfq_id);
			$terms=$this->super_model->select_column_where('rfq_head','payment_terms','rfq_id', $rfq->rfq_id);
			$delivery=$this->super_model->select_column_where('rfq_head','delivery_date','rfq_id', $rfq->rfq_id);
			$warranty=$this->super_model->select_column_where('rfq_head','warranty','rfq_id', $rfq->rfq_id);
			$data['supplier'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'supplier_id'=>$supplier_id,
				'supplier_name'=>$supplier,
				'contact'=>$contact,
				'phone'=>$phone,
				'validity'=>$validity,
				'terms'=>$terms,
				'delivery'=>$delivery,
				'warranty'=>$warranty
			);
		}

		foreach($this->super_model->select_row_where("aoq_items", "aoq_id", $aoq_id) AS $items){
			$item_name=$this->super_model->select_column_where('item','item_name','item_id', $items->item_id);
			$specs=$this->super_model->select_column_where('item','item_specs','item_id', $items->item_id);
			$uom=$this->super_model->select_column_where('item','uom','item_id', $items->item_id);
			$min =$this->super_model->get_min_where('rfq_detail','unit_price',"item_id = '$items->item_id' AND unit_price != '0'");
			
			$item = $item_name . ", " .$specs;
			$data['aoq_item'][]=array(
				'item_id'=>$items->item_id,
				'item'=>$item,
				'uom'=>$uom,
				'qty'=>$items->quantity,
				'min'=>$min
			);
		}

		$data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
		$data['items']=$this->super_model->select_all_order_by("item", "item_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('aoq/aoq_prnt_four',$data);
        $this->load->view('template/footer');
    }

    public function add_item(){
    	$count=$this->input->post('count');
    	$aoq_id=$this->input->post('aoq_id');
    	$items = array(
    		'aoq_id'=>$aoq_id,
    		'item_id'=>$this->input->post('item'),
    		'quantity'=>$this->input->post('qty'),
    	);
    	
    	//$this->super_model->insert_into("aoq_items", $items);

    	if($this->super_model->insert_into("aoq_items", $items)){
    		if($count==3){
    			redirect(base_url().'aoq/aoq_prnt/'.$aoq_id);
    		} else if($count==4){
    			redirect(base_url().'aoq/aoq_prnt_four/'.$aoq_id);
    		} else if($count==5){
    			redirect(base_url().'aoq/aoq_prnt_five/'.$aoq_id, 'refresh');
    		}
    	}
    }

    public function get_rfq_item($column, $supplier, $item){
    	foreach($this->super_model->custom_query("SELECT rd.item_id, rd.offer, rd.unit_price, rd.recommended FROM rfq_head rh INNER JOIN rfq_detail rd ON rh.rfq_id = rd.rfq_id WHERE rh.supplier_id ='$supplier' AND rd.item_id = '$item'") AS $item){
    		if($column == 'item'){
    			$item_name=$this->super_model->select_column_where('item','item_name','item_id', $item->item_id);
    			$item_specs=$this->super_model->select_column_where('item','item_specs','item_id', $item->item_id);
    			$item_com = $item_name . ", ".$item_specs;
    			return $item_com;
    		} else {
    			return $item->$column;
    		}
    		
    	}
    }

    public function get_aoq_others($type, $supplier, $item, $aoq_id){
    	if($type=='reco'){
    		$rows = $this->super_model->count_custom_where("aoq_reco","supplier_id= '$supplier' AND item_id = '$item' AND aoq_id = '$aoq_id'");
    		return $rows;
    	} else if($type=='comments'){
    		$comment = $this->super_model->select_column_custom_where("aoq_comments", "comment", "supplier_id = '$supplier' AND item_id = '$item' AND aoq_id = '$aoq_id'");
    		return $comment;
    	}
    }

}

?>