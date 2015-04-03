<?php
class Category_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}
	
	public function get_data($id="")
	{
		if($id !="")
		{
			$this->db->where("id_category", $id);	
		}
		$rs = $this->db->get("tbl_category");
		if($rs->num_rows() >0)
		{
			return $rs->result();
		}else{
			return false;
		}
	}
	
	
}// End class

?>