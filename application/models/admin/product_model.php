<?php 
class Product_model extends CI_Model
{
	public function __construch()
	{
		parent::__construct();
	}
	
	public function get_data($id = "")
	{
		if($id != "")
		{
			$this->db->where("id_product", $id);
		}
		$rs = $this->db->get("tbl_product");
		if($rs->num_rows() >0)
		{
			return $rs->result();
		}else{
			return false;
		}		
	}
	
	public function update($id, $data)
	{
		$rs = $this->db->where("id_product", $id)->update("tbl_product", $data);	
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	
	public function get_category_product($id)
	{
		$rs = $this->db->select("id_category")->get_where("tbl_category_product", array("id_product"=>$id));	
		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}else{
			return false;
		}
	}
	
	public function get_attribute_data_by_product($id)
	{
		$rs = $this->db->get_where("tbl_product_attribute", array("id_product"=>$id));
		if($rs->num_rows() >0)
		{
			return $rs->result();
		}else{
			return false;
		}
	}
	
	public function insert_id($data) // insert database and return id record if success
	{
		$rs = $this->db->insert("tbl_product", $data);
		if($rs)
		{
			$ro = $this->db->select("id_product")->where("product_code", $data['product_code'])->get("tbl_product");
			if($ro->num_rows() == 1)
			{
				return $ro->row()->id_product;
			}else{
				return false;
			}
		}else{
			return false;
		}	
	}
	
	
	public function  insert_category_product($id, $category)
	{
		$rs = $this->db->set("id_category", $category)->set("id_product", $id)->insert("tbl_category_product");
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	public function drop_category_product($id_product)
	{
		$rs = $this->db->delete("tbl_category_product", array("id_product"=>$id_product));
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	public function get_image_product($id)
	{
		$rs = $this->db->where("id_product", $id)->get("tbl_image");
		if($rs->num_rows() >0)
		{
			return $rs->result();
		}else{
			return false;
		}
	}
	
	public function valid_code($code, $id)
	{
		if($id !="")
		{
			$this->db->where("product_code", $code)->where("id_product !=", $id);
		}else{
			$this->db->where("product_code", $code);
		}
		$rs = $this->db->get("tbl_product");
		if($rs->num_rows() >0)
		{
			return true;
		}else{
			return false;
		}
	}
	
	// return max id of images
	public function max_id_image(){
		$rs = $this->db->select_max('id_image')->get("tbl_image");
		if($rs->num_rows() == 1){
			return $rs->row()->id_image;
		}else{
			return 0;
		}
	}
	
	public function max_position_image($id_product){
		$this->db->select_max('position',"position");
		$this->db->where("id_product", $id_product);
		$query =$this->db->get("tbl_image");
		return $query->row();
	}
	
	public function check_cover_image($id_product){
		$this->db->where('cover', 1);
		$this->db->where("id_product", $id_product);
		$rs = $this->db->get("tbl_image");
		return $rs->num_rows();
	}
	
	public function image_data($id){
		$this->db->where("id_product", $id);
		$query =$this->db->get("tbl_image");
		return $query->result();
	}
	
	public function insert_image($data){
		$this->db->insert("tbl_image", $data);
	}
	
	public function delete_img($id){
		$rs = $this->db->delete("tbl_image", array("id_image" =>$id));
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	/**************************  Product Attribute **********************/
	
	public function insert_product_attribute($data)
	{
		$rs = $this->db->insert("tbl_product_attribute", $data);
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	
}// End class

?>