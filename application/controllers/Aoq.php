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
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('aoq/aoq_list');
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

		redirect(base_url().'aoq/aoq_prnt/'.$aoq_id);

    }

	public function aoq_prnt(){
		$aoq_id=$this->uri->segment(3);
		$data['aoq_id']=$aoq_id;
		foreach($this->super_model->select_row_where("aoq_header", "aoq_id", $aoq_id) AS $head){
			$department=$this->super_model->select_column_where('department','department_name','department_id', $head->department_id);
			$enduse=$this->super_model->select_column_where('enduse','enduse_name','enduse_id', $head->enduse_id);
			$purpose=$this->super_model->select_column_where('purpose','purpose_name','purpose_id', $head->purpose_id);
			$requested=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->requested_by);
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
				'prepared'=>$prepared
			);
		}

		foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $aoq_id) AS $rfq){
			$supplier_id=$this->super_model->select_column_where('rfq_head','supplier_id','rfq_id', $rfq->rfq_id);
			$supplier=$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $supplier_id);
			$contact=$this->super_model->select_column_where('vendor_head','contact_person','vendor_id', $supplier_id);
			$phone=$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $supplier_id);
			$data['supplier'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'supplier_id'=>$supplier_id,
				'supplier_name'=>$supplier,
				'contact'=>$contact,
				'phone'=>$phone
			);
		}

		foreach($this->super_model->select_row_where("aoq_items", "aoq_id", $aoq_id) AS $items){
			$item_name=$this->super_model->select_column_where('item','item_name','item_id', $items->item_id);
			$specs=$this->super_model->select_column_where('item','item_specs','item_id', $items->item_id);
			$item = $item_name . ", " .$specs;
			$data['aoq_item'][]=array(
				'item_id'=>$items->item_id,
				'item'=>$item,
				'qty'=>$items->quantity
			);
		}

		$data['items']=$this->super_model->select_all_order_by("item", "item_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('aoq/aoq_prnt',$data);
        $this->load->view('template/footer');
    }


    public function aoq_prnt_five(){
		$aoq_id=$this->uri->segment(3);
		$data['aoq_id']=$aoq_id;
		foreach($this->super_model->select_row_where("aoq_header", "aoq_id", $aoq_id) AS $head){
			$department=$this->super_model->select_column_where('department','department_name','department_id', $head->department_id);
			$enduse=$this->super_model->select_column_where('enduse','enduse_name','enduse_id', $head->enduse_id);
			$purpose=$this->super_model->select_column_where('purpose','purpose_name','purpose_id', $head->purpose_id);
			$requested=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->requested_by);
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
				'prepared'=>$prepared
			);
		}

		foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $aoq_id) AS $rfq){
			$supplier_id=$this->super_model->select_column_where('rfq_head','supplier_id','rfq_id', $rfq->rfq_id);
			$supplier=$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $supplier_id);
			$contact=$this->super_model->select_column_where('vendor_head','contact_person','vendor_id', $supplier_id);
			$phone=$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $supplier_id);
			$data['supplier'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'supplier_id'=>$supplier_id,
				'supplier_name'=>$supplier,
				'contact'=>$contact,
				'phone'=>$phone
			);
		}

		foreach($this->super_model->select_row_where("aoq_items", "aoq_id", $aoq_id) AS $items){
			$item_name=$this->super_model->select_column_where('item','item_name','item_id', $items->item_id);
			$specs=$this->super_model->select_column_where('item','item_specs','item_id', $items->item_id);
			$item = $item_name . ", " .$specs;
			$data['aoq_item'][]=array(
				'item_id'=>$items->item_id,
				'item'=>$item,
				'qty'=>$items->quantity
			);
		}

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
				'prepared'=>$prepared
			);
		}

		foreach($this->super_model->select_row_where("aoq_rfq", "aoq_id", $aoq_id) AS $rfq){
			$supplier_id=$this->super_model->select_column_where('rfq_head','supplier_id','rfq_id', $rfq->rfq_id);
			$supplier=$this->super_model->select_column_where('vendor_head','vendor_name','vendor_id', $supplier_id);
			$contact=$this->super_model->select_column_where('vendor_head','contact_person','vendor_id', $supplier_id);
			$phone=$this->super_model->select_column_where('vendor_head','phone_number','vendor_id', $supplier_id);
			$data['supplier'][] = array(
				'rfq_id'=>$rfq->rfq_id,
				'supplier_id'=>$supplier_id,
				'supplier_name'=>$supplier,
				'contact'=>$contact,
				'phone'=>$phone
			);
		}

		foreach($this->super_model->select_row_where("aoq_items", "aoq_id", $aoq_id) AS $items){
			$item_name=$this->super_model->select_column_where('item','item_name','item_id', $items->item_id);
			$specs=$this->super_model->select_column_where('item','item_specs','item_id', $items->item_id);
			$item = $item_name . ", " .$specs;
			$data['aoq_item'][]=array(
				'item_id'=>$items->item_id,
				'item'=>$item,
				'qty'=>$items->quantity
			);
		}

		$data['items']=$this->super_model->select_all_order_by("item", "item_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('aoq/aoq_prnt_four',$data);
        $this->load->view('template/footer');
    }

    public function add_item(){
    	$aoq_id=$this->input->post('aoq_id');
    	$items = array(
    		'aoq_id'=>$aoq_id,
    		'item_id'=>$this->input->post('item'),
    		'quantity'=>$this->input->post('qty'),
    	);
    	
    	//$this->super_model->insert_into("aoq_items", $items);

    	if($this->super_model->insert_into("aoq_items", $items)){
    		redirect(base_url().'aoq/aoq_prnt/'.$aoq_id);
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

}

?>