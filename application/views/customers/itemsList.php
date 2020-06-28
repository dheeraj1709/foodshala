<!DOCTYPE html>
<html>
<head>
	<title>Foodshala | Items</title>
	<style type="text/css">

		.containers {}
		.containers-child{
			display: flex;
		}
		.card-element{
			display: block;
			width: 25%;
	    padding: 1rem;
	    font-size: 1.5rem;
		}
		.card-element-body{
			width:80%;
	    background: rgba(220,255,0,0.3);
	    margin: auto;
	    border-radius: 5px;
		}
		.restaurant-name{
			display: flex;
	    justify-content: center;
	    background: white;
	    font-size: 1.2rem;
		}
		img{
			height: 8rem;
			width: 8rem;
		}
		.row{
		 margin-right: 0px !important;
    	 margin-left: 0px !important;
		}
		.add-to-cart{
			padding: 10px;
			display: flex;
   			 justify-content: center;

		}
		.add-to-cart{
			border: none;
			background: #FF6347;
			border-radius: 5px;
		}
		.add-to-cart button{
			border: none;
			background: #228B22;
			border-radius: 5px;
			color: white;
			font-size:0.8rem;
			line-height: 1.5rem;
			cursor: pointer;
		}
		.col-6{
			padding-right: 0 !important;
			padding-left: 0 !important;
		}
		.text-right{
			font-size:0.8rem;
		}
		.text-right > span{
			font-size: 0.8rem;
			display: flex;
		    text-align: right;
		    justify-content: flex-end;
		    padding-right:1rem;
		}
		h1{
			font-family: fantasy;
			color: rgba(0,0,0,0.6);
		}
	</style>
</head>
<body>
	<?php $this->load->view('generalFiles/navbar');?>
	<div class="containers">
		<?php $items = json_decode($items);?>
			<div class="row d-flex justify-content-center"><h1><?php echo $items[0]->category_name.'\'s'; ?></h1></div>
		<div class=" containers-child">
			<?php foreach($items as $item){ ?>
				<?php if($userType == 1){
					if($item->restaurant_unique_id == $userUniqueId){ ?>
			<div class="card-element">
				<div class="card-element-body">
					<span class="d-flex">
						<span class="col-6"><img src="<?php echo base_url('assets/images/').$item->item_image;?>" ></span>
						<span class="col-6 text-right">
							<span class="item-name row"><?php echo $item->item_name; ?></span>
							<span class="item-category row"><?php echo $item->category_name; ?></span>
							<span class="item-price row"><?php echo 'Rs '.$item->price.'/-'; ?></span>
						</span>
					</span>
					<span class="restaurant-name" ><?php echo $item->restaurant_name; ?></span>
					<span class="add-to-cart" item-id="<?php  echo $item->item_unique_id; ?>">
						<?php if($userType == 2){ ?>
						<button restaurant-id="<?php echo $item->restaurant_unique_id; ?>">Add to cart</button>
					<?php } ?>
					</span>
				</div>
			</div>
				<?php 
					}
				}else{ ?>
			<div class="card-element">
				<div class="card-element-body">
					<span class="d-flex">
						<span class="col-6"><img src="<?php echo base_url('assets/images/').$item->item_image;?>" ></span>
						<span class="col-6 text-right">
							<span class="item-name row"><?php echo $item->item_name; ?></span>
							<span class="item-category row"><?php echo $item->category_name; ?></span>
							<span class="item-price row"><?php echo 'Rs '.$item->price.'/-'; ?></span>
						</span>
					</span>
					<span class="restaurant-name" ><?php echo $item->restaurant_name; ?></span>
					<span class="add-to-cart" item-id="<?php  echo $item->item_unique_id; ?>">
						<?php if($userType == 2){ ?>
						<button restaurant-id="<?php echo $item->restaurant_unique_id; ?>">Add to cart</button>
					<?php } ?>
					</span>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
<?php if($userType == 2){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click','.add-to-cart button',function(){
				var url = window.location.origin+'/foodshala/Cart/addToCart';
				var	itemName = $('.item-name').text();
				var	restaurant_unique_id = $(this).attr('restaurant-id');
				var item_unique_id = $(this).parent().attr('item-id');
				$('.add-to-cart[item-id='+item_unique_id+'] button').html('Adding . . .');
				$('.add-to-cart[item-id='+item_unique_id+'] button').attr('disabled',true)
				$.ajax({
					url : url,
					data : {
						restaurant_unique_id : restaurant_unique_id,
						item_unique_id : item_unique_id
					},
					method : 'POST',
					success : function(response){
						$('.add-to-cart[item-id='+item_unique_id+'] button').html('Added to cart')
						console.log(`${itemName} successfully added to cart`);
						console.log(response)
					}
				}).fail(function(){
					window.location.href = window.location.origin+"/foodshala/Auth/customerLogin";
				})
			})
		})
	</script>
<?php } ?>
</body>
</html>