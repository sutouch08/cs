

<!--  ***********************************   Side menu Start ************************************** -->
	<ul class="nav nav-list">
    
		<li class=""><a href="#"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard </span></a></li><!-- First Level Menu -->  
        <!--/*******************************************************************  เมนูสินค้า  ********************************************************************/-->
        <!-- <li class="active open">  -->
		<li class=""><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-tags"></i><span class="menu-text">สินค้า</span><b class="arrow fa fa-angle-down"></b></a><!-- First Level -->
			<ul class="submenu">  <!-- Second Level Menu -->
            	<li class=""><a href="<?php echo valid_menu(1,"admin/product"); ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข สินค้า</a><b class="arrow"></b></li> <!-- Second Level -->	
                <li class=""><a href="<?php echo valid_menu(1,"admin/category"); ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข หมวดหมู่</a><b class="arrow"></b></li> <!-- Second Level -->	
                <li class=""><a href="<?php echo valid_menu(1,"admin/color"); ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข สี</a><b class="arrow"></b></li> <!-- Second Level -->	
                <li class=""><a href="<?php echo valid_menu(1,"admin/color/color_group"); ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข กลุ่มสี</a><b class="arrow"></b></li> <!-- Second Level -->	
                <li class=""><a href="<?php echo valid_menu(1,"admin/size"); ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข ไซด์</a><b class="arrow"></b></li> <!-- Second Level -->	
                <li class=""><a href="<?php echo valid_menu(1,"admin/attribute"); ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข คุณลักษณะ</a><b class="arrow"></b></li> <!-- Second Level -->	
			</ul><!-- Second Level -->
		</li><!-- First Level -->
        <!--/*******************************************************************  จบเมนูสินค้า  ********************************************************************/-->
        
        <!--/*******************************************************************  เมนูคลังสินค้า ********************************************************************/-->
        <li calss=""><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-home"></i><span class="menu-text">คลังสินค้า</span><b class="arrow fa fa-angle-down"></b></a><!-- First Level -->
        	<ul class="submenu"><!-- Second Level -->
            	<li class=""><a href="<?php echo "#"; ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข คลังสินค้า</a><b class="arrow"></b></li> <!-- Second Level -->	
                <li class=""><a href="<?php echo "#"; ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข โซนสินค้า</a><b class="arrow"></b></li> <!-- Second Level -->	
            </ul><!-- Second Level -->
         </li><!-- First Level -->
        <!--/*******************************************************************  จบเมนูคลังสินค้า  ********************************************************************/-->
        
        <!--/*******************************************************************  เมนูพนักงาน  ********************************************************************/-->
        <li class=""><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-group"></i><span class="menu-text">พนักงาน</span><b class="arrow fa fa-angle-down"></b></a>
        	<ul class="submenu"><!-- Second Level -->
            	<li><a href="<?php echo "#"; ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข พนักงาน</a><b class="arrow"></b></li>
                <li><a href="<?php echo "#"; ?>"><i class="menu-icon fa fa-caret-right"></i>เพิ่ม/แก้ไข ชื่อผู้ใช้งาน</a><b class="arrow"></b></li>
            </ul><!-- Second Level -->        
        </li><!-- First Level -->
         <!--/*******************************************************************  จบเมนูพนักงาน  ********************************************************************/-->
 
        <!-- **********************************  เก็บไว้เป็นตัวอย่าง ***********************************
		<li class=""><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-file-o"></i>
        	<span class="menu-text"> Other Pages 
            <!-- #section:basics/sidebar.layout.badge 
            	<span class="badge badge-primary">5</span></span> <b class="arrow fa fa-angle-down"></b></a>	<b class="arrow"></b>
			<ul class="submenu">
				<li class=""><a href="#"><i class="menu-icon fa fa-caret-right"></i>FAQ	</a><b class="arrow"></b></li>
				<li class="active"><a href="#"><i class="menu-icon fa fa-caret-right"></i>Blank Page</a></li>
			</ul>
		</li>
        ****************************************************************************************** -->
	</ul><!-- /.nav-list -->
    