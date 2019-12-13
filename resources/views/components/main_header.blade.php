
<div id="main-header">
	<nav class="navbar navbar-expand-md navbar-light fixed-top navbar-custom">
		<div class="container">
	    	<a class="navbar-brand" href="/">Simple Auth</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>
		  	<div class="collapse navbar-collapse" id="navbarNav">
		    	<ul class="navbar-nav">
		      		<li class="nav-item active">
		        		<a class="nav-link" href="/">HOME<span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="/about">ABOUT</a>
		      		</li>
		      		@if(!Session::has('auth_id'))
		      		<li class="nav-item">
		        		<a class="nav-link" href="/register">REGISTER</a>
		      		</li>
		      		@else
		      		<li class="nav-item">
		        		<a class="nav-link" href="/dashboard">DASHBORAD</a>
		        	</li>
		      		@endif
		      	</ul>
		      	<ul class="navbar-nav ml-auto">
		      		@if(!Session::has('auth_id'))
		      		<li class="nav-item">
		        		<a class="nav-link px-5 btn btn-outline-success btn-custom-success custom-radius" href="/login">LOGIN</a>
		        	</li>
		        	@else
		        	<li class="nav-item">
		        		<a class="nav-link px-5 text-custom" href="/logout"><span class="font-italic">Hello,</span> <span class="">Bose</span></a>
		        	</li>
		        	@endif
		      	</ul>
		  	</div>
		</div>	
	</nav>
</div>


