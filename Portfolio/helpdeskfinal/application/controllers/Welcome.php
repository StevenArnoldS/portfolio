<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		check_login();
		$this->load->view('index');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function allticket()
	{
		check_login();
		$this->load->view('allticket');
	}

	public function finished()
	{
		check_login();
		$this->load->view('finished');
	}

	public function unfinished()
	{
		check_login();
		$this->load->view('unfinished');
	}

	public function category()
	{
		check_login();
		check_role();
		$this->load->view('m_category');
	}

	public function schedule()
	{
		check_login();
		check_role();
		$this->load->view('m_schedule');
	}

	public function user()
	{
		check_login();
		check_role();
		$this->load->view('m_user');
	}

	public function view_attachment()
	{
		$this->load->view('view_attachment');
	}

	public function denied()
	{
		$this->load->view('access_denied');
	}
}
