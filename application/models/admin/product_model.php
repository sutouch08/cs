<?php 
class Product_model extends CI_Model
{
	public function __construch()
	{
		parent::__construct();
	}
	
	public function count_row()
	{
		$rs = $this->db->get("tbl_product");
		if($rs->num_rows() >0 ){
			return $rs->num_rows();
		}else{
			return false;
		}
	}
	
	public function search_count_row($txt)
	{
		$this->db->like("product_code", $txt)->or_like("product_name", $txt);
		$rs = $this->db->get("tbl_product");
		if($rs->num_rows() >0 ){
			return $rs->num_rows();
		}else{
			return false;
		}
	}
	/*************************  Product  ****************************/
	public function get_data($id="", $perpage="", $limit ="")
	{
		if($id !=""){
			$rs = $this->db->get_where("tbl_product", array("id_product"=>$id), 1);
			if($rs->num_rows() == 1){
				return $rs->result();
			}else{
				return false;
			}
		}else{
			$this->db->order_by("date_upd","desc");
			$rs = $this->db->limit($perpage, $limit)->get("tbl_product");
			if($rs->num_rows() >0 ){
				return $rs->result();
			}else{
				return false;
			}
		}
	}
	
	public function get_search_data($txt, $perpage="", $limit ="")
	{
		$this->db->like("product_code", $txt)->or_like("product_name", $txt);
			$rs = $this->db->limit($perpage, $limit)->get("tbl_product");
			if($rs->num_rows() >0 ){
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

	/********************************* End Product  *********************************/
	
	/********************************* Product Attribute ***********************************/	
	public function update_attribute($id_product_attribute, $data)
	{
		$rs = $this->db->where("id_product_attribute", $id_product_attribute)->update("tbl_product_attribute", $data);
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	public function get_attribute_data($id) //*** get data of product_attribute
	{
		$rs = $this->db->where("id_product_attribute", $id)->get("tbl_product_attribute",1);
		if($rs->num_rows() == 1 )
		{
			return $rs->result();
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
			return $this->db->insert_id();
		}else{
			return false;
		}	
	}
	
	public function delete_attribute($id_product_attribute)
	{
		$rs = $this->db->delete("tbl_product_attribute", array("id_product_attribute"=>$id_product_attribute) );
		if($rs)
		{
			return true;
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
	
	public function valid_reference($code, $id)
	{
		if($id !="")
		{
			$this->db->where("reference", $code)->where("id_product_attribute !=", $id);
		}else{
			$this->db->where("reference", $code);
		}
		$rs = $this->db->get("tbl_product_attribute");
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
	
	public function insert_attribute_image($data)
	{
		$rs = $this->db->insert("tbl_product_attribute_image", $data);	
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	public function update_attribute_image($id_product_attribute, $id_image)
	{
		$rs = $this->db->where("id_product_attribute", $id_product_attribute)->update("tbl_product_attribute_image", array("id_image"=>$id_image));
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	public function already_in_attribute_image($id_product_attribute)
	{
		$rs = $this->db->get_where("tbl_product_attribute_image", array("id_product_attribute"=>$id_product_attribute));
		if($rs->num_rows() >0)
		{
			return true;
		}else{
			return false;
		}
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
	
	public function remove_attribute_image($id_product_attribute){  /// delete data from tbl_product_attribute_image
		$rs = $this->db->delete("tbl_product_attribute_image", array("id_product_attribute" =>$id_product_attribute));
		if($rs)
		{
			return true;
		}else{
			return false;
		}
	}
	
	public function get_cover_image_id($id_product)
	{
		$rs = $this->db->where("id_product", $id_product)->where("cover", 1)->get("tbl_image");
		if($rs->num_rows() ==1)
		{
			return $rs->row()->id_image;
		}else{
			return false;
		}
	}
	
	public function set_cover($id_product, $old_cover_id, $new_cover_id)
	{
		$ro = $this->db->where("id_product", $id_product)->where("id_image", $old_cover_id)->update("tbl_image", array("cover"=>0));
		if($ro){
			$rs = $this->db->where("id_product", $id_product)->where("id_image", $new_cover_id)->update("tbl_image", array("cover"=>1));
			if($rs)
			{
				return true;
			}else{
				return false;
			}
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
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	
}// End class

?>