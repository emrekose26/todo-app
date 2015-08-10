<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function login(){

		//session atanmışsa ve giriş yapılmışsa artık login sayfası görüntülenmeyecek
		if($this->session->userdata('userID') != null){
			redirect('app/dashboard');
		}else{

			//formdan gelen veriler post edilmemişse giriş sayfasına yönlendir
			if(!$this->input->post()){
				$this->load->view('auth/login');
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$password = md5($password);

				$this->load->model('login_model');
			 	$num_row = $this->login_model->userLogin($username,$password);

				if($num_row > 0){

					//auth modelden session oluşturmaya yarayan method çağırıldı
					$this->load->model('login_model');
					$this->login_model->set_session($username);

					//genel bakış sayfasına yönlendirilme yapıldı
					redirect(base_url('app/dashboard'));
				}else{
					$this->session->set_flashdata('hata','Kullanıcı adı ya da şifre hatalı');
					redirect(base_url('auth/login'));
				}
			}
		}
	}

	//çıkış yapmak için gerekli controller
	public function logout(){
		$this->session->unset_userdata('userID');
		redirect(base_url());
	}

	//kullanıcı kaydı için gerekli işlemleri yapan controller
	public function signup(){

		if(!$this->input->post()){
			$this->load->view('auth/signup');
		}else{
			$name     = $this->input->post('name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password = md5($password);

			$this->load->model('signup_model');
			$this->signup_model->signup($name,$username,$password);

			$this->load->model('login_model');
			$this->login_model->set_session($username);

			redirect(base_url('app/dashboard'));
		}

	}
} 