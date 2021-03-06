<!DOCTYPE html>
<html>
<head>
	<title>Foodshala | Menu</title>
	<style type="text/css">
		.item_card_body{
			padding:3rem 0;
			display: block;
			text-align: center;
			border: 1px solid rgba(0,0,0,0.5);
	    border-radius: 5px;
	    box-shadow: 0 0 10px 1px rgba(0,0,0,0.3);
		}
		.item_card_body a{
			font-size: 2rem;
			color: rgba(0,0,0,0.5);
		}
		.row{
			padding-top: 4rem;
			padding-left:8rem;
			overflow-y:auto;
		}
		<?php $showCSS = ' ';if(isset($showCSS)){ ?>
			.row{
				padding-right:8rem  !important;
				margin: 0 !important;
			}
			.menu_containers{
				height:80vh;
			}
		<?php } ?>
		@media only screen and (max-width:600px){
			.row{
				padding-top: 4rem;
				padding-left:0rem;
				overflow-y:auto;
				padding-right:0rem  !important;
			}
			.item_card_body a{
				font-size: 1rem;
				color: rgba(0,0,0,0.5);
			}
		}
	</style>
</head>
<body>
	<?php $this->load->view('generalFiles/navbar');?>
	<?php $categories = json_decode($categories); ?>
	<div class="containers">
		<div class="menu_container">
			<?php if(isset($showCSS)){ ?>
			<div style="font-size: 3rem;color:#000080;padding-left: 9rem;font-weight: 700">Menu</div>
			<?php } ?>
			<div class="row">
				<?php foreach($categories as $category){ ?>
			<div class="col-4 item_card">
				<span class="item_card_body">
					<a href="<?php  echo base_url('Miscellaneous/itemsList?category=').$category->category_unique_id; ?>"><?php echo $category->category_name; ?></a>
					<span class="d-block">
						<b>&nbsp;&nbsp;
						<?php	if(array_key_exists($category->category_unique_id,$total)){
							 print_r($total[$category->category_unique_id]);}
							 else{
							 	echo '0 Items';
							 } ?>
						</b>
						<i>&nbsp;Item(s)</i></span>
				</span>
			</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>