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

<<<<<<< HEAD
    public function search_vendor(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        if(!empty($this->input->post('from'))){
            $data['from'] = $this->input->post('from');
        } else {
            $data['from']= "null";
        }

        if(!empty($this->input->post('to'))){
            $data['to'] = $this->input->post('to');
        } else {
            $data['to']= "null";
        }

        if(!empty($this->input->post('category'))){
            $data['category'] = $this->input->post('category');
        } else {
            $data['category'] = "null";
        }

        if(!empty($this->input->post('subcat'))){
            $data['subcat'] = $this->input->post('subcat');
        } else {
            $data['subcat'] = "null";
        }

        if(!empty($this->input->post('department'))){
            $data['department'] = $this->input->post('department');
        } else {
            $data['department'] = "null";
        }

        if(!empty($this->input->post('item'))){
            $data['item'] = $this->input->post('item');
        } else {
            $data['item'] = "null";
        } 

        if(!empty($this->input->post('brand'))){
            $data['brand'] = $this->input->post('brand');
        } else {
            $data['brand'] = "null";
        } 

        if(!empty($this->input->post('item_type'))){
            $data['item_type'] = $this->input->post('item_type');
        } else {
            $data['item_type'] = "null";
        } 

        if(!empty($this->input->post('model'))){
            $data['model'] = $this->input->post('model');
        } else {
            $data['model'] = "null";
        } 

        if(!empty($this->input->post('serial_no'))){
            $data['serial_no'] = $this->input->post('serial_no');
        } else {
            $data['serial_no'] = "null";
        } 

        if(!empty($this->input->post('damage'))){
            $data['damage'] = $this->input->post('damage');
        } else {
            $data['damage'] = "null";
        } 

        if(!empty($this->input->post('condition'))){
            $data['condition'] = $this->input->post('condition');
        } else {
            $data['condition'] = "null";
        }

        if(!empty($this->input->post('placement'))){
            $data['placement'] = $this->input->post('placement');
        } else {
            $data['placement'] = "null";
        }

        if(!empty($this->input->post('rack'))){
            $data['rack'] = $this->input->post('rack');
        } else {
            $data['rack'] = "null";
        }


        $sql="";
        $filter = " ";
        if(!empty($this->input->post('from')) && !empty($this->input->post('to'))){
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $sql.= " et_details.acquisition_date BETWEEN '$from' AND '$to' AND";
            $filter .= "Acquisition Date - ".$from.' <strong>To</strong> '.$to.", ";
        }

        if(!empty($this->input->post('category'))){
            $category = $this->input->post('category');
            $sql.=" et_head.category_id = '$category' AND";
            $cat = $this->super_model->select_column_where("category", "category_name", "category_id", $category);
            $filter .= "Category - ".$cat.", ";
        }

        if(!empty($this->input->post('subcat'))){
            $subcat = $this->input->post('subcat');
            $sql.=" et_head.subcat_id = '$subcat' AND";
            $subcat1 = $this->super_model->select_column_where("subcategory", "subcat_name", "subcat_id", $subcat);
            $filter .= "Sub Category - ".$subcat1.", ";
        }

        if(!empty($this->input->post('department'))){
            $department = $this->input->post('department');
            $sql.=" et_head.department LIKE '%$department%' AND";
            $filter .= "Department - ".$department.", ";
        }

        if(!empty($this->input->post('item'))){
            $item = $this->input->post('item');
            $sql.=" et_head.et_desc LIKE '%$item%' AND";
            $filter .= "Item Description - ".$item.", ";
        }

        if(!empty($this->input->post('brand'))){
            $brand = $this->input->post('brand');
            $sql.=" et_details.brand LIKE '%$brand%' AND";
            $filter .= "Brand - ".$brand.", ";
        }

        if(!empty($this->input->post('model'))){
            $model = $this->input->post('model');
            $sql.=" et_details.model LIKE '%$model%' AND";
            $filter .= "Model - ".$model.", ";
        }

        if(!empty($this->input->post('item_type'))){
            $item_type = $this->input->post('item_type');
            $sql.=" et_details.type LIKE '%$item_type%' AND";
            $filter .= "Type - ".$item_type.", ";
        }

        if(!empty($this->input->post('serial_no'))){
            $serial_no = $this->input->post('serial_no');
            $sql.=" et_details.serial_no LIKE '%$serial_no%' AND";
            $filter .= "Serial No. - ".$serial_no.", ";
        }

        if(!empty($this->input->post('damage'))){
            $damage = $this->input->post('damage');
            $sql.=" et_details.damage = '$damage' AND";
            $filter .= "Damage Items, ";
        }

        if(!empty($this->input->post('condition'))){
            $condition = $this->input->post('condition');
            $sql.=" et_details.physical_id = '$condition' AND";
            $physical = $this->super_model->select_column_where("physical_condition", "condition_name", "physical_id", $condition);
            $filter .= "Physical Condition - ".$physical.", ";
        }

        if(!empty($this->input->post('placement'))){
            $placement = $this->input->post('placement');
            $sql.=" et_details.placement_id = '$placement' AND";
            $place = $this->super_model->select_column_where("placement", "placement_name", "placement_id", $placement);
            $filter .= "Placement - ".$place.", ";
        }

        if(!empty($this->input->post('rack'))){
            $rack = $this->input->post('rack');
            $sql.=" et_details.rack_id = '$rack' AND";
            $rr = $this->super_model->select_column_where("rack", "rack_name", "rack_id", $rack);
            $filter .= "Rack - ".$rr.", ";
        }

        $query=substr($sql, 0, -3);
        $data['filt']=substr($filter, 0, -2);
        foreach ($this->super_model->select_custom_where('vendor_head', $query) AS $et){
                $unit =$this->super_model->select_column_where("unit", "unit_name", "unit_id", $et->unit_id);
                $accountability =$this->super_model->select_column_where("employees", "employee_name", "employee_id", $et->accountability_id);
                $category =$this->super_model->select_column_where("category", "category_name", "category_id", $et->category_id);
                $subcat =$this->super_model->select_column_where("subcategory", "subcat_name", "subcat_id", $et->subcat_id);
                $asset_control_no =$this->super_model->select_column_where("et_details", "asset_control_no", "et_id", $et->et_id);
                $acquisition_date =$this->super_model->select_column_where("et_details", "acquisition_date", "et_id", $et->et_id);
                $damage =$this->super_model->select_column_where("et_details", "damage", "et_id", $et->et_id);
                $serial_no =$this->super_model->select_column_where("et_details", "serial_no", "et_id", $et->et_id);
                $brand =$this->super_model->select_column_where("et_details", "brand", "et_id", $et->et_id);
                $date_issued =$this->super_model->select_column_where("et_details", "date_issued", "et_id", $et->et_id);
                $data['main'][] = array(
                    'et_id'=>$et->et_id,
                    'cat'=>$category,
                    'subcat'=>$subcat,
                    'department'=>$et->department,
                    'unit'=>$unit,
                    'damaged'=>$damage,
                    'asset_control'=>$asset_control_no,
                    'acquisition_date'=>$acquisition_date,
                    'date_issued'=>$date_issued,
                    'et_desc'=>$et->et_desc,
                    'qty'=>$et->qty,
                    'accountability'=>$accountability,
                    'employee_id'=>$et->accountability_id
                );
        }
        $this->load->view('vendors/vendor_list',$data);
        $this->load->view('template/footer');
    }
=======
    public function rfq_outgoing(){
        $this->load->view('vendors/rfq_outgoing');
    }
    
	
>>>>>>> edbb015023cc8b1c6a2d20a3f72bf344ffea659a
}

?>