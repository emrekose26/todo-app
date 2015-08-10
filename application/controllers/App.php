<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//kullanıcı girişi yapılıp session ataması yapılmışsa
		if($this->session->userdata('userID')!= null){
			redirect(base_url('app/dashboard'));
		}else{
			//session yoksa app/login sayfasına yönlendir.
			redirect(base_url('auth/login'));
		}
	}

	//genel görünüm
	public function dashboard(){
		//session atanmamışsa
		if($this->session->userdata('userID') == null){
			redirect('auth/login');
		}else{
			//session userID değişkene aktarıldı
			$userID = $this->session->userdata('userID');

			//dashboard_model dosyası çağırıldı
			$this->load->model('dashboard_model');

			//Model dosyası içerisinde istenen fonksiyonlara parametreler gönderilerek sonuçlar data arrayine aktarıldı
			$data['userData']       = $this->dashboard_model->getUserData($userID);
			$data['userTask']       = $this->dashboard_model->getTaskList($userID);
			$data['numRowTaskList'] = $this->dashboard_model->numRowTaskList($userID);
			$data['projects']       = $this->dashboard_model->getProject($userID);

			//data arrayi view dosyasına gönderilip dosyasının çağırılması sağlandı
			$this->load->view('app/dashboard',$data);


		}
	}

	//yeni görev eklemek için gerekli controller
	public function addNewTask(){

		//formdan gelen veriler post edilmişse
		if($this->input->post()){
			$taskName    = $this->input->post('taskName');
			$description = $this->input->post('description');

			$this->load->model('dashboard_model');

			$this->dashboard_model->addNewTask($taskName,$description);

			redirect(base_url('app/dashboard'));

		}else{
			$this->session->set_flashdata('newTaskError','Yeni task eklenirken hata oluştu!');
		}

		$this->load->view('app/addNewTask');
	}

	//görevlerin durumlarını tamamlanmış ya da tamamlanmamış olarak update etmeye yarayan controller
	public function taskUpdate($taskID,$condition){
		$this->load->model('dashboard_model');
		$this->dashboard_model->taskUpdate($taskID,$condition);

		redirect(base_url('app/dashboard'));
	}

	//tamamlanmış görevleri ekrana getirmek için gerekli controller
	public function completedTask(){
		$userID = $this->session->userdata('userID');
		$this->load->model('dashboard_model');
		$data['completedTask'] = $this->dashboard_model->getCompletedTask($userID);
		$data['userData'] = $this->dashboard_model->getUserData($userID);

		$this->load->view('app/completedTask',$data);
	}

	//var olan görevin verilerini update edilecek forma gönderen controller
	public function editTask($taskID){
		$this->load->model('dashboard_model');
		$data['taskData'] = $this->dashboard_model->getTaskData($taskID);

		$this->load->view('app/editTask',$data);

	}

	//editTask view den gelen verilerle var olan görevin verilerini güncelleyen controller
	public function editTaskData(){
		if($this->input->post()){
			$taskID      = $this->input->post('taskID');
			$taskName    = $this->input->post('taskName');
			$description = $this->input->post('description');

			$this->load->model('dashboard_model');
			$this->dashboard_model->editTask($taskID,$taskName,$description);

			redirect(base_url('app/dashboard'));

		}else{
			$this->session->set_flashdata('editTaskError','Task editlenirken hata oluştu!!');
		}
	}


	//var olan görevi silmek için gerekli controller
	public function deleteTask($taskID){
		$this->load->model('dashboard_model');
		$this->dashboard_model->deleteTask($taskID);

		redirect(base_url('app/dashboard'));
	}

	//kullanıcı verilerini setting forma gönderen controller
	public function settings(){
		$this->load->model('dashboard_model');
		$data['userData'] = $this->dashboard_model->getUserData($this->session->userdata('userID'));

		$this->load->view('app/settings',$data);
	}

	//kullanıcı bilgilerini değiştirmek ya da güncellemek için gerekli controller
	public function set_settings(){
		if($this->input->post()){
			$userID   = $this->input->post('userID');
			$name     = $this->input->post('name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password =  $password == null ? $password : md5($password);

			$this->load->model('dashboard_model');
			$this->dashboard_model->set_settings($userID,$username,$name,$password);

			redirect('app/dashboard');

		}else{
			$this->session->set_flashdata('settingError','Ayarlar yapılırken hata oluştu!!');
		}
	}

	/* ajax ile var olan görevleri projelere gre listelemye yarayan controller
	public function ajaxProject(){

		$projectID = $this->input->post('projectID');

		$this->load->model('dashboard_model');
		$data = $this->dashboard_model->ajaxProject($projectID);

		echo json_encode($data);
	}
	*/










} 