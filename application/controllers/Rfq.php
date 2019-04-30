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
		$head = array(
			'rfq_id'=>$rfq_id,
			'rfq_date'=>$timestamp,
			'supplier_id'=>$vendor_id,
			'prepared_by'=>$_SESSION['user_id'],
			'create_date'=>$timestamp
		);
		if($this->super_model->insert_into("rfq_head", $head)){
			foreach($item_id AS $id){
				$details = array(
					'rfq_id'=>$rfq_id,
					'item_id'=>$id
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
	 		$noted=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->noted_by); 
	 		$approved=$this->super_model->select_column_where('employees','employee_name','employee_id', $head->approved_by);
	 		$data['head'][] = array(
	 			'due_date'=>$head->due_date,
	 			'rfq_date'=>$head->rfq_date,
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
	 			'unit'=>$this->super_model->select_column_where('item','uom','item_id', $detail->item_id) 
	 		);
	 	}

	 	$data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");


        $this->load->view('rfq/rfq_outgoing',$data);
    }

    public function save_rfq(){
    	$rfq_id = $this->input->post('rfq_id');
    	$data = array(
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
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('rfq/rfq_list');
        $this->load->view('template/footer');
    }

    public function rfq_incoming(){
        $this->load->view('rfq/rfq_incoming');
    }

}

?>