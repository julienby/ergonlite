<?php
// Utilisation
$startTime = microtime(true);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\WelcomeController;


/*
* Lang import
*/

session_start();

/**
 * Sets the language for the application based on the 'lang' query parameter.
 * If the 'lang' parameter is present, it cleans the value for security and stores it in the session.
 * If the 'lang' parameter is not present and no language is stored in the session, it sets the default language to English.
 *
 * @param none
 * @return void
 */
if (isset($_GET['lang'])) {
    $lang = preg_replace('/[^a-zA-Z]/', '', $_GET['lang']); // Clean the value for security
    // Store the chosen language in a session or cookie
    $_SESSION['lang'] = $lang;
} elseif (!isset($_SESSION['lang'])) {
    // Set a default language if no language is selected or stored
    $_SESSION['lang'] = 'en'; // Assume English as the default language
}

// Déterminer la langue à utiliser
$lang = $_SESSION['lang'];

// Chemin du fichier de langue
$langFile = __DIR__ . "/../Languages/{$lang}.php";

// Vérifier si le fichier de langue existe et le charger
if (file_exists($langFile)) {
    $translations = require $langFile;
} else {
    // Charger le fichier de langue par défaut si le fichier spécifié n'existe pas
    $translations = require __DIR__ . "/../Languages/en.php";
}


// Création du routeur
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // Définissez vos routes ici
    $r->addRoute('GET', '/', 'App\Controllers\WelcomeController:index');   
    // Vous pouvez ajouter des routes pour PUT et DELETE selon vos besoins
});




// Récupération de la méthode et de l'URI de la requête
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Gérer l'erreur 404
        echo "404" ;
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // Gérer l'erreur 405
        echo "405" ;
        break;
    case FastRoute\Dispatcher::FOUND:
        //echo "found" ;
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // Vous pouvez séparer le contrôleur et la méthode si nécessaire
        list($class, $method) = explode(':', $handler, 2);
        (new $class)->$method($vars);
        break;
}

$timeElapsed = microtime(true) - $startTime;
//echo "(time : ".number_format($timeElapsed, 4).")" ;
