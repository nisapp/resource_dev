<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() 
	{   
		parent::__construct();
		$this->load->helper('url');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public $layout = 'index_header_footer'; 
	
	public function index()
	{
		//$this->load->model('testik');
		$data['test'] =  'aaa';//$this->testik->test_test();;
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
		$this->load->view('index', $data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */