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
			<?php foreach($Orders as $orderID){ ?>
					<span class="d-block">
						<span><?php echo $orderID->order_reference; ?></span>
						<input type="text" name="delivery_code" placeholder="Delivery Code">
						<button d-id="<?php echo $orderID->order_reference; ?>">Deliver</button>
					</span>

			<?php } ?>input
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click','button',function(){
				var orderID = $(this).attr('d-id');
				var delivery_code  = $(this).prev().val();
				console.log(orderID + " " +delivery_code)
				var url = window.location.origin + '/foodshala/Orders/delivery';
				$.ajax({
					url : url,
					data : {
						orderID : orderID,
						delivery_code : delivery_code
					},
					success : function(){
						window.location.reload();
					}
				}).fail(function(){
					alert("Invalid Delivery Code");
				})
			})
		})
	</script>
</body>
</html>