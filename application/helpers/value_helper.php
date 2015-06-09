<?php

function pagination_config()
{		
		$config['full_tag_open'] 		= "<nav><ul class='pagination'>";
		$config['full_tag_close'] 		= "</ul></nav>";
		$config['first_link'] 				= 'First';
		$config['first_tag_open'] 		= "<li>";
		$config['first_tag_close'] 		= "</li>";
		$config['next_link'] 				= 'Next';
		$config['next_tag_open'] 		= "<li>";
		$config['next_tag_close'] 	= "</li>";
		$config['prev_link'] 			= 'prev';
		$config['prev_tag_open'] 	= "<li>";
		$config['prev_tag_close'] 	= "</li>";
		$config['last_link'] 				= 'Last';
		$config['last_tag_open'] 		= "<li>";
		$config['last_tag_close'] 		= "</li>";
		$config['cur_tag_open'] 		= "<li class='active'><a href='#'>";
		$config['cur_tag_close'] 		= "</a></li>";
		$config['num_tag_open'] 		= '<li>';
		$config['num_tag_close'] 		= "</li>";
		$config['uri_segment'] 		= 4;
		return $config;
}

function getConfig($name)
{
	$c =& get_instance();
	$rs = $c->db->select("value")->get_where("tbl_config", array("config_name"=>$name),1);	
	if($rs->num_rows() == 1 )
	{
		return $rs->row()->value;
	}else{
		return false;
	}
}

function set_session($name, $value)
{
	$c =& get_instance();
	$c->session->set_userdata($name, $value);
}

?>