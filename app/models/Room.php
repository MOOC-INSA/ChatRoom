<?php
class Room extends Serz{
	private static $nmbRoom = 0;
	private $name = array();
	private $users = array();
	private $messages ;

	public function __construct($name,$adminName){
		Room::$nmbRoom++;
		$this->name = $name;
		$admin = new User($adminName, True, $this);
		array_push($this->users, $admin);
		$messages = [];
	}

	public function getName(){
		return $this->name;
	}
	public function getUsers(){
		return $this->users;
	}
	public function getMessages(){
		return $this->messages;
	}
}