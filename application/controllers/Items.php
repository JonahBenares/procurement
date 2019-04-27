<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

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

	public function item_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['item'] = $this->super_model->select_all_order_by('item', 'item_name', 'ASC');
        $this->load->view('items/item_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_item(){
        $item = trim($this->input->post('item')," ");
        $spec = trim($this->input->post('spec')," ");
        $brand = trim($this->input->post('brand')," ");
        $pn = trim($this->input->post('pn')," ");
        $data = array(
            'item_name'=>$item,
            'item_specs'=>$spec,
            'brand_name'=>$brand,
            'part_no'=>$pn,
        );
        if($this->super_model->insert_into("item", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/items/item_list'; </script>";
        }
    }

    public function update_item(){
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['item'] = $this->super_model->select_row_where('item', 'item_id', $id);
        $this->load->view('items/update_item',$data);
        $this->load->view('template/footer');
    }

    public function edit_item(){
        $data = array(
            'item_name'=>$this->input->post('item'),
            'item_specs'=>$this->input->post('spec'),
            'brand_name'=>$this->input->post('brand'),
            'part_no'=>$this->input->post('pn'),
        );
        $item_id = $this->input->post('item_id');
            if($this->super_model->update_where('item', $data, 'item_id', $item_id)){
            echo "<script>alert('Successfully Updated!'); window.opener.location.reload(); window.close();</script>";
        }
    }

    public function delete_item(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('item', 'item_id', $id)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/items/item_list'; </script>";
        }
    }

    public function item_details(){
        $this->load->view('template/header');
        $id=$this->uri->segment(3);
        $data['item'] = $this->super_model->select_row_where('item', 'item_id', $id);
        $row = $this->super_model->count_rows_where("vendor_details",'item_id',$id);
        if($row!=0){
            foreach($this->super_model->select_row_where('vendor_details','item_id',$id) AS $v){
                foreach($this->super_model->select_row_where('vendor_head','vendor_id',$v->vendor_id) AS $vd){
                    $data['vendors'][]=array(
                        'vendor_id'=>$vd->vendor_id,
                        'vendor'=>$vd->vendor_name,
                        'phn_no'=>$vd->phone_number,
                        'address'=>$vd->address,
                        'terms'=>$vd->terms,
                        'notes'=>$vd->notes,
                    );
                }
            }
        }else {
            $data['vendors']=array();
        }
        $this->load->view('items/item_details',$data);
        $this->load->view('template/footer');
    }
}

?>