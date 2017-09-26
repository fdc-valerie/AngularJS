<div class="table-responsive">
  	<table class="table" id='table'>
  		<thead>
	  		<tr>
				<th>ID</th>
				<th>Product Name</th>
				<th>Description</th>
				<th>Action </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $key => $product): ?>
			<tr>
				<td><?php echo $product['Product']['id'] ?></td>
				<td><?php echo $product['Product']['name'] ?></td>
				<td><?php echo $product['Product']['description']?></td>
				<td><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $product['Product']['id'])); ?> |
				<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $product['Product']['id'])); ?></td>	
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<div id="pagination">
<?php 
	echo $this->Paginator->prev(
	'« Previous ',
	null ,
	null ,
	array('class' => 'disabled')
	); 
	echo $this->Paginator->numbers();
	echo $this->Paginator->counter(array(
		'format' => ' Page {:page} of {:page}'));
?>
</div>