<?php

namespace App\Controller;
use App\Model\User;

class UserController{

public static function Insert($post){
    
    //verifications

    $errors=[];
    $lastname= null;
    $firstname= null;

    // verification form empty

    if(empty($post["email"]) || empty($post["password"])){
        $errors+=["empty"=>"Attention= formulaire incomplet"];}
    // strip tag text input

    if(!empty($post["firstname"])){
        $firstname= strip_tags($post["firstname"]);
    }

    if(!empty($post["lastname"])){
        $lastname= strip_tags($post["lastname"]);
    }
    
    // password security hash

    $password = password_hash($post["password"], PASSWORD_ARGON2ID);

    // email security 

    $email= filter_var($post["email"], FILTER_VALIDATE_EMAIL);

    if($email==false){
        $errors+=["emailI"=>"Attention= email non valide"];
    }

    $check= User::checkEmail($email);

    if($check != false){
        $errors+=["emailE"=>"Ce mail existe déjà"];
    }

    if(empty($errors)){

        

        $user= new User($firstname, $lastname, $email, $password, $post["cv"], $post["role"], $post["admin"]);
        if($post["admin"]=="false"){
            $post["admin"]= false;
        }else{
            $post["admin"]=true;
        }
    
        $user->createUser();
        $errors=(array) null;
    
    }else{
        return $errors;
        require("../../sjob/View/Admin/formUser.php");
    }
}
}

?>