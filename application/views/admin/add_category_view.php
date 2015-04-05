<?php /***********************************   ระบบตรวจสอบสิทธิ์  ******************************************/ ?>
<?php $access = valid_access($id_menu);  ?>
<?php if($access['view'] != 1) : ?>
<?php access_deny();  ?>
<?php else : ?>
<div class='row'>
	<div class='col-lg-6'>
    	<h3 style='margin-bottom:0px;'><i class='fa fa-tag'></i>&nbsp; <?php echo $this->title; ?></h3>
    </div>
    <div class="col-lg-6">
    	<p class='pull-right'>
        	<a href="<?php echo $this->home; ?>">
        		<button class='btn btn-warning'><i class='fa fa-remove'></i>&nbsp; ยกเลิก</button>
             </a>
             	<button class='btn btn-success' <?php echo $access['add']; ?> onclick="save();"><i class='fa fa-save'></i>&nbsp; บันทึก</button>   	
         </p>
    </div>
</div><!-- End Row -->
<hr style='border-color:#CCC; margin-top: 0px; margin-bottom:20px;' />
<?php echo form_open("invent/category/insert_data", "class='form-horizontal'"); ?>
<div class="col-sm-8 ">
	<div class="row" <?php echo $access['add']; ?>>
		<div class="profile-user-info profile-user-info-striped ">
            <div class="profile-info-row"><!-- group -->
                <div class="profile-info-name">
                <?php echo form_button('btn_submit','Submit',"id='btn_submit' type='button' style='display:none'"); ?>
                	<label>ชื่อหมวดหมู่</label>
                </div>
                <div class="profile-info-value">
                    <?php echo form_input(array("name"=>"category_name","id"=>"category_name", "type"=>"text", "autocomplete"=>"off", "class"=>"input-xlarge", "required"=>"required"), ""); ?>
                    <?php echo form_input(array("name"=>"valid_name","id"=>"valid_name", "type"=>"hidden"), "0"); ?>
                </div>
            </div><!-- End group -->
            <div class="profile-info-row"><!-- group -->
                <div class="profile-info-name">
                	<label>แสดงผล</label>
                </div>
                <div class="profile-info-value">
					 <label>
                   		<input name="switch-field-1" id="toggle" class="ace ace-switch ace-switch-4" type="checkbox" checked="checked" />	
                        <span class="lbl"></span>
					</label>
                    <input type="hidden" name="active" id="active" />
                </div>
            </div><!-- End group -->
            <div class="profile-info-row"><!-- group -->
                <div class="profile-info-name">
                	<label>เปิดใช้งาน</label>
                </div>
                <div class="profile-info-value">
					 <label>
                   		<input name="switch-field-1" id="toggle" class="ace ace-switch ace-switch-4" type="checkbox" checked="checked" />	
                        <span class="lbl"></span>
					</label>
                    <input type="hidden" name="active" id="active" />
                </div>
            </div><!-- End group -->
              <div class="profile-info-row"><!-- group -->
                <div class="profile-info-name">
                	<label>หมวดหมู่หลัก</label>
                </div>
                <div class="profile-info-value">
               		<label for="home">
                          <input type="radio" name="id_category" value="0" id="home" checked="checked" class="ace">
                    	 <span class="lbl"> <?php echo "HOME"; ?></span>
                    </label>
               		<ul class='tree tree-selectable'><!--lavel1 -->
                    <?php foreach($cate as $rs):  ?>
                    	<li class="tree-branch tree-open">
                        	<div class="tree-branch-header">
                            	<span class="tree-branch-name">
                    				<span class="tree-label">
                                   		 <label for="<?php echo $rs->category_name;?>">
                                             <input type="radio" name="id_category" value="<?php echo $rs->id_category;?>" id="<?php echo $rs->category_name;?>" class="ace">
                                             <span class="lbl"> <?php echo $rs->category_name."<br>"; ?></span>
                                        </label>
                                    </span>
                                </span>
                        	</div>
                            <?php $c =& get_instance(); $c->display_children($rs->id_category,$rs->level+1); ?>  
                        </li>
                    <?php endforeach; ?>                    
                    </ul>
                </div>
            </div><!-- End group -->
		</div>
	</div><!-- End of row -->
</div>
<?php echo form_close(); ?>
<script>
$(window).load(function(){
	if($("#toggle").attr("checked") == "checked"){
		$("#active").val(1);
	}else{
		$("#active").val(0);
	}
});
$("#toggle").change(function(){
	if($(this).attr("checked") == "checked"){
		$(this).removeAttr("checked");
		$("#active").val(0);
	}else{
		$(this).attr("checked","checked");
		$("#active").val(1);
	}	
});
$("#btn_save").click(function(){
	var valid_name = $("#valid_name").val();
	if(valid_name == 1){
		alert("ชื่อซ้ำ");
		$("#category_name").focus();
	}else{
		$("#btn_submit").attr("type","submit");
		$("#btn_submit").click();	
	}
});
$("#category_name").keyup(function(e) {
    var name = $("#category_name").val();
	$.ajax({
		url:"valid_name/"+name,
		type:"POST",
		cache:false ,
		success: function(row){
			if(row != 0){
				$("#valid_name").val(1);
			}else{
				$("#valid_name").val(0);
			}
		}
	});		
});
</script>
<?php endif; ?>