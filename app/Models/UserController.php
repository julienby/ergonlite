<?php

namespace App\Controllers;

use App\Models\UsersDb;
use App\Config\Database;
use MyLibrary\MyClass;


class UserController extends BaseController {

    private $usersDb;

    public function __construct() {
        $pdo = Database::getPDO();
        $this->usersDb = new UsersDb($pdo);
    }

    public function show($userId) {
        $user = $this->usersDb->findById((int)$userId["id"]); // Supposons que cela retourne un tableau utilisateur
        $myInstance = new MyClass("julien");
        $my = $myInstance->set_name("JulienB");
        $this->renderView('user/showUser',  ['user' => $user, 'navbar'=>array("nav1"=>"value1"), "my" => $my], 'layouts/mainLayout');
    }

    public function listUsers() {
        $users = $this->usersDb->findAll(); // Supposons que cela retourne un tableau d'utilisateurs
        $this->renderView('user/listUsers', ['users' => $users]);
    }
    
    
    public function hello() {
        echo "hello" ;
    }

    public function getUser($vars) {
        // Logique pour récupérer un utilisateur spécifique
        $r = $this->usersDb->findById($vars['id']);
        foreach($r as $k=>$v) {
            echo $k."-".$v."<br/>" ;
        }
    }

    public function createUser($vars) {
        // Logique pour créer un nouvel utilisateur
    }
    
}

