<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CartModel extends CI_Model {

	public function getCartDetailsByUser($userid){
		$this->load->database();
		$query = $this->db->query("SELECT * from cart inner join restaurant on cart.restaurant_unique_id =restaurant.restaurant_unique_id inner join items on items.item_unique_id = cart.item_unique_id  where cart.customer_unique_id = '$userid' and cart.orderedYN != 'Y' ");
		return $query->result();
		// echo json_encode($query->result());
	}

	public function addToCart($restaurant_unique_id,$item_unique_id,$userid,$uniqueId, $couponApplied = null, $couponCode = null){
		$this->load->database();
		$this->db->query("INSERT into cart (restaurant_unique_id, updated_on, item_unique_id, customer_unique_id, orderedYN,cart_item_unique_id) values ('$restaurant_unique_id',now(),'$item_unique_id','$userid','N','$uniqueId')");
	}
// 
	public function removeFromCart($cart_item_unique_id,$userid){
		$this->load->database();
		$this->db->query("DELETE from cart where cart_item_unique_id = '$cart_item_unique_id' and customer_unique_id = '$userid'");
	}

	public function placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price){
		$this->load->database();
		$this->db->query("INSERT into orders (order_reference,item_unique_id,	restaurant_unique_id,	customer_unique_id,updated_on,	price) values ('$orderReference','$itemUniqueId','$restaurantUniqueId','$userid',now(),$price)");
		$this->db->query("UPDATE cart set orderedYN = 'Y' where orderedYN = 'N' and customer_unique_id = '$userid'");
		$this->packedYN('N',$orderReference);
		$this->deliveredYN('N',$orderReference);
	}

	public function packedYN($status,$orderReference){
		$this->load->database();
 $this->db->query("UPDATE orders set packed = '$status' where order_reference = '$orderReference'");
	}

	public function deliveredYN($status,$orderReference){
		$this->load->database();
		$this->db->query("UPDATE orders set delivered='$status' where order_reference = '$orderReference'");
	}

	public function getCouponDetails($code){
		$this->load->database();
		$query = $this->db->query("SELECT * from coupons where coupon_code = '$code'");
		return $query->row();
	}

}

