<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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

    public function generate_pr_summary(){
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        redirect(base_url().'reports/pr_report/'.$year.'/'.$month);
    }

    public function generate_po_summary(){
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        redirect(base_url().'reports/po_report/'.$year.'/'.$month);
    }

	public function pr_report(){
        $year=$this->uri->segment(3);
        $month=$this->uri->segment(4);
        $date = $year."-".$month;
        $data['date']=date('F Y', strtotime($date));

        foreach($this->super_model->custom_query("SELECT ph.pr_id, ph.pr_no, ph.pr_date, ph.purpose_id, ph.enduse_id, ph.requested_by, pd.item_id, pd.quantity, pd.cancelled, pd.cancel_reason, pd.cancel_date FROM pr_head ph INNER JOIN pr_details pd ON ph.pr_id = pd.pr_id") AS $head){

            $po = $this->super_model->count_custom_query("SELECT pop.po_id FROM po_head ph INNER JOIN po_pr pop ON ph.po_id = pop.po_id INNER JOIN po_items pi ON pop.po_pr_id = pi.po_pr_id  WHERE pop.pr_id = '$head->pr_id' AND pi.item_id = '$head->item_id' AND  ph.saved='1' AND ph.cancelled = '0' GROUP BY pi.item_id");
        
              $refer_mnl = $this->super_model->count_custom_query("SELECT ah.aoq_id FROM aoq_header ah INNER JOIN aoq_items ai ON ah.aoq_id = ai.aoq_id WHERE ah.pr_id = '$head->pr_id' AND ai.item_id = '$head->item_id' AND ah.saved = '1' AND ah.refer_mnl='1'  GROUP BY ai.item_id");

            $refer_date = $this->super_model->custom_query_single("refer_date","SELECT ah.refer_date FROM aoq_header ah INNER JOIN aoq_items ai ON ah.aoq_id = ai.aoq_id WHERE ah.pr_id = '$head->pr_id' AND ai.item_id = '$head->item_id' AND ah.saved = '1' AND ah.refer_mnl='1'");

              $partial = $this->super_model->count_custom_query("SELECT ah.aoq_id FROM aoq_header ah INNER JOIN aoq_reco ai ON ah.aoq_id = ai.aoq_id WHERE ah.pr_id = '$head->pr_id' AND ai.item_id = '$head->item_id' AND ai.balance != '0' AND ai.balance != ai.quantity GROUP BY ai.item_id");

               if($po==1 && $partial==0){
              
                foreach($this->super_model->custom_query("SELECT pop.po_id, ph.po_date, pi.item_id FROM po_head ph INNER JOIN po_pr pop ON ph.po_id = pop.po_id INNER JOIN po_items pi ON pop.po_pr_id = pi.po_pr_id  WHERE pop.pr_id = '$head->pr_id' AND pi.item_id = '$head->item_id' AND ph.saved='1' AND ph.cancelled = '0' GROUP BY pi.item_id") AS $pod){
                    $po_date = $pod->po_date;
                    $po_id = $pod->po_id;
                    //echo $pod->item_id ."<br>";
                    $status='Fully Served';
                    $status_remarks=date('m.d.y', strtotime($po_date)) . ' - Served DR#'. $this->super_model->select_column_where("dr_head",'dr_no','po_id',$po_id);
                } 
                 
             /*   $status='Fully served';
                $status_remarks='';*/
              } 
              else if($po==1 && $partial==1){
                    foreach($this->super_model->custom_query("SELECT pop.po_id, ph.po_date, pi.item_id FROM po_head ph INNER JOIN po_pr pop ON ph.po_id = pop.po_id INNER JOIN po_items pi ON pop.po_pr_id = pi.po_pr_id  WHERE pop.pr_id = '$head->pr_id' AND pi.item_id = '$head->item_id' AND ph.saved='1' AND ph.cancelled = '0' GROUP BY pi.item_id") AS $pod){
                    $po_date = $pod->po_date;
                    $po_id = $pod->po_id;
                    //echo $pod->item_id ."<br>";
                    $status='Partially Served';
                    $status_remarks=date('m.d.y', strtotime($po_date)) . ' - Served DR#'. $this->super_model->select_column_where("dr_head",'dr_no','po_id',$po_id);
                }
            } else if($head->cancelled=='1'){
                $status='Cancelled';
                $status_remarks= $head->cancel_reason ." - " . date('m.d.y', strtotime($head->cancel_date));
              } else if($refer_mnl==1){
                $status='Manila';
                $status_remarks='c/o Manila - '.date('m.d.y', strtotime($refer_date)) ;
              } else {

                $rfq_outgoing = $this->super_model->count_custom_query("SELECT rh.rfq_id FROM rfq_head rh INNER JOIN rfq_detail rd ON rh.rfq_id = rd.rfq_id WHERE rh.pr_id = '$head->pr_id' AND rd.item_id = '$head->item_id' AND rh.saved = '1'  GROUP BY rd.item_id");

                $rfq_incoming = $this->super_model->count_custom_query("SELECT rh.rfq_id FROM rfq_head rh INNER JOIN rfq_detail rd ON rh.rfq_id = rd.rfq_id WHERE rh.pr_id = '$head->pr_id' AND rd.item_id = '$head->item_id' AND rh.saved = '1' AND rh.completed='1' GROUP BY rd.item_id");


                $aoq_for_te = $this->super_model->count_custom_query("SELECT ah.aoq_id FROM aoq_header ah INNER JOIN aoq_items ai ON ah.aoq_id = ai.aoq_id WHERE ah.pr_id = '$head->pr_id' AND ai.item_id = '$head->item_id' GROUP BY ai.item_id");

                $te_done = $this->super_model->count_custom_query("SELECT ah.aoq_id FROM aoq_header ah INNER JOIN aoq_items ai ON ah.aoq_id = ai.aoq_id WHERE ah.pr_id = '$head->pr_id' AND ai.item_id = '$head->item_id'  AND ah.saved = '1' AND ah.completed='1' GROUP BY ai.item_id");

                if($rfq_outgoing==1 && $rfq_incoming==0){
                    $status='Pending';
                    $status_remarks='RFQ to be sent to supplier';
                } else if($rfq_outgoing==1 && $rfq_incoming==1 && $aoq_for_te==0){
                    $status='Pending';
                    $status_remarks='For AOQ';
                } else if($rfq_outgoing==1 && $rfq_incoming==1 && $aoq_for_te==1 && $te_done ==0){
                    $status='Pending';
                    $status_remarks='For TE';
                } else if($rfq_outgoing==1 && $rfq_incoming==1 && $aoq_for_te==1 && $te_done ==1){
                     $status='Pending';
                    $status_remarks='for PO';
                } 

                 
              }

            $unit_id = $this->super_model->select_column_where("item",'unit_id','item_id',$head->item_id);
            $unit = $this->super_model->select_column_where("unit",'unit_name','unit_id',$unit_id);
            $data['pr'][] = array(
                'pr_id'=>$head->pr_id,
                'pr_no'=>$head->pr_no,
                'pr_date'=>$head->pr_date,
                'purpose'=>$this->super_model->select_column_where("purpose",'purpose_name','purpose_id',$head->purpose_id),
                'enduse'=>$this->super_model->select_column_where("enduse",'enduse_name','enduse_id',$head->enduse_id),
                'requestor'=>$this->super_model->select_column_where("employees",'employee_name','employee_id',$head->requested_by),
                'qty'=>$head->quantity,
                'uom'=>$unit,
                'item_name'=>$this->super_model->select_column_where("item",'item_name','item_id',$head->item_id),
                'item_specs'=>$this->super_model->select_column_where("item",'item_specs','item_id',$head->item_id),
                'status'=>$status,
                'status_remarks'=>$status_remarks
            );
        }
        
        $this->load->view('template/header');        
        $this->load->view('reports/pr_report',$data);
        $this->load->view('template/footer');
    }

    public function po_report(){
        $year=$this->uri->segment(3);
        $month=$this->uri->segment(4);
        $date = $year."-".$month;
        $data['date']=date('F Y', strtotime($date));
        $po_date = date('Y-m', strtotime($date));
        foreach($this->super_model->select_custom_where("po_head","po_date LIKE '%$po_date%'") AS $p){
            $terms =  $this->super_model->select_column_where('vendor_head','terms','vendor_id',$p->supplier_id);
            $supplier = $this->super_model->select_column_where('vendor_head','vendor_name','vendor_id',$p->supplier_id);

            foreach($this->super_model->select_row_where('po_pr','po_id',$p->po_id) AS $pr){
                $pr_no = $this->super_model->select_column_where('pr_head','pr_no','pr_id',$pr->pr_id);
                $enduse = $this->super_model->select_column_where('enduse','enduse_name','enduse_id',$pr->enduse_id);
                $purpose = $this->super_model->select_column_where('purpose','purpose_name','purpose_id',$pr->purpose_id);
                $requested_by = $this->super_model->select_column_where('employees','employee_name','employee_id',$pr->requested_by);
                foreach($this->super_model->select_row_where('po_items','po_id',$p->po_id) AS $i){
                    foreach($this->super_model->select_row_where('item','item_id',$i->item_id) AS $it){
                        $uom=$this->super_model->select_column_where("unit",'unit_name','unit_id',$it->unit_id);
                        $item=$it->item_name." - ".$it->item_specs;
                    }
                    $data['po'][]=array(
                        'po_id'=>$i->po_id,
                        'pr_no'=>$pr_no,
                        'enduse'=>$enduse,
                        'purpose'=>$purpose,
                        'requested_by'=>$requested_by,
                        'qty'=>$i->quantity,
                        'uom'=>$uom,
                        'item'=>$item,
                        'unit_price'=>$i->unit_price,
                        'notes'=>$pr->notes,
                        'po_id'=>$p->po_id,
                        'po_date'=>$p->po_date,
                        'po_no'=>$p->po_no,
                        'saved'=>$p->saved,
                        'cancelled'=>$p->cancelled,
                        'supplier'=>$supplier,
                        'terms'=>$terms,
                    );
                }
            }
        }
        $this->load->view('template/header');        
        $this->load->view('reports/po_report',$data);
        $this->load->view('template/footer');
    }
}
?>