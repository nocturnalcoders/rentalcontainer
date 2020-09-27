<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{


		//echo ' proses';
		$post = $this->input->post(null, TRUE);  // ini sama dengan $_POST['login']
												     //$_POST['login']  login ini ada lah name pada submit button  atau input box atau 
		if(isset($post['login']))       //if(isset($_POST['login'])) { echo "prose login car1";} //-->ini cara 1
		{
			// step 1. load model user_m dului
			// step 2 lalu melempar variable $post ke model
			// $this->user_m->function($post)	 artinyaaaaa
			// $this->{nama filenya , baik model view controller}->nama fungsinya (dan variablenya kalo ada)
			// membuat alias nama user model menjadi serpeti ini 
			// $this->load->model('user_m', namaalias);
            
			$this->load->model('user_m');
			$query = $this->user_m->login($post);	
			if($query->num_rows() > 0) {
					//echo "Login Successfully";	
				
		     	$row = $query->row();   //	buat ngecek echo $row->username;
			//	echo $row->user_id;	
				$params = array(
                    'user_id_box'=>$row->user_id,
                    'username_box'=>$row->username,
					'level_box' => $row->level,
				//	'address' => $row->address,
					//'division' => $row->division
				);
				$this->session->set_userdata($params);

				// if ($row->level == 1) {
					echo "<script> 
					window.location='".site_url('dashboard')."'
					</script>"; 
				// }else{
				// 	echo "<script> 
				// 	window.location='".site_url('salesdivbra')."'
				// 	</script>"; 
				// }
				
			} else{
				echo "<script> 
					alert ('Login Failed');
					window.location='".site_url('auth/login')."'
				</script>";
			}
		} 
	}


	public function logout()
	{
		$params = array('user_id_box', 'level_box' , 'username_box');
		$this->session->unset_userdata($params);
		$this->session->sess_destroy();
		redirect ('auth/login');
	}
}
