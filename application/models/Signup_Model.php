<?php

class Signup_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	//kullanıcı kaydını gerçekleştiren model
	public function signup($name,$username,$password){
		$dataUser = array(
			'name'     => $name,
			'userName' => $username,
			'password' => $password
		);

		$this->db->insert('user',$dataUser);
	}
} 