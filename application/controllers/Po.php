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
        $supplier=$this->super_model->select_column_where('po_head', 'supplier_id', 'po_id', $po_id);
        $data['saved']=$this->super_model->select_column_where('po_head', 'saved', 'po_id', $po_id);
        $data['notes']=$this->super_model->select_column_where('po_head', 'notes', 'po_id', $po_id);
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
            foreach($this->super_model->select_row_where("aoq_header", "pr_no", $prdet->pr_no) AS $list){
               foreach($this->super_model->select_custom_where("aoq_reco", "aoq_id = '$list->aoq_id' AND supplier_id = '$supplier'") AS $reco){
                $unit_id=$this->super_model->select_column_where('item', 'unit_id', 'item_id', $reco->item_id);
                    $data['items'][] = array(
                        'pr_no'=>$list->pr_no,
                        'reco_id'=>$reco->aoq_reco_id,
                        'item_id'=>$reco->item_id,
                        'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $reco->item_id),
                        'item_specs'=>$this->super_model->select_column_where('item', 'item_specs', 'item_id', $reco->item_id),
                        'offer'=>$reco->offer,
                        'unit'=>$this->super_model->select_column_where('unit', 'unit_name', 'unit_id', $unit_id),
                        'price'=>$reco->unit_price,
                        'quantity'=>$reco->balance,
                        'aoq_id'=>$reco->aoq_id
                    );
               }

             }
        }

        $data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
        $this->load->view('template/header');        
        $this->load->view('po/purchase_order',$data);
        $this->load->view('template/footer');
    }


    public function purchase_order_override(){
        $po_id=$this->uri->segment(3);
        $data['po_id']=$po_id;
        $supplier=$this->super_model->select_column_where('po_head', 'supplier_id', 'po_id', $po_id);
        $data['saved']=$this->super_model->select_column_where('po_head', 'saved', 'po_id', $po_id);
        $data['notes']=$this->super_model->select_column_where('po_head', 'notes', 'po_id', $po_id);
        $approved_id=$this->super_model->select_column_where('po_head', 'approved_by', 'po_id', $po_id);
        $data['approved_id']=$approved_id;
       // $data['approved']=$this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $approved_id);
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
            foreach($this->super_model->select_row_where("po_items", "po_pr_id", $prdet->po_pr_id) AS $pritems){
                $unit_id=$this->super_model->select_column_where('item', 'unit_id', 'item_id', $pritems->item_id);
                $data['items'][]=array(
                    'po_items_id'=>$pritems->po_items_id,
                    'reco_id'=>$pritems->aoq_reco_id,
                    'po_pr_id'=>$pritems->po_pr_id,
                    'item_id'=>$pritems->item_id,
                    'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $pritems->item_id),
                    'item_specs'=>$this->super_model->select_column_where('item', 'item_specs', 'item_id', $pritems->item_id),
                    'offer'=>$pritems->offer,
                    'quantity'=>$pritems->quantity,
                    'price'=>$pritems->unit_price,
                    'unit'=>$this->super_model->select_column_where('unit', 'unit_name', 'unit_id', $unit_id),
                );
            }
        }

        $data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
        $this->load->view('template/header');        
        $this->load->view('po/purchase_order_override',$data);
        $this->load->view('template/footer');
    }

    public function purchase_order_saved(){
        $po_id=$this->uri->segment(3);
        $data['po_id']=$po_id;
        $supplier=$this->super_model->select_column_where('po_head', 'supplier_id', 'po_id', $po_id);
        $data['saved']=$this->super_model->select_column_where('po_head', 'saved', 'po_id', $po_id);
        $data['cancelled']=$this->super_model->select_column_where('po_head', 'cancelled', 'po_id', $po_id);
        $approved_id=$this->super_model->select_column_where('po_head', 'approved_by', 'po_id', $po_id);
        $data['approved']=$this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $approved_id);
        $data['notes']=$this->super_model->select_column_where('po_head', 'notes', 'po_id', $po_id);
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
            foreach($this->super_model->select_row_where("po_items", "po_pr_id", $prdet->po_pr_id) AS $pritems){
                $unit_id=$this->super_model->select_column_where('item', 'unit_id', 'item_id', $pritems->item_id);
                $data['items'][]=array(

                    'po_pr_id'=>$pritems->po_pr_id,
                    'item_id'=>$pritems->item_id,
                    'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $pritems->item_id),
                    'item_specs'=>$this->super_model->select_column_where('item', 'item_specs', 'item_id', $pritems->item_id),
                    'offer'=>$pritems->offer,
                    'quantity'=>$pritems->quantity,
                    'price'=>$pritems->unit_price,
                    'unit'=>$this->super_model->select_column_where('unit', 'unit_name', 'unit_id', $unit_id),
                );
            }
        }

        $data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
        $this->load->view('template/header');        
        $this->load->view('po/purchase_order_saved',$data);
        $this->load->view('template/footer');
    }


    public function override_po(){
        $po_id=$this->uri->segment(3);
         $data = array(
            'saved'=>0
        );

        if($this->super_model->update_where("po_head", $data, "po_id", $po_id)){
            redirect(base_url().'po/purchase_order_override/'.$po_id);
        }
    }

    public function cancelled_po(){
        $this->load->view('template/header');        
        $this->load->view('template/navbar');        
        $this->load->view('po/cancelled_po');
        $this->load->view('template/footer');
    }


    public function cancel_po(){
        $po_id=$this->input->post('po_id');
        $reason=$this->input->post('reason');
        $create = date('Y-m-d H:i:s');

        foreach($this->super_model->select_row_where("po_items", "po_id", $po_id) AS $items){
            $cur_balance = $this->super_model->select_column_where('aoq_reco', 'balance', 'aoq_reco_id', $items->aoq_reco_id);
            $new_balance = $cur_balance + $items->quantity;

            $new_qty = array(
                'balance'=>$new_balance
            );
            if($this->super_model->update_where("aoq_reco", $new_qty, "aoq_reco_id", $items->aoq_reco_id));
        }

        $data = array(
            'cancelled'=>1,
            'cancel_reason'=>$reason,
            'cancelled_date'=>$create
        );

        if($this->super_model->update_where("po_head", $data, "po_id", $po_id)){
            redirect(base_url().'po/po_list', 'refresh');
        }
    }

     public function cancel_and_duplicate(){
        $po_id=$this->input->post('po_id');
        $create = date('Y-m-d H:i:s');

        foreach($this->super_model->select_row_where("po_items", "po_id", $po_id) AS $items){
            $cur_balance = $this->super_model->select_column_where('aoq_reco', 'balance', 'aoq_reco_id', $items->aoq_reco_id);
            $new_balance = $cur_balance + $items->quantity;

            $new_qty = array(
                'balance'=>$new_balance
            );
            if($this->super_model->update_where("aoq_reco", $new_qty, "aoq_reco_id", $items->aoq_reco_id));
        }

        $po = $this->super_model->get_max("po_head", "po_id");
        $next_po = $po + 1;
           foreach($this->super_model->select_row_where("po_head", "po_id", $po_id) AS $header){
                $head = array(
                    'po_id'=>$next_po,
                    'po_date'=>$header->po_date,
                    'po_no'=>$header->po_no,
                    'supplier_id'=>$header->supplier_id,
                    'notes'=>$header->notes,
                    'prepared_by'=>$header->prepared_by,
                    'approved_by'=>$header->approved_by,
                    'saved'=>'1'
                );
                $this->super_model->insert_into("po_head", $head);
           }

            foreach($this->super_model->select_row_where("po_pr", "po_id", $po_id) AS $popr){
                $po_pr_id = $this->super_model->get_max("po_pr", "po_pr_id");
                $next_po_pr = $po_pr_id + 1;
                $pr = array(
                    'po_pr_id'=>$next_po_pr,
                    'po_id'=>$next_po,
                    'pr_no'=>$popr->pr_no,
                    'requested_by'=>$popr->requested_by,
                    'enduse_id'=>$popr->enduse_id,
                    'purpose_id'=>$popr->purpose_id,
                );
                $this->super_model->insert_into("po_pr", $pr);
                foreach($this->super_model->select_row_where("po_items", "po_pr_id", $popr->po_pr_id) AS $poitems){
                    $items = array(
                        'po_pr_id'=>$next_po_pr,
                        'po_id'=>$next_po,
                        'aoq_reco_id'=>$poitems->aoq_reco_id,
                        'item_id'=>$poitems->item_id,
                        'offer'=>$poitems->offer,
                        'quantity'=>$poitems->quantity,
                        'unit_price'=>$poitems->unit_price,
                    );
                      $this->super_model->insert_into("po_items", $items);
                }
           }

        $data = array(
            'cancelled'=>1,
            'cancel_reason'=>$this->input->post('reason'),
            'cancelled_date'=>$create
        );

        if($this->super_model->update_where("po_head", $data, "po_id", $po_id)){
            redirect(base_url().'po/po_list', 'refresh');
        }
    }

    public function po_list(){
        $data['supplier']=$this->super_model->select_all_order_by("vendor_head", "vendor_name", "ASC");
       
         foreach($this->super_model->select_custom_where("po_head", "saved='1' AND cancelled='0' ORDER BY po_id DESC") AS $head){
             $pr='';
            foreach($this->super_model->select_row_where("po_pr", "po_id", $head->po_id) AS $prd){
            $pr .= "-".$prd->pr_no."<br>";
            }
            $data['header'][]=array(
                'po_id'=>$head->po_id,
                'po_date'=>$head->po_date,
                'po_no'=>$head->po_no,
                'supplier'=>$this->super_model->select_column_where('vendor_head', 'vendor_name', 'vendor_id', $head->supplier_id),
                'supplier_id'=>$head->supplier_id,
                'pr'=>$pr
              
            );


        }
        $this->load->view('template/header');   
        $this->load->view('template/navbar');     
        $this->load->view('po/po_list',$data);
        $this->load->view('template/footer');
    }

 
    public function remove_pr(){
        $po_pr_id=$this->uri->segment(3);
        $po_id=$this->uri->segment(4);
        if($this->super_model->delete_where("po_pr", "po_pr_id", $po_pr_id)){
            redirect(base_url().'po/purchase_order/'.$po_id, 'refresh');
        }
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
            'notes'=>$this->input->post('notes'),
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
    public function rfd_prnt(){
        $this->load->view('template/header');        
        $this->load->view('po/rfd_prnt');
        $this->load->view('template/footer');
    }

    public function add_itempo(){
        $pr_no=$this->uri->segment(3);
        $supplier=$this->uri->segment(4);
        $data['pr_no']=$pr_no;
        $data['supplier']=$supplier;

        foreach($this->super_model->select_row_where("aoq_header", "pr_no", $pr_no) AS $list){
           foreach($this->super_model->select_custom_where("aoq_reco", "aoq_id = '$list->aoq_id' AND supplier_id = '$supplier'") AS $reco){
                $data['items'][] = array(
                    'reco_id'=>$reco->aoq_reco_id,
                    'item_id'=>$reco->item_id,
                    'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $reco->item_id),
                    'item_specs'=>$this->super_model->select_column_where('item', 'item_specs', 'item_id', $reco->item_id),
                    'offer'=>$reco->offer,
                    'price'=>$reco->unit_price,
                    'quantity'=>$reco->quantity,
                    'aoq_id'=>$reco->aoq_id
                );
           }

        }
        $this->load->view('template/header');        
        $this->load->view('po/add_itempo',$data);
        $this->load->view('template/footer');
    }

     public function po_complete(){
        $count_item = $this->input->post('count_item');
        $poid = $this->input->post('po_id');
        $create=date('Y-m-d H:i:s');
        $prepared_by = $this->input->post('prepared_by');
        for($x=1;$x<$count_item;$x++){
            $qty = $this->input->post('quantity'.$x);
            $po_pr_id = $this->input->post('po_pr_id'.$x);
            $aoq_reco_id = $this->input->post('reco_id'.$x);
            if($qty!=0){
                $count_exist = $this->super_model->count_custom_where("po_items","po_pr_id = '$po_pr_id' AND po_id = '$poid' AND aoq_reco_id = '$aoq_reco_id'" );
                if($count_exist==0){
                    
                        $data =array(
                            'po_pr_id'=>$po_pr_id,
                            'po_id'=>$this->input->post('po_id'),
                            'aoq_reco_id'=>$aoq_reco_id,
                            'item_id'=>$this->input->post('item_id'.$x),
                            'offer'=>$this->input->post('offer'.$x),
                            'quantity'=>$qty,
                            'unit_price'=>$this->input->post('price'.$x)
                        );
                    if($this->super_model->insert_into("po_items", $data)){
                        $balance= $this->super_model->select_column_where('aoq_reco', 'balance', 'aoq_reco_id', $aoq_reco_id);
                        $new_balance = $balance - $qty;
                        $reco = array(
                            'balance'=>$new_balance
                        );
                        $this->super_model->update_where("aoq_reco", $reco, "aoq_reco_id", $aoq_reco_id); 
                    }
                } else {
                       $data =array(
                            'quantity'=>$qty,
                            'unit_price'=>$this->input->post('price'.$x)
                        );

                     if($this->super_model->update_custom_where("po_items", $data, "po_pr_id = '$po_pr_id' AND po_id = '$poid' AND aoq_reco_id = '$aoq_reco_id'")){
                        $balance= $this->super_model->select_column_where('aoq_reco', 'balance', 'aoq_reco_id', $aoq_reco_id);
                        $new_balance = $balance - $qty;
                        $reco = array(
                            'balance'=>$new_balance
                        );
                        $this->super_model->update_where("aoq_reco", $reco, "aoq_reco_id", $aoq_reco_id); 
                    }
                }

            } 
        }

        $head_rows = $this->super_model->count_rows("dr_head");
            if($head_rows==0){
            $dr_id=1;
            $dr_no = 1000;
        } else {
            $maxid=$this->super_model->get_max("dr_head", "dr_id");
            $maxno=$this->super_model->get_max("dr_head", "dr_no");
            $dr_id=$maxid+1;
            $dr_no = $maxno + 1;
        }

        $drhead = array(
            'dr_id'=>$dr_id,
            'dr_no'=>$dr_no,
            'po_id'=>$poid,
            'prepared_by'=>$prepared_by,
            'create_date'=>$create
        );
        $this->super_model->insert_into("dr_head", $drhead);

       foreach($this->super_model->select_row_where("po_pr", "po_id", $poid) AS $list){
         $head_details = $this->super_model->count_rows("dr_details");
            if($head_details==0){
            $dr_details_id=1;
         } else {
            $maxdetid=$this->super_model->get_max("dr_details", "dr_details_id");
            $dr_details_id=$maxdetid+1;
         }

            $drdetails = array(
                'dr_details_id'=>$dr_details_id,
                'dr_id'=>$dr_id,
                'pr_no'=>$list->pr_no,
                'po_pr_id'=>$list->po_pr_id,
            );

            if($this->super_model->insert_into("dr_details", $drdetails)){
                 foreach($this->super_model->select_row_where("po_items", "po_pr_id", $list->po_pr_id) AS $it){
                    $dritems = array(
                        'dr_details_id'=>$dr_details_id,
                        'dr_id'=>$dr_id,
                        'po_items_id'=>$it->po_items_id,
                    );

                    $this->super_model->insert_into("dr_items", $dritems);
                 }
            }
       }


        $head =array(
            'saved'=>1,
            'approved_by'=>$this->input->post('approved')
        );

        if($this->super_model->update_where("po_head", $head, "po_id", $poid)){
            redirect(base_url().'po/purchase_order_saved/'.$poid);
        }
    }

    public function po_override(){
        $count_item = $this->input->post('count_item');
        $poid = $this->input->post('po_id');
        $prepared_by = $this->input->post('prepared_by');
        for($x=1;$x<$count_item;$x++){
            $qty = $this->input->post('quantity'.$x);
            $po_items_id = $this->input->post('po_items_id'.$x);
            $aoq_reco_id = $this->input->post('reco_id'.$x);

            foreach($this->super_model->select_row_where("po_items", "po_items_id", $po_items_id) AS $list){
                $old_qty = $list->quantity;
                $old_balance= $this->super_model->select_column_where('aoq_reco', 'balance', 'aoq_reco_id', $list->aoq_reco_id);
                $new_balance = $old_qty + $old_balance;

                $replenish = array(
                    'balance'=>$new_balance
                );
                $this->super_model->update_custom_where("aoq_reco", $replenish, "aoq_reco_id = '$list->aoq_reco_id'");

            }
            if($qty!=0){
             
                       $data =array(
                            'quantity'=>$qty,
                            'unit_price'=>$this->input->post('price'.$x)
                        );

                     if($this->super_model->update_custom_where("po_items", $data, "po_items_id = '$po_items_id'")){
                        $balance= $this->super_model->select_column_where('aoq_reco', 'balance', 'aoq_reco_id', $aoq_reco_id);
                        $new_balance = $balance - $qty;
                        $reco = array(
                            'balance'=>$new_balance
                        );
                        $this->super_model->update_where("aoq_reco", $reco, "aoq_reco_id", $aoq_reco_id); 
                    }
                }


            } 
        

        $head =array(
            'saved'=>1,
            'approved_by'=>$this->input->post('approved')
        );

        if($this->super_model->update_where("po_head", $head, "po_id", $poid)){
            redirect(base_url().'po/purchase_order_saved/'.$poid);
        }
    }

}

?>