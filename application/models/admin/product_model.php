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
	
	
}// End class

?>