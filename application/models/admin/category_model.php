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
	
	public function get_max_deep()
	{
		$rs = $this->db->select_max("level")->get("tbl_category",1);
		if($rs->num_rows() ==1)
		{
			return $rs->row()->level;
		}else{
			return 0;
		}
	}
	
	public function get_category_by_level($level)
	{
		$rs = $this->db->get_where("tbl_category", array("level"=>$level));
		if($rs->num_rows() >0)
		{
			return $rs->result();
		}else{
			return false;
		}
	}
	
}// End class

?>