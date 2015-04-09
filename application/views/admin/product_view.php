<?php /***********************************   ระบบตรวจสอบสิทธิ์  ******************************************/ ?>
<?php $access = valid_access($id_menu);  ?>
<?php if($access['view'] != 1) : ?>
<?php access_deny();  ?>
<?php else : ?>

<div class='row'>
	<div class='col-lg-6'>
    	<h3 style='margin-bottom:0px;'><i class='fa fa-tint'></i>&nbsp; <?php echo $this->title; ?></h3>
    </div>
    <div class="col-lg-6">
    	<p class='pull-right'>
        	<a href="<?php echo $this->home."/add_product"; ?>">
        		<button class='btn btn-success' <?php echo $access['add']; ?>><i class='fa fa-plus'></i>&nbsp; <?php label("add"); ?></button>
             </a>
         </p>
    </div>
</div><!-- End Row -->
<hr style='border-color:#CCC; margin-top: 0px; margin-bottom:10px;' />
<div class='row'>
	<div class='col-xs-12'>
    <table class='table table-striped' id="ac_chart">
    <thead>
    	<tr style='font-size:12px;'>
        	<th style='width:5%; text-align:center'><?php echo label("number"); ?></th>
            <th style='width:10%; text-align:center'><?php echo label("image"); ?></th>
            <th style='width:15%;'><?php echo label("product_code");?></th>
             <th style="width:15%;"><?php echo label("product_name");?></th>
             <th style="width:10%;"><?php echo label("category");?></th>
            <th style="width:5%; text-align:center"><?php echo label("cost");?></th>
            <th style="width:5%; text-align:center"><?php echo label("price");?></th>
            <th style="width:5%; text-align:center"><?php echo label("visible");?></th>
            <th style="width:5%; text-align:center"><?php echo label("status");?></th>
            <th style="width:10%; text-align:center"><?php echo label("last_update");?></th>
            <th style="width:15%; text-align:right"><?php echo label("action");?></th>
            
           </tr>
      </thead>
      <tbody>
<?php if($data != false) : ?>
    <?php $i = 0;?>
        <?php foreach($data as $rs): ?>
        <?php $i++; ?>
        		<tr>
                    <td style="vertical-align:middle;" align="center"><?php echo $i; ?></td>
                     <td style="vertical-align:middle;" align="center">image1</td>
                    <td style="vertical-align:middle;"><?php echo $rs->product_code; ?></td>
                    <td style="vertical-align:middle;"><?php echo $rs->product_name; ?></td>
                    <td style="vertical-align:middle;"><?php echo getCategoryById($rs->default_category_id); ?></td>
                    <td style="vertical-align:middle;" align="center"><?php echo $rs->product_cost; ?></td>
                    <td style="vertical-align:middle;" align="center"><?php echo $rs->product_price; ?></td>
                    <td style="vertical-align:middle;" align="center"><?php echo isActived($rs->show); ?></td>
                    <td style="vertical-align:middle;" align="center"><?php echo isActived($rs->active); ?></td>  
                    <td style="vertical-align:middle;" align="center"><?php echo thaiDate($rs->date_upd,"/"); ?></td>                  
                    <td align="right" style="vertical-align:middle;">
                    	<a href="<?php echo $this->home; ?>/edit_product/<?php echo $rs->id_product; ?>">
                        	<button type="button" class="btn btn-warning" <?php echo $access['edit']; ?>><i class="fa fa-pencil"></i></button>
                        </a>
                            <button type="button" class="btn btn-danger" 
                            onclick="confirm_delete('คุณแน่ใจว่าต้องการลบรายการนี้','การกระทำนี้ไม่สามารถกู้คืนได้','<?php echo $this->home; ?>/delete_product/<?php echo $rs->id_product; ?>','ใช่ ต้องการลบ','ยกเลิก');"  <?php echo $access['delete']; ?>><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr><td colspan="11" align="center" ><h1>------------------------- ไม่มีรายการ  -------------------</h1></td></tr>
    <?php endif; ?>
		</table>
</div><!-- End col-lg-12 -->
</div><!-- End row -->
<?php endif; ?>