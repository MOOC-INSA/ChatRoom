<?php
class HomeController extends Controller
{
	private $roomDAO;
	private $userDAO;

	public function __construct(){
		$this->roomDAO = new RoomDAO();
		$this->userDAO = new UserDAO();

	}
	public function index()
	{
		$this->view('Home');
	}
	public function createRoom(){
		if(!isset($_POST["roomname"])){
			$this->quitWithErrorTo('Home', new Error(4));
		}elseif(!isset($_POST["username"])){
			$this->quitWithErrorTo('Home', new Error(3));
		}else{
			$roomname = htmlspecialchars($_POST["roomname"]);
			$username = htmlspecialchars($_POST["username"]);
			$existRoom = $this->roomDAO->findByName($roomname);
			if(!$existRoom){
				$existUser = $this->userDAO->findByName($username);
				if(!$existUser){
					$this->userDAO->insert(new User(null, $username, $roomname));
					$this->roomDAO->insert(new Room(null, $roomname, $username));
					$this->cookieMe($username,$roomname);
					$this->view('Room', array("username" => $username, "roomname" => $roomname));
				}else{
					$this->quitWithErrorTo('Home', new Error(0));
				}
			}else{
				$this->quitWithErrorTo('Home', new Error(1));
			}
		}
	}
	public function joinRoom(){
		if(!isset($_POST["roomname"])){
			$this->quitWithErrorTo('Home', new Error(4));
		}elseif(!isset($_POST["username"])){
			$this->quitWithErrorTo('Home', new Error(3));
		}else{
			$username = htmlspecialchars($_POST["username"]);		
			$roomname = htmlspecialchars($_POST["roomname"]);
			$existRoom = $this->roomDAO->findByName($roomname);
			if($existRoom){
				$existUser = $this->userDAO->findByName($username);
				if(!$existUser){
					$this->userDAO->insert(new User(null, $username, $roomname));	
					$this->cookieMe($username, $roomname);
					$this->view('Room', array("username" => $username, "roomname" => $roomname));
				}else{
					$this->quitWithErrorTo('Home',new Error(0));
				}
			}else{
				$this->quitWithErrorTo('Home',new Error(1));
			}
		}
	}
	private function cookieMe($username, $roomname){
		setcookie('username', $username, time() + 2*24*3600, "/", null, false, true);
		setcookie('roomname', $roomname, time() + 2*24*3600, "/", null, false, true);
	}
	public function getRooms(){
		$json = Room::roomArrayToJson(array(new Room(null, "","")));
		if($ret = $this->roomDAO->findAll())
		{
			$json = Room::roomArrayToJson($ret);
		}
		echo $json;
	}

}
