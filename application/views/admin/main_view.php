<h1> This is main page</h1>
<?php if(isset($data)) : ?>
<table class="table table-striped">
<thead>
	<th>Item</th><th>Description</th><th>Date</th><th>Warehouse</th><th>QTY</th><th>Unit</th><th>Price</th><th>Total amount</th>
</thead>
<tbody>
<?php foreach($data as $rs) : ?>
<tr>
	<td><?php echo $rs['stkcod']; ?></td>
    <td><?php echo utf8($rs['stkdes']); ?></td>
    <td><?php echo $rs['docdat']; ?></td>
    <td><?php echo utf8(substr($rs['loccod'], 0, -1)); ?></td>
    <td><?php echo $rs['trnqty']; ?></td>
    <td><?php echo utf8($rs['tqucod']); ?></td>
    <td><?php echo $rs['unitpr']; ?></td>
    <td><?php echo $rs['trnbal']; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
<a href="<?php echo $this->home."/export"; ?>"><button type="button" class="btn btn-success">Backup Database</button></a>