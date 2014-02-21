<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Author: Billy Joel Arlo T. Zarate
	File Description : This document is the controller of the search module for user accounts
*/
class Enable_disable extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');//loads the form helper
		$this->load->library('session');//loads the session library
		if(!isset($_SESSION))
			session_start();
	}

	public function index()
	{
		$this->load->view('enable_disable_view');//loads the view
	}

	public function search()
	{
		// Sanitation Author: Cyril Justine D. Bravo
		// Description: Sanitizes queries in the user search
		$data['field'] = filter_var($_POST["field"],FILTER_SANITIZE_STRING);
		switch($_POST["field"]){
			case "name": {
				$data['fname'] = filter_var($_POST["firstname"],FILTER_SANITIZE_STRING);
				$data['mname'] = filter_var($_POST["middlename"],FILTER_SANITIZE_STRING);
				$data['lname'] = filter_var($_POST["lastname"],FILTER_SANITIZE_STRING);
				break;
			}

			case "stdno": {
				$data['student_no']= filter_var($_POST["studentno"],FILTER_SANITIZE_STRING);
				break;
			}

			case "empno": {
				$data['employee_no']= filter_var($_POST["employeeno"],FILTER_SANITIZE_STRING);
				break;
			}

			case "uname": {
				$data['username'] = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
				break;
			}

			case "email": {
				$data['email'] = filter_var($_POST["emailadd"],FILTER_SANITIZE_STRING);
				break;
			}
		}
		$data['status'] = filter_var($_POST["status"],FILTER_SANITIZE_STRING);
		$this->load->model('enable_disable_model');
		$this->session->set_userdata('sql', $this->enable_disable_model->generateQuery($data));//puts the sql query to the session
		$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));//gets the result from the query
		$array['result'] = $result;	
		$this->load->view('header');						//passes the result to the view 
		$this->load->view('enable_disable_view', $array);	//loads the view with the results
		$this->load->view('footer');
	}


	/*
		sample ajax call
		$.ajax({
			url : "http://localhost/mysecondrepoV2/index.php/enable_disable/activate/"+ username +"/" + usertype + "/"+ number + "/" + email,
			type : 'POST',
			dataType : "html",
			async : true,
			success: function(data) {}
		});
				
	*/

	public function activate($username, $usertype, $number, $email)
	{
		/*
			activates a user account
		*/

		$admin = $_SESSION['username'];//hardcoded
		$action = "activate";//hardcoded

		$this->load->model('enable_disable_model');//loads model
		$success = $this->enable_disable_model->activate($username, $usertype, $number, $email);
		if($success)//calls function activate
			$this->enable_disable_model->log($admin, $username, $email, $action);//calls function log from model if activate returns true

		//will not be used if this function was called using AJAX	
		//$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));	//refreshes
		//$array['result'] = $result;															//page
		//$this->load->view('enable_disable_view', $array);									//with same query

		//used for AJAX implementation
		$json = array('success' => $success);
		echo json_encode($json);
	}

	/*
		sample ajax call
		$.ajax({
			url : "http://localhost/mysecondrepoV2/index.php/enable_disable/disable/"+ username +"/"+ student_no + "/" + email,
			type : 'POST',
			dataType : "html",
			async : true,
			success: function(data) {}
		});
	*/

	public function enable($username, $email)
	{
		/*
			enables a user account
		*/
		$admin = $_SESSION['username'];//hardcoded
		$action = "enable";//hardcoded

		$this->load->model('enable_disable_model');//loads model
		$success = $this->enable_disable_model->enable($username, $email);
		if($success)//calls function enable from model
			$this->enable_disable_model->log($admin, $username, $email, $action);//calls function log from model if enable returns true
		
		//will not be used if this function was called using AJAX
		//$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));	//refreshes
		//$array['result'] = $result;															//page
		//$this->load->view('enable_disable_view', $array);									//with the same query
		
		//return value for AJAX implementation
		$json = array('success' => $success);
		echo json_encode($json);
	}

	/*
		sample ajax call
		$.ajax({
			url : "http://localhost/mysecondrepoV2/index.php/enable_disable/enable/"+ username +"/"+ student_no + "/" + email,
			type : 'POST',
			dataType : "html",
			async : true,
			success: function(data) {}
		});
	*/

	public function disable($username, $email)
	{
		/*
			disables a user account
		*/
		$admin = $_SESSION['username'];//hardcoded
		$action = "disable";//hardcoded

		$this->load->model('enable_disable_model');//loads model
		$success = $this->enable_disable_model->disable($username, $email);
		if($success)//calls function disable from model
			$this->enable_disable_model->log($admin, $username, $email, $action);//calls function log from model if disable returns true
		
		//will not be used if this function was called using AJAX
		//$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));	//refreshes
		//$array['result'] = $result;															//page
		//$this->load->view('enable_disable_view', $array);									//with same query

		//return value for AJAX implementation
		$json = array('success' => $success);
		echo json_encode($json);
	}
}

/* End of file enable_disable.php */
/* Location: ./application/controllers/enable_disable.php */