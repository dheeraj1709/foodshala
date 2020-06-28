
<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Fonts -->

	<!-- Styles -->
	<style type="text/css">
		.navbar-div{
			/*height:15vh;*/
		}
		.navbar-content{
			background:#307bd3;
			padding: 0.5rem; 
		}
		.navbar-logo{
			font-size: 2rem;
			color: white;
			font-weight: 700;
			padding:0 4rem;
			display: flex;
		}
		.logout-button{
			position: absolute;
	    right: 5%;
	    top: 10px;
	    color: white !important;
		}
		.logout-button > a{
			color: white !important;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    font-size: 0.9rem;
		}
		.name-space{
			font-size:1.2rem;
			font-weight: 700
		}
	</style>
</head>
<body>
	<div class="navbar-div">
		<div class="navbar-content">
			<span class="navbar-logo mr-auto"><a href="<?php echo site_url('/'); ?>" style="color:white">Foodshala</a></span>
			<?php
				if(isset($authToken)){?>
					<span class="logout-button ml-auto mr-4 ">
						<span class="d-block name-space"><?php echo isset($name) ? $name : ''; ?></span>
						<a href="<?php echo base_url('Auth/logout');?>" class="d-block">Logout</a>
					</span>
				<?php } ?>
		</div>
	</div>
</body>
</html>
