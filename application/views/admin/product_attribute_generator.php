<?php /***********************************   ระบบตรวจสอบสิทธิ์  ******************************************/ ?>
<?php $access = valid_access($id_menu);  ?>
<?php if($access['view'] != 1) : ?>
<?php access_deny();  ?>
<?php else : ?>

<div class='row'>
	<div class='col-lg-6'>
    	<h3 style='margin-bottom:10px;'></h3>
    </div>
    
    <div class="col-lg-6">
    	<p class='pull-right'>
         </p>
    </div>
</div><!-- End Row -->
<hr style='border-color:#CCC; margin-top: 0px; margin-bottom:10px;' />

<div class='row'>
	<div class='col-xs-12'>
<!-- ******************************************************************  Start  ************************************************-->
	<div class="widget-box">
	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter"><i class='fa fa-qrcode'></i>&nbsp; <?php echo label("combinations_generator"); ?></h4>
	</div>
    <div class="widget-body">
	<div class="widget-main">
	<!-- #section:plugins/fuelux.wizard -->
		<div id="fuelux-wizard-container">
			<div>
			<!-- #section:plugins/fuelux.wizard.steps -->
				<ul class="steps">
                	<li data-step="1" class="active" id="li1">
						<span class="step">1</span>
						<span class="title"><?php echo label("choose_format"); ?></span>
					</li>
                    <li data-step="2" id="li2">
						<span class="step">2</span>
						<span class="title"><?php echo label("choose_attribute"); ?></span>
					</li>
                    <li data-step="3" id="li3">
						<span class="step">3</span>
						<span class="title"><?php echo label("choose_images"); ?></span>
					</li> 
					<li data-step="4" id="li4">
						<span class="step">4</span>
						<span class="title"><?php echo label("start_generate"); ?></span>
					</li>  
				</ul>
			<!-- /section:plugins/fuelux.wizard.steps -->
			</div>
	<hr>

			<!-- #section:plugins/fuelux.wizard.container -->
            <form class="form-horizontal" role="form">
			<div class="step-content pos-rel">
				<div class="step-pane active" data-step="1" id="step1">
                	<div class="form-group">
                    	<label class="col-xs-6 col-sm-1 control-label no-padding-right" for="main_code"><?php echo label("main_code"); ?></label>
                        <div class="col-xs-12 col-sm-2"><input type="text" class="col-xs-12 col-sm-12" value="<?php echo get_product_code($data); ?>" /></div>
                        <label class="col-xs-6 col-sm-1 control-label no-padding-right" for="separator"><?php echo label("separator"); ?></label>
                        <div class="col-xs-12 col-sm-2">
                        	<select name="separator" id="separator" class="input-small">
                            	<option value="-">		-	 </option>
                                <option value="/">		/	 </option>
                                <option value=":">		:	 </option>
                                <option value="">	  none </option>
                            </select>
                        </div>
                        <label class="col-xs-6 col-sm-1 control-label no-padding-right" for="attribute_group"><?php echo label("use_attribute"); ?></label>
                        <div class="col-xs-12 col-sm-4">
                        	<div class="col-xs-6 col-sm-4">
                            	<div class="checkbox">
                                <label><input type="checkbox" class="ace" name="color" id="color" value="1" /><span class="lbl">&nbsp;<?php echo label("color"); ?></span></label>
                                </div>
                           </div>
                           
                           <div class="col-xs-6 col-sm-4">
                            	<div class="checkbox">
                                <label><input type="checkbox" class="ace" name="size" id="size" value="2" /><span class="lbl">&nbsp;<?php echo label("size"); ?></span></label>
                                </div>
                           </div>
                           
                           <div class="col-xs-6 col-sm-4">
                            	<div class="checkbox">
                                <label><input type="checkbox" class="ace" name="attribute" id="attribute" value="3" /><span class="lbl">&nbsp;<?php echo label("attrubute"); ?></span></label>
                                </div>
                           </div>
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                    	<label class="col-xs-6 col-sm-1 control-label no-padding-right"><?php echo label("number"); ?></label>
                        <label class="col-xs-6 col-sm-1 control-label no-padding-right"><?php echo label("color"); ?></label>
                        <div class="col-xs-12 col-sm-1">
                        	<select name="color_no" id="color_no" class="input-small" disabled="disabled">
                            	<option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <label class="col-xs-6 col-sm-1 control-label no-padding-right"><?php echo label("size"); ?></label>
                        <div class="col-xs-12 col-sm-1">
                        	<select name="size_no" id="size_no" class="input-small" disabled="disabled">
                            	<option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <label class="col-xs-6 col-sm-1 control-label no-padding-right"><?php echo label("attribute"); ?></label>
                        <div class="col-xs-12 col-sm-1">
                        	<select name="attribute_no" id="attribute_no" class="input-small" disabled="disabled">
                            	<option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        
                    </div><!-- / form-group -->
                    
                    
                </div><!-- / setp1 -->
                <div class="step-pane" data-step="2" id="step2">
   
                </div>
                <div class="step-pane" data-step="3" id="step3">
                    
                </div>
                <div class="step-pane" data-step="4" id="step4">
                                                            
                </div>
			</div>

		<!-- /section:plugins/fuelux.wizard.container -->
		</div>
        </form>

		<hr>
		<div class="wizard-actions">
		<!-- #section:plugins/fuelux.wizard.buttons -->
			<button id="prev_btn" disabled="disabled" class="btn btn-prev"><i class="ace-icon fa fa-arrow-left"></i>Prev</button>
            <button id="next_btn" class="btn btn-success btn-next" data-last="Finish">Next<i class="ace-icon fa fa-arrow-right icon-on-right"></i></button>
		<!-- /section:plugins/fuelux.wizard.buttons -->
		</div>
		<!-- /section:plugins/fuelux.wizard -->
		</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->
</div>


<!-- *****************************************************************  End  **************************************************-->    	
	</div><!-- End col-lg-12 -->
</div><!-- End row -->
<script>
	var S1 = $("#step1");
	var S2 = $("#step2");
	var S3 = $("#step3");
	var S4 = $("#step4");
	var li1 = $("#li1");
	var li2 = $("#li2");
	var li3 = $("#li3");
	var li4 = $("#li4");
	var step = 1;
	function gotoStep()
	{
		if(step >4){ step = 4; }
		switch(step){
			case 1 :
				S1.addClass("active");
				S2.removeClass("active");
				S3.removeClass("active");
				S4.removeClass("active");
				li1.addClass("active");
				li2.removeClass("active");
				li3.removeClass("active");
				li4.removeClass("active");
				$("#prev_btn").attr("disabled","disabled");
				break;
			case 2 :
				S1.removeClass("active");
				S2.addClass("active");
				S3.removeClass("active");
				S4.removeClass("active");
				li1.addClass("active");
				li2.addClass("active");
				li3.removeClass("active");
				li4.removeClass("active");
				$("#prev_btn").removeAttr("disabled");
				break;
			case 3 :
				S1.removeClass("active");
				S2.removeClass("active");
				S3.addClass("active");
				S4.removeClass("active");
				li1.addClass("active");
				li2.addClass("active");
				li3.addClass("active");
				li4.removeClass("active");
				$("#prev_btn").removeAttr("disabled");
				$("#next_btn").html("Next <i class=\"ace-icon fa fa-arrow-right icon-on-right\"></i>");
				$("#next_btn").removeAttr("disabled");
				break;
			case 4 :
				S1.removeClass("active");
				S2.removeClass("active");
				S3.removeClass("active");
				S4.addClass("active");
				li1.addClass("active");
				li2.addClass("active");
				li3.addClass("active");
				li4.addClass("active");
				$("#prev_btn").removeAttr("disabled");
				$("#next_btn").html("Finish <i class=\"ace-icon fa fa-arrow-right icon-on-right\"></i>");
				$("#next_btn").attr("disabled", "disabled");
				break;
			default :
				S1.removeClass("active");
				S2.removeClass("active");
				S3.removeClass("active");
				S4.addClass("active");
				$("#prev_btn").removeAttr("disabled");
				break;
		}
	}
	$("#next_btn").click(function(e) {
        step++;
		gotoStep();
    });
	$("#prev_btn").click(function(e) {
        step--;
		gotoStep();
    });
	$("#color").change(function(e) {
        if($(this).is(":checked")){
			$("#color_no").removeAttr("disabled");
		}else if($(this).is(":not(:checked)")){
			$("#color_no").attr("disabled", "disabled");
		}
    });
	$("#size").change(function(e) {
        if($(this).is(":checked")){
			$("#size_no").removeAttr("disabled");
		}else if($(this).is(":not(:checked)")){
			$("#size_no").attr("disabled", "disabled");
		}
    });
	$("#attribute").change(function(e) {
        if($(this).is(":checked")){
			$("#attribute_no").removeAttr("disabled");
		}else if($(this).is(":not(:checked)")){
			$("#attribute_no").attr("disabled", "disabled");
		}
    });
</script>
<?php endif; ?>