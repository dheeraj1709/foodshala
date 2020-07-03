<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	// public function index()
	// {

	// }
	public function customerIndexPage(){
		$this->load->model('homeModel');
		$this->load->model('cartModel');
		$this->load->library('session');
		if($this->session->userdata('userType') == 2){
		$userid = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		$data['userType'] = $this->session->userdata('userType');
		$data['name'] = $this->session->userdata('userName');
		$data['authToken'] = $this->session->userdata('authToken');
		$data['pastOrders'] = $this->homeModel->getPastOrders($userid);
		$data['cartItems'] = $this->cartModel->getCartDetailsByUser($userid);
		$data['joke'] = $this->getJoke();
		$data['value'] = $this->homeModel->getPastOrdersValue($userid);
		$data['orderReferences'] = $this->uniqueOrderReference();
		 // print_r($data);
		$this->load->view('customers/home',$data); 
		}
		else{
			redirect('Auth/customerLogin');
		}
	}

	public function restaurantIndexPage(){
		$this->load->model('homeModel');
		$this->load->model('cartModel');
		$this->load->library('session');
		if($this->session->userdata('userType') == 1){
		$userid = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		$data['userType'] = $this->session->userdata('userType');
		$data['name'] = $this->session->userdata('userName');
		$data['authToken'] = $this->session->userdata('authToken');
		$data['joke'] = $this->getJoke();
		$data['Orders'] = $this->homeModel->ordersByRestaurant($userid);
		$data['pastOrders'] = $this->homeModel->getPastOrdersForRestaurant($userid);
		$data['value'] = $this->homeModel->getPastOrdersValueForRestaurant($userid);
		$data['orderReferences'] = $this->uniqueOrderReferenceByRestaurant();
		$this->load->view('restaurants/home',$data); 
				}
		else{
			redirect('Auth/restaurantLogin');
		}
	}

	public function deliver(){
		$this->load->model('homeModel');
		$data['Orders'] = $this->homeModel->ordersToDeliver();
		$this->load->view('delivery/deliver',$data);
	}

	function uniqueOrderReference(){
		$this->load->model('homeModel');
		$this->load->library('session');
		$userid = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		$data = $this->homeModel->getOrderReferences($userid);
		return $data;
	}

	function uniqueOrderReferenceByRestaurant(){
		$this->load->model('homeModel');
		$this->load->library('session');
		$userid = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		$data = $this->homeModel->getOrderReferencesByRestaurant($userid);
		return $data;
		// print_r($data);
	}

	function getJoke(){
		$this->load->model('homeModel');
		$jokes = $this->homeModel->getJokes();
		$totalJokes = count($jokes);
		$joke = $jokes[rand(0,$totalJokes-1)];
		return $joke->joke;
	}
}