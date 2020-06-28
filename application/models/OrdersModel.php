<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersModel extends CI_Model {

	public function getOrders($userid){
		$this->load->database();
		$query = $this->db->query("SELECT * from orders inner join items on orders.item_unique_id = items.item_unique_id  where orders.restaurant_unique_id = '$userid' and orders.packed != 'Y' ");
		return $query->result();
		// echo json_encode($query->result());
	}

	public function getAllOrdersByUser($userid){
		$this->load->database();
		$query = $this->db->query("SELECT * from orders where restaurant_unique_id = '$userid' ");
		return $query->result();
		// echo json_encode($query->result());
	}

	public function getPastOrders($userid){
		$this->load->database();
		$query = $this->db->query("SELECT * from orders where restaurant_unique_id = '$userid' and packed == 'Y' ");
		return $query->result();
		// echo json_encode($query->result());
	}

	public function generateID($orderReference){
		$this->load->database();
		$value = rand(1000,9999);
		$query = $this->db->query("UPDATE orders set delivery_code = '$value' where order_reference = '$orderReference'");
		// return $query->result();
		// echo json_encode($query->result());
	}

	public function getIdToVerify($order_reference,$delivery_code){
		$this->load->database();
		$query = $this->db->query("SELECT  * from orders where order_reference = '$order_reference' and delivery_code = '$delivery_code' ");
		return $query->result();
	}

	public function verifyID($order_reference,$delivery_code){
		$this->load->database();
		$query = $this->db->query("UPDATE orders set delivery_code = null ,delivered= 'Y' where order_reference = '$order_reference' and delivery_code = '$delivery_code' ");
	}

}

