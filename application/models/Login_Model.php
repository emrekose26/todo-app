<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	//giriş yapılırken kullanıcının var olup olmadığını kontrol eden model
	public function userLogin($username,$password){
		$query = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
		$result = $this->db->query($query);
		return $result->num_rows();
	}

	//session oluşturmaya yarayan model
	public function set_session($username){
		$query  = "SELECT userID FROM user WHERE username = '".$username."'";
		$result = $this->db->query($query);
		$row    = $result->row();

		$sess_data = array(
			'userID' => $row->userID
		);

		$this->session->set_userdata($sess_data);
	}




}