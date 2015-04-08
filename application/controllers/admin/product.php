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
		$this->home = base_url()."admin/product";
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
	
	public function add_product()
	{
		if( $this->input->post("add") )
		{
			
			if( $this->verify->validate($this->id_menu, "add") )
			{
				
			}else{
				action_deny();
			}
		}else{
			$this->load->model("admin/category_model");
			$rs = $this->category_model->get_category_by_parent(1);
			$ro = $this->category_model->get_data();
			$data['cate'] = $rs;
			$data['data'] = $ro;
			$data['id_menu'] = $this->id_menu;
			$data['view'] = "admin/add_product_view";
			$data['page_title'] = $this->title;
			$this->load->view($this->layout, $data);
		}		
	}

public function display_category($parent, $checked="", $me=""){
	$this->load->model("admin/category_model");
		$rs = $this->category_model->get_category_by_parent($parent);
		if($rs != false) 
		{
    		echo "<ul class='tree-branch-children' style='margin-top:7px; margin-left:28px;'>";
    		foreach($rs as $ra) 
			{
				if($ra->id_category != $me)
				{
					echo "<li class='tree-branch tree-open'>
								<div class='tree-branch-header'>
									<span class='tree-branch-name'>
										<span class='tree-label'>
											 <label for='". $ra->category_name."'>
												 <input type='checkbox' name='category[]' value='". $ra->id_category."' id='".$ra->category_name."' class='ace' ".isChecked($ra->id_category, $checked)." />
												 <span class='lbl'> ".$ra->category_name."<br></span>
											</label>
										</span>
									</span>
								</div>";
				}
            $this->display_category($ra->id_category, $checked);
            echo "</li>";
			}
			echo "</ul>";
        }
}	
	
}// End class


?>