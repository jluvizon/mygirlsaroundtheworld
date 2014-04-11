<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    
    private $_id;
    
    public function authenticate() {
		
        $record = User::model()->findByAttributes(array('a003_username'=>$this->username));
        
        if ($record === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if ($record->a003_password !== crypt($this->password, $record->a003_password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else {
            $this->_id=$record->a003_id;
            //$this->setState('title', $record->title);
            $this->errorCode = self::ERROR_NONE;
        }
        
        return !$this->errorCode;
    }
    
    public function getId() {
        return $this->_id;
    }
}