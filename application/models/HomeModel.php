<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {


	public function getPastOrders($userid){
		$this->load->database();
		$query = $this->db->query("SELECT *,orders.updated_on as updated_on from orders inner join restaurant on restaurant.restaurant_unique_id = orders.restaurant_unique_id inner join items on items.item_unique_id = orders.item_unique_id where customer_unique_id = '$userid' and (delivered = 'N' or delivered = 'Y') ");
		// print_r($query->result());
		return $query->result();
	}

	public function getPastOrdersForRestaurant($userid){
		$this->load->database();
		$query = $this->db->query("SELECT *,orders.price,orders.updated_on from orders INNER JOIN items on items.item_unique_id = orders.item_unique_id where orders.restaurant_unique_id = '$userid' and packed = 'Y' order by orders.updated_on desc");
		return $query->result();
	}

	public function getPastOrdersValue($userid){
		$this->load->database();
		$query = $this->db->query("SELECT sum(price) from orders where customer_unique_id = '$userid' and delivered = 'Y' group by customer_unique_id");
		return $query->result();
	}

	public function getPastOrdersValueForRestaurant($userid){
		$this->load->database();
		$query = $this->db->query("SELECT sum(price) from orders where restaurant_unique_id = '$userid' and delivered = 'Y' group by restaurant_unique_id");
		return $query->result();
	}

	public function getOrderReferences($userid){
		$this->load->database();
		$query = $this->db->query("SELECT order_reference from orders where customer_unique_id = '$userid'  group by order_reference");
		// print_r($query->result());
		return $query->result();
	}

	public function getOrderReferencesByRestaurant($userid){
		$this->load->database();
		$query = $this->db->query("SELECT order_reference from orders where restaurant_unique_id = '$userid' and packed = 'Y' group by order_reference");
		return $query->result();
	}

	public function getJokes(){
		$this->load->database();
		$query = $this->db->query("SELECT * from jokes");
		return $query->result();
	}

	public function ordersByRestaurant($userid){
		$this->load->database();
		$query = $this->db->query("SELECT *,orders.price,orders.updated_on from orders INNER JOIN items on items.item_unique_id = orders.item_unique_id where orders.restaurant_unique_id = '$userid' and packed = 'N' order by orders.updated_on desc");
		return $query->result();
		// print_r(json_encode($query->result()));
	}

	public function ordersToDeliver(){
		$this->load->database();
		$query = $this->db->query("SELECT * from orders where delivered != 'Y' and packed = 'Y' ");
		return $query->result();
	}

}
