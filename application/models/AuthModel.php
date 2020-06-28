<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function fetchUser($email,$password){
		$this->load->database();
		$query = $this->db->query("SELECT * from customer where email = '$email' and password = '$password'");
		return $query->row();
	}

	public function fetchRestaurant($userName,$password){
		$this->load->database();
		$query = $this->db->query("SELECT * from restaurant where user_name = '$userName' and passwords = '$password'");
		return $query->row();
	}

	public function userExist($email){
		$this->load->database();
		$query = $this->db->query("SELECT * from customer where email = '$email' ");
		return $query->row();
	}

	public function restaurantExist($userName){
		$this->load->database();
		$query = $this->db->query("SELECT * from restaurant where user_name = '$userName' ");
		return $query->row();
	}

	public function restaurantSignup($restaurant_name,$user_name,$address,$passwords,$number_of_tables,$contact){
		$this->load->database();
		$uniqueid = uniqid();
		$query = $this->db->query("INSERT into restaurant (restaurant_name ,user_name ,address ,passwords ,number_of_tables ,contact,restaurant_unique_id	,timings) values ('$restaurant_name','$user_name','$address','$passwords','$number_of_tables','$contact' ,'$uniqueid','1100-2300' )");
	}

	public function customerSignup($name,$mobile,$password,$address,$email,$profile_image,$food_pref){
		$this->load->database();
		$uniqueid = uniqid();
		$query = $this->db->query("INSERT into customer (name, mobile, password, address, email, profile_image,food_pref , customer_unique_id) values ('$name','$mobile','$password','$address','$email','$profile_image','$food_pref', '$uniqueid')");
		}
}