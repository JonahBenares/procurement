<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

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
	public function view_vendors_per_item(){
        $this->load->view('template/header');
        $id=$this->uri->segment(3);
        foreach($this->super_model->select_row_where('vendor_head','vendor_id',$id) AS $vd){
            $data['vendors'][]=array(
                'vendor_id'=>$vd->vendor_id,
                'vendor'=>$vd->vendor_name,
                'phn_no'=>$vd->phone_number,
                'fax'=>$vd->fax_number,
                'email'=>$vd->email,
                'address'=>$vd->address,
                'contact_person'=>$vd->contact_person,
                'type'=>$vd->type,
                'terms'=>$vd->terms,
                'notes'=>$vd->notes,
            );
        }
        $this->load->view('vendors/view_vendors_per_item',$data);
        $this->load->view('template/footer');
    }

    public function vendor_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['vendors'] = $this->super_model->select_all_order_by('vendor_head', 'vendor_name', 'ASC');
        $this->load->view('vendors/vendor_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_vendor(){
        $vendor = trim($this->input->post('vendor')," ");
        $product = trim($this->input->post('product')," ");
        $address = trim($this->input->post('address')," ");
        $phone_num = trim($this->input->post('phone_num')," ");
        $fax_num = trim($this->input->post('fax_num')," ");
        $terms = trim($this->input->post('terms')," ");
        $type = trim($this->input->post('type')," ");
        $contact = trim($this->input->post('contact')," ");
        $note = trim($this->input->post('note')," ");
        $status = trim($this->input->post('status')," ");
        $data = array(
            'vendor_name'=>$vendor,
            'product_services'=>$product,
            'address'=>$address,
            'phone_number'=>$phone_num,
            'fax_number'=>$fax_num,
            'terms'=>$terms,
            'type'=>$type,
            'contact_person'=>$contact,
            'notes'=>$note,
            'status'=>$status,
        );
        if($this->super_model->insert_into("vendor_head", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/vendors/vendor_list'; </script>";
        }
    }

    public function update_vendor(){
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['vendor'] = $this->super_model->select_row_where('vendor_head', 'vendor_id', $id);
        $this->load->view('vendors/update_vendor',$data);
        $this->load->view('template/footer');
    }

    public function edit_vendor(){
        $data = array(
            'vendor_name'=>$this->input->post('vendor'),
            'product_services'=>$this->input->post('product'),
            'address'=>$this->input->post('address'),
            'phone_number'=>$this->input->post('phone'),
            'fax_number'=>$this->input->post('fax'),
            'terms'=>$this->input->post('terms'),
            'type'=>$this->input->post('type'),
            'contact_person'=>$this->input->post('contact'),
            'notes'=>$this->input->post('notes'),
            'status'=>$this->input->post('status'),
        );
        $vendor_id = $this->input->post('vendor_id');
            if($this->super_model->update_where('vendor_head', $data, 'vendor_id', $vendor_id)){
            echo "<script>alert('Successfully Updated!'); window.opener.location.reload(); window.close();</script>";
        }
    }

    public function delete_vendor(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('vendor_head', 'vendor_id', $id)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/vendors/vendor_list'; </script>";
        }
    }

    public function vendor_details(){
        $this->load->view('template/header');
        $id=$this->uri->segment(3);
        $data['vendor'] = $this->super_model->select_row_where('vendor_head', 'vendor_id', $id);
        $row = $this->super_model->count_rows_where("vendor_details",'vendor_id',$id);
        if($row!=0){
            foreach($this->super_model->select_row_where('vendor_details','vendor_id',$id) AS $v){
                foreach($this->super_model->select_row_where('item','item_id',$v->item_id) AS $vd){
                    $data['vendors'][]=array(
                        'item'=>$this->super_model->select_column_where('item','item_name','item_id',$v->item_id),
                    );
                }
            }
        }else {
            $data['vendors']=array();
        }
        $this->load->view('vendors/vendor_details',$data);
        $this->load->view('template/footer');
    }

    public function add_vendoritem(){
        $this->load->view('template/header');
        $this->load->view('vendors/add_vendoritem');
        $this->load->view('template/footer');
    }

    public function rfq_outgoing(){
        $this->load->view('vendors/rfq_outgoing');
    }
    
	
}

?>