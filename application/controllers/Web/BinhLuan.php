<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BinhLuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_BinhLuan');
	}

	public function index()
	{
		$email = $this->input->post('email');
		$hoten = $this->input->post('hoten');
		$noidung = $this->input->post('noidung');
		$thoigian = $this->input->post('thoigian');
		$mabaiviet = $this->input->post('mabaiviet');

		$this->Model_BinhLuan->insert($mabaiviet,$hoten,$email,$noidung,$thoigian);

		echo TRUE;
	}

}

/* End of file BinhLuan.php */
/* Location: ./application/controllers/BinhLuan.php */