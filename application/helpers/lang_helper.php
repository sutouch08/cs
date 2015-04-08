<?php 

function label($label)
{
	$ci =& get_instance();
	$rs = $ci->lang->line($label);
	if($rs)
	{
		return $rs;
	}else{
		return $label;
	}
}

function multi_lang()
{
	$ci =& get_instance();
	$rs = $ci->db->select("value")->get_where("tbl_config", array("config_name"=>"MULTI_LANG"),1);
	if($rs->num_rows() == 1)
	{
		$re = $rs->row()->value;
		if($re == 1 )
		{
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

?>