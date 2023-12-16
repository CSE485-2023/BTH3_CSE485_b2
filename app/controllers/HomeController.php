<?php

include APP_ROOT . '/app/services/CourseService.php';
include APP_ROOT . '/app/services/UserService.php';


class HomeController
{


    public function get(){

        global $connection;

        $stdService = new CourseService($connection);
        $post = $stdService->get($_GET['id']);
        include APP_ROOT . '/app/views/admin/index.php';
    }

    public function index(){
        global $connection;

        $courseService = new CourseService($connection);
        $userService = new UserService($connection);
        $courses = $courseService->getAllCourses();
//        $post = $stdService->totalPost();
//        $user = $userService->totalUser();
//        $category = $categoryService->totalCategory();
        //Hiển thị ra view nào? -> view này là của admin  != view post của user -> deep
        include APP_ROOT . "/app/views/admin/index.php";
    }
}

?>