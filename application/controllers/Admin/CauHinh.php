<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CauHinh extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_CauHinh');
	}

	public function index()
	{
		$data['title'] = "Cấu hình hệ thống";
		$data['detail'] = $this->Model_CauHinh->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenwebsite = $this->input->post('tenwebsite');
			$motaweb = $this->input->post('motaweb');
			$diachi = $this->input->post('diachi');
			$email = $this->input->post('email');
			$sodienthoai = $this->input->post('sodienthoai');
			$logo = $this->Model_CauHinh->getAll()[0]['Logo'];
			$favicon = $this->Model_CauHinh->getAll()[0]['Favicon'];
			$facebook = $this->input->post('facebook');
			$x = $this->input->post('x');
			$linkedin = $this->input->post('linkedin');
			$instagram = $this->input->post('instagram');
			$youtube = $this->input->post('youtube');

			if(empty($tenwebsite) || empty($motaweb) || empty($diachi) || empty($email) || empty($sodienthoai) || empty($facebook) || empty($linkedin) || empty($instagram) || empty($youtube)){
				$data['error'] = "Vui lòng nhập đủ thông tin cấu hình!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $sodienthoai)) {
			    $data['error'] = "Vui lòng nhập số điện thoại hợp lệ!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('logo')){
				$img = $this->upload->data();
				$logo = base_url('uploads')."/".$img['file_name'];
			}

			if ($this->upload->do_upload('favicon')){
				$img = $this->upload->data();
				$favicon = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_CauHinh->update($tenwebsite,$motaweb,$logo,$diachi,$email,$sodienthoai,$favicon,$facebook,$x,$linkedin,$instagram,$youtube);

			$data['success'] = "Lưu cấu hình thành công!";
			$data['detail'] = $this->Model_CauHinh->getAll();
			return $this->load->view('Admin/View_CauHinh', $data);
		}
		return $this->load->view('Admin/View_CauHinh', $data);
	}

}

/* End of file CauHinh.php */
/* Location: ./application/controllers/CauHinh.php */