<?php

	// URL FORMAT => /controller/method/params
	// DSN => Data Source name
	class Core  {
		
		protected $current_controller = 'Pages';
		protected $current_method = 'index';
		protected $params = [];

		public function __construct ()  {
			$url = $this->get_url();
			if ( file_exists('../app/controllers/' . ucwords($url[0]) . '.php' ) )  {
				$this->current_controller = ucwords($url[0]);
				unset($url[0]);
			}
			// require the controller
			require_once '../app/controllers/' . $this->current_controller . '.php';
			$this->current_controller = new $this->current_controller;
			// Check for second parameter from URL
			if ( isset ( $url[1] ) )  {
				if ( method_exists($this->current_controller, $url[1]) ) {
					$this->current_method = $url[1];
					unset($url[1]);
				}
			}
			// Get Params. After unseting, we only have params left
			$this->params = $url ? array_values($url) : [];
			call_user_func_array([$this->current_controller, $this->current_method], $this->params);
	}
		public function get_url ()  {
			if ( isset( $_GET['url'] ) )  {
				$url = rtrim ( $_GET['url'], '/' );
				$url = filter_var ( $url, FILTER_SANITIZE_URL );
				$url = explode ( '/', $url );
				return $url;
			}
		}
	}