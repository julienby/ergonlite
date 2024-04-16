<?php

namespace App\Controllers;

abstract class BaseController {

    protected function renderView(string $viewPath, array $data = [], string $layout = 'layouts/mainLayout') {
        // Extraire les données pour qu'elles soient disponibles sous forme de variables dans la vue
        extract($data);

        // Commencer la mise en tampon de sortie
        ob_start();
        // Inclure le fichier de vue spécifique (cela génère le contenu de la page)
        require_once __DIR__ . '/../Views/' . $viewPath . '.php';
        // Récupérer le contenu généré et arrêter la mise en tampon
        $content = ob_get_clean();
        // Inclure le layout, où $content sera affiché
        require_once __DIR__ . '/../Views/' . $layout . '.php';
    }

}

