<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LienHe extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_LienHe');
	}

	public function index()
	{
		$data['title'] = "Liên hệ";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$hoten = $this->input->post('hoten');
			$email = $this->input->post('email');
			$sodienthoai = $this->input->post('sodienthoai');
			$tieude = $this->input->post('tieude');
			$noidung = $this->input->post('noidung');

			$this->Model_LienHe->insert($hoten,$email,$sodienthoai,$tieude,$noidung);

			return $this->load->view('Web/View_LienHe', $data);
		}
		return $this->load->view('Web/View_LienHe', $data);
	}

}

/* End of file LienHe.php */
/* Location: ./application/controllers/LienHe.php */