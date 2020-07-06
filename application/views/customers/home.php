<!DOCTYPE html>
<html>
<head>
	<title>Foodshala | Home</title>
	<style type="text/css">
		.oneliner{
			padding: 1rem;
    background: rgba(255,0,0,0.6);
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
		}
		.joke{
			padding: 1rem;
    background: rgba(34, 139, 34,0.7);
    color: rgba(255,255,255,0.8);
    font-weight: bold;
}
	.name-welcome{
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 1.2rem;
		color: rgba(0,0,0,0.6);
		font-weight: 700;
	}
	.in_cart{
		height: 45vh;
	}
	.past_orders{
		height: 45vh;
	}
	.sidebar_image{
		height:3rem;
		width:3rem;
	}
	.item_order{
		display: block;
		font-size: 0.7rem;
	}
	.orders_list{
		max-height: 90%;
    overflow: auto;
	}
	.past_orders_heading{
		background: rgba(0,0,0,0.7);
		display: block;
		color:rgba(255,255,255,0.7) !important;
		text-align: center
	}
	.past_orders_heading a{
		color:rgba(255,255,255,0.7) !important;
	}
	.row{
		height: 75vh;
	}
	.line::after{
		content: ' ';
		padding-right:100%;
		padding-top: 0;
		margin: 0;
		width:100%;
		border-bottom:1px solid rgba(0,0,0,0.2);
	}
	/*scroll bar*/
::-webkit-scrollbar {
  width: 10px;
}
::-webkit-scrollbar-track {
  background: #f1f1f1;
}
::-webkit-scrollbar-thumb {
  background: #888;
}
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
@media only screen and (max-width:600px){
	.order_by_reference{
		text-align: center;
	}
	.sidebar_image{
		height: 6rem;
	}
	.order_reference{
		font-size:1rem !important;
	}
}
	</style>
</head>
<body>
	<?php $this->load->view('generalFiles/navbar.php'); ?>
	<div class="containers">
		<div class="box_containers d-md-flex ">
			<div class="col-12 col-md-9 pt-2">
				<div class="d-flex">
					<span class="col-3 name-welcome"><?php echo 'Welcome '.ucfirst($name); ?></span>
					<span class="d-flex col-9">
						<span class="col-3 oneliner">One Liner</span>
						<span class="col-9 joke">"<?php echo ucfirst($joke); ?>"</span>
					</span>
				</div>
				<span class="line"></span>
				<div class="menu">
					<span class="menu_style"></span>
					<span class="menu_tab"></span>
				</div>
			</div>
			<div class="right_bar col-12 col-md-3">

						<?php 
						$price = 0;
						foreach($cartItems as $item){
									$price = $price + $item->price;
						} ?>
				<div class="in_cart">
					<span class="past_orders_heading text-center">
						<a href="<?php echo base_url('cart/getCartDetails'); ?>">Cart</a></span>
					<?php  // print_r($pastOrders); ?>
					<span class="orders_list">
						<?php // print_r($pastOrders); ?>

						<div class="order_by_reference">
							<span class="order_reference" style="font-size:0.75rem"><?php echo "Cart Value Rs ".$price."/-"; ?></span>
							<?php  foreach($cartItems as $order){ ?>
							<span style="display: block" class="d-flex">
								<img src="<?php echo base_url('assets/images/').$order->item_image;?>" class="sidebar_image col-4">
								<div class="col-8">
									<span class="item_order"><?php echo $order->item_name; ?></span>
									<span class="item_order"><?php echo $order->restaurant_name; ?></span>
									<span class="item_order"><?php echo date( "M d,Y", strtotime( $order->updated_on) )?></span>
									<span class="item_order"><?php echo "Rs ".$order->price."/-"; ?></span>
								</div>
							</span>
							<?php  }  ?>
						</div>

					</span>
				</div>
				<div class="past_orders">
						<?php 
						$price = 0;
						foreach($pastOrders as $order){
									$price = $price + $order->price;
						} ?>
					<span class="past_orders_heading text-center">Past Orders <?php echo " Rs ".$price."/-"; ?></span>
					<?php  // print_r($pastOrders); ?>
					<div class="orders_list">
						<?php // print_r($orderReferences); ?>

				<?php	foreach($orderReferences as $reference){ ?>
					<?php //print_r($pastOrders);print_r('post'); ?>
						<span class="order_by_reference">
							<span class="order_reference" style="font-size:0.75rem"><?php echo "Order No: ". $reference->order_reference; ?><?php echo " -> ".$order->delivery_code; ?></span>
							<?php  foreach($pastOrders as $order){ ?>
					<?php if($reference->order_reference == $order->order_reference){ ?>
							<span style="display: block" class="d-flex">
								<img src="<?php echo base_url('assets/images/').$order->item_image;?>" class="sidebar_image col-4">
								<div class="col-8">
									<span class="item_order"><?php echo $order->item_name; ?></span>
									<span class="item_order"><?php echo $order->restaurant_name; ?></span>
									<span class="item_order"><?php echo date( "M d,Y", strtotime( $order->updated_on) )?></span>
									<span class="item_order"><?php echo "Rs ".$order->price."/-"; ?></span>
								</div>
							</span>
							<?php } }  ?>
						</span>
					<?php } ?>
					</div>
				</div>	
			</div>	
		</div>
	</div>
<script type="text/javascript">
	$.ajax({
		url : window.location.origin+'/foodshala/Miscellaneous/menu',
		method: 'GET',
		success:function(response){
			$('.menu_style').append($(response).filter('style'));
			$('.menu_tab').html($(response).filter('.containers'));
			
			// console.log(response);
		}
	})
</script>
</body>
</html>