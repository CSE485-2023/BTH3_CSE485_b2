<?php
// Kiểm tra xem session đã bắt đầu chưa
//if (session_status() == PHP_SESSION_NONE) {
//    // Nếu chưa, thì bắt đầu session
//    session_start();
//}

require_once './app/config/config.php';
require_once APP_ROOT . '/app/libs/DB_connection.php';



$GLOBALS['connection'] = new DB_connection();
//$controller = '';
//$action = '';
//if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
//    echo 'đăng nhập rồi,có phải admin không ?' .$_SESSION['isLoggedIn'] == true ;
//    $controller = '';
//    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
//        $controller = 'post';
//    //    echo $controller . "<br>";
//    } else {
        $controller = isset($_GET['c']) ? $_GET['c'] : 'home';
//    }
    $action = isset($_GET['a']) ? $_GET['a'] : 'index';

//} else {
//    echo 'chưa đang nhập';
//    $controller = 'user';
//    $action = 'login';
//}


$controller = ucfirst($controller);

$controller = $controller . "Controller"; //Home > HomeController
$path = APP_ROOT . "/app/controllers/" . $controller . ".php"; //HomeController > controllers/HomeController.php
//echo $path;
if (!file_exists($path)) {
    die("Request not found. Check your path");
}
include "$path";
$myController = new $controller();
if (method_exists($myController, $action)) {
    $myController->$action();
} else {
    echo "$action does not exist in $controller class";
}

?>




