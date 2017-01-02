<?php
class File{

  public static function get($path = null){

    if(!isset($path)){
      return null;
    }

    if(!file_exists($path)){
      return null;
    }

    return file_get_contents($path);

  }

  public static function listDir($path = null, $sortOrder = null){
       if(!isset($path)){
            return null;
       }

       return scandir($path, $sortOrder);
 }

  public static function put($path = null, $newContents = "", $actionIfFull = ""){

    if(!isset($path) || $newContents == ""){
      return null;
    }

    $content = self::get($path);
    try{
         if($content == "" || $content == null){

           self::putFile($path,$newContents);

         }else{

           # File is full
           switch ($actionIfFull){
             case "append" || "postpend":
               self::putFile($path, $newContents, FILE_APPEND);
               break;

             case "prepend":
               self::putFile($path, $newContents . $content);
               break;

             case "overwrite" || "ow":
               self::putFile($path, $newContents);
               break;

             case "increment":
               self::putFile($path . "_new", $newContents);
               break;

             default:
               throw new Exception("File Exists", 1);

           }
           # No Error
           return true;
         }
    }catch(Exception $e){
         return false;
    }
    return false;

  }

  private static function putFile($path, $content){
       file_put_contents($path, $content);
  }

}
