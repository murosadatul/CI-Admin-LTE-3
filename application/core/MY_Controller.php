<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->all_setting   = $this->msetting->setting_all();//akses function setting_all() di model msetting
		$this->all_session   = $this->session->all_userdata();
		$this->browser_title = '';
		$this->site_name     = $this->all_setting['site_name'];
		$this->favicon       = $this->all_setting['favicon'];
		$this->footer        = $this->all_setting['footer'];
		$this->page_js       = '';
		$this->page_css 	 = '';
		$this->plugins 		 = [];
		$this->navbar 		 = [];
		$this->sidebar 		 = [];
	}

	protected function template($main_content)
	{
		// siapkan data pengaturan
		$data = [
			'url'		    => $this->uri->segment(2),
			'base_url'	    => base_url(),
			'site_name'	    => $this->site_name,
			'setting'	    => $this->all_setting,
			'browser_title'	=> $this->browser_title=='' ? $this->site_name : $this->site_name.' - '.$this->browser_title,
			'favicon'	    => $this->favicon,
			'page_css'	    => $this->page_css,
			'page_js'	    => $this->page_js,
			'load_plugins'  => $this->plugins,
			'navbar'	    => $this->navbar,
			'sidebar'       => $this->sidebar,
			'main_content'  => $main_content,
			'footer'        => $this->footer
		];

		$data['navbar'] = $this->parser->parse('theme/navbar', $data, TRUE);//akses navbar
		$data['breadcrumb'] = $this->parser->parse('theme/breadcrumb', $data, TRUE);//akses breadcrumb
		$data['sidebar'] = $this->parser->parse('theme/sidebar', $data, TRUE);//akses breadcrumb
		$this->parser->parse('theme/index', $data);//untuk mengakses template menggunakan library parser
	}


}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
