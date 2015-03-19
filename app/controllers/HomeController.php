<?php
class HomeController extends Controller
{
	private $home;

	public function __construct(){
		$this->home = Home::getInstance();
	}
	public function index()
	{
		$rooms = $this->home->getRooms();
		$this->view('Home', $rooms);
	}
	public function createRoom($name, $admin){
		Home::addRoom($name, $admin);

	}
	public function joinRoom(){

	}

	public function debug(){
		var_dump($this->home->getRooms());
		var_dump(Home::getRooms());
	}

}