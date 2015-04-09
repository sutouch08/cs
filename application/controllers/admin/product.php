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
			$data['product_code'] = $this->input->post("product_code");
			$name = $this->input->post("product_name");
			$data['product_name'] = $name['thai'];
			$data['product_name_en'] = $name['english'];
			$data['default_category_id'] = $this->input->post("default_category");
			$data['product_cost'] = $this->input->post("cost");
			$data['product_price'] = $this->input->post("price");
			$data['weight'] = $this->input->post("weight");
			$data['width'] = $this->input->post("width");
			$data['length'] = $this->input->post("length");
			$data['height'] = $this->input->post("height");
			$data['description'] = $this->input->post("description[thai]");
			$data['description_en'] = $this->input->post("description[english]");
			$data['active'] = $this->input->post("active");
			$data['show'] = $this->input->post("visible");
			$data['under_zero'] = $this->input->post("allow_under_zero");
			$data['date_add'] = NOW();
			$category = $this->input->post("category");
			if( $this->verify->validate($this->id_menu, "add") )
			{
			$id = $this->product_model->insert_id($data);
				if($id != false)
				{
					foreach($category as $cate)
					{
						$this->product_model->insert_category_product($id, $cate);
					}
					redirect($this->home);
				}else{
					setError("Cannot insert database");
					redirect($this->home);
				}
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


public function edit_product($id)
	{
		if( $this->input->post("edit") )
		{
			$data['product_code'] = $this->input->post("product_code");
			$name = $this->input->post("product_name");
			$data['product_name'] = $name['thai'];
			if($name['english'] == ""){ $name['english'] = $name['thai']; }
			$data['product_name_en'] = $name['english'];
			$data['default_category_id'] = $this->input->post("default_category");
			$data['product_cost'] = $this->input->post("cost");
			$data['product_price'] = $this->input->post("price");
			$data['weight'] = $this->input->post("weight");
			$data['width'] = $this->input->post("width");
			$data['length'] = $this->input->post("length");
			$data['height'] = $this->input->post("height");
			$desc = $this->input->post("description");
			$data['description'] = $desc['thai'];
			if($desc['english'] == ""){ $desc['english'] = $desc['thai']; }
			$data['description_en'] = $desc['english'];
			$data['active'] = $this->input->post("active");
			$data['show'] = $this->input->post("visible");
			$data['under_zero'] = $this->input->post("allow_under_zero");
			$data['date_add'] = NOW();
			$category = $this->input->post("category");
			if( $this->verify->validate($this->id_menu, "add") )
			{
			$id = $this->product_model->update($id, $data);
				if($this->product_model->drop_category_product($id))
				{
					foreach($category as $cate)
					{
						$this->product_model->insert_category_product($id, $cate);
					}
					redirect($this->home);
				}else{
					setError("Cannot insert database");
					redirect($this->home);
				}
			}else{
				action_deny();
			}
		}else{
			$this->load->model("admin/category_model");
			$rs = $this->category_model->get_category_by_parent(1);
			$ro = $this->category_model->get_data();
			$ra = $this->product_model->get_product_attribute_data($id);
			$ri = $this->product_model->get_product_attribute_images();
			$data['cate'] = $rs;
			$data['data'] = $ro;
			$data['product_attribute_data'] = $ra;
			$data['image_set'] = $ri;
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
	
	public function valid_code($code, $id="")
	{
		if( $this->product_model->valid_code(urldecode($code), $id) )
		{
			echo "1"; // ซ้ำ
		}else{
			echo "0"; //ไม่ซ้ำ
		}
	}
	
}// End class


?>