<?php
class User extends Serz{
	private static $nmbUser = 0;
	private $isAdmin;
	private $name;
	private $room;

	public function __construct($name, $isAdmin, $room){

	}
	public function getIsAdmin(){
		return $this->isAdmin;
	}
	public function getName(){
		return $this->name;
	}
	public function getRoom(){
		return $this->room;
	}

}