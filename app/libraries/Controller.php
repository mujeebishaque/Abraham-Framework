<?php

// base controller -> Loads Models and Views


	class Controller  {
		public function model ( $model )  {
			require_once '../app/models/' . $model . '.php';
			return new $model();
		}
		// Loading Views 
		public function view ( $view, $data = [] )  {
			if ( file_exists('../app/views/' . $view . '.php') )  {
				 require_once '../app/views/' . $view . '.php';
			}
			else  {
				die("ERROR: View doesn't exist :(");
			}
		}
	}