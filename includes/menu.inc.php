<!DOCTYPE html>
<html>
<body>
        <script src="http://code.jquery.com/kquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <div class="navbar navbar-inverse navbar-fixed-top">
        	<div class="navbar-inner">
        		<div class="container">
        			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        				<span class="icon-bar"></span>
         				<span class="icon-bar"></span>
        			</button>
       				<a class="brand" href="/">Movie Database</a>
       				<div class="nav-collapse collapse">
       					<ul class="nav">
       						<li>
       							<a href="/">Home</a>
       							</li>
       							<li>
       							<a href="/reg/index">Register</a>
       							</li>
                  </ul>
                <form class="navbar-form pull-right" action="/login/logoff" method="post">  
                <button class ="btn" type="submit" name="logoffFormSubmit" value="Log Out">Sign Off</button>
                </form>
                <form class="navbar-form pull-right" action="/login/check" method="post">
                <input class ="span2" name="username" type="text" value="" placeholder="username" size="9">
                <input class ="span2" name="password" type="password" value="" placeholder="Password" ="9">
                <button type="submit" class="btn" name="loginFormSubmit" value="Log in">Sign In</button>  
                </form>
            </div>
          </div>
        </div>
</body>       						
</html>

