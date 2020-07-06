<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{	
        $data['userType'] = 0;
				$data['authToken'] = null;
		return redirect('Auth/customerLogin',$data);
	}

	public function customerLogin(){
		$this->load->library('session');
			if($this->session->has_userdata('authToken')){
				if($this->session->userdata('userType') == 2){
				$data['authToken'] = $this->session->userdata('authToken');
				$data['name'] = $this->session->userdata('userName');
				redirect('Home/customerIndexPage');
				}
				if($this->session->userdata('userType') == 1){
          redirect('Auth/restaurantLogin');
                }
			}else{
				$data['userType'] = 0;
				$data['authToken'] = null;
				// $data['name'] = null;
			}
		$this->load->view('customers/customer_login',$data);
	}

	public function restaurantLogin(){
		$this->load->library('session');
			if($this->session->has_userdata('authToken')){
				if($this->session->userdata('userType') == 1){
				$data['authToken'] = $this->session->userdata('authToken');
				$data['name'] = $this->session->userdata('userName');
				redirect('Home/restaurantIndexPage');
				}
				if($this->session->userdata('userType') == 2){
          redirect('Auth/customer_login');
                }
			}else{
				$data['userType'] = 0;
				$data['authToken'] = null;
			}
		$this->load->view('restaurants/restaurant_login',$data);
	}

	public function customerSignUp(){
        $data['userType'] = 0;
				$data['authToken'] = null;
		$this->load->view('customers/customer_signup',$data);
	}

	public function restaurantSignUp(){
        $data['userType'] = 0;
				$data['authToken'] = null;
		$this->load->view('restaurants/restaurant_signup',$data);
	}

	public function customerLoginData(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		// $password = md5($password);
		$this->load->model('authModel');
		$this->load->library('session');
		$userDetails = $this->authModel->fetchUser($email,$password);
		if($userDetails != null || $userDetails != ''){
			$this->session->set_userdata(['LoginId'=> $userDetails->email,
				'userName'=> $userDetails->name,
				'userUniqueId'=> $userDetails->customer_unique_id,
				'foodPref' => $$userDetails->food_pref,
				'userType' => '2',
				'authToken'=> uniqid() ]);
			redirect('Home/customerIndexPage');
		}
		else{
			if(($this->authModel->userExist($email)) != null){
					$errorCode = 1;
				}else{
					$errorCode = 2;
				}
			redirect('Auth/customerLogin?error-code='.$errorCode);
		}
	}

	public function restaurantLoginData(){
		$user_name = $this->input->post('user_name');
		$passwords = $this->input->post('passwords');
		$passwords = md5($passwords);
		$this->load->model('authModel');
		$this->load->library('session');
		$userDetails = $this->authModel->fetchRestaurant($user_name,$passwords);
		if($userDetails != null || $userDetails != ''){
			$this->session->set_userdata(['LoginId'=> $userDetails->user_name,
				'userName'=> $userDetails->restaurant_name,
				'userUniqueId'=> $userDetails->restaurant_unique_id,
				'userType' => '1',
				'authToken'=> uniqid() ]);
			redirect('Home/restaurantIndexPage');
		}
		else{
			if(($this->authModel->restaurantExist($user_name)) != null){
					$errorCode = 1;
				}else{
					$errorCode = 2;
				}
			redirect('Auth/restaurantLogin?error-code='.$errorCode);
		}
	}

	public function restaurantSignUpData(){
		$restaurant_name = $this->input->post('restaurant_name');
		$user_name = $this->input->post('user_name');
		$address = $this->input->post('address');
		$passwords = $this->input->post('passwords');
		$passwords = md5($passwords); 
		$number_of_tables = $this->input->post('number_of_tables');
		$contact = $this->input->post('contact');
		$this->load->model('authModel');
		$this->authModel->restaurantSignup($restaurant_name,$user_name,$address,$passwords,$number_of_tables,$contact);
		return redirect('Auth/restaurantLogin');
	}

	public function customerSignUpData(){
		$name = $this->input->post('name');
		$mobile = $this->input->post('mobile');
		$password = $this->input->post('password');
		$password = md5($password); 
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$profile_image = $this->input->post('profile_image');
		$food_pref = $this->input->post('food_pref');
		$this->load->model('authModel');
		$this->authModel->customerSignup($name,$mobile,$password,$address,$email,$profile_image,$food_pref);
		return redirect('Auth/customerLogin');
	}

	public function logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('Auth');
	}

	//--------------------------------------------------------------------

}
