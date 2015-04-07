<?php
class Product extends CI_Controller
{
	public $id_menu = 1;
	public $home;
	public $layout = "include/template";
	public $title = "Product";
	
	public function __construct()
	{
		parent:: __construct();
		$this->home = "admin/product";
		$this->load->model("admin/product_model");
	}
	
	public function index()
	{
		$rs = $this->product_model->get_data();
		$data['data'] = $rs;
		$data['id_menu'] = $this->id_menu;
		$data['view'] = "admin/product_view";
		$data['page_title'] = $this->title;
		$this->load->view($this->layout, $data);
	}
	
	
}// End class


?>