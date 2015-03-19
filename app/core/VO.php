<?php
class VO extends Serz
{
	private $id;
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->_id;
	}
}