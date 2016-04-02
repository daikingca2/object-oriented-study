<?php

ini_set( 'display_errors', 1 );

function createInstance()
{
	$obj = new Paper;
	return $obj;
}

class Paper
{
	public function sound($action)
	{
		switch($action)
		{
		case "撫でる":
			$sound = "さらさら";
			break;
		case "叩く":
			$sound = "クシャ！";
			break;
		case "くすぐる":
			$sound = "カサカサ";
			break;
		default:
			$sound = "カサカサ";
		}

		return $sound;
	}
}

?>
