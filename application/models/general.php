<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	Class General extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function remove_slashes($datawithslashes)
		{
			$datawithoutslashes = str_replace( "'", "\'", $datawithslashes );
			return $datawithoutslashes;		
		}
		
		function is_contain_string($substring, $string) {
			$pos = strpos($string, $substring);
	 
			if($pos === false) {
				 echo "string NOT found";
			   // return false;
			}
			else {
				echo "string found ";
				//return true;
			}
		}

		// $s="vipin kumar is php developer";
		// $sub="vipin kumar ";
		// contains($sub, $s);	

	}
	?>