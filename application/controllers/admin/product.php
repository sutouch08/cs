<?php
class Product extends CI_Controller
{
	public $id_menu = 1;
	public $home;
	public $layout = "include/template";
	public $title = "Products";
	public $original_path;
	public $product_path;
	public $image_path;
	
	public function __construct()
	{
		parent:: __construct();
		$this->home = base_url()."admin/product";
		$this->load->model("admin/product_model");
		$this->image_path = "images";
		$this->original_path = "images/original";
		$this->product_path = "images/product/";
		$this->image_use_size = array(
				"default" => 600,
				"mini" => 50,
				"medium" => 150,
				"large" => 800
		);
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
			$desc = $this->input->post("description");
			$data['product_name'] = $name['thai'];
			$data['product_name_en'] = $name['english'];
			if($name['english'] =="" ){ $data['product_name_en'] = $name['thai']; }
			$data['default_category_id'] = $this->input->post("default_category");
			$data['product_cost'] = $this->input->post("cost");
			$data['product_price'] = $this->input->post("price");
			$data['product_weight'] = $this->input->post("weight");
			$data['description'] = $desc['thai'];
			$data['description_en'] = $desc['english'];
			if( $desc['english'] == "" ){ $data['description_en'] = $desc['thai']; }
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


public function edit_product($id, $tab="", $id_product_attribute="")
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
			$data['product_weight'] = $this->input->post("weight");
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
				$this->product_model->update($id, $data);
				if($this->product_model->drop_category_product($id))
				{
					foreach($category as $cate)
					{
						$this->product_model->insert_category_product($id, $cate);
					}
					redirect($this->home);
				}else{
					setError(error("101"));
					redirect($this->home);
				}
			}else{
				action_deny();
			}
		}else{
			$this->load->model("admin/category_model");
			$rs = $this->category_model->get_category_by_parent(1);
			$ro = $this->category_model->get_data();
			$rc = $this->product_model->get_category_product($id);
			$rp = $this->product_model->get_data($id);
			$ra = $this->product_model->get_attribute_data_by_product($id);
			$im = $this->product_model->get_image_product($id);
			if($id_product_attribute !=""){ 
				$rpa = $this->product_model->get_attribute_data($id_product_attribute);
				$id_img = get_attribute_image_id($id_product_attribute);
				$data['attribute_data'] = $rpa;
				$data['id_image'] = $id_img;
			}
			$data['id_product'] = $id;
			$data['cate'] = $rs;
			$data['cate_data'] = $rc;
			$data['product_data'] = $rp;
			$data['attribute'] = $ra;
			$data['image_list'] = $im;
			$data['id_menu'] = $this->id_menu;
			$data['view'] = "admin/edit_product_view";
			$data['page_title'] = $this->title;
			$data['tab'] = $tab;
			$this->load->view($this->layout, $data);
		}		
	}

public function add_attribute()
{
	if( $this->input->post("id_product") )
	{
		if( !$this->verify->validate($this->id_menu, "add") )
		{
			action_deny();
		}else{
		$data = array(
			"id_product" => $this->input->post("id_product"),
			"reference" => $this->input->post("reference"),
			"barcode" => $this->input->post("barcode"),
			"id_color" => $this->input->post("color"),
			"id_size" => $this->input->post("size"),
			"id_attribute" => $this->input->post("attribute"),
			"cost" => $this->input->post("cost"),
			"price" => $this->input->post("price"),
			"weight"=> $this->input->post("weight"),
			"date_add" => NOW()
		);
		
		$rs = $this->product_model->insert_product_attribute($data);
		if( $rs != false )
		{
			if($this->input->post("id_image"))
			{
				$img_data = array(
					"id_product_attribute"=>$rs,
					"id_image"=>$this->input->post("id_image")
					);
				$this->product_model->insert_attribute_image($img_data);
			}
		}else{
			setError(error("error101"));
		}	
		$this->edit_product($this->input->post("id_product"), "tab2");
		}
	}else{
		setError( error("eror101") );
		$this->index();
	}			
}


public function edit_attribute($id_product, $id_product_attribute)
{
	if( $this->input->post("edit") )
	{
		if( $this->verify->validate($this->id_menu, "edit") )
		{
			$data = array(
			"reference" => $this->input->post("reference"),
			"barcode" => $this->input->post("barcode"),
			"id_color" => $this->input->post("color"),
			"id_size" => $this->input->post("size"),
			"id_attribute" => $this->input->post("attribute"),
			"cost" => $this->input->post("cost"),
			"price" => $this->input->post("price"),
			"weight"=> $this->input->post("weight"),
			);
			$rs = $this->product_model->update_attribute($id_product_attribute, $data);
			if($this->input->post("id_image"))
			{
				$img_data = array(
					"id_product_attribute"=>$id_product_attribute,
					"id_image"=>$this->input->post("id_image")
					);
					if( $this->product_model->already_in_attribute_image($id_product_attribute) )
					{
						$this->product_model->update_attribute_image($id_product_attribute, $this->input->post("id_image"));
					}else{
						$this->product_model->insert_attribute_image($img_data);
					}
			}
			if(!$rs)
			{
				setError(error("error102"));
			}
			redirect($this->home."/edit_product/".$id_product."/tab2");
		}else{
			setError(error("action_deny")); 
			redirect($this->home."/edit_product/".$id_product."/tab2");
		}
	}else{
		$this->edit_product($id_product, "tab2", $id_product_attribute);
	}
}


public function delete_attribute($id_product, $id_product_attribute)
{
	$rs = $this->product_model->delete_attribute($id_product_attribute);
	if($rs)
	{
		$im = $this->product_model->remove_attribute_image($id_product_attribute);
	}else{
		setError(error("error103"));
	}
	redirect($this->home."/edit_product/".$id_product."/tab2");
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
												 <input type='checkbox' name='category[]' value='". $ra->id_category."' id='".$ra->category_name."' class='ace' ".category_product_check($ra->id_category, $checked)." />
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
	
	public function valid_attribute($code, $id="")
	{
		if( $this->product_model->valid_reference(urldecode($code), $id) )
		{
			echo "1"; // ซ้ำ
		}else{
			echo "0"; //ไม่ซ้ำ
		}
	}
	
	
	public function upload(){
		//$file = $this->input->post("file");
		$id_product = $this->input->post("id_product");
		 foreach($_FILES['file'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;   
            }
        }
        // Unset the useless one ;)
        unset($_FILES['file']);
		$i = 1;
		foreach($_FILES as $img => $value):
			$i++;
			$config = array(   // initial config for upload class
				"allowed_types" => "gif|jpg|jpeg|png",
				"upload_path" => $this->original_path,
				"max_size" => 2048,
				"overwrite" => TRUE
			);
			$this->load->library("upload", $config);	
			if(!$this->upload->do_upload($img)){
				setError($this->upload->display_errors());
			}else{
			
			$max = $this->product_model->max_id_image();
			$id_image = ($max + 1);
			$img_name = $id_image;
			$count = strlen($id_image);
			$path = str_split($id_image);
			$image_path = "";
			$n=0;
					while($n<$count){
						$image_path .= "/".$path[$n];
						$n++;
					}
			if (!is_dir($this->product_path.$image_path)) {     mkdir($this->product_path.$image_path, 0777, true);   }	
			$image_path .= "/";
			$data = $this->upload->data(); // pass data when upload complete
			$this->load->library("image_lib");
			$h_size = 800;
			$w_size = 800;
			$dim = ($data['image_width'] / $data['image_height']) - 1;
			$min_w = ($dim >0)? $data['image_height'] : $data['image_width'];
			$min_h = ($dim >0)? $data['image_height'] : $data['image_width'];
			$y_axis = ($data['image_height']/2) - ($min_w/2);
			$x_axis = ($data['image_width']/2) - ($min_h/2);
			$config = array(  /// setup configuration for crop image method
				"source_image" => $data['full_path'],
				"maintain_ratio" => FALSE,
				"width" => $min_w,
				"height" => $min_h,
				"y_axis" => $y_axis,
				"x_axis" => $x_axis,
			);	
			$this->image_lib->initialize($config); /// apply configuration
			if(!$this->image_lib->crop()){   /// do crop image
					echo $this->image_lib->display_errors();
				}
				$this->image_lib->clear(); // clear memory
			 foreach($this->image_use_size as $image=>$size){  /// resize image for each user size ///
				   $config = array(  /// setup config for resize image
						 "source_image"=>$data['full_path'],  /// full path to source image (data from upload class)
						 "maintain_ratio"=>TRUE,
						 "width"=>$size, 
						 "height"=>$size,
						 "new_image" => $this->image_path."/product$image_path".$image."_".$img_name.".jpg" // copy source file to new path
					 );   
					$this->image_lib->initialize($config); // apply configuration
					if(!$this->image_lib->resize()){  // do resize image
						echo $this->image_lib->display_errors();
					}
					 $this->image_lib->clear(); /// reset 
			   }/// End foreach
			   $max_position_image = $this->product_model->max_position_image($id_product);
			   $next_position_image = $max_position_image->position + 1;
			   $cover_image = $this->product_model->check_cover_image($id_product);
			   if($cover_image > 0){
				   $cover = 0;
			   }else{
				   $cover = 1;
			   }
			   $insert = array(
					"id_product"=>$id_product,
					"id_image"=>$id_image,
					"position"=>$next_position_image,
					"cover"=>$cover
				);
				$this->product_model->insert_image($insert);
			}
		endforeach;     
		redirect($this->home."/edit_product/".$id_product."/tab3");
		
	}/// End of do_upload
	
	
	public function setCover($id_product, $id_image)
	{
		if($id_product !="" && $id_image !="")
		{
			if( $this->verify->validate($this->id_menu, "edit") )
			{
				$id_cover = $this->product_model->get_cover_image_id($id_product);
				if($id_cover != false)
				{	
					$rs = $this->product_model->set_cover($id_product, $id_cover, $id_image);
					if($rs){
						redirect($this->home."/edit_product/".$id_product."/tab3");
					}else{
						setError(error("error102"));
						redirect($this->home."/edit_product/".$id_product."/tab3");
					}
				}else{
					$rs = $this->product_model->set_cover($id_product, $id_cover, $id_image);
					redirect($this->home."/edit_product/".$id_product."/tab3");
				}
			}else{
				setError(error("action_deny"));
				redirect($this->home."/edit_product/".$id_product."/tab3");
			}
		}else{
			setError(label("error201"));
			redirect($this->home);
		}
	}
	
	public function delete_image($id,$id_product){
		if($this->product_model->delete_img($id))
		{			
				delete_image($id);			
		}else{
			setError("Cannot delete image");
		} 
		$this->edit_product($id_product,"tab3");
	}
	
	
}// End class


?>