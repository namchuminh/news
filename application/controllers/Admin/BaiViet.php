<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaiViet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_BaiViet');
		$this->load->model('Admin/Model_The');
		$this->load->model('Admin/Model_ChuyenMuc');
	}

	public function index()
	{
		$totalRecords = $this->Model_BaiViet->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_BaiViet->getAll();
		$data['title'] = "Danh sách bài viết";
		return $this->load->view('Admin/View_BaiViet', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách bài viết";
		$totalRecords = $this->Model_BaiViet->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/bai-viet/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/bai-viet/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BaiViet->getAll();
			return $this->load->view('Admin/View_BaiViet', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BaiViet->getAll($start);
			return $this->load->view('Admin/View_BaiViet', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm bài viết";
		$data['category'] = $this->Model_ChuyenMuc->getFull();
		$data['tag'] = $this->Model_The->getFull();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tieude = $this->input->post('tieude');
			$duongdan = $this->input->post('duongdan');
			$noidung = $this->input->post('noidung');
			$machuyenmuc = $this->input->post('machuyenmuc');
			$mathe = $this->input->post('mathe');
			$hienthitrangchu = $this->input->post('hienthitrangchu');
			$hienthiwidget = $this->input->post('hienthiwidget');
			$loaibaiviet = $this->input->post('loaibaiviet');
			$anhchinh = "";

			$data['post'] = array(
				'tieude' => $tieude,
				'duongdan' => $duongdan,
				'noidung' => $noidung,
				'machuyenmuc' => $machuyenmuc,
				'mathe' => $mathe,
				'hienthitrangchu' => $hienthitrangchu,
				'hienthiwidget' => $hienthiwidget,
				'loaibaiviet' => $loaibaiviet,
				'anhchinh' => $anhchinh
			);

			if(empty($tieude) || empty($duongdan) || empty($noidung)){
				$data['error'] = "Vui lòng nhập đủ thông tin nội dung bài viết!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}

			if(($loaibaiviet != 1) && ($loaibaiviet != 2) && ($loaibaiviet != 3) && ($loaibaiviet != 4)){
				$data['error'] = "Vui lòng chọn loại bài viết phù hợp!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}


			if(($hienthitrangchu != 1) && ($hienthitrangchu != 0) && ($hienthitrangchu != 2)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị bài viết ở trang chủ!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}

			if(($hienthiwidget != 1) && ($hienthiwidget != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị bài viết trên widget!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}

			if(count($this->Model_BaiViet->checkSlug($duongdan)) >= 1){
				$data['error'] = "Đường dẫn bài viết đã tồn tại!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}

			if(empty($machuyenmuc) || (count($machuyenmuc) <= 0)){
				$data['error'] = "Vui lòng chọn 1 chuyên mục!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}


			if(empty($mathe) || (count($mathe) <= 0)){
				$data['error'] = "Vui lòng chọn 1 loại thẻ!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$img = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh chính của bài viết!";
				return $this->load->view('Admin/View_ThemBaiViet', $data);
			}


			$mabaiviet = $this->Model_BaiViet->add($tieude,$noidung,$this->session->userdata('manguoidung'),$anhchinh,$duongdan,$hienthitrangchu,$hienthiwidget,$loaibaiviet);

			foreach ($machuyenmuc as $key => $chuyenmuc) {
				$this->Model_BaiViet->insertCategoryPost($mabaiviet,$chuyenmuc);
			}

			foreach ($mathe as $key => $the) {
				$this->Model_BaiViet->insertTagPost($mabaiviet,$the);
			}

			$this->session->set_flashdata('success', 'Thêm bài viết thành công!');
			return redirect(base_url('admin/bai-viet/'));
		}
		return $this->load->view('Admin/View_ThemBaiViet', $data);
	}

	public function update($mabaiviet)
	{
		if(count($this->Model_BaiViet->getById($mabaiviet)) <= 0){
			$this->session->set_flashdata('error', 'Bài viết không tồn tại!');
			return redirect(base_url('admin/bai-viet/'));
		}

		$data['title'] = "Cập nhật bài viết";
		$data['detail'] = $this->Model_BaiViet->getById($mabaiviet);
		$data['category'] = $this->Model_ChuyenMuc->getFull();
		$data['tag'] = $this->Model_The->getFull();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tieude = $this->input->post('tieude');
			$duongdan = $this->input->post('duongdan');
			$noidung = $this->input->post('noidung');
			$machuyenmuc = $this->input->post('machuyenmuc');
			$mathe = $this->input->post('mathe');
			$hienthitrangchu = $this->input->post('hienthitrangchu');
			$hienthiwidget = $this->input->post('hienthiwidget');
			$loaibaiviet = $this->input->post('loaibaiviet');
			$anhchinh = $this->Model_BaiViet->getById($mabaiviet)[0]['AnhChinh'];

			$data['post'] = array(
				'tieude' => $tieude,
				'duongdan' => $duongdan,
				'noidung' => $noidung,
				'machuyenmuc' => $machuyenmuc,
				'mathe' => $mathe,
				'hienthitrangchu' => $hienthitrangchu,
				'hienthiwidget' => $hienthiwidget,
				'loaibaiviet' => $loaibaiviet,
				'anhchinh' => $anhchinh
			);

			if(empty($tieude) || empty($duongdan) || empty($noidung)){
				$data['error'] = "Vui lòng nhập đủ thông tin nội dung bài viết!";
				return $this->load->view('Admin/View_SuaBaiViet', $data);
			}

			if(($loaibaiviet != 1) && ($loaibaiviet != 2) && ($loaibaiviet != 3) && ($loaibaiviet != 4)){
				$data['error'] = "Vui lòng chọn loại bài viết phù hợp!";
				return $this->load->view('Admin/View_SuaBaiViet', $data);
			}


			if(($hienthitrangchu != 1) && ($hienthitrangchu != 0) && ($hienthitrangchu != 2)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị bài viết ở trang chủ!";
				return $this->load->view('Admin/View_SuaBaiViet', $data);
			}

			if(($hienthiwidget != 1) && ($hienthiwidget != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị bài viết trên widget!";
				return $this->load->view('Admin/View_SuaBaiViet', $data);
			}

			if(empty($machuyenmuc) || (count($machuyenmuc) <= 0)){
				$data['error'] = "Vui lòng chọn 1 chuyên mục!";
				return $this->load->view('Admin/View_SuaBaiViet', $data);
			}


			if(empty($mathe) || (count($mathe) <= 0)){
				$data['error'] = "Vui lòng chọn 1 loại thẻ!";
				return $this->load->view('Admin/View_SuaBaiViet', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$img = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_BaiViet->update($tieude,$noidung,$anhchinh,$duongdan,$hienthitrangchu,$hienthiwidget,$loaibaiviet,$mabaiviet);

			$this->Model_BaiViet->deleteCategoryPost($mabaiviet);
			$this->Model_BaiViet->deleteTagPost($mabaiviet);

			foreach ($machuyenmuc as $key => $chuyenmuc) {
				$this->Model_BaiViet->insertCategoryPost($mabaiviet,$chuyenmuc);
			}

			foreach ($mathe as $key => $the) {
				$this->Model_BaiViet->insertTagPost($mabaiviet,$the);
			}

			$data['success'] = "Cập nhật bài viết thành công!";
			$data['detail'] = $this->Model_BaiViet->getById($mabaiviet);
			return $this->load->view('Admin/View_SuaBaiViet', $data);
		}

		return $this->load->view('Admin/View_SuaBaiViet', $data);
	}



	public function delete($mabaiviet)
	{
		if(count($this->Model_BaiViet->getById($mabaiviet)) <= 0){
			$this->session->set_flashdata('error', 'Bài viết không tồn tại!');
			return redirect(base_url('admin/bai-viet/'));
		}
		$this->Model_BaiViet->delete($mabaiviet);

		$this->session->set_flashdata('success', 'Xóa bài viết thành công!');
		return redirect(base_url('admin/bai-viet/'));
	}


	public function search(){
		if(!isset($_GET['tieude']) && !isset($_GET['loaibaiviet']) && !isset($_GET['thoigian'])){
			return redirect(base_url('admin/bai-viet/'));
		}

		$tieude = $this->input->get('tieude');
		$loaibaiviet = $this->input->get('loaibaiviet');
		$thoigian = $this->input->get('thoigian');

		if(empty($tieude) && empty($loaibaiviet) && empty($thoigian)){
			return redirect(base_url('admin/bai-viet/'));
		}

		
		$data['post'] = array(
			'tieude' => $tieude,
			'loaibaiviet' => $loaibaiviet,
			'thoigian' => $thoigian
		);

		if(empty($tieude)){
			$tieude = -99999;
		}

		if(empty($loaibaiviet)){
			$loaibaiviet = -99999;
		} 


		$totalRecords = $this->Model_BaiViet->checkNumberSearch($tieude,$loaibaiviet,$thoigian);
		$recordsPerPage = 1;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_BaiViet->search($tieude,$loaibaiviet,$thoigian);
		$data['title'] = "Danh sách bài viết";
		return $this->load->view('Admin/View_BaiVietTimKiem', $data);
	}

	public function pageSearch($trang)
	{
		if(!isset($_GET['tieude']) && !isset($_GET['loaibaiviet']) && !isset($_GET['thoigian'])){
			return redirect(base_url('admin/bai-viet/'));
		}

		$tieude = $this->input->get('tieude');
		$loaibaiviet = $this->input->get('loaibaiviet');
		$thoigian = $this->input->get('thoigian');

		if(empty($tieude) && empty($loaibaiviet) && empty($thoigian)){
			return redirect(base_url('admin/bai-viet/'));
		}

		
		$data['post'] = array(
			'tieude' => $tieude,
			'loaibaiviet' => $loaibaiviet,
			'thoigian' => $thoigian
		);

		if(empty($tieude)){
			$tieude = -99999;
		}

		if(empty($loaibaiviet)){
			$loaibaiviet = -99999;
		} 

		$data['title'] = "Danh sách bài viết";
		$totalRecords = $this->Model_BaiViet->checkNumberSearch($tieude,$loaibaiviet,$thoigian);
		$recordsPerPage = 1;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/bai-viet/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/bai-viet/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BaiViet->search($tieude,$loaibaiviet,$thoigian);
			return $this->load->view('Admin/View_BaiVietTimKiem', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BaiViet->search($tieude,$loaibaiviet,$thoigian,$start);
			return $this->load->view('Admin/View_BaiVietTimKiem', $data);
		}
	}
}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */