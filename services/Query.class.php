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
					
					foreach  ($row as $key => $value)  $temp[$key] = utf8_encode($value);
					
					$return[] = $temp;
					
				}

				if (empty($return)) $return = 1;

				return $return;

			}
			
		}

		//	Run query
		private function run( $qy )
		{
			return mysqli_query( $this->dbConnect , $qy );
		}
		
	}