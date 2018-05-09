<?php

	function after($needed, $inthat){
		if (!is_bool(strpos($inthat, $needed))){
			return substr($inthat, strpos($inthat,$needed)+ strlen($needed));
		}
	}

	function after_last ($needed, $inthat){
		if (!is_bool(strrevpos($inthat, $needed)))
		return substr($inthat, strrevpos($inthat, $needed)+strlen($needed));
	}

	function before ($needed, $inthat){
		return substr($inthat, 0, strpos($inthat, $needed));
	}

	function before_last ($needed, $inthat){
		return substr($inthat, 0, strrevpos($inthat, $needed));
	}

	function between ($needed, $that, $inthat){
		return before ($that, after($needed, $inthat));
	}

	function between_last ($needed, $that, $inthat){
	 return after_last($needed, before_last($that, $inthat));
	}

	function strrevpos($instr, $needle){
		$rev_pos = strpos (strrev($instr), strrev($needle));
		if ($rev_pos===false) return false;
		else return strlen($instr) - $rev_pos - strlen($needle);
	}