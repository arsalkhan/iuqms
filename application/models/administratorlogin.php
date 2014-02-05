<?php 
class AdministratorLogin extends CI_Model {
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	public function loginInfoCheckByDb($data){
		
		$query = $this->db->query("SELECT count(`admin_username`) AS `chk` FROM `admin`
						  		  WHERE `admin_username` = '".$data['username']."' AND `admin_password` = '".$data['password']."' ");
						  
		return $query->row();
	}

	public function redirectTop($url){
		echo "<script>window.top.location = '".$url."'</script>";	
	}

}
?>