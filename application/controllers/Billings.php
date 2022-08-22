<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billings extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('Billing');
	}

	public function index()
	{
		$data['billings'] = array(
			'billing_client' => $this->Billing->client_billings()
		);

		$this->load->view('billings', $data);
	}

	public function date_joined()
    {
        $date = $this->input->post();

		$data['billings'] = array(
			'billing_client' => $this->Billing->date_range($date)
		); 
        $this->load->view('billings', $data);
		// redirect('billings/index');
    }

}
