<?php

switch ($_GET['action']) {
	case 'add': // need another GET parameter id
		$file = fopen('list.txt', 'r');
		$list = fgets($file);
		$list = unserialize($list);
		fclose($file);
		
		$list[] = $_GET['id'];
		$file = fopen('list.txt', 'w');
		fwrite($file, serialize($list));
		fclose($file);
	 	break;	
	case 'pop': // remove the head of the list, probably mis use the concept of pop
		$file = fopen('list.txt', 'r');
		$list = fgets($file);
		$list = unserialize($list);
		fclose($file);
		
		echo json_encode(array_shift($list));
		$file = fopen('list.txt', 'w');
		fwrite($file, serialize($list));
		fclose($file);
		break;
	case 'view': // return the json of current list
		$file = fopen('list.txt', 'r');
		$list = fgets($file);
		$list = unserialize($list);
		$list = json_encode($list);
		echo $list;
		fclose($file);
		break;
	case 'undo': // remove the last element in the list
		$file = fopen('list.txt', 'r');
		$list = fgets($file);
		$list = unserialize($list);
		fclose($file);
		
		$list[] = 'undo';
		$file = fopen('list.txt', 'w');
		fwrite($file, serialize($list));
		fclose($file);
	 	break;
	case 'init':
		$file = fopen('list.txt', 'w');
		$ss = serialize(array());
		fwrite($file, $ss);
		
		fclose($file);
		break;
}

?>