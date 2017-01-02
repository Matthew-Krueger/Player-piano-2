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

}
