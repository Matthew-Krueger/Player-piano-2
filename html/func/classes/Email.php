<?php
class Email{

    private
        $_mode = null,
        $_emailList = array(),
        $_validate = null,
        $_dbCopy;
    private static $_db = null,
        $_val = null,
        $_instance;

        private function __construct(){
            $this->_dbCopy = DB::getInstance(Config::get('emailSettings/db/name'));
        }
    	public static function getInstance()
    	{

    		# test if the self instance exists and if not, create its self and return itsself
    		if(!isset(self::$_instance))
    		{
    			self::$_instance = new Email();
    		}

    		return self::$_instance;
    	}

    public function addEmailToQue($email = null, $name = "")
    {
        $val = $this->_validate->check(array('email'=>$email),array('email' => array('name'=>'email','email'=>true,'required'=>true)));
        if(!$val->passed()){
            return null;
        }

        $this->_emailList[] = array(
            'email' => $email,
            'name'  => $name
        );
    }

    public function getEmailList()
    {
        return $this->_emailList;
    }

    public function writeDataToDB()
    {

        foreach ($this->_emailList as $email) {
            $this->_dbCopy->insert(Config::get("emailSettings/db/NewsQue"),array(
                'email' => $email['email'],
                'name'  => $email['name']
            ));
        }

    }

    public function readDataFromDB()
    {
            $d = Config::get("emailSettings/db/NewsQue");
            return $this->_dbCopy->query("SELECT * FROM {$d}");


    }

    public function getLastResult()
    {
        return $this->_lastResult;
    }

    public function deleteDataFromDB($indexValue = null)
    {
        if(!isset($indexValue)){
            return;
        }
        $this->_dbCopy->delete(Config::get("emailSettings/db/NewsQue"), array("id", "=", $indexValue));
    }

}
