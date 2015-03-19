<?php
class MessageVO extends VO{
	private $room;
	private $user;
	private $text;

	public function __construct($room, $user, $text){

	}

	public function getRoom(){
		return $this->room;
	}
	public function getUser(){
		return $this->user;
	}
	public function getText(){
		return $this->text;
	}
}