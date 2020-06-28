<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{
	// public function index()
	// {

	// }

	public function getOrders(){
		$this->load->model('ordersModel');
		$this->load->model('itemModel');
		$this->load->library('session');
		$restaurant_unique_id = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		$data['categories'] = $this->itemModel->getCategories();
		$data['orderdetails'] = $this->ordersModel->getOrders($restaurant_unique_id);
		$this->load->view('restaurants/ordersView',$data);
	}

	public function packedStatus(){
		$this->load->model('ordersModel');
		$this->load->model('cartModel');
		$this->load->library('session');
		$restaurant_unique_id = $this->input->post('restaurant_unique_id');
		$item_unique_id = $this->input->post('item_unique_id');
		$userid = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		$cartdetails = $this->cartModel->addToCart($restaurant_unique_id,$item_unique_id,$userid,$uniqueId);
	}

	public function orderPacked(){
		$this->load->model('ordersModel');
		$this->load->model('itemModel');
		$this->load->model('cartModel');
		$this->load->library('session');
		$order_reference = $this->input->post('order_reference');
		$item_unique_id = $this->input->post('item_unique_id');
		$restaurant_unique_id = $this->session->userdata('userUniqueId');
		$uniqueId = uniqid();
		// print_r($order_reference);
		// print_r($item_unique_id);
		$this->ordersModel->getOrders($order_reference,$item_unique_id);
		$this->cartModel->packedYN("Y",$order_reference);
		$this->ordersModel->generateID($order_reference);
	}

	public function delivery(){
		$this->load->model('ordersModel');
		$this->load->model('itemModel');
		$this->load->model('cartModel');
		$this->load->library('session');
		$var = file_get_contents('php://input');
		$order_reference = json_decode($var)->orderID;
		$delivery_code = json_decode($var)->delivery_code;
		$existYN = 	$this->ordersModel->getIdToVerify($order_reference,$delivery_code);
		if(count($existYN) > 0){		
		$this->ordersModel->verifyID($order_reference,$delivery_code);
			}
			else{
				http_response_code(401);
			}
	}



}
	//--------------------------------------------------------------------

// }created ,attended, mom, summary
// created //

// starts,attendav,mom,summ
