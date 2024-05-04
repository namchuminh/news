<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BinhLuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_BinhLuan');
	}

	public function index()
	{
		$totalRecords = $this->Model_BinhLuan->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_BinhLuan->getAll();
		$data['title'] = "Danh sách bình luận";
		return $this->load->view('Admin/View_BinhLuan', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách bình luận";
		$totalRecords = $this->Model_BinhLuan->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/binh-luan/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/binh-luan/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BinhLuan->getAll();
			return $this->load->view('Admin/View_BinhLuan', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BinhLuan->getAll($start);
			return $this->load->view('Admin/View_BinhLuan', $data);
		}
	}

	public function view($mabinhluan)
	{
		if(count($this->Model_BinhLuan->getById($mabinhluan)) <= 0){
			$this->session->set_flashdata('error', 'Bình luận không tồn tại!');
			return redirect(base_url('admin/binh-luan/'));
		}

		$data['title'] = "Xem thông tin bình luận";
		$data['detail'] = $this->Model_BinhLuan->getById($mabinhluan);
		return $this->load->view('Admin/View_XemBinhLuan', $data);
	}


	public function delete($mabinhluan)
	{
		if(count($this->Model_BinhLuan->getById($mabinhluan)) <= 0){
			$this->session->set_flashdata('error', 'Bình luận không tồn tại!');
			return redirect(base_url('admin/binh-luan/'));
		}
		$this->Model_BinhLuan->delete($mabinhluan);

		$this->session->set_flashdata('success', 'Xóa bình luận thành công!');
		return redirect(base_url('admin/binh-luan/'));
	}

	public function search()
	{
		if(!isset($_GET['tieude']) && !isset($_GET['thoigian'])){
			return redirect(base_url('admin/binh-luan/'));
		}

		$tieude = $this->input->get('tieude');
		$thoigian = $this->input->get('thoigian');

		if(empty($tieude) && empty($thoigian)){
			return redirect(base_url('admin/binh-luan/'));
		}

		
		$data['post'] = array(
			'tieude' => $tieude,
			'thoigian' => $thoigian
		);

		if(empty($tieude)){
			$tieude = -1;
		}

		$totalRecords = $this->Model_BinhLuan->checkNumberSearch($tieude,$thoigian);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_BinhLuan->search($tieude,$thoigian);
		$data['title'] = "Danh sách bình luận";
		return $this->load->view('Admin/View_BinhLuanTimKiem', $data);

	}


	public function pageSearch($trang){
		if(!isset($_GET['tieude']) && !isset($_GET['thoigian'])){
			return redirect(base_url('admin/binh-luan/'));
		}

		$tieude = $this->input->get('tieude');
		$thoigian = $this->input->get('thoigian');

		if(empty($tieude) && empty($thoigian)){
			return redirect(base_url('admin/binh-luan/'));
		}

		
		$data['post'] = array(
			'tieude' => $tieude,
			'thoigian' => $thoigian
		);

		if(empty($tieude)){
			$tieude = -1;
		}

		$data['title'] = "Danh sách bình luận";
		$totalRecords = $this->Model_BinhLuan->checkNumberSearch($tieude,$thoigian);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/binh-luan/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/binh-luan/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BinhLuan->search($tieude,$thoigian);
			return $this->load->view('Admin/View_BinhLuanTimKiem', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BinhLuan->search($tieude,$thoigian,$start);
			return $this->load->view('Admin/View_BinhLuanTimKiem', $data);
		}
	}
}

/* End of file BinhLuan.php */
/* Location: ./application/controllers/BinhLuan.php */
