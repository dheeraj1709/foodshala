<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model {

	public function addItem($item_name,$vegYN,$item_category_id,$restaurant_unique_id,$item_image,$price){
		$this->load->database();
		$uniqueid = uniqid();
		$query = $this->db->query("INSERT into items (item_name,vegYN,item_category_id, restaurant_unique_id,item_unique_id,item_image,price,updated_on) values ('$item_name','$vegYN','$item_category_id','$restaurant_unique_id','$uniqueid','$item_image',$price,now())");
	}

	public function getCategories(){
		$this->load->database();
		$query = $this->db->query("SELECT * from categories ORDER BY category_name ASC");
		return $query->result();
	}

	public function getItems($category){
		$this->load->database();
		$query = $this->db->query("SELECT * from items where item_category_id = '$category'");
		return $query->result();
	}

	public function getItemsCategoryRestaurant($category){
		$this->load->database();
		$query = $this->db->query("SELECT * from items inner join categories on categories.category_unique_id = items.item_category_id inner join restaurant on items.restaurant_unique_id = restaurant.restaurant_unique_id where item_category_id = '$category'");
		return $query->result();
	}

	public function getTotalPerCategory($userid = null){
		if($userid != null){
		$query = $this->db->query("SELECT count(item_category_id) as count,item_category_id from items  where restaurant_unique_id = '$userid' group by item_category_id");
		}else{
			$query = $this->db->query("SELECT count(item_category_id) as count,item_category_id from items group by item_category_id ");
		}
		return $query->result();
	}

	public function getItemDetails($itemUniqueId){
		$this->load->database();
		$query = $this->db->query("SELECT * from items where item_unique_id = '$itemUniqueId'");
		return $query->result();
	}
}