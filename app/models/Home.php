<?php
class Home{
	private static $home;
	private $rooms;
	private function __construct(){

	}

	public function getInstance(){
		if(!$this->home){
			$this->home = new Home;
		}
		return $this->home;
	}
}