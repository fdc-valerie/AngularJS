<div class="container">
<div class="col-md-5">
    <div class="form-area">  
      <h3>Add Product</h3>
   

<?php echo $this->Form->create('Product');
      echo $this->Form->input('name');
      echo $this->Form->input('description');
      echo $this->Form->button('Add');
      echo $this->Form->end();
?>

       <!--  <br style="clear:both">
                  
            <div class="form-group">
            <label>Product Name: </label>
            <input type="text" class="form-control"  name="product_name"  >
            </div>
           <div class="form-group">
           <label>Product Description</label>
            <input type="password" class="form-control" name="password">
            </div>
            
          <input class="btn btn-primary pull-right" name="submit" type="submit" value="Add">  
           </form>
    </div> -->
</div>
</div>
  
</div>