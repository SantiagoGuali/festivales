<?php
	class Musical_group extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$this->load-> view("header.php");
			$this->load-> view("Musical_groups/musical_groups.php");
			$this->load-> view("footer.php");
		}

		
	}
?>
