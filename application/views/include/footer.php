<!-- PAGE CONTENT ENDS --> 
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.scroller.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.colorpicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.fileinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.typeahead.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.wysiwyg.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.spinner.js"></script>
        
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.treeview.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.wizard.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/elements.aside.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.ajax-content.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.touch-drag.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.sidebar.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.submenu-hover.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.widget-box.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.settings.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.settings-rtl.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.settings-skin.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace/ace.searchbox-autocomplete.js"></script>

		<!-- inline scripts related to this page -->
<script>  
function checkerror(){
    if($("#error").length){
		var mess = $("#error").val();
		swal("เกิดข้อผิดพลาด!", mess, "error");
	}else if($("#success").length){
		var mess = $("#success").val();
		swal("สำเร็จ", mess, "success");
	}
}  
function confirm_delete(title, text, url, confirm_text, cancle_text)
{
	var confirm_text = typeof confirm_text !== 'undefined' ? confirm_text : "ใช่";
	var cancle_text = typeof cancle_text !== 'undefined' ? cancle_text : "ไม่ใช่";
	swal({
	  title: title,
	  text: text,
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: confirm_text,
	  cancelButtonText: cancle_text,
	  closeOnConfirm: false},
	  function(isConfirm){
	  if (isConfirm) {
		window.location.href = url;
	  } 
	});
}

function switch_lang(lang)
{
	$.ajax({
		url: "<?php echo base_url()."index/switch_lang/"; ?>"+lang,
		type:"GET", cache:false,
		success: function(rs){
			if(rs == "ok")
			{
				location.reload();
			}else{
				alert("error : cannot switch language");
			}
		}
	});
}
</script>
	</body>

</html>