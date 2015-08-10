<?php
/**
 * Created by PhpStorm.
 * User: Emre Köse
 * Date: 09.08.2015
 * Time: 12:51
 */

class Dashboard_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}


	//userID'ye göre kullanıcı verilerini döndüren fonksiyon
	public function getUserData($userID){
		$query = "SELECT * FROM user WHERE userID = ".$userID."";
		$result = $this->db->query($query);
		return $result->row();
	}

	//userID'ye göre görev listesini getiren fonksiyon
	public function getTaskList($userID){
		$query = "SELECT * FROM `task` WHERE `userID`=".$userID." and `condition` = 0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//kullanıcının tamamlanmamış görevlerinin sayısını döndüren model
	public function numRowTaskList($userID){
		$query = "SELECT * FROM `task` WHERE `userID`=".$userID." and `condition` = 0";
		$result = $this->db->query($query);
		return $result->num_rows();
	}

	//görev verilerini getiren model
	public function getTaskData($taskID){
		$query = "SELECT * FROM `task` WHERE `taskID`=".$taskID;
		$result = $this->db->query($query);
		return $result->row();
	}

	//userID'ye göre tamamlanmış görev listesini getiren fonksiyon
	public function getCompletedTask($userID){
		$query = "SELECT * FROM `task` WHERE `userID`=".$userID." and `condition` = 1";
		$result = $this->db->query($query);
		return $result->result_array();
	}


	//yeni görev eklemek için gerekli model
	public function addNewTask($taskName,$description){
		$taskData = array(
			'taskName'    => $taskName,
			'description' => $description,
			'condition'   => '0',
			'userID'      => $this->session->userdata('userID'),
			'projectID'   => $this->session->userdata('userID')
		);
		$this->db->insert('task',$taskData);
	}

	//görevleri tamamlanmış ya da tamamlanmamış olarak update etmeye yarayan model
	public function taskUpdate($taskID,$condition){
		$data = array(
			'condition' => $condition
		);
		$this->db->where('taskID',$taskID);
		$this->db->update('task',$data);
	}

	//var olan görevi güncellemek için gerekli model
	public function editTask($taskID,$taskName,$description){
		$taskData = array(
			'taskName'    => $taskName,
			'description' => $description
		);

		$this->db->where('taskID',$taskID);
		$this->db->update('task',$taskData);
	}

	//var olan görevi silme için gerekli model
	public function deleteTask($taskID){
		$this->db->where('taskID',$taskID);
		$this->db->delete('task');
	}

	//ayarlar formundaki verilere göre güncelleme yapan model
	public function set_settings($userID,$username,$name,$password){
		if($password == ""){
			$data = array(
				'userName' => $username,
				'name'     => $name,
			);
			$this->db->where('userID',$userID);
			$this->db->update('user',$data);
		}else{
			$data = array(
				'userName' => $username,
				'name'     => $name,
				'password' => $password
			);
			$this->db->where('userID',$userID);
			$this->db->update('user',$data);
		}
	}

	//TODO : ajax metodu ile projeye göre task listeleme yapılacak
	//ajax için projeleri ekrana getirmeye yarayan model
	public function getProject($userID){
		$result = $this->db->get_where('projects',array('userID' => $userID));
		return $result->result_array();
	}

	/*
	public function ajaxProject($projectID){
		$result = $this->db->get_where('task',array('projectID' => $projectID));
		return $result->result_array();
	}
	*/
}

