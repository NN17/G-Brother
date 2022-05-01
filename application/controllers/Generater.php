<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generater extends CI_Controller {

	public function index()
	{
		
	}

	public function exportPdf(){
		$data['name'] = $this->uri->segment(2);

		$data['content'] = 'htmlPdfs/'.str_replace('-','_',$data['name']);
		$data['items'] = $this->ignite_model->get_stock_items()->result();
        $data['warehouse'] = $this->ignite_model->get_limit_data('warehouse_tbl', 'activeState', true)->result();

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('layouts/pdf_template', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

}

/* End of file Generater.php */
/* Location: ./application/controllers/Generater.php */