<?php
function setError($message)
{
	$c =& get_instance();
	$c->session->set_flashdata("error", $message);
}

function setMessage($message)
{
	$c =& get_instance();
	$c->session->set_flashdata("success", $message);
}

function isActived($value)
{
	$icon = "<i class='fa fa-remove' style='color:red'></i>";
	if($value == "1")
	{
		$icon = "<i class='fa fa-check' style='color:green'></i>";
	}
	return $icon;
}
function isChecked($val1, $val2)
{
	$value = "";
	if( $val1 == $val2 )
	{
		$value = "checked='checked'";
	}
	return $value;
}
function selectColorGroup($id = "")
{
	$c =& get_instance();
	$option = "<option value='0'>------------ โปรดเลือก --------</option>";
	$select = "";
	$rs = $c->color_model->get_group();
	if($rs != false)
	{
		foreach($rs as $ro)
		{
			if($ro->active != 0)
			{
				if($ro->id_color_group == $id){ $select = "selected='selected'"; }else{ $select = ""; }
				$option .= "<option value='".$ro->id_color_group."' ".$select." >".$ro->group_name."</option>";
			}
		}
	}
	return $option;
}

function getColorGroup($id)
{
	$c =& get_instance();
	$value = "";
	$rs = $c->db->select("group_name")->get_where("tbl_color_group", array("id_color_group"=>$id), 1);
	if($rs->num_rows == 1)
	{
		return $rs->row()->group_name;
	}else{
		return $value;
	}
}
	

function getParentCategoryName($id_parent)
{
	$c =& get_instance();
	$name = "";
	$rs = $c->db->select("category_name")->get_where("tbl_category", array("id_category"=>$id_parent), 1);
	if($rs->num_rows == 1)
	{
		$name = $rs->row()->category_name();
	}
	return $name;
}



function getEmployeeNameByIdUser($id_user)
{
	$c =& get_instance();
	$name = "";
	$rs = $c->db->select("first_name")->join("tbl_employee","tbl_employee.id_employee = tbl_user.id_employee")->get_where("tbl_user", array("id_user"=>$id_user),1);
	if($rs->num_rows() == 1)
	{
		$name = $rs->row()->first_name;
	}
	return $name;	
}
?>