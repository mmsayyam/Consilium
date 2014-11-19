<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img style="width: auto; height: 70px;" src="img/Consilium.svg"></a>
		</div>
		<div class="collapse navbar-collapse" id="collapsable-nav">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="">What we do</a></li>
				<li><a href="">Who will benefit</a></li>
				<li><a href="">Our offerings</a></li>
				<li><a href="">Features & Videos</a></li>
				<li><a href="">About us</a></li>
				<li><a href="">Contact us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if( isset( $_SESSION['username'] ) ) { ?>

				<li><a href="admin-panel.php"><?php echo $_SESSION['username'];	 ?></a></li>
				<li><a href="logout.php">Logout</a></li>

				<?php } else { ?>

				<!-- <li class="dropdown"><a href="member-login.php">Members</a></li> -->

				<?php } ?>
			</ul>
		</div>
	</div>
</nav>