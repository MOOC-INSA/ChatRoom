<?php
class HomeController extends Controller
{

	public function index($params = [])
	{
		echo 'You are currently in the index method of the Home Controller <br> Params : ';
		print_r($params);
	}
}