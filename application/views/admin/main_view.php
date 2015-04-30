<h1> This is main page</h1>
<?php if(isset($data)) : ?>
<table class="table table-striped">
<thead>
	<th>Item</th><th>Description</th><th>Date</th>
</thead>
<tbody>
<?php foreach($data as $rs) : ?>
<tr>
	<td><?php echo $rs["id_product"]; ?></td>
    <td><?php echo $rs['product_code']; ?></td>
    <td><?php echo utf8($rs['product_name']); ?></td>
    
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
<a href="<?php echo $this->home."/export_excel"; ?>"><button type="button" class="btn btn-success">Export to excel</button></a>
<a href="<?php echo $this->home."/export_csv"; ?>"><button type="button" class="btn btn-success">Export to CSV</button></a>