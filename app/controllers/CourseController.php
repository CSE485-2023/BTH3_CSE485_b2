<?php

include APP_ROOT . '/app/services/CourseService.php';
include APP_ROOT . '/app/services/UserService.php';


class CourseController
{
    public function create()
    {
        require APP_ROOT . '/app/views/admin/course/create.php';
    }

    // Store a newly created article in the database
    public function store()
    {
        global $connection;
        $title = $_POST['txtTitle'];
        $description = $_POST['txtDescription'];

        $data = new Course();
        $data->setTitle($title);
        $data->setDescription($description);
        $courseService = new CourseService($connection);
        $courseService->save($title,$description);

        header('Location: index.php?c=home&a=index');
    }

    // Display the article editing form
    public function edit()
    {
        $id = $_GET['id'];
        $article = Article::getById($id);
        require 'views/articles/edit.php';
    }

    // Update the specified article in the database
    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $article = Article::getById($id);
        $article->setTitle($title);
        $article->setContent($content);
        $article->update();

        header('Location: index.php?controller=article&action=index');
    }

    // Delete the specified article from the database
    public function delete()
    {
        $id = $_GET['id'];
        $article = Article::getById($id);
        $article->delete();

        header('Location: index.php?controller=article&action=index');
    }

}

?>