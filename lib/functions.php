<?php
function getContent(){
	if(!isset($_GET['page'])){
		include __DIR__.'/../pages/read.php';
	} 
	else if($_GET['page'] == 'create'){
		include __DIR__.'/../pages/create.php';
	} else if($_GET['page'] == 'update'){
		include __DIR__.'/../pages/update.php';
	}
	elseif($_GET['page'] == 'delete'){
		include __DIR__.'/../pages/delete.php';
	}
}

function getPart($name){
	include __DIR__ . '/../parts/'. $name . '.php';
}