<?php

use App\Controller\UserController;

require_once("../autoloader.php");

if(isset($_GET["action"])){

if($_GET["action"]=="create"){
    UserController::Insert($_POST);
}

}

?>