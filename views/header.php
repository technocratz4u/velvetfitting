<div class="brand">
		<img alt="Logo" src="<?php echo __WEB_ROOT?>/static/img/logo.gif" id="logo-img" />
		<span class="brand-inr"><span class="brand-span">Velvet Fitting</span><br/><span class="address-bar-span">Passionate Bathing...</span></span>
</div>
<!-- <div class="address-bar">Passionate Bathing...</div> -->

	<!-- Navigation -->
	<nav id="home-navbar" class="navbar navbar-default yamm" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
				<a class="navbar-brand navigation-brand" href="<?php echo __APPLICATION_URL?>"><img alt="Logo" src="<?php echo __WEB_ROOT?>/static/img/logo.gif" /> <span class="navigation-brand-text">Velvet Fitting</span></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a id="menu_home" href="<?php echo __APPLICATION_URL?>" class="navigation_menu">Home</a></li>
					<li><a id="menu_products"href="<?php echo __WEB_ROOT?>/category" class="navigation_menu">Products</a></li>
					<li><a id="menu_about" href="<?php echo __WEB_ROOT?>/about" class="navigation_menu">About</a></li>
					<li><a id="menu_contact" href="<?php echo __WEB_ROOT?>/contact" class="navigation_menu">Contact</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<a href="<?php echo __WEB_ROOT?>/inquire" class="btn btn-dark send-inquiry-link">Send Inquiry</a>