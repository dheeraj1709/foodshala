<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{
	// public function index()
	// {

	// }

	public function addToCart(){
		$this->load->model('cartModel');
		$this->load->library('session');
		if($this->session->userdata('userType') != 1){
		$restaurant_unique_id = $this->input->post('restaurant_unique_id');
		$item_unique_id = $this->input->post('item_unique_id');
		$userid = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		$cartdetails = $this->cartModel->addToCart($restaurant_unique_id,$item_unique_id,$userid,$uniqueId);
			}
			else{
				http_response_code(401);
			}
	}

	public function getCartDetails(){
		$this->load->model('cartModel');
		$this->load->model('itemModel');
		$this->load->library('session');
		$data['userType'] = $this->session->userdata('userType');
		$userid = $this->session->userdata('userUniqueId');
		$data['cartdetails'] = $this->cartModel->getCartDetailsByUser($userid);
		$data['categories'] = $this->itemModel->getCategories();
		$data['name'] = $this->session->userdata('userName');
		$data['authToken'] = $this->session->userdata('authToken');
		$this->load->view('customers/cartView',$data);
	}

	public function removeFromCart(){
		$this->load->model('cartModel');
		$this->load->library('session');
		$cart_item_unique_id = $this->input->post('item_unique_id');
		$userid = $this->session->userdata('userUniqueId');
		$cartdetails = $this->cartModel->removeFromCart($cart_item_unique_id,$userid);
	}

	public function placeOrder(){
		$this->load->model('cartModel');
		$this->load->model('itemModel');
		// $this->load->model('ordersModel');
		$this->load->library('session');
		$userid = $this->session->userdata('userUniqueId');
		$orderReference = uniqid();
		$discount = $this->input->get('discount');
		$couponDetails = $this->cartModel->getCouponDetails($discount);
		$cartDetails = $this->cartModel->getCartDetailsByUser($userid);
		// $restaurantDetails = $this->itemModel->(); 
		foreach($cartDetails as $item){
			$itemUniqueId = $item->item_unique_id;
			$restaurantUniqueId = $item->restaurant_unique_id;
			$itemDetails = $this->itemModel->getItemDetails($itemUniqueId); 
			$price = $item->price;
			if($discount != null){
			 $couponApplied = 'Y';
			 $couponCode = $discount;

			 // Discount calculation
			 if($couponDetails->byRestaurantYN == 'Y'){
			 		if($couponDetails->item_category_id != null){
			 			$percentage = $couponDetails->percentage;
			 			if(($itemDetails->item_category_id == $couponDetails->category_unique_id) && ($itemDetails->restaurant_unique_id == $couponDetails->restaurant_unique_id)){
			 				$price = intval($price) - intval(($percentage/100)*$price);
							$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price, $couponApplied, $couponCode);
			 			}
			 			else{
							$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price);
			 			}
			 		}
			 		else{
			 			$percentage = $couponDetails->percentage;
			 			if($itemDetails->restaurant_unique_id == $couponDetails->restaurant_unique_id){
			 				$price = intval($price) - intval(($percentage/100)*$price);
							$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price, $couponApplied, $couponCode);
			 			}
			 			else{
				$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price);
			 			}
			 		}
			 }
			 if($couponDetails->byRestaurantYN == 'N' ){
			 		if($couponDetails->item_category_id != null){
			 			$percentage = $couponDetails->percentage;
			 			if($itemDetails->item_category_id == $couponDetails->category_unique_id){
			 				$price = intval($price) - intval(($percentage/100)*$price);
							$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price, $couponApplied, $couponCode);
			 			}
			 			else{
							$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price);
			 			}
			 		}
			 		else{
			 			$percentage = intval($couponDetails->percentage);
			 			$price = intval($price) - intval(($percentage/100)*$price);
						$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price, $couponApplied, $couponCode);
			 		}
			 }
			 // Discount calculation end
			}
			else{
			$this->cartModel->placeOrder($orderReference,$itemUniqueId,$restaurantUniqueId,$userid,$price);				
			}
		}
	}
	//--------------------------------------------------------------------
	public function x(){
		$data = file_get_contents('php://input');
		print_r(json_decode($data));
	}
}