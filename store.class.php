<?php
class store{
	public $variable="Git Hub";
	function greeting(){
		echo "WELCOME !";
	}
	function git($user){
		$this->greeting();
		echo $user." can use ".$this->variable." for free.";
	}
}
?>