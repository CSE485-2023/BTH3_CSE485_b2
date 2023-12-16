<?php

include APP_ROOT . '/app/models/Course.php';

class CourseService
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection->getConn();
    }

    public function getAllCourses()
    {
        $sql = "SELECT * FROM ".courseTable;
        $stmt = $this->conn->query($sql); // Sử dụng đối tượng kết nối PDO trong DB_connection

        $courses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $course = new Course($row['id'], $row['title'], $row['message'], $row['name'], $row['first_name'].' '. $row['last_name'], $row['status'], $row['created'], $row['updated']);
            $courses[] = $post;
        }
        return $posts;
    }


    public function totalCourse() {
        $sql = "SELECT COUNT(*) FROM ".courseTable;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


}