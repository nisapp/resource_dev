<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Uploadify extends CI_Controller
{
 
    public $view_data = array();
    private $upload_config;
 
    function __construct()
    {
        parent::__construct();
    }
 
    public function index()
    {
    }
 
	public function logouploader(){
		$targetFolder ='/dev/uploads/logo/'; 
		// Relative to the root for local must be set if your project folder is changes and also must be change if uploaded on live
		
		$verifyToken = md5('unique_salt' . $_POST['timestamp']);

		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES['Filedata']['name'] );

			$i = 0;
			$fileParts = pathinfo($name);
			 while (file_exists($targetPath .'/'. $name)) {
			   $i++;
			   $name = $fileParts["filename"] . "-" . $i . "." . $fileParts["extension"];
			  }
			//$name = 'logo_'.".". $fileParts["extension"];	
			$targetFile = rtrim($targetPath,'/') . '/' . $name;
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				echo $name;
			} else {
				echo 'Invalid';
			}
		}
	}
	public function Welcomeuploader(){
		$targetFolder ='/dev/uploads/videos'; 
		// echo $targetFolder =base_url().'/uploads/Videos'; 
		// Relative to the root for local must be set if your project folder is changes and also must be change if uploaded on live
		
		$verifyToken = md5('unique_salt' . $_POST['timestamp']);

	if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		  $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
		$name = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES['Filedata']['name'] );
		
		$i=0;
		$fileParts = pathinfo($name);
		 while (file_exists($targetPath .'/'. $name)) {
		   $i++;
		   $name = $fileParts["filename"] . "-" . $i . "." . $fileParts["extension"];
		  }
		// $name = 'welcome_video'.".". $fileParts["extension"];	
		$targetFile = rtrim($targetPath,'/') . '/' . $name;
		$fileTypes = array('webm','flv','mp4'); // File extensions
		// $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
		if (in_array($fileParts['extension'],$fileTypes)) {
			move_uploaded_file($tempFile,$targetFile);
			echo $name;
		} else {
			echo 'Invalid';
		}
		}
	}
    public function Uploadifyuploader()
    {
         $targetFolder ='/dev/uploads/videos'; 
		 // Relative to the root for local must be set if your project folder is changes and also must be change if uploaded on live
		
		$verifyToken = md5('unique_salt' . $_POST['timestamp']);

	if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		  $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
		$name = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES['Filedata']['name'] );

		$i=0;
		$fileParts = pathinfo($name);
		 while (file_exists($targetPath .'/'. $name)) {
		   $i++;
		   $name = $fileParts["filename"]."-" .$i.".".$fileParts["extension"];
		  }
		// $name = 'login_video'.".". $fileParts["extension"];	
		$targetFile = rtrim($targetPath,'/') . '/' . $name;
		$fileTypes = array('webm','flv','mp4'); // File extensions
		if (in_array($fileParts['extension'],$fileTypes)) {
			move_uploaded_file($tempFile,$targetFile);
			echo $name;
		} else {
			echo 'Invalid';
		}
	}
	 
		}
 
}