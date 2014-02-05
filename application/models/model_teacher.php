<?php 
class Model_teacher extends CI_Model {
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	public function teacherDetails(){
		
		$aColumns = array('id','name','designation','email','description','1' );
		/* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		/* DB table to use */
		$sTable = "teacher";
		
		/* Paging */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			
			$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
		}
		
		/* Ordering */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) ){
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
					".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ){
			$sOrder = "";
			}
		}
		
		/* 
		* Filtering
		* NOTE this does not match the built-in DataTables filtering which does it
		* word by word on any field. It's possible to do here, but concerned about efficiency
		* on very large tables, and MySQL's regex functionality is very limited
		*/
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ){
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ){
					$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}else{
			$sWhere = '';	
		}
	
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ){
				if ( $sWhere == "" ){
					$sWhere = "WHERE ";
				}
				else{
					$sWhere .= " AND ";
				}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%'";
			}
		}
	
		/*
		* SQL queries
		* Get data to display
		*/
		$sQuery = "SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
				  FROM $sTable 
			      $sWhere 
				  ORDER BY id DESC
				  $sLimit";
				  
		$rResult = $this->db->query($sQuery);		  
	
		/* Data set length after filtering */
		$sQuery = "SELECT FOUND_ROWS() AS frows";
		$rResultFilterTotal = $this->db->query($sQuery);
		
		$aResultFilterTotal = $rResultFilterTotal->row_array();
		$iFilteredTotal = $aResultFilterTotal['frows'];
		
		/* Total data set length */
		$sQuery = "SELECT COUNT(".$sIndexColumn.") AS count_index FROM  $sTable";
		$rResultTotal = $this->db->query($sQuery);
		
		$aResultTotal = $rResultTotal->row_array();
		$iTotal = $aResultTotal['count_index'];
		
		
		/*
		* Output
		*/
		$output = array(
						//"sEcho" => intval($_GET['sEcho']),
						"iTotalRecords" => $iTotal,
						"iTotalDisplayRecords" => $iFilteredTotal,
						"aaData" => array()
						);
		$k=1;	
		foreach ($rResult->result_array() as $aRow){
			$row = array();			
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( $aColumns[$i] == 'id' ){
					/* Serial No. Increment */
					$row[] = $k;
				}
				else if ( $aColumns[$i] == 'name' ){
					// for teacher name
						$row[] = $aRow['name'];

				}else if ( $aColumns[$i] == 'designation' ){
					// for teacher name
						$row[] = $aRow['designation'];

				}else if ( $aColumns[$i] == 'email' ){
					// for teacher name
						$row[] = $aRow['email'];

				}
               	else if ( $aColumns[$i] == 'description' ){
					// for teacher Added Date
						$row[] = $aRow['description'];
				}
				else if ( $aColumns[$i] == "1" ){
					/* Link For Edit & Delete */
                    $teacher_id = $aRow['id'];
                    $teacher_name = $aRow['name'];
                    $teacher_designation = $aRow['designation'];
                    $teacher_email = $aRow['email'];
                    $teacher_description = $aRow['description'];
					$row[] = '<a class="small black button" href="javascript:;" id="test" style="text-decoration:none;"
					onclick="update_teacher(\''.$teacher_id.'\',\''.$teacher_name.'\',\''.$teacher_designation.'\',\''.$teacher_email.'\',\''.$teacher_description.'\');">Edit</a>|<a class="small black button" href="javascript:;" style="text-decoration:none;" onclick="delete_teacher('.$teacher_id.');">Delete</a>';



                }
				else if ( $aColumns[$i] != ' ' ){
					/* General output */
					$row[] = $aRow[ $aColumns[$i] ];
				}				
			}
			$output['aaData'][] = $row;
			$k++;
		}
		
		echo $_GET['callback'].'('.json_encode( $output ).');';
		
	}
	
	//for Insert teacher
		public function insertDatabase($table,$data){
			$this->db->insert($table,$data);
		}

		//for Update teacher
		public function updateDatabase($table,$id,$data){
			$this->db->where('id',$id);
			$this->db->update($table,$data);
		}

		//for delete teacher
		function deleteDatabase($table,$id){
			$this->db->where('id',$id);
			$this->db->delete($table);
		}


}
?>