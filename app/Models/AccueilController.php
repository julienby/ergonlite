<?php

namespace App\Controllers;


class AccueilController extends BaseController {

    public function index() {
        $this->renderView('default', ["welcome"=>"hi"], 'layouts/accueil');
    }

}
