<div class="container">
  <div class="col-md-5">
      <div class="form-area">  
          <form method="post" action="/products/login">
            <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Login</h3>
          				<div class="form-group">
      						  <input type="text" class="form-control"  name="data[Users][username]" placeholder="Username" >
         					</div>
          					<div class="form-group">
          						  <input type="password" class="form-control" name="data[Users][password]" placeholder="Password" >
          					</div>  		  	
                         <input class="btn btn-primary pull-right" name="data[Users][submit]" type="submit" value="Submit">
          </form>
      </div>
  </div>
</div>
 </div>
 <script>
    window.onload = function () {
        if (typeof history.pushState === "function") {
            history.pushState("jibberish", null, null);
            window.onpopstate = function () {
                history.pushState('newjibberish', null, null);
            };
        } else {
            var ignoreHashChange = true;
            window.onhashchange = function () {
                if (!ignoreHashChange) {
                    ignoreHashChange = true;
                    window.location.hash = Math.random();
                } else {
                    ignoreHashChange = false;   
                }
            };
        }
    }
 </script>