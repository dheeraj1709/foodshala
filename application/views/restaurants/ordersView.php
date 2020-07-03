<!DOCTYPE html>
<html>
<head>
	<title>Foodshala | Orders</title>
	<style type="text/css">
		.card-element{
			width:100%;
			height:6rem;
		}
		.car-element-body{
			width: 100%;
			height: 6rem;
		}
		img{
			width: 6rem
		}
	</style>
</head>
<body>
	<?php $this->load->view('generalFiles/navbar'); ?>
	<?php // print_r(json_encode($orderdetails)); ?>
	<div>
		<div>
			<?php 
			if(count($orderdetails) > 0){
			foreach($orderdetails as $item){ 
					foreach($categories as $category){
						if($item->item_category_id == $category->category_unique_id){
				?>
			<div class="card-element">
				<div class="card-element-body">
					<span>
						<span><img src="<?php echo base_url('assets/images/').$item->item_image;?>" ></span>
						<span class="item-name"><?php echo $item->item_name; ?></span>
						<span class="item-category"><?php echo $category->category_name; ?></span>
						<span class="item-price"><?php echo $item->price; ?></span>
					</span>
					<span class="order-packed" item-id="<?php  echo $item->item_unique_id; ?>" order-id="<?php  echo $item->order_reference; ?>">
						<button>Order Packed</button>
					</span>
				</div>
			</div>
				<?php } } }  } else{ ?>
					<div style="height: 100vh;width:100vw;display: flex">
						<h1 style="position: fixed;top:40%;left:40%;color:green">No Current Orders !!</h1>
				</div>
				<?php }?>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			let sum = 0;
			for(x=0; x< $('.item-price').length; x++){
				sum = sum + parseInt($('.item-price').eq(x).text())
			}
			console.log(sum);
		})
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click','.order-packed button',function(){
				var url = window.location.origin+'/foodshala/Orders/orderPacked';
				var	itemName = $('.item-name').text();
				var item_unique_id = $(this).parent().attr('itemid');
				var order_reference = $(this).parent().attr('order-id');
				$('.order-packed[item-id='+order_reference+'] button').html('Removing . . .');
				$('.order-packed[item-id='+order_reference+'] button').attr('disabled',true)
				$.ajax({
					url : url,
					data : {
						order_reference : order_reference,
						item_unique_id : item_unique_id
					},
					method : 'POST',
					success : function(response){
						$('.order-packed[item-id='+order_reference+'] button').html('Remove from cart')
						console.log(`${itemName} successfully added to cart`);
						window.location.reload();
					}
				}).fail(function(){

				})
			})
		})
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click','.place-order',function(){
				var url = window.location.origin+'/foodshala/Cart/placeOrder';
				$('.place-order').html('Removing . . .');
				$('.place-order').attr('disabled',true)
				$.ajax({
					url : url,
					success : function(response){
						$('.place-order').html('Remove from cart')
						console.log(` successful`);
						window.location.reload();
					}
				}).fail(function(){

				})
			})
		})
	</script>
</body>
</html>





