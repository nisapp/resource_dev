<?php
session_start();
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
//the target folder is changed for the local host and the different for the server
//$targetFolder = 'foodsite/admin/uploads/Products'; // Relative to the root
$targetFolder ='/uploads/Products'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);
//the below code is commented on the 5th feb as the attachment issue was there for the same name and the same extension
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	 $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	$name = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES['Filedata']['name'] );

	 $i = 0;
	$fileParts = pathinfo($name);
	
	
	 while (file_exists($targetPath .'/'. $name)) {
   $i++;
   $name = $fileParts["filename"] . "-" . $i . "." . $fileParts["extension"];
  }
	
	$targetFile = rtrim($targetPath,'/') . '/' . $name;
	$fileTypes = array('exe','php'); // File extensions
	
	if (!in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo $name;
	} else {
		echo 'Invalid file type.';
	}
}
?>