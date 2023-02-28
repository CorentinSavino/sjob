<?php

namespace App\Model;
use App\Model\DB;
use PDOException;

require_once("../autoloader.php");

class User{

private $firstname;
private $lastname;
private $email;
private $password;
private $cv;
private $role;
private $admin;

public function __construct($firstname, $lastname, $email, $password, $cv, $role, $admin)
{
   $this->firstname=$firstname;
   $this->lastname=$lastname; 
   $this->email=$email; 
   $this->password=$password; 
   $this->cv=$cv;
   $this->role=$role;   
   $this->admin=$admin;
}

public function setFirstname($firstname){
    $this->$firstname=$firstname;
}
public function setLastname($lastname){
    $this->$lastname=$lastname;
}
public function setEmail($email){
    $this->$email=$email;
}
public function setPassword($password){
    $this->$password=$password;
}
public function setCv($cv){
    $this->$cv=$cv;
}
public function setRole($role){
    $this->$role=$role;
}

public function getFirstname(){
    return $this->firstname;
}
public function getLastname(){
    return $this->lastname;
}
public function getEmail(){
    return $this->email;
}
public function getPassword(){
    return $this->password;
}
public function getCv(){
    return $this->cv;
}
public function getRole(){
    return $this->role;
}



public function createUser(){
    
   try{
    $db=new DB;
    $dbh= $db->getDbh();
    
    $stmt= $dbh->prepare("INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `cv`, `role`, `admin`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    var_dump($stmt);
    $stmt->bindValue(1, $this->firstname);
    var_dump($stmt);
    $stmt->bindValue(2, $this->lastname);
    $stmt->bindValue(3, $this->email);
    $stmt->bindValue(4, $this->password);
    $stmt->bindValue(5, $this->cv);
    $stmt->bindValue(6, $this->role);
    $stmt->bindValue(7, $this->admin);
    
    var_dump($stmt->execute());
} catch(PDOException $error){
    echo $error->getMessage();
}
}

public static function checkEmail($email){
    
    try{

        $db=new DB;
        $dbh= $db->getDbh();

        $stmt= $dbh->prepare("SELECT * FROM `user` WHERE email=?");

        $stmt->bindValue(1, $email);

        $stmt->execute();

        return $stmt->fetch();


    }catch(PDOException $error){
        echo $error->getMessage();
    }
}

public static function ReadAll($id){

    try{
        $db=new DB;
        $dbh= $db->getDbh();

        $stmt= $dbh->prepare("SELECT * FROM `user` WHERE id_user=?");

        $stmt->bindValue(1, $id);
        
        $stmt->execute 
    }

}
}
?>