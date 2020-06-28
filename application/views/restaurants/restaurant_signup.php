<!DOCTYPE html>
<html>
<head>
	<title>Foodshala | Restaurant Signup</title>
	<style type="text/css">
	<style type="text/css">

		body{
			max-height: 100vh;
			overflow-y: hidden;
		}
		.containers{
			position: relative;

		}
		.image{
			background: url(<?php echo  base_url('assets/images/r_signup.jpg')?>);
			background-size: cover;
			filter:10px;
			position: fixed;
			height: 100vh;
			width: 100vw;
			z-index:-10;
			top:0;
			filter: blur(5px);
		}
		.box-containers{
			padding: 5% 35% 10% 35%;
			height: 100vh
		}
		.heading{
			display: block
		}
		.user_input{
			display: block;
			padding-left: 15%;
			padding-right: 15%;
			padding-top:10%;
		}
		.input_fields{
			display: block;
			padding: 2%
		}
		.heading{
			text-align: center;
			font-weight: 700;
			font-size: 2rem;
			color: white;
		}
		input[type="text"]{
			width:50%;
			border: 1px solid rgba(255,255,255,1);
		    border-radius: 3px;
		    text-align:center;
		}
		input[type="submit"]{
			margin-left: 40%;
			background: #9acd32;
			border-color: #9acd32;
			border: none;
			color: white;
			padding:1% 5%;
			border-radius:2px;
		}
		label{
			color:rgba(0,0,0,0.8);
			width:30%;
		}
		.redirect_links{
			text-align: center;
			color:rgba(0,0,0,0.5);
		}
		.redirect_links a{
			text-align: center;
			color:rgba(255,255,255,0.5);
		}
		.boxes{
			border-radius: 5px;
			background: rgba(255,255,255,0.2);
			border: 1px solid rgba(255,255,255,0.3);
			box-shadow: 0 0 10px 2px rgba(255,255,255,0.3);
		}

	</style>
	</style>
</head>
<body>
	<?php $this->load->view('generalFiles/navbar');?>
	<div class="containers">
		<div class="box-containers">
			<div class="boxes">
		<form method="POST" action="<?php echo base_url('Auth/restaurantSignUpData')?>" class="box-form">
			<div class="user_input">
				<span class="input_fields">
				<label>Name</label>
				<input type="text" name="restaurant_name" >
			</span>
			<span class="input_fields">
				<label>Username</label>
				<input type="text" name="user_name" >
			</span>
			<span class="input_fields">
				<label>Address</label>
				<input type="text" name="address" >
			</span>	
			<span class="input_fields">
				<label>Password</label>
				<input type="text" name="passwords" >
			</span>
			<span class="input_fields">
				<label>Total tables</label>
				<input type="text" name="number_of_tables" >
			</span>
			<span class="input_fields">
				<label>Contact</label>
				<input type="text" name="contact" >
			</span>
			<input type="submit" name="submit" value="submit">
		</form>
		<div class="redirect_links"><a href="<?php echo base_url('Auth/restaurantLogin'); ?>">Login</a></div>
		<div class="redirect_links"><a href="<?php echo base_url('Auth/customerSignup'); ?>">Signup as Customer</a></div>
			</div>
			</div>
		</div>
	</div>
		<div class="image"></div>
</body>
</html>