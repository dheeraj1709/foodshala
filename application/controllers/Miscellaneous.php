<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Miscellaneous extends CI_Controller
{
	public function index()
	{
		return redirect('Auth');
		// echo view('generalFiles/navbar');
	}

	public function items(){
		$this->load->library('session');
		if($this->session->has_userdata('userType')){
			if(intval($this->session->userdata('userType')) == 1 || intval($this->session->has_userdata('userType')) == 4){
				$data['categories'] = $this->getCategories();
				$data['name'] = $this->session->userdata('userName');
				$data['authToken'] = $this->session->userdata('authToken');
				$data['userType'] = $this->session->userdata('userType');
				$this->load->view('restaurants/addEditItems',$data);
			}else{
				redirect('Auth');
			}
		}
	}


	public function addItem(){
		$this->load->library('session');
		$item_name = $this->input->post('item_name');
		$vegYN = $this->input->post('vegYN');
		$item_category_id = $this->input->post('item_category_id');
		$restaurant_unique_id = $this->session->userdata('userUniqueId');

		$price = $this->input->post('price');
			$config['file_name']						= uniqid()."-".uniqid();
			$config['upload_path']          = './assets/images';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 1000;
	    $config['max_width']            = 10240;
	    $config['max_height']           = 7680;
	    $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('item_image')){
          $error = array('error' => $this->upload->display_errors());
        }else{
	      $data = array('upload_data' => $this->upload->data());
	  		  }
			$this->load->model('itemModel');
			$this->itemModel->addItem($item_name,$vegYN,$item_category_id,$restaurant_unique_id,$data['upload_data']['file_name'],$price);
			return redirect('Miscellaneous/items');
	}

	// public function addCategory(){
	//																						To Do 
	// }

		public function menu(){
			$this->load->library('session');
			if($this->session->userdata('userType') == 1){
			$user = null;
			$data['categories'] = $this->getCategories();
			$data['total'] = [];
			$data['userType'] = $this->session->userdata('userType');
			$totalPerCategory = $this->itemModel->getTotalPerCategory($user);
			foreach($totalPerCategory as $category){
				$data['total'][$category->item_category_id] = $category->count;
			}
			$data['name'] = $this->session->userdata('userName');
			$data['authToken'] = $this->session->userdata('authToken');
			$this->load->view('customers/menu',$data);
			}else{
				$user = null;
				$data['categories'] = $this->getCategories();
				$data['total'] = [];
				$data['userType'] = 0;
				$totalPerCategory = $this->itemModel->getTotalPerCategory($user);
				foreach($totalPerCategory as $category){
					$data['total'][$category->item_category_id] = $category->count;
				}
				$this->load->view('customers/menu',$data);
			}			
		}

		public function restaurantMenu(){
			$this->load->library('session');
			if($this->session->userdata('userType') == 1){
			$user = $this->session->userdata('userUniqueId');
			// print_r($user);
			$data['categories'] = $this->getCategories();
			// print_r($data['categories']);
			$data['total'] = [];
			$totalPerCategory = $this->itemModel->getTotalPerCategory($user);
			foreach($totalPerCategory as $category){
				$data['total'][$category->item_category_id] = $category->count;
			}
			$data['name'] = $this->session->userdata('userName');
			$data['authToken'] = $this->session->userdata('authToken');
			$this->load->view('restaurants/menu',$data);	
			}else{
				redirect('Auth/restaurantLogin');
			}		
		}

		public function itemsList(){
			$category = $this->input->get('category');
			$this->load->library('session');
			$data['items'] = $this->getItems($category);
			$data['userUniqueId'] = $this->session->userdata('userUniqueId');
			$data['userType'] = $this->session->userdata('userType');
				$data['name'] = $this->session->userdata('userName');
				$data['authToken'] = $this->session->userdata('authToken');
			$this->load->view('customers/itemsList',$data);
		}

		function getCategories(){
			$this->load->model('itemModel');
			$categories = $this->itemModel->getCategories(); 
			$categories = json_encode($categories);
			return $categories;
		}

		function getItems($category){
			$this->load->model('itemModel');
			$items = $this->itemModel->getItemsCategoryRestaurant($category); 
			// print_r($items);
			$items = json_encode($items);
			return $items;
		}


	//--------------------------------------------------------------------

}