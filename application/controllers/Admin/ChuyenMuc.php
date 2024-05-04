<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChuyenMuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_ChuyenMuc');
	}

	public function index()
	{
		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->getAll();
		$data['title'] = "Chuyên mục bài viết";
		return $this->load->view('Admin/View_ChuyenMuc', $data);
	}

	public function page($trang){
		$data['title'] = "Chuyên mục bài viết";
		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAll();
			return $this->load->view('Admin/View_ChuyenMuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAll($start);
			return $this->load->view('Admin/View_ChuyenMuc', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm chuyên mục bài viết";
		$data['category'] = $this->Model_ChuyenMuc->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$duongdan = $this->input->post('duongdan');
			$hienthitrenmenu = $this->input->post('hienthitrenmenu');
			$chuyenmuccha = NULL;
			$hienthitrangchu = $this->input->post('hienthitrangchu');
			$hienthiwidget = $this->input->post('hienthiwidget');
			$hinhanh = "";

			if(!empty($_POST['chuyenmuccha'])){
				$chuyenmuccha = $this->input->post('chuyenmuccha');
			}

			if(empty($tenchuyenmuc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			if(($hienthitrenmenu != 1) && ($hienthitrenmenu != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị chuyên mục trên menu!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			if(($hienthitrangchu != 1) && ($hienthitrangchu != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị bài viết ở trang chủ!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			if(($hienthiwidget != 1) && ($hienthiwidget != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị chuyên mục trên widget!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			if(count($this->Model_ChuyenMuc->checkSlug($duongdan)) >= 1){
				$data['error'] = "Đường dẫn chuyên mục đã tồn tại!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			$this->Model_ChuyenMuc->add($tenchuyenmuc,$duongdan,$hinhanh,$hienthitrenmenu,$chuyenmuccha,$hienthitrangchu,$hienthiwidget);

			$this->session->set_flashdata('success', 'Thêm chuyên mục thành công!');
			return redirect(base_url('admin/chuyen-muc/'));
		}
		return $this->load->view('Admin/View_ThemChuyenMuc', $data);
	}

	public function update($machuyenmuc)
	{
		if(count($this->Model_ChuyenMuc->getById($machuyenmuc)) <= 0){
			$this->session->set_flashdata('error', 'Chuyên mục không tồn tại!');
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$data['title'] = "Cập nhật chuyên mục bài viết";
		$data['detail'] = $this->Model_ChuyenMuc->getById($machuyenmuc);
		$data['category'] = $this->Model_ChuyenMuc->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$duongdan = $this->input->post('duongdan');
			$hinhanh = $this->Model_ChuyenMuc->getById($machuyenmuc)[0]['AnhChinh'];
			$hienthitrenmenu = $this->input->post('hienthitrenmenu');
			$chuyenmuccha = NULL;
			$hienthitrangchu = $this->input->post('hienthitrangchu');
			$hienthiwidget = $this->input->post('hienthiwidget');

			if(!empty($_POST['chuyenmuccha'])){
				$chuyenmuccha = $this->input->post('chuyenmuccha');
			}

			if(empty($tenchuyenmuc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaChuyenMuc', $data);
			}

			if(($hienthitrenmenu != 1) && ($hienthitrenmenu != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị trên menu!";
				return $this->load->view('Admin/View_SuaChuyenMuc', $data);
			}

			if(($hienthitrangchu != 1) && ($hienthitrangchu != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị bài viết ở trang chủ!";
				return $this->load->view('Admin/View_SuaChuyenMuc', $data);
			}

			if(($hienthiwidget != 1) && ($hienthiwidget != 0)){
				$data['error'] = "Vui lòng chọn hiển thị / không hiển thị chuyên mục trên widget!";
				return $this->load->view('Admin/View_SuaChuyenMuc', $data);
			}

			if($chuyenmuccha == $this->Model_ChuyenMuc->getById($machuyenmuc)[0]['MaChuyenMuc']){
				$chuyenmuccha = NULL;
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_ChuyenMuc->update($tenchuyenmuc,$duongdan,$hinhanh,$hienthitrenmenu,$chuyenmuccha,$hienthitrangchu,$hienthiwidget,$machuyenmuc);
			$data['success'] = "Cập nhật chuyên mục thành công!";
			$data['detail'] = $this->Model_ChuyenMuc->getById($machuyenmuc);
			return $this->load->view('Admin/View_SuaChuyenMuc', $data);
		}

		return $this->load->view('Admin/View_SuaChuyenMuc', $data);
	}



	public function delete($machuyenmuc)
	{
		if(count($this->Model_ChuyenMuc->getById($machuyenmuc)) <= 0){
			$this->session->set_flashdata('error', 'Chuyên mục không tồn tại!');
			return redirect(base_url('admin/chuyen-muc/'));
		}
		$this->Model_ChuyenMuc->delete($machuyenmuc);
		$this->Model_ChuyenMuc->deleteParentId($machuyenmuc);

		$this->session->set_flashdata('success', 'Xóa chuyên mục thành công!');
		return redirect(base_url('admin/chuyen-muc/'));
	}

	public function search(){
		if(!isset($_GET['tenchuyenmuc']) && !isset($_GET['hienthitrenmenu']) && !isset($_GET['hienthitrangchu']) && !isset($_GET['hienthiwidget'])){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$tenchuyenmuc = $this->input->get('tenchuyenmuc');
		$hienthitrenmenu = $this->input->get('hienthitrenmenu');
		$hienthitrangchu = $this->input->get('hienthitrangchu');
		$hienthiwidget = $this->input->get('hienthiwidget');

		if(empty($tenchuyenmuc) && empty($hienthitrenmenu) && empty($hienthitrangchu) && empty($hienthiwidget)){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		
		$data['post'] = array(
			'tenchuyenmuc' => $tenchuyenmuc,
			'hienthitrenmenu' => $hienthitrenmenu,
			'hienthitrangchu' => $hienthitrangchu,
			'hienthiwidget' => $hienthiwidget,
		);

		if(empty($tenchuyenmuc)){
			$tenchuyenmuc = -99999;
		}

		if(empty($hienthitrenmenu)){
			$hienthitrenmenu = -99999;
		} 

		if(empty($hienthitrangchu)){
			$hienthitrangchu = -99999;
		}

		if(empty($hienthiwidget)){
			$hienthiwidget = -99999;
		}

		if($hienthitrenmenu == -1){
			$hienthitrenmenu = 0;
		}

		if($hienthitrangchu == -1){
			$hienthitrangchu = 0;
		}

		if($hienthiwidget == -1){
			$hienthiwidget = 0;
		}

		$totalRecords = $this->Model_ChuyenMuc->checkNumberSearch($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->search($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget);
		$data['title'] = "Chuyên mục bài viết";
		return $this->load->view('Admin/View_ChuyenMucTimKiem', $data);
	}

	public function pageSearch($trang)
	{
		if(!isset($_GET['tenchuyenmuc']) && !isset($_GET['hienthitrenmenu']) && !isset($_GET['hienthitrangchu']) && !isset($_GET['hienthiwidget'])){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$tenchuyenmuc = $this->input->get('tenchuyenmuc');
		$hienthitrenmenu = $this->input->get('hienthitrenmenu');
		$hienthitrangchu = $this->input->get('hienthitrangchu');
		$hienthiwidget = $this->input->get('hienthiwidget');

		if(empty($tenchuyenmuc) && empty($hienthitrenmenu) && empty($hienthitrangchu) && empty($hienthiwidget)){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		
		$data['post'] = array(
			'tenchuyenmuc' => $tenchuyenmuc,
			'hienthitrenmenu' => $hienthitrenmenu,
			'hienthitrangchu' => $hienthitrangchu,
			'hienthiwidget' => $hienthiwidget,
		);

		if(empty($tenchuyenmuc)){
			$tenchuyenmuc = -99999;
		}

		if(empty($hienthitrenmenu)){
			$hienthitrenmenu = -99999;
		} 

		if(empty($hienthitrangchu)){
			$hienthitrangchu = -99999;
		}

		if(empty($hienthiwidget)){
			$hienthiwidget = -99999;
		}

		if($hienthitrenmenu == -1){
			$hienthitrenmenu = 0;
		}

		if($hienthitrangchu == -1){
			$hienthitrangchu = 0;
		}

		if($hienthiwidget == -1){
			$hienthiwidget = 0;
		}

		$data['title'] = "Chuyên mục bài viết";
		$totalRecords = $this->Model_ChuyenMuc->checkNumberSearch($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->search($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget);
			return $this->load->view('Admin/View_ChuyenMucTimKiem', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->search($tenchuyenmuc,$hienthitrenmenu,$hienthitrangchu,$hienthiwidget,$start);
			return $this->load->view('Admin/View_ChuyenMucTimKiem', $data);
		}
	}
}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */