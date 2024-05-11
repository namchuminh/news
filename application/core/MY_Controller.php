<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Model_CauHinh');
        $this->load->model('Web/Model_ChuyenMuc');
        $this->data['config'] = $this->Model_CauHinh->getAll();
        $this->data['category'] = $this->Model_ChuyenMuc->getAll();
        $this->data['categoryFooter'] = $this->Model_ChuyenMuc->getAllDisplay();
        $this->load->vars($this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */