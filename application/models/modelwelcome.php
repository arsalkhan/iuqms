<?php 
class ModelWelcome extends CI_Model {
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	public function insert_db($table_name,$data){
		$this->db->insert($table_name,$data);	
	}
	
	public function update_db($table_name,$data,$condition){
		$this->db->update($table_name, $data, $condition);
	}

}
?>