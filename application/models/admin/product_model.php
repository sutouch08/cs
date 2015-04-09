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
	
}// End class

?>