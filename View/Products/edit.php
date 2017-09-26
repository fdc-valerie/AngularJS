<?php
	$productData = $products['Product'];
?>
   <h3>Edit Product</h3>

<?php echo $this->Form->create('Product');
      echo $this->Form->input('name',array('value'=> $productData['name']));
      echo $this->Form->input('description', array('value'=> $productData['description']));
      echo $this->Form->button('Add');
      echo $this->Form->end();
?>