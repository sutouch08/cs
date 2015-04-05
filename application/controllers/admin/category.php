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
			$rs = $this->category_model->get_category_by_parent(1,2);
			$data['cate'] = $rs;
			$data['id_menu'] = $this->id_menu;
			$data['view'] = "admin/add_category_view";
			$this->load->view($this->layout, $data);
		}
	}
	
	public function display_children($parent, $level){
		$rs = $this->category_model->get_category_by_parent($parent, $level);
		if($rs != false) 
		{
    		echo "<ul class='tree-branch-children'>";
    		foreach($rs as $ra) 
			{
        		echo "<li class='tree-branch tree-open'>
                        	<div class='tree-branch-header'>
                            	<span class='tree-branch-name'>
                    				<span class='tree-label'>
                                   		 <label for='". $ra->category_name."'>
                                             <input type='radio' name='id_category' value='". $ra->id_category."' id='".$ra->category_name."' class='ace' />
                                             <span class='lbl'> ".$ra->category_name."<br></span>
                                        </label>
                                    </span>
                                </span>
                        	</div>";
            $this->display_children($ra->id_category, $level + 1);
            echo "</li>";
			}
			echo "</ul>";
        }
}
	
	
}// End class

?>