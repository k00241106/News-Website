<?php 

class User extends CI_Controller {
	var $imageName;
	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->library('session');
		$this->load->model('Notice_Model');
		$this->load->helper('URL');
	}

	public function index() {
		//capture an array of all notices 
		$data["AllNotices"] = $this->Notice_Model->getAllNotices();	
		$noticeData = array('AllNoticeData'  => $data["AllNotices"]);
		$this->session->set_userdata($noticeData);	
		$this->load->view("homePage");
	}
	
	public function doRegister(){
		$this->load->view("insertUser");
	}

	public function doLogon(){
		$this->load->view("logonUser");
	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('User/index');
	}
	
	//For User Profile Page
	 public function doUserProfile(){
		 $this->load->view("userProfileDetails");
	}
	
	public function getUser() {
		//get customers name and password from form
		$UserName = $_POST['UserName'];
		$password = md5($_POST['password']);
		//pass $UserName, $password to model and get back an array of user details
		$data['User'] = $this->User_Model->getUser($UserName,$password);
		//if a user if found, display their details
		//otherwise display an error plage with an appropriate error message
		
		if ($data['User'] != null) {
			//put user id into session - need when adding notice
			$userData = array('user'  => $data['User']);
			$this->session->set_userdata($userData);
			$user= $data['User'];
			
			//capture an array of all notices for that user
			$data["AllNotices"] = $this->Notice_Model->getNoticesByUserID($user['UserID']);	
			$noticeData = array('noticeData'  => $data["AllNotices"]);
			$this->session->set_userdata($noticeData);	

          	$this->load->view("usersHomePage");
		}
		else {
			$data['msg'] = "Not found";
			$this->load->view('msgpage', $data);
		}
	}
	
	public function RegisterUser(){
		
		//call internal function doUpload and get back a status from it
		// $status = $this->doUpload();
		// //if the status = 1 there has been a problem uploading the image
		// if ($status == 1 ) {
			// $data['msg'] = "Problem Uploading Image"; //prepare the appropriate message
			// //load the view with the appropriate message		
			// $this->load->view('msgpage', $data);
			// exit(); //exit the script
		// }
		//if the status = 1 there has been a problem creating the thumbnail
		// else if ($status == 2 ) {
			// $data['msg'] =  "Problem With Thumbnail Creation"; //prepare the appropriate message
			// exit(); //exit the script
		// }
		
		$UserName = $_POST['UserName'];
		$password = md5($_POST['Password']);

		$user = array(
			"UserName"=> $_POST["UserName"],
			"Password"=>md5($_POST["Password"]),
			"FirstName"=>$_POST["FirstName"],
			"SurName"=>$_POST["Surname"],
			"dateOfBirth"=>$_POST["dateOfBirth"],
			"Mobile"=>$_POST["Mobile"],
			"AddressLine1"=>$_POST["AddressLine1"],
			"AddressLine2"=>$_POST["AddressLine2"],
			"AddressLine3"=>$_POST["AddressLine3"],
			"Email"=>$_POST["email"],
			//"avatar"=>$this->imageName
		);
		$flag = $this->User_Model->insertUser($user);
		if($flag){
		
			//pass $UserName, $password to model and get back an array of user details
			$data['User'] = $this->User_Model->getUser($UserName,$password);
			//if a user if found, display their details
			//otherwise display an error page with an appropriate error message
			if ($data['User'] != null) {
				//put user id into session - need when adding notice
				$userData = array('user'  => $data['User']);
				$this->session->set_userdata($userData);
				$user= $data['User'];
				//capture an array of all notices for that user
				$data["AllNotices"] = $this->Notice_Model->getNoticesByUserID($user['UserID']);	
				$noticeData = array('noticeData'  => $data["AllNotices"]);
				$this->session->set_userdata($noticeData);	
				$this->load->view("usersHomePage");
			}
			
		}else{
			$data["msg"] = "Error in database";
			$this->load->view("msgpage",$data);
		}
	}
	
	public function doUpload(){
		
		$config = array(
			'upload_path' 	=> './assets/images/avatar/', //where the uploaded imgs are going
			'allowed_types' => 'gif|jpg|png', //only allow the user to upload 1 of three file types
			'overwrite'		=> 	'TRUE', //overwrite the file if it already exists
			'max_size'		=> '0',
			'max_width'		=> '0',
			'max_height'	=> '0'
		);
		
		//load upload library with the appropriate config options
		$this->load->library('upload', $config);
		
		//do upload and check for errors
		if ( ! $this->upload->do_upload()){
			echo "upload image";
			echo $this->upload->display_errors();
			return 1; //function stops executing here if theres a problem and returns 1
		}
		//get information from the upload function
		//all we really need from this is the image name so it can
		//be saved to the db.
		$upload_data = $this->upload->data();
		$this->imageName = $upload_data['file_name'];
		//set config options for thumbnail creation
		$config = array(
			'source_image' 		=> $upload_data['full_path'],
			'new_image' 		=> './assets/images/avatarThumb/',
			'width'				=> '140',
			'height'			=> '88'
		);
		
		//load library to do the resizing and thumbnail creation
        $this->load->library('image_lib', $config);
		
		//call function resize in the image library to physically create the thumbnail	
		if (! $this->image_lib->resize()) {
			echo "make thumb nail";
			echo $this->image_lib->display_errors();
			return 2; //function stops executing here if theres a problem and returns 2
		}
		return 0; //if the upload has executed correctly the function returns 0
		
	}
	
	public function getUpdateDetails ($userid) {
       	$data['User'] = $this->User_Model->getUserByID($userid);
        if ( $data['User'] != null)
            $this->load->view('updateUserDetails', $data);
        else {
			$data['msg'] = "Error on user load";
		 	$this->load->view('msgpage', $data);
		 }
     }
	 //Function for userProfileDetails to display their details
	 public function getProfileDetails ($userid) {
       	$data['User'] = $this->User_Model->getUserByID($userid);
        if ( $data['User'] != null)
            $this->load->view('userProfileDetails', $data);
        else {
			$data['msg'] = "Error on user load";
		 	$this->load->view('msgpage', $data);
		 }
     }

	public function saveUserDetails($userID) {
		//prepare an array of user info submitted via the POST 
        $user = array(
			"UserName"=> $_POST["UserName"],
			"Password"=>$_POST["Password"],
			"FirstName"=>$_POST["FirstName"],
			"SurName"=>$_POST["Surname"],
			"dateOfBirth"=>$_POST["dateOfBirth"],
			"Mobile"=>$_POST["Mobile"],
			"AddressLine1"=>$_POST["AddressLine1"],
			"AddressLine2"=>$_POST["AddressLine2"],
			"AddressLine3"=>$_POST["AddressLine3"],
			"Email"=>$_POST["email"],
			"UserID"=>$userID
		);
   		//call the function in the model to do the update and get back a boolean flag	
	    //$flag holds true/false value depending on whether the update was successful or not
        $flag = $this->User_Model->updateUser($user);
		//pass $flag to function to determine whether success/failure page should be displayed
        if($flag){
			$data['User'] = $user;
			$this->load->view("usersHomePage",$data);
		} else {
			$data['msg'] = "error on update to user details";
			$this->load->view('msgpage', $data);
		}
	}
	
	public function userHomePage($userID) {
		//capture an array of all notices for that user
		$data["AllNotices"] = $this->Notice_Model->getNoticesByUserID($userID);	
		$noticeData = array('noticeData'  => $data["AllNotices"]);
		$this->session->set_userdata($noticeData);	
		$this->load->view("usersHomePage");
	}
}