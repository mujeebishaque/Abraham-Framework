<?php

	class Pages extends Controller  {

		public function __construct ()  {
			
		}
		public function index ()  {
			return $this->view('pages/index', ['title'=>'Welcome']);
		}
		public function about ()  {
			$this->view('pages/about', ['title'=>'About Us']);
		}		

	}

