<!DOCTYPE html>
<html>
<head>
	<title>Add or Edit Items</title>
	<style type="text/css">

		body{
			max-height: 100vh;
			overflow-y: hidden;
		}
		.containers{
			position: relative;

		}
		.image{
			background: url(<?php echo  base_url('assets/images/addItems.jpg')?>);
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
			color:white;
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
</head>
<body>
	<?php $this->load->view('generalFiles/navbar.php'); ?>
	<?php $categories = json_decode($categories); ?>
	<div class="containers">
		<h1 class="text-center" style="color:#1b4d3e">Add Item</h1>
		<div class="box-containers">
			<div class="boxes">
			<form method="POST" action="<?php echo base_url('Miscellaneous/addItem'); ?>" enctype="multipart/form-data"  class="box-form">
				<div class="user_input">
					<span class="input_fields">
						<label>Item Image</label>
						<input type="file" name="item_image">
					</span>
					<span class="input_fields">
						<label>Item Name</label>
						<input type="text" name="item_name">
					</span>
					<span class="input_fields">
						<label>Preference</label>
						<select name="vegYN">
							<option values="Y">Veg</option>
							<option values="N">Non Veg</option>
						</select>
					</span>
					<span class="input_fields">
						<label>Category</label>
						<select name="item_category_id">
							<?php foreach($categories as $category){ ?>
							<option value="<?php echo $category->category_unique_id; ?>"><?php echo $category->category_name; ?></option>
							<?php } ?>
						</select>
					</span>
					<span class="input_fields">
						<label>Price</label>
						<input type="text" name="price">
					</span>
					<input type="submit" value="submit" name="">
				</div>
			</form>
		</div>
		</div>
	</div>
		<div class="image"></div>
</body>
</html>