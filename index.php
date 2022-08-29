<?php
session_start();
require_once __DIR__.'/library/RequirePage.php';
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/library/Twig.php';
require_once __DIR__.'/library/CheckSession.php';

$url = isset($_GET["url"]) ? explode('/', ltrim($_GET["url"],'/')) : '/';
// $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

//Affiche de page d'accueil
if($url == '/'){
  $controllerHome = __DIR__.'/controller/ControllerHome.php';
  require_once $controllerHome;
  $controller = new ControllerHome;
  echo $controller->index();

}
//Accéder à d'autres pages
else{
  $requestURL=$url[0];
  $requestURL = ucfirst($requestURL);
  $controllerPath = __DIR__.'/controller/Controller'.$requestURL.'.php';
  
  if(file_exists($controllerPath)){
    require_once $controllerPath;
    $controllerName = 'Controller'.$requestURL;
    $controller = new $controllerName;
    if(isset($url[1])){
      $method = $url[1];
      if(isset($url[2])){
        $value = $url[2];
        echo $controller->$method($value);
      }else{
        echo $controller->$method();
      }
    }else{
      echo $controller->index();
    }
  }
  else{
    $controllerHome = __DIR__.'/controller/ControllerHome.php';
    require_once $controllerHome;
    $controller = new ControllerHome;
    echo $controller->error();
  }
}


?>