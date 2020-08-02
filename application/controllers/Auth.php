<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
// $method = $_SERVER['REQUEST_METHOD'];
// if($method == "OPTIONS") {
//     die();
// }

require APPPATH . '/libraries/REST_Controller.php';

class Auth extends Rest_Controller {

	public function login_post()
	{
		// echo "kawal";exit();
		$method = $_SERVER['REQUEST_METHOD'];
		// print_R($_SERVER); die;
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			// json_output(400,array('status' => 400,'message' => 'Bad request.'));
			// $check_auth_client = $this->MyModel->check_auth_client();
			// if($check_auth_client == true){
				$params = json_decode(file_get_contents('php://input'), TRUE);
				// print_r(file_get_contents('php://input')); die;
				// print_r(['ssss']); die;
		        	$username = $params['username'];
		        	$password = $params['password'];
		        
		        	$response = $this->MyModel->login($username,$password);
				json_output($response['status'],$response);
			// }
		}
	}

	public function logout_post()
	{	
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			// $check_auth_client = $this->MyModel->check_auth_client();
			// if($check_auth_client == true){
		        	$response = $this->MyModel->logout();
				json_output($response['status'],$response);
			// }
		}
	}
	
}
