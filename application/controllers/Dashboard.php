<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model'));	
	}

	public function index()
	{	
		$dataSidebar['notif'] = $this->Sidebar_model->modelNotif();				
		$this->load->view('main_admin.php',$dataSidebar);
		$this->load->view('admin/dashboard/dashboard.php');
		$this->load->view('footer_admin.php');
	}	
}

?>