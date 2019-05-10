<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
        $this->load->model('super_model');
        date_default_timezone_set("Asia/Manila");
        
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

    public function purchase_order(){
        $po_id=$this->uri->segment(3);
        $data['po_id']=$po_id;
        foreach($this->super_model->select_row_where("po_head", "po_id", $po_id) AS $head){
            $data['head'][]=array(
                'po_date'=>$head->po_date,
                'po_no'=>$head->po_no,
                'supplier'=>$this->super_model->select_column_where('vendor_head', 'vendor_name', 'vendor_id', $head->supplier_id),
                'supplier_id'=>$head->supplier_id,
                'address'=>$this->super_model->select_column_where('vendor_head', 'address', 'vendor_id',$head->supplier_id),
                'phone'=>$this->super_model->select_column_where('vendor_head', 'phone_number', 'vendor_id', $head->supplier_id),
                'contact'=>$this->super_model->select_column_where('vendor_head', 'contact_person', 'vendor_id',$head->supplier_id)
            );
        }
        $data['pr'] = $this->super_model->select_row_where_order_by("aoq_header", "served", "0", "pr_no", "ASC");

        foreach($this->super_model->select_row_where("po_pr", "po_id", $po_id) AS $prdet){
            $purpose= $this->super_model->select_column_where('purpose', 'purpose_name', 'purpose_id', $prdet->purpose_id);
            $requestor= $this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $prdet->requested_by);
            $enduse= $this->super_model->select_column_where('enduse', 'enduse_name', 'enduse_id', $prdet->enduse_id);
            $data['prdetails'][]=array(
                'po_pr_id'=>$prdet->po_pr_id,
                'po_id'=>$prdet->po_id,
                'pr_no'=>$prdet->pr_no,
                'purpose'=>$purpose,
                'requestor'=>$requestor,
                'enduse'=>$enduse
              
            );
        }

        $this->load->view('template/header');        
        $this->load->view('po/purchase_order',$data);
        $this->load->view('template/footer');
    }

    public function po_list(){
        $data['supplier']=$this->super_model->select_all_order_by("vendor_head", "vendor_name", "ASC");
        $this->load->view('template/header');   
        $this->load->view('template/navbar');     
        $this->load->view('po/po_list',$data);
        $this->load->view('template/footer');
    }

    public function getsupplier(){

        $supplier = $this->input->post('supplier');
        $address= $this->super_model->select_column_where('vendor_head', 'address', 'vendor_id', $supplier);
        $phone= $this->super_model->select_column_where('vendor_head', 'phone_number', 'vendor_id', $supplier);
        $contact= $this->super_model->select_column_where('vendor_head', 'contact_person', 'vendor_id', $supplier);
        
        $return = array('address' => $address, 'phone' => $phone, 'contact' => $contact);
        echo json_encode($return);
    
    }

    public function getpr(){

        $pr = $this->input->post('pr');
        foreach($this->super_model->select_custom_where("aoq_header", "pr_no = '$pr' AND served='0' ORDER BY pr_no ASC LIMIT 1") AS $head){
            $purpose= $this->super_model->select_column_where('purpose', 'purpose_name', 'purpose_id', $head->purpose_id);
            $requestor= $this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $head->requested_by);
            $enduse= $this->super_model->select_column_where('enduse', 'enduse_name', 'enduse_id', $head->enduse_id);
            $return = array('purpose' => $purpose, 'requestor' => $requestor, 'enduse' => $enduse, 'purpose_id' => $head->purpose_id, 'requestor_id' => $head->requested_by, 'enduse_id' => $head->enduse_id);
            echo json_encode($return);
        }
    
    }


    public function create_po(){
        $rows_head = $this->super_model->count_rows("po_head");
        if($rows_head==0){
            $po_id=1;
        } else {
            $max = $this->super_model->get_max("po_head", "po_id");
            $po_id = $max+1;
        }

        $data = array(
            'po_id'=>$po_id,
            'po_date'=>$this->input->post('po_date'),
            'po_no'=>$this->input->post('po_no'),
            'supplier_id'=>$this->input->post('supplier'),
            'prepared_by'=>$_SESSION['user_id']
        );
        if($this->super_model->insert_into("po_head", $data)){
            redirect(base_url().'po/purchase_order/'.$po_id);
        }
    }

    public function add_pr(){
        $po_id = $this->input->post('po_id');
         $data = array(
            'po_id'=>$this->input->post('po_id'),
            'pr_no'=>$this->input->post('pr'),
            'requested_by'=>$this->input->post('requested_by'),
            'enduse_id'=>$this->input->post('enduse_id'),
            'purpose_id'=>$this->input->post('purpose_id')
        );
        if($this->super_model->insert_into("po_pr", $data)){
            redirect(base_url().'po/purchase_order/'.$po_id, 'refresh');
        }
    }

    public function delivery_receipt(){
        $this->load->view('template/header');        
        $this->load->view('po/delivery_receipt');
        $this->load->view('template/footer');
    }

    public function add_itempo(){
        $this->load->view('template/header');        
        $this->load->view('po/add_itempo');
        $this->load->view('template/footer');
    }

}

?>