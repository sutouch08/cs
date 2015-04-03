<?php
function valid_menu($id_menu, $url)
{	
	$c =& get_instance();
	$id_profile = $c->session->userdata("id_profile");
	if($id_profile == 0)
	{
		$url = base_url().$url;
	}else{
		$c->db->select("view");
		$ro = $c->db->get_where("tbl_access", array("id_profile"=>$id_profile, "id_menu"=>$id_menu), 1);
		if($ro->num_rows() ==1)
		{
			$rs = $ro->row();
			if($rs->view == 1)
			{ 
				$url = base_url().$url;
			}else{
				$url = "#";
			}
		}else{
			$url = "#";
		}
	}
	return $url;
}

function valid_access($id_menu)
{
	$c =& get_instance();
	$id_profile = $c->session->userdata("id_profile");
	$result = null;
	if($id_profile ==0)
	{
		$result['view'] = 1;
		$result['add'] = "";
		$result['edit'] = "";
		$result['delete'] = "";
		$result['print'] = "";
	}else{
		$limit = 1; // Limit 1 row
		$ro = $c->db->get_where("tbl_access", array("id_profile"=>$id_profile, "id_menu"=>$id_menu), $limit);
		if($ro->num_rows() ==1)
		{
			$rs = $ro->row();
			$result['view'] = $rs->view;
			$result['add'] = $rs->add ==1? "" : "style='display:none;'";
			$result['edit'] = $rs->edit ==1? "" : "style='display:none;'";
			$result['delete'] = $rs->delete ==1? "" : "style='display:none;'";
			$result['print'] = $rs->print ==1? "" : "style='display:none;'";
		}
	}
	return $result;
}

function action_deny()
{
	$deny_acton = array( "page_title"=>"Action deny");
	$c =& get_instance();
	return $c->load->view("deny_action", $deny_acton);
}

function access_deny()
{
	$page = array("page_title"=>"Access deny");
	$c =& get_instance();
	return $c->load->view("deny_page", $page );	
}

?>