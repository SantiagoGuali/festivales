<?php
	class Staff extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			$this->load-> view("header.php");
			$this->load-> view("Staff/staff.php");
			$this->load-> view("footer.php");
		}
	}
?>
