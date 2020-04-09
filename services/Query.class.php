<?php
	
	/*--------------------------------------------
	*
	*	Query
	*	
	*
	---------------------------------------------*/
	Class Query
	{
		
		private $dbConnect;
		private $insertedId;

		public function __construct( $services )
		{
			$this->dbConnect = $services->base->dbConnect;
		}

		//	Convert query into a Array
		//	Keys are the query name fields
		public function toArray($qy)
		{
			$result = $this->run($qy);

			if (!$result) {
				
				return 0;

			} else {
			
				while  ($row = mysqli_fetch_array( $result , MYSQL_ASSOC ))  {
					
					$temp = Array();
					
					foreach  ($row as $key => $value)  $temp[$key] = $value;
					
					$return[] = $temp;
					
				}

				if (empty($return)) $return = 1;

				return $return;

			}
			
		}

		// Return id from auto increment insert
		public function insertId() {
			return $this->insertedId;
		}

		//	Run query
		private function run( $qy )
		{
			$this->dbConnect->set_charset("utf8");
			$ret = mysqli_query( $this->dbConnect , $qy );

			if($id = mysqli_insert_id($this->dbConnect)) {
				$this->insertedId = $id;
			}

			return $ret;
		}
		
	}