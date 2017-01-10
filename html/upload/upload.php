<?php
/**
*  Including Root Files
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("/var/www/html/func/core/init.php");

header('Content-Type: application/json');

$pathToUploadTo = "/var/www/midi/";

$uploaded = [];
$allowed = ['mid'];

$succeeded = [];
$failed = [];

if(!empty($_FILES['file'])){

     foreach($_FILES['file']['name'] as $key => $name){
          if($_FILES['file']['error'][$key] === 0){

               $temp = $_FILES['file']['tmp_name'][$key];

               $ext = explode('.' $name);
               $ext = strtolower(end($ext));

               if(in_array($ext, $allowed) === true && move_uploaded_file($temp, "{$pathToUploadTo}{$file}") === true){
                    $succeeded[] = array(
                         'name'    => $name,
                         'file'    => $file,
                         'path'    => $pathToUploadTo . $file
                    );
               } else {
                    $failed[] = array(
                         'name' => $name
                    );
               }

          }

     }

     if(!empty($_POST['ajax'])){
          echo json_encode(array(
               'succeeded'    => $succeeded,
               'failed'       => $failed
          ));
     }

}
