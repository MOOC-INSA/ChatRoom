<?php
class Controller
{
	public function view($view, $data = [])
	{
		require_once '../app/views/'.$view.'View.php';
	}
}