<?php
if (session_status() == PHP_SESSION_NONE) {
    // Nếu chưa, thì bắt đầu session
    session_start();
}


class UserController
{
    public function login()
    {



           $loginMessage = '';
       if($_SERVER['REQUEST_METHOD']==='POST') {
           global $connection;
           include APP_ROOT . "/app/services/UserService.php";
           $stdService = new UserService($connection);
           $userCredential = [
               'email'=> $_POST['email'],
               'password'=> $_POST['password']
           ];
           $loginResult = $stdService->login($userCredential);
           if($loginResult==='USER') {
               $_SESSION['isLoggedIn'] = true;
               $_SESSION['isAdmin'] = false;
//               include APP_ROOT."/app/controllers/HomeController.php";
//               $pController = new HomeController();
//                $pController->index();
//               include APP_ROOT . "/app/views/home/post/index.php";
               header("Location: index.php");
           }else if($loginResult ==='ADMIN') {
               $_SESSION['isLoggedIn'] = true;
               $_SESSION['isAdmin'] = true;
               header("Location: index.php");

//               include APP_ROOT."/app/controllers/HomeController.php";
//               $pController = new HomeController();
//               $pController->index();
//               include APP_ROOT . "/app/views/admin/post/post.php";

           }else if ($loginResult === 'INCORRECT_PASSWORD') {
               $loginMessage = "Incorrect password";
               include APP_ROOT . "/public/login.php";
           } else if ($loginResult === 'INCORRECT_USERNAME') {
               $loginMessage = "Email password";
               include APP_ROOT . "/public/login.php";
           } else {
               $loginMessage = "Something went wrong!";
               include APP_ROOT . "/public/login.php";
           }
       }else {
//           header('Location:', APP_ROOT . "/public/login.php");
//           exit();
           include APP_ROOT . "/public/login.php";


       }

    }
}