<?php
class RoomController extends Controller
{
	private $messageDAO;
	private $userDAO;
	private $roomDAO;
	private $room;
	private $username;

	public function __construct(){
		if(!isset($_COOKIE['username'])){
			$this->quitWithErrorTo('Home', new Error(3));
		}elseif(!isset($_COOKIE["roomname"])){
			$this->quitWithErrorTo('Home', new Error(4));
		}else{
			$this->userDAO = new UserDAO();
			$this->roomDAO = new RoomDAO();
			$this->messageDAO = new MessageDAO();
			$this->username = $_COOKIE['username'];
			$roomname = $_COOKIE['roomname'];
			$this->room = $this->roomDAO->findByName($roomname);
		}

	}
	public function index()
	{
		$this->view('Room');
	}
	public function quitRoom(){
		if($this->username == $this->room->getAdminname()){
			$this->roomDAO->deleteByName($this->room->getRoomname());
			$this->messageDAO->deleteByRoom($this->room->getRoomname());
		}
		$this->userDAO->deleteByName($this->username);
		$this->view('Home');
	}
	public function getMessages(){
		$ret = Message::messageArrayToJson(array(new Message(null, "","","",null)));
		if($this->room){
			if($messages = $this->messageDAO->findByRoom($this->room->getRoomname())) {
				$ret = Message::messageArrayToJson($messages);
			}
		}
		echo $ret;
	}
	public function getUsers(){
		$ret = User::userArrayToJson(array(new User(null,"","")));
		if($this->room){
			if($users = $this->userDAO->findByRoom($this->room->getRoomname())){
				$ret = User::userArrayToJson($users);
			}
		}
		echo $ret;
	}
	public function sendMessage(){
		if(!isset($_POST["text"])){
			$this->quitWithErrorTo('Room', new Error(5));
		}else{
			echo 'ok';
			$text = htmlspecialchars($_POST["text"]);
			$this->messageDAO->insert(new Message(null, $this->username, $this->room->getRoomname(), $text, null));
		}
		
	}
}