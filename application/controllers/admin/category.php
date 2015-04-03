<?php 
class Category extends CI_Controller
{
	public $id_menu = 1;
	public $home;
	public $layout = "include/template";
	public $title = "หมวดหมู่สินค้า";
	
	public function __construct()
	{
		parent::__construct();
		$this->home = base_url()."admin/category";
		$this->load->model("admin/category_model");
	}
	
	public function index()
	{
		$rs = $this->category_model->get_data();
		$data['id_menu'] = $this->id_menu;
		$data['page_title'] = $this->title;
		$data['view'] = "admin/category_view";
		$data['data'] = $rs;
		$this->load->view($this->layout, $data);		
	}
	
	public function add_category()
	{
		if($this->input->post("add") )
		{
			
		}else{
			$data['id_menu'] = $this->id_menu;
			$data['view'] = "admin/add_category_view";
			$this->load->view($this->layout, $data);
		}
	}
	
}// End class

?>