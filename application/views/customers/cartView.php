<!DOCTYPE html>
<html>
<head>
	<title>Foodshala | Cart</title>
	<style type="text/css">
		*{
			color: white;
		}
		.card-element{
			width:100%;
			height:6rem;
			padding-left: 20rem;
			padding-right: 20rem;
		}
		.card-element-body{
			width: 100%;
			height: 6rem;
			background: rgba(0,0,0,0.2);
			border-radius: 5px;
			align-items: center;
		}
		img{
			width: 6rem;
			height: 6rem;
		}
		#dis{
			display: flex;
			justify-content: center;
			padding: 3rem
		}
		.remove-from-cart button{
			border: none;
			background: rgba(255,0,0,0.5);
			border-radius:5px;
			color: white;
			font-weight: 700;
		}
button{
			border: none;
			background: rgba(255,0,0,0.5);
			border-radius:5px;
			color: white;
			font-weight: 700;
		}

	</style>
</head>
<body>
	<?php $this->load->view('generalFiles/navbar'); ?>
	<div class="containers">
		<div>
			<?php foreach($cartdetails as $item){ 
							foreach($categories as $category){
								if($item->item_category_id == $category->category_unique_id){
				?>
			<div class="card-element">
				<div class="card-element-body d-flex ">
					<span class="block-1 d-flex col-6">
						<span class="col-6"><img src="<?php echo base_url('assets/images/').$item->item_image;?>" ></span>
						<span class="col-6">
							<span class="item-name row"><?php echo $item->item_name; ?></span>
							<span class="item-category row"><?php echo $category->category_name; ?></span>
							<span class="item-price row"><?php echo $item->price; ?></span>
						</span>
					</span>
					<span class="restaurant-name col-2" restaurant-id="<?php echo $item->restaurant_unique_id; ?>"><?php echo $item->restaurant_name; ?></span>
					<span class="remove-from-cart col-2" item-id="<?php  echo $item->cart_item_unique_id; ?>">
						<button>Remove from cart</button>
					</span>
				</div>
			</div>
				<?php } } } ?>
				<?php if(count($cartdetails) != 0){ ?>
					<div id="dis">
				<span ><input type="text" name="discount" id="discount" placeholder="Add Coupon"></span>
				<span><button class="place-order">Place Order</button></span>
				</div>
			<?php }else{ ?>
				<div style="height: 100vh;width:100vw;display: flex">
						<h1 style="position: fixed;top:40%;left:40%;color:green">No Items in cart !!</h1>
				</div>
			<?php } ?>
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
			$(document).on('click','.remove-from-cart button',function(){
				var url = window.location.origin+'/foodshala/Cart/removeFromCart';
				var	itemName = $('.item-name').text();
				var item_unique_id = $(this).parent().attr('item-id');
				$('.remove-from-cart[item-id='+item_unique_id+'] button').html('Removing . . .');
				$('.remove-from-cart[item-id='+item_unique_id+'] button').attr('disabled',true)
				$.ajax({
					url : url,
					data : {
						item_unique_id : item_unique_id
					},
					method : 'POST',
					success : function(response){
						$('.remove-from-cart[item-id='+item_unique_id+'] button').html('Remove from cart')
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
				var discount = $('#discount').val();
				var url = window.location.origin+'/foodshala/Cart/placeOrder?discount='+discount;

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