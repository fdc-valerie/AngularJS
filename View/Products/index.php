<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
		load_data();
		 function load_data(query, link){
		 	console.log(query);

		 	var link = typeof link === 'undefined' ? '/products/search' : link;

			$.ajax({
				url:link,
				method:"POST",
				data: {search:query},
				success:function(data) {
					$('#table-container').html(data);
					// console.log(data);

					$('#pagination span').on('click', function(e) {
						e.preventDefault();

						console.warn($(this));
						var link = $(this).find('a').attr('href');
						console.log(link);
						load_data(query, link);
					});
				}
			});
		// $.post('/trials/search', {}, function() {

		// });
	 } 

	function loadSearchPaginateUrl(link) {
	}

 	$('#search').on('keyup',function(){
		var search = $(this).val();
	  	if(search != ''){
	   		load_data(search);
	  	}
	  	else{
	   		load_data();
  		} 	

 	});
});
</script> 
<div>

    <?php echo $this->Form->create('Product',array('default'=>false));
      echo $this->Form->input('search', array('id' => 'search'));
      echo $this->Form->end();
	?>
		<div id="table-container">
		</div>
</div>