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
     

        $data['pr'] = $this->super_model->select_custom_where("aoq_header", "completed='1' AND served='0' ORDER BY pr_no ASC");

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
        $data['cancel_date']=$this->super_model->select_column_where('po_head', 'cancelled_date', 'po_id', $po_id);
        $data['cancel_reason']=$this->super_model->select_column_where('po_head', 'cancel_reason', 'po_id', $po_id);
        $data['revision']=$this->super_model->select_column_where('po_head', 'revision_no', 'po_id', $po_id);
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

    public function purchase_order_saved_r(){
        $this->load->view('template/header'); 
        $po_id=$this->uri->segment(3);
        $revise_no=$this->uri->segment(4);
        $data['po_id']=$po_id;
        $supplier=$this->super_model->select_column_custom_where('revised_po_head', 'supplier_id', "po_id = '$po_id' AND revision_no = '$revise_no'");
        $data['saved']=$this->super_model->select_column_custom_where('revised_po_head', 'saved', "po_id = '$po_id' AND revision_no = '$revise_no'");
        $data['cancelled']=$this->super_model->select_column_custom_where('revised_po_head', 'cancelled', "po_id = '$po_id' AND revision_no = '$revise_no'");
        $data['cancel_date']=$this->super_model->select_column_custom_where('revised_po_head', 'cancelled_date', "po_id = '$po_id' AND revision_no = '$revise_no'");
        $data['cancel_reason']=$this->super_model->select_column_custom_where('revised_po_head', 'cancel_reason', "po_id = '$po_id' AND revision_no = '$revise_no'");
        $data['revision']=$this->super_model->select_column_custom_where('revised_po_head', 'revision_no', "po_id = '$po_id' AND revision_no = '$revise_no'");
        $approved_id=$this->super_model->select_column_custom_where('revised_po_head', 'approved_by', "po_id = '$po_id' AND revision_no = '$revise_no'");
        $data['approved']=$this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $approved_id);
        $data['notes']=$this->super_model->select_column_custom_where('revised_po_head', 'notes', "po_id = '$po_id' AND revision_no = '$revise_no'");
        foreach($this->super_model->select_custom_where("revised_po_head", "po_id = '$po_id' AND revision_no = '$revise_no'") AS $head){
            $data['head'][]=array(
                'po_date'=>$head->po_date,
                'po_no'=>$head->po_no,
                'supplier'=>$this->super_model->select_column_where('vendor_head', 'vendor_name', 'vendor_id', $head->supplier_id),
                'supplier_id'=>$head->supplier_id,
                'address'=>$this->super_model->select_column_where('vendor_head', 'address', 'vendor_id',$head->supplier_id),
                'phone'=>$this->super_model->select_column_where('vendor_head', 'phone_number', 'vendor_id', $head->supplier_id),
                'contact'=>$this->super_model->select_column_where('vendor_head', 'contact_person', 'vendor_id',$head->supplier_id)
            );

            $data['pr'] = $this->super_model->select_row_where_order_by("aoq_header", "served", "0", "pr_no", "ASC");

            foreach($this->super_model->select_custom_where("revised_po_pr", "po_id ='$po_id' AND revision_no = '$revise_no'") AS $prdet){
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
            foreach($this->super_model->select_custom_where("revised_po_items", "po_id = '$head->po_id' AND revision_no = '$revise_no'") AS $pritems){
                $unit_id=$this->super_model->select_column_where('item', 'unit_id', 'item_id', $pritems->item_id);
                $data['items'][]=array(
                    'po_id'=>$pritems->po_id,
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
        $this->load->view('po/purchase_order_saved_r',$data);
        $this->load->view('template/footer');
    }


    public function revise_po(){
        $po_id=$this->uri->segment(3);
         $data = array(
            'saved'=>0
        );

        $rfd_data = array(
            'revised'=>1
        );
        $this->super_model->update_where("rfd", $rfd_data, "po_id", $po_id);

        if($this->super_model->update_where("po_head", $data, "po_id", $po_id)){
            redirect(base_url().'po/purchase_order_override/'.$po_id);
        }
    }

     public function revise_repeatpo(){
        $po_id=$this->uri->segment(3);
        $revision= $this->super_model->select_column_where('po_head', 'revision_no', 'po_id', $po_id);
        $next_revision = $revision+1;
         $data = array(
            'saved'=>0,
            'revision_no'=>$next_revision
        );

        $rfd_data = array(
            'revised'=>1
        );
        $this->super_model->update_where("rfd", $rfd_data, "po_id", $po_id);

        if($this->super_model->update_where("po_head", $data, "po_id", $po_id)){
            redirect(base_url().'po/reporder_prnt/'.$po_id);
        }
    }

    public function cancelled_po(){
        $this->load->view('template/header');        
        $this->load->view('template/navbar');
        $data['supplier']=$this->super_model->select_all_order_by("vendor_head", "vendor_name", "ASC");
        foreach($this->super_model->select_custom_where("po_head", "saved='1' AND cancelled='1' ORDER BY po_id DESC") AS $head){
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
                'cancelled'=>$head->cancelled,
                'cancel_reason'=>$head->cancel_reason,
                'cancelled_date'=>$head->cancelled_date,
                'pr'=>$pr
            );
        }       
        $this->load->view('po/cancelled_po',$data);
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

       /* foreach($this->super_model->select_row_where("po_items", "po_id", $po_id) AS $items){
            $cur_balance = $this->super_model->select_column_where('aoq_reco', 'balance', 'aoq_reco_id', $items->aoq_reco_id);
            $new_balance = $cur_balance + $items->quantity;

            $new_qty = array(
                'balance'=>$new_balance
            );
            if($this->super_model->update_where("aoq_reco", $new_qty, "aoq_reco_id", $items->aoq_reco_id));
        }*/

        $po = $this->super_model->get_max("po_head", "po_id");
        $next_po = $po + 1;
           foreach($this->super_model->select_row_where("po_head", "po_id", $po_id) AS $header){
                $head = array(
                    'po_id'=>$next_po,
                    'po_date'=>$header->po_date,
                    'po_no'=>$header->po_no,
                    'po_series'=>$header->po_series,
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
            'po_id'=>$next_po,
            'prepared_by'=>$_SESSION['user_id'],
            'create_date'=>$create
        );
        $this->super_model->insert_into("dr_head", $drhead);

       foreach($this->super_model->select_row_where("po_pr", "po_id", $next_po) AS $list){
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
             $rfd=$this->super_model->count_rows_where("rfd","po_id",$head->po_id);
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
                'pr'=>$pr,
                'repeat_order'=>$head->repeat_order,
                'done'=>$head->done_po,
                'revise'=>$head->revision_no,
                'rfd'=>$rfd
            );

            /*$poid = $this->input->post('poid');
            //$poid=$this->uri->segment(3);
            foreach($this->super_model->select_custom_where("revised_po_head", "po_id = '$poid'") AS $rev){
                $data['revise'][]=array(
                    'po_id'=>$rev->po_id,
                    'po_no'=>$rev->po_no,
                    'revised_date'=>$rev->revised_date,
                    'revision_no'=>$rev->revision_no,
                );
            }*/
        }
        $this->load->view('template/header');   
        $this->load->view('template/navbar');     
        $this->load->view('po/po_list',$data);
        $this->load->view('template/footer');
    }

    public function view_history(){
        $this->load->view('template/header');      
        $poid=$this->uri->segment(3);
        $po_no=$this->uri->segment(4);
        $data['po_no']=$po_no;
        $data['po_id']=$poid;

        $row = $this->super_model->count_rows_where("revised_po_head", "po_id",$poid);
        if($row!=0){
            foreach($this->super_model->select_custom_where("revised_po_head", "po_id = '$poid'") AS $rev){
                $data['revise'][]=array(
                    'po_id'=>$poid,
                    'po_no'=>$rev->po_no,
                    'revised_date'=>$rev->revised_date,
                    'revision_no'=>$rev->revision_no,
                );
            }
        }else {
            $data['revise']=array();
        }
        $this->load->view('po/view_history',$data);
        $this->load->view('template/footer');
    }

    public function update_done(){
        $poid=$this->uri->segment(3);
        $data = array(
            'done_po'=>1
        );

        if($this->super_model->update_where("po_head", $data, "po_id", $poid)){
            redirect(base_url().'po/po_list/', 'refresh');
        }
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

        $head_rows = $this->super_model->count_rows("po_head");
        if($head_rows==0){
            $po_no = 1000;
        } else {
            $maxno=$this->super_model->get_max("po_head", "po_series");
            $po_no = $maxno + 1;
        }

        $po_series = $this->input->post('po_no')."-".$po_no;
        $data = array(
            'po_id'=>$po_id,
            'po_date'=>$this->input->post('po_date'),
            'po_no'=>$po_series,
            'po_series'=>$po_no,
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
        $po_id=$this->uri->segment(3);
        $data['po_id']=$po_id;
        $data['po_date']=date('F j, Y', strtotime($this->super_model->select_column_where('po_head', 'po_date', 'po_id', $po_id)));
        $supplier_id=$this->super_model->select_column_where('po_head', 'supplier_id', 'po_id', $po_id);
        $data['cancelled']=$this->super_model->select_column_where('po_head', 'cancelled', 'po_id', $po_id);
        $supplier=$this->super_model->select_column_where('vendor_head', 'vendor_name', 'vendor_id', $supplier_id);
        foreach($this->super_model->select_row_where("dr_head", "po_id", $po_id) AS $head){
            $data['dr_no']=$head->dr_no;
            $data['po_no']=$this->super_model->select_column_where('po_head', 'po_no', 'po_id', $po_id);
            $data['prepared_by']=$this->super_model->select_column_where('users', 'fullname', 'user_id', $head->prepared_by);
        }

        foreach($this->super_model->select_row_where("po_pr", "po_id", $po_id) AS $prdet){
            $purpose= $this->super_model->select_column_where('purpose', 'purpose_name', 'purpose_id', $prdet->purpose_id);
            $requestor= $this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $prdet->requested_by);
            $enduse= $this->super_model->select_column_where('enduse', 'enduse_name', 'enduse_id', $prdet->enduse_id);
            $data['detail'][]=array(
                'po_pr_id'=>$prdet->po_pr_id,
                'pr_no'=>$prdet->pr_no,
                'purpose'=>$purpose,
                'requestor'=>$requestor,
                'enduse'=>$enduse
            );
         
            foreach($this->super_model->select_row_where('po_items', 'po_pr_id',$prdet->po_pr_id) AS $itm){
                $unit_id = $this->super_model->select_column_where('item', 'unit_id', 'item_id', $itm->item_id);
                $data['items'][] = array(
                    'po_pr_id'=>$itm->po_pr_id,
                    'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $itm->item_id),
                    'uom'=>$this->super_model->select_column_where('unit', 'unit_id', 'unit_id', $unit_id),
                    'supplier'=>$supplier,
                    'offer'=>$itm->offer,
                    'quantity'=>$itm->quantity,
                    'price'=>$itm->unit_price
                );   

            }
        }
        $this->load->view('template/header');        
        $this->load->view('po/delivery_receipt',$data);
        $this->load->view('template/footer');
    }



    public function rfd_prnt(){
        $po_id=$this->uri->segment(3);
        $data['po_id']=$po_id;
      //  $data['saved']=$this->super_model->select_column_where('rfd', 'saved', 'po_id', $po_id);
        $data['saved']= $this->super_model->select_count('rfd', 'po_id', $po_id);
        $data['cancelled']=$this->super_model->select_column_where('po_head', 'cancelled', 'po_id', $po_id);
        $data['revised']=$this->super_model->select_column_where('rfd', 'revised', 'po_id', $po_id);
        $saved=$this->super_model->select_column_where('rfd', 'saved', 'po_id', $po_id);
        $supplier_id=$this->super_model->select_column_where('po_head', 'supplier_id', 'po_id', $po_id);
        $supplier=$this->super_model->select_column_where('vendor_head', 'vendor_name', 'vendor_id', $supplier_id);
        $data['vat']=$this->super_model->select_column_where('vendor_head', 'vat', 'vendor_id', $supplier_id);
        $data['supplier_id']=$supplier_id; 
        $data['supplier']=$this->super_model->select_column_where('vendor_head', 'vendor_name', 'vendor_id', $supplier_id);
        $data['ewt']=$this->super_model->select_column_where('vendor_head', 'ewt', 'vendor_id', $supplier_id);
        $data['prepared']=$this->super_model->select_column_where('users', 'fullname', 'user_id', $_SESSION['user_id']);
        $data['po_no']=$this->super_model->select_column_where('po_head', 'po_no', 'po_id', $po_id);
        $data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");

        foreach($this->super_model->select_row_where("po_items", "po_id", $po_id) AS $itm){
             $unit_id = $this->super_model->select_column_where('item', 'unit_id', 'item_id', $itm->item_id);
             $data['items'][] = array(
                    'po_pr_id'=>$itm->po_pr_id,
                    'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $itm->item_id),
                    'item_specs'=>$this->super_model->select_column_where('item', 'item_specs', 'item_id', $itm->item_id),
                    'uom'=>$this->super_model->select_column_where('unit', 'unit_id', 'unit_id', $unit_id),
                    'supplier'=>$supplier,
                    'offer'=>$itm->offer,
                    'quantity'=>$itm->quantity,
                    'price'=>$itm->unit_price
             );   
        }

         foreach($this->super_model->select_row_where("po_pr", "po_id", $po_id) AS $prdet){
            $purpose= $this->super_model->select_column_where('purpose', 'purpose_name', 'purpose_id', $prdet->purpose_id);
            $requestor= $this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $prdet->requested_by);
            $enduse= $this->super_model->select_column_where('enduse', 'enduse_name', 'enduse_id', $prdet->enduse_id);
            $data['detail'][]=array(
                'po_pr_id'=>$prdet->po_pr_id,
                'pr_no'=>$prdet->pr_no,
                'purpose'=>$purpose,
                'requestor'=>$requestor,
                'enduse'=>$enduse
            );
        }

       
            foreach($this->super_model->select_row_where("rfd", "po_id", $po_id) AS $rfd){
                $data['company']=$rfd->company;
                $data['pay_to']=$this->super_model->select_column_where('vendor_head', 'vendor_name', 'vendor_id', $rfd->pay_to);
                $data['check_name']=$rfd->check_name;
                $data['apv_no']=$rfd->apv_no;
                $data['cash']=$rfd->cash;
                $data['check']=$rfd->check;
                $data['rfd_date']=$rfd->rfd_date;
                $data['due_date']=$rfd->due_date;
                $data['check_date']=$rfd->check_date;
                $data['bank_no']=$rfd->bank_no;
                $data['checked']=$this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $rfd->checked_by);
                $data['endorsed']=$this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $rfd->endorsed_by);
                $data['approved']=$this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $rfd->approved_by);
            }
     
        $this->load->view('template/header');        
        $this->load->view('po/rfd_prnt',$data);
        $this->load->view('template/footer');
    }



    public function save_rfd(){
        $po_id=$this->input->post('po_id');
        $cash = $this->input->post('cash');
        if($cash ==1){
            $cash=1;
            $check=0;
        } else {
            $cash=0;
            $check=1;
        }
        $data =array(
            'rfd_date'=>$this->input->post('rfd_date'),
            'apv_no'=>$this->input->post('apv_no'),
            'company'=>$this->input->post('company'),
            'pay_to'=>$this->input->post('supplier_id'),
            'check_name'=>$this->input->post('check_name'),
            'cash'=>$cash,
            'check'=>$check,
            'bank_no'=>$this->input->post('bank_no'),
            'po_id'=>$po_id,
            'check_date'=>$this->input->post('check_due'),
            'due_date'=>$this->input->post('due_date'),
            'gross_amount'=>$this->input->post('gross_amount'),
            'less_amount'=>$this->input->post('less_amount'),
            'net_amount'=>$this->input->post('net_amount'),
            'prepared_by'=>$_SESSION['user_id'],
            'checked_by'=>$this->input->post('checked'),
            'endorsed_by'=>$this->input->post('endorsed'),
            'approved_by'=>$this->input->post('approved'),
            'saved'=>'1'
        );
        if($this->super_model->insert_into("rfd", $data)){
            redirect(base_url().'po/rfd_prnt/'.$po_id, 'refresh');
        }
    }


    public function update_rfd(){
        $po_id=$this->input->post('po_id');
        $data = array(
            'rfd_date'=>$this->input->post('rfd_date'),
            'check_date'=>$this->input->post('check_due'),
            'due_date'=>$this->input->post('due_date'),
            'revised'=>0
        );
        if($this->super_model->update_where("rfd", $data, "po_id", $po_id)){
            redirect(base_url().'po/rfd_prnt/'.$po_id, 'refresh');
        }
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

        $this->save_revised($poid);

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
                          echo $aoq_reco_id. "= ".$balance. " - ". $qty ."= " . $new_balance ."<br>";
                        $reco = array(
                            'balance'=>$new_balance
                        );
                        $this->super_model->update_where("aoq_reco", $reco, "aoq_reco_id", $aoq_reco_id); 
                    }
                } else if($qty==0){
                    $this->super_model->delete_where("po_items", "po_items_id", $po_items_id);
                }


            } 
        
        $revision= $this->super_model->select_column_where('po_head', 'revision_no', 'po_id', $poid);
        $next_revision = $revision+1;
        $head =array(
            'saved'=>1,
            'revision_no'=>$next_revision,
            'approved_by'=>$this->input->post('approved')
        );

        if($this->super_model->update_where("po_head", $head, "po_id", $poid)){
            $rfd_revision= $this->super_model->select_column_where('rfd', 'revision_no', 'po_id', $poid);
            $rnext_revision = $rfd_revision+1;
            $data_rfd =array(
                'revision_no'=>$rnext_revision,
            );
            $this->super_model->update_where("rfd", $data_rfd, "po_id", $poid);

            redirect(base_url().'po/purchase_order_saved/'.$poid);
        }
    }

    public function save_revised($poid){
        $revised_date = date('Y-m-d H:i:s');
        foreach($this->super_model->select_row_where("po_head", "po_id", $poid) AS $head){
            $data_head = array(
                'po_id'=>$poid,
                'revised_date'=>$revised_date,
                'po_date'=>$head->po_date,
                'po_no'=>$head->po_no,
                'po_series'=>$head->po_series,
                'supplier_id'=>$head->supplier_id,
                'notes'=>$head->notes,
                'prepared_by'=>$head->prepared_by,
                'approved_by'=>$head->approved_by,
                'revision_no'=>$head->revision_no,
            );

            $this->super_model->insert_into("revised_po_head", $data_head);
        }

        foreach($this->super_model->select_row_where("po_pr", "po_id", $poid) AS $popr){
            $data_pr = array(
                'po_pr_id'=>$popr->po_pr_id,
                'po_id'=>$poid,
                'pr_no'=>$popr->pr_no,
                'requested_by'=>$popr->requested_by,
                'enduse_id'=>$popr->enduse_id,
                'purpose_id'=>$popr->purpose_id,
                'revision_no'=>$head->revision_no,
            );

            $this->super_model->insert_into("revised_po_pr", $data_pr);
        }

        foreach($this->super_model->select_row_where("po_items", "po_id", $poid) AS $poitems){
            $data_items = array(
                'po_items_id'=>$poitems->po_items_id,
                'po_pr_id'=>$poitems->po_pr_id,
                'po_id'=>$poitems->po_id,
                'aoq_reco_id'=>$poitems->aoq_reco_id,
                'item_id'=>$poitems->item_id,
                'offer'=>$poitems->offer,
                'quantity'=>$poitems->quantity,
                'unit_price'=>$poitems->unit_price,
                'revision_no'=>$head->revision_no,
            );

             $this->super_model->insert_into("revised_po_items", $data_items);
        }

        foreach($this->super_model->select_row_where("rfd", "po_id", $poid) AS $rf){
            $data_rfd = array(
                'rfd_id'=>$rf->rfd_id,
                'apv_no'=>$rf->apv_no,
                'rfd_date'=>$rf->rfd_date,
                'revised_date'=>$revised_date,
                'company'=>$rf->company,
                'pay_to'=>$rf->pay_to,
                'check_name'=>$rf->check_name,
                'cash'=>$rf->cash,
                'check'=>$rf->check,
                'bank_no'=>$rf->bank_no,
                'po_id'=>$rf->po_id,
                'check_date'=>$rf->check_date,
                'due_date'=>$rf->due_date,
                'gross_amount'=>$rf->gross_amount,
                'less_amount'=>$rf->less_amount,
                'net_amount'=>$rf->net_amount,
                'prepared_by'=>$rf->prepared_by,
                'checked_by'=>$rf->checked_by,
                'endorsed_by'=>$rf->endorsed_by,
                'approved_by'=>$rf->approved_by,
                'saved'=>$rf->saved,
                'revised'=>$rf->revised,
                'revision_no'=>$head->revision_no,
            );
            $this->super_model->insert_into("revised_rfd", $data_rfd);
        }
    }

    public function reporder_list(){
        $data['supplier']=$this->super_model->select_all_order_by("vendor_head", "vendor_name", "ASC");
        $this->load->view('template/header');   
        $this->load->view('template/navbar');     
        $this->load->view('po/reporder_list',$data);
        $this->load->view('template/footer');
    }

    public function create_reorderpo(){
        $rows_head = $this->super_model->count_rows("po_head");
        if($rows_head==0){
            $po_id=1;
        } else {
            $max = $this->super_model->get_max("po_head", "po_id");
            $po_id = $max+1;
        }

        $head_rows = $this->super_model->count_rows("po_head");
        if($head_rows==0){
            $po_no = 1000;
        } else {
            $maxno=$this->super_model->get_max("po_head", "po_series");
            $po_no = $maxno + 1;
        }

        $po_series = $this->input->post('po_no')."-".$po_no;
        $data = array(
            'po_id'=>$po_id,
            'po_date'=>$this->input->post('po_date'),
            'po_no'=>$po_series,
            'po_series'=>$po_no,
            'notes'=>$this->input->post('notes'),
            'supplier_id'=>$this->input->post('supplier'),
            'prepared_by'=>$_SESSION['user_id'],
            'repeat_order'=>1
        );
        if($this->super_model->insert_into("po_head", $data)){
            redirect(base_url().'po/reporder_prnt/'.$po_id);
        }
    }

    public function reporder_prnt(){
        $po_id=$this->uri->segment(3);
        $data['po_id']=$po_id;
        $supplier=$this->super_model->select_column_where('po_head', 'supplier_id', 'po_id', $po_id);
        $data['supplier']=$supplier;
        $data['saved']=$this->super_model->select_column_where('po_head', 'saved', 'po_id', $po_id);
        $data['revision']=$this->super_model->select_column_where('po_head', 'revision_no', 'po_id', $po_id);
        $approved_id = $this->super_model->select_column_where('po_head', 'approved_by', 'po_id', $po_id);
        $data['approved_id'] = $approved_id;
        $data['approved']=$this->super_model->select_column_where('employees', 'employee_name', 'employee_id',  $approved_id );
        $data['notes']=$this->super_model->select_column_where('po_head', 'notes', 'po_id', $po_id);
         $data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
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

        foreach($this->super_model->select_row_where("po_items", "po_id", $po_id) AS $items){
            $unit_id = $this->super_model->select_column_where('item', 'unit_id', 'item_id', $items->item_id);
            $data['items'][] = array(
                'po_items_id'=>$items->po_items_id,
                'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $items->item_id),
                'specs'=>$this->super_model->select_column_where('item', 'item_specs', 'item_id', $items->item_id),
                'quantity'=>$items->quantity,
                'unit'=>$this->super_model->select_column_where('unit', 'unit_name', 'unit_id', $unit_id),
                'price'=>$items->unit_price,
                'offer'=>$items->offer,
                'item_no'=>$items->item_no,
            );
        }

        foreach($this->super_model->select_row_where("po_pr", "po_id", $po_id) AS $popr){
            $item_no = "";
            foreach($this->super_model->select_row_where("po_items", "po_pr_id", $popr->po_pr_id) AS $poitems){
                $item_no.= $poitems->item_no. ", ";
            }
            $it_no = "(items ". substr($item_no, 0, -2). ")";
            $data['popr'][] = array(
                'pr_no'=>$popr->pr_no,
                'requestor'=>$this->super_model->select_column_where('employees', 'employee_name', 'employee_id', $popr->requested_by),
                'enduse'=>$this->super_model->select_column_where('enduse', 'enduse_name', 'enduse_id', $popr->enduse_id),
                'purpose'=>$this->super_model->select_column_where('purpose', 'purpose_name', 'purpose_id', $popr->purpose_id),
                'item_no'=>$it_no,
            );
        }

         foreach($this->super_model->select_row_where("po_items", "po_id", $po_id) AS $notes){
            $data['notes'][] = array(
                'item_no'=>$notes->item_no,
                'po_no'=>$this->super_model->select_column_where('po_head', 'po_no', 'po_id', $notes->source_poid),
            );
         }
     
        $this->load->view('template/header');        
        $this->load->view('po/reporder_prnt',$data);
        $this->load->view('template/footer');
    }

    public function save_repeatPO(){
        $poid = $this->input->post('po_id');
        $create=date('Y-m-d H:i:s');
        $prepared_by = $this->input->post('prepared_by');
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
            redirect(base_url().'po/reporder_prnt/'.$poid);
        }
    }

     public function addPo(){
        $po_id=$this->uri->segment(3);
        $supplier=$this->uri->segment(4);
        $po_url=$this->uri->segment(5);
        $old_po= $this->super_model->select_column_where('po_head', 'po_id', 'po_no', $po_url);
        $data['old_po']=$old_po;
        $data['po_id']=$po_id;
        $data['po_url']=$po_url;
        $data['supplier']=$supplier;
        $data['po'] = $this->super_model->select_custom_where("po_head", "supplier_id = '$supplier' AND saved='1' AND cancelled='0' ORDER BY po_no ASC");

        foreach($this->super_model->select_row_where("po_items", "po_id", $old_po) AS $item){
           $unit_id =  $this->super_model->select_column_where('item', 'unit_id', 'item_id', $item->item_id);
            $data['items'][] = array(
                'pr_no'=>$this->super_model->select_column_where('po_pr', 'pr_no', 'po_pr_id', $item->po_pr_id),
                'pr_id'=>$item->po_pr_id,
                'item_id'=>$item->item_id,
                'item'=>$this->super_model->select_column_where('item', 'item_name', 'item_id', $item->item_id),
                'specs'=>$this->super_model->select_column_where('item', 'item_specs', 'item_id', $item->item_id),
                'unit'=>$this->super_model->select_column_where('unit', 'unit_name', 'unit_id', $unit_id),
                'offer'=>$item->offer,
                'quantity'=>$item->quantity,
                'price'=>$item->unit_price,
            );
        }
        $this->load->view('template/header');        
        $this->load->view('po/addPo',$data);
        $this->load->view('template/footer');
    }

    public function add_repeatPO(){
        $count = $this->input->post('count_item');
        $po_id = $this->input->post('po_id');
        $old_po = $this->input->post('old_po');
        for($a=1;$a<$count;$a++){
            $qty = $this->input->post('quantity'.$a);
            $pr_id = $this->input->post('pr_id'.$a);
            $pr_no = $this->input->post('pr_no'.$a);
            $price = $this->input->post('price'.$a);
            $item_id = $this->input->post('item_id'.$a);
            $offer = $this->input->post('offer'.$a);

            $exist_pr = $this->super_model->count_custom_where("po_pr","po_id= '$po_id' AND pr_no = '$pr_no'");
            if($exist_pr==0){
                    $pr_det = $this->super_model->count_rows("po_pr");
                    if($pr_det==0){
                        $po_pr_id=1;
                     } else {
                        $max_po_pr_id=$this->super_model->get_max("po_pr", "po_pr_id");
                        $po_pr_id=$max_po_pr_id+1;
                     }

              $item_no_count = $this->super_model->count_custom_where("po_items","po_id= '$po_id'");
              if($item_no_count==0){
                $item_no = 1;
              } else {
                  $max_item_no=$this->super_model->get_max_where("po_items", "item_no","po_id= '$po_id'");
                  $item_no = $max_item_no+1;
              }

                $pr_details = array(
                    'po_pr_id'=>$po_pr_id,
                    'po_id'=>$po_id,
                    'pr_no'=>$pr_no,
                    'requested_by'=>$this->super_model->select_column_where('po_pr', 'requested_by', 'po_pr_id',$pr_id),
                    'enduse_id'=>$this->super_model->select_column_where('po_pr', 'enduse_id', 'po_pr_id',$pr_id),
                    'purpose_id'=>$this->super_model->select_column_where('po_pr', 'purpose_id', 'po_pr_id',$pr_id)
                );
                 if($this->super_model->insert_into("po_pr", $pr_details)){
                        $pr_items = array(
                            'po_pr_id'=>$po_pr_id,
                            'po_id'=>$po_id,
                            'item_id'=>$item_id,
                            'offer'=>$offer,
                            'quantity'=>$qty,
                            'unit_price'=>$price,
                            'item_no'=>$item_no,
                            'source_poid'=>$old_po,
                        );
                        $this->super_model->insert_into("po_items", $pr_items);
                 }
            } else {
                 $item_no_count = $this->super_model->count_custom_where("po_items","po_id= '$po_id'");
              if($item_no_count==0){
                $item_no = 1;
              } else {
                  $max_item_no=$this->super_model->get_max_where("po_items", "item_no","po_id= '$po_id'");
                  $item_no = $max_item_no+1;
              }

                $po_pr_id = $this->super_model->select_column_custom_where("po_pr", "po_pr_id","po_id= '$po_id' AND pr_no = '$pr_no'");
                 $pr_items = array(
                            'po_pr_id'=>$po_pr_id,
                            'po_id'=>$po_id,
                            'item_id'=>$item_id,
                            'offer'=>$offer,
                            'quantity'=>$qty,
                            'unit_price'=>$price,
                            'item_no'=>$item_no,
                            'source_poid'=>$old_po,
                    );
                 if(!empty($qty) || $qty!=0){
                     $this->super_model->insert_into("po_items", $pr_items);
                }
            }
        }
        ?>
        <script>
              window.onunload = refreshParent;
            function refreshParent() {
                window.opener.location.reload();
            }
            window.close();
            
        </script>
        <?php
    }

    public function remove_po_item(){
        $po_id=$this->uri->segment(3);
        $po_items_id=$this->uri->segment(4);

        if($this->super_model->delete_where("po_items", "po_items_id", $po_items_id)){
            $a=1;
            foreach($this->super_model->select_row_where("po_items", "po_id", $po_id) AS $it){
                $data =array(
                    'item_no'=>$a
                );

                $this->super_model->update_where("po_items", $data, "po_items_id", $it->po_items_id);
                $a++;
            }
        }

         redirect(base_url().'po/reporder_prnt/'.$po_id);
    }

     public function delivery_receipt_r(){
        $this->load->view('template/header');        
        $this->load->view('po/delivery_receipt_r');
        $this->load->view('template/footer');
    }


    public function rfd_prnt_r(){        
        $this->load->view('template/header');        
        $this->load->view('po/rfd_prnt_r');
        $this->load->view('template/footer');
    }


    public function done_po(){
        $this->load->view('template/header');        
        $this->load->view('template/navbar'); 
        $data['supplier']=$this->super_model->select_all_order_by("vendor_head", "vendor_name", "ASC");
        foreach($this->super_model->select_custom_where("po_head", "saved='1' AND cancelled='0' ORDER BY po_id DESC") AS $head){
             $rfd=$this->super_model->count_rows_where("rfd","po_id",$head->po_id);
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
                'pr'=>$pr,
                'repeat_order'=>$head->repeat_order,
                'done'=>$head->done_po,
                'revise'=>$head->revision_no,
                'rfd'=>$rfd
            );
        }   
        $this->load->view('po/done_po',$data);
        $this->load->view('template/footer');
    }
}

?>