<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index() //dashboard
	{
		//load js
		$this->page_js  = load_js('pages/dashboard.js'); //panggil fungsi load_js dari my_helper
		// $this->page_js .= load_js('demo.js');
		// load plugins
		// $this->plugins  = [PLUG_CHARTJS,PLUG_SPARKLINE,PLUG_JQVMAP,PLUG_JQUERYKNOB,PLUG_JQUERYUI,PLUG_DATERANGEPICKER,PLUG_TEMPUSDOMINUS,PLUG_ICHECK,PLUG_SUMMERNOTE];
		<!-- Tempusdominus Bbootstrap 4 -->
		<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- JQVMap -->
		<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/adminlte.min.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
		<!-- summernote -->
		<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

		<!-- ChartJS -->
		<script src="plugins/chart.js/Chart.min.js"></script>
		<!-- Sparkline -->
		<script src="plugins/sparklines/sparkline.js"></script>
		<!-- JQVMap -->
		<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="plugins/moment/moment.min.js"></script>
		<script src="plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<!-- Summernote -->
		<script src="plugins/summernote/summernote-bs4.min.js"></script>

		$data=[];
		// load main content
		$main = $this->parser->parse('sample/dashboard', $data, TRUE);
		// load template
		$this->template($main);
	}
	public function form_general()//form general
	{
		$data   = [];
		$this->page_js = load_js('pages/form_general.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_CUSTOMFILEINPUT];
		$main = $this->parser->parse('sample/form_general', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function form_advanced()//form advanced
	{
		$data   = [];
		// $this->page_js  = load_js('demo.js');
		$this->page_js  = load_js('pages/form_advanced.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_DATERANGEPICKER,PLUG_SELECT2,PLUG_ICHECK,PLUG_TEMPUSDOMINUS,PLUG_DATEPICKER,PLUG_COLORPICKER,PLUG_DUALLISTBOX,PLUG_INPUTMASK,PLUG_SWITCH];
		$main = $this->parser->parse('sample/form_advanced', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function form_validation()//form validation
	{
		$data   = [];
		$this->page_js = load_js('pages/form_validation.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_JQUERYVALIDATION];
		$main = $this->parser->parse('sample/form_validation', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function form_editor()//form editor
	{
		$data   = [];
		$this->page_js = load_js('pages/form_editor.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_SUMMERNOTE];
		$main = $this->parser->parse('sample/form_editor', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function modal()//modals & alerts
	{
		$data   = [];
		$this->page_js = load_js('pages/modal.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_SWEETALERT,PLUG_TOASTR];
		$main = $this->parser->parse('sample/modal', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function simpletable()//simple tabel
	{
		$data   = [];
		// $this->page_js = load_js('pages/modal.js');//panggil fungsi load_js dari my_helper
		// load plugins
		// $this->plugins  = [];
		$main = $this->parser->parse('sample/simpletabel', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function datatable()//data tabel
	{
		$data   = [];
		$this->page_js = load_js('pages/datatable.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_DATATABLE];
		$main = $this->parser->parse('sample/datatable', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function jsgrid()//jsgrid 
	{
		$data   = [];
		$this->page_js = load_js('pages/jsgrid.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_JSGRID];
		$main = $this->parser->parse('sample/jsgrid', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function fullcalendar()//fullcalendar
	{
		$data   = [];
		$this->page_js = load_js('pages/fullcalendar.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_JQUERYUI,PLUG_FULLCALENDAR];
		$main = $this->parser->parse('sample/fullcalendar', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function chartjs()//chartjs
	{
		$data   = [];
		$this->page_js = load_js('pages/chartjs.js');//panggil fungsi load_js dari my_helper
		// load plugins
		$this->plugins  = [PLUG_CHARTJS];
		$main = $this->parser->parse('sample/chartjs', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}

}

/* End of file Sample.php */
/* Location: ./application/controllers/Sample.php */