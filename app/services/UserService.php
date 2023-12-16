<?php

include APP_ROOT . '/app/models/User.php';

class UserService
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection->getConn();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM ".userTable;
        $stmt = $this->conn->query($sql); // Sử dụng đối tượng kết nối PDO trong DB_connection

        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['id'], $row['name'], $row['email'],$row['password'], $row['created_at'], $row['updated_at']);
            $users[] = $user;
        }
        return $users;
    }

    public function login($data) {
        $sql = "SELECT * FROM ".userTable." WHERE email=:email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":email",$data['email']);
        $stmt->execute();
        $userAuth = $stmt->fetch();
        if($userAuth!= null) {
            if(password_verify($data['password'],$userAuth['password'])) {

                // type: ADMIN =1;USER = 2;
                if($userAuth['type']==2) {
                    return 'USER';
                }else {
                    return 'ADMIN';
                }
            }else {
                return 'INCORRECT_PASSWORD';
            }
        }else {
            return 'INCORRECT_USERNAME';
        }

    }
    public function totalUser() {
        $sql = "SELECT COUNT(*) FROM ".userTable;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


}