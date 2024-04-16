<?php

namespace App\Controllers;


class WelcomeController extends BaseController {

    public function index() {
        $this->renderView('default', ["welcome"=>"hi"], 'welcome');
    }

}
