<!DOCTYPE html>
<html>
<head>
	<title>Foodshala | Delivery</title>
</head>
<body>
	<?php $this->load->view('generalFiles/navbar'); ?>
	<div>
		<div>
			<div>
			<?php if(count($Orders) > 0){
                    foreach($Orders as $orderID){ ?>
					<span class="d-block">
						<span><?php echo $orderID->order_reference; ?></span>
						<input type="text" name="delivery_code" placeholder="Delivery Code">
						<button d-id="<?php echo $orderID->order_reference; ?>">Deliver</button>
					</span>

			<?php } }else{ ?>
                    <h1 style="font-size:3rem; position:fixed; top:40%;left:40%;color:green">No orders to deliver </h1>
                    <?php } ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click','button',function(){
				var orderID = $(this).attr('d-id');
				var delivery_code  = $(this).prev().val();
				console.log(orderID + " " +delivery_code)
				var url = window.location.origin + '/foodshala/Orders/delivery/?orderID='+orderID+'&delivery_code='+delivery_code;
				$.ajax({
					url : url,
					success : function(){
						window.location.reload();
					}
				}).fail(function(){
					alert("Invalid Delivery Code");
				});
			})
		})
	</script>
</body>
</html>