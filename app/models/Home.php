<?php
class Home extends Serz{
	private static $home;
	private static $rooms;
	private function __construct()
	{
		Home::$rooms = array();
	}

	public static function getInstance(){
		if(!Home::$home){
			Home::$home = new Home;
		}
		return Home::$home;
	}
	public static function addRoom($name, $admin){
		$room = new Room($name, $admin);
		array_push(Home::$rooms, $room);
		var_dump(Home::$rooms);
	}
	public static function getRooms(){
		return Home::$rooms;
	}
}