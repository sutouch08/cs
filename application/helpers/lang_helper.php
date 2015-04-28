<?php 
function get_user_profile($id)
{
	$c =& get_instance();
	$rs = $c->db->where("id_user", $id)->get("tbl_personal_config",1);
	if($rs->num_rows() == 1)
	{
		return $rs->result_array();
	}else{
		return false;
	}
}

function get_lang($id_user)
{
	$c =& get_instance();
	$rs = $c->db->select("language")->where("id_user", $id_user)->get("tbl_personal_config",1);
	if($rs->num_rows() ==1 )
	{
		return $rs->row()->language;
	}else{
		return "thai";
	}
}

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