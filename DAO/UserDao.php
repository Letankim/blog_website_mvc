<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/User.php";
class UserDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
    }
    private function user($row) {
        $id = $row['id'];
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $avatar = $row['avatar'];
        $date = $row['date'];
        $status = $row['status'];
        $role = $row['role'];
        $isGoogle = $row['isGoogle'];
        $user = new User($id, $name,$username, $password, $email, $avatar, $status, $date, $role, $isGoogle);
        return $user;
    }
    function getAllUsers() {
        $sql = "SELECT * FROM tbl_user";
        $resultSQL = self::$db->getAll($sql);
        $users = array();
        foreach ($resultSQL as $row) {
            $users[] = $this->user($row);
        }
        return $users;
    }
    function addUserSignup($user) {
        $params = array(
            ':email' => $user->getEmail(),
            ':username' => $user->getUsername(),
            ':password' => $user->getPassword(),
            ':date' => $user->getDate()
        );
        $sql = "INSERT INTO tbl_user (email, username, password, date) VALUES (:email, :username, :password, :date)";
        return self::$db->insert($sql, $params);
    }

    function addUserSignupWithGg($user) {
        $params = array(
            ':name'=>$user->getName(),
            ':email' => $user->getEmail(),
            ':username' => $user->getUsername(),
            ':password' => $user->getPassword(),
            ':date' => $user->getDate(),
            ":isGoogle"=>$user->getIsGoogle(),
            ":avatar"=>$user->getAvatar(),
        );
        $sql = "INSERT INTO tbl_user (name,email, username, password, date, isGoogle, avatar) VALUES
        (:name,:email, :username, :password, :date, :isGoogle, :avatar)";
        return self::$db->insertReturnId($sql, $params);
    }


    function forestPassword($email, $username) {
        $params = array(
            ":email" => $email,
            ":username" => $username
        );
        $sql = "SELECT * FROM tbl_user WHERE email = :email  AND username =:username";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            return $this->user($resultSQL);
        }
        return null;
    }

    function getOneUser($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_user WHERE id = :id";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            return $this->user($resultSQL);
        }
        return null;
    }

    function updateUsernameGoogle($username, $id) {
        $params = array(
            ':username' => $username,
            ":id"=>$id
        );
        $sql = "UPDATE tbl_user SET username =:username WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function isExistGoogle($email) {
        $params = array(":email"=>$email);
        $sql = "SELECT * FROM tbl_user WHERE email = :email AND isGoogle=1";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            return $this->user($resultSQL);
        }
        return null;
    }
    function updateNewPass($id, $newPass) {
        $params = array(
            ":id"=>$id,
            ":newPass"=>$newPass
        );
        $sql = "UPDATE tbl_user SET password=:newPass WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateUserPersonal($id, $name, $email, $img) {
        $params = array(
            ":id"=>$id,
            ":name"=>$name,
            ":email"=>$email,
            ":img"=>$img
        );
        $sql = "UPDATE tbl_user SET name=:name, email=:email, avatar=:img WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function checkUpdatePassword($id, $oldPass) {
        $params = array(
            ":id" => $id,
            ":oldPass" => $oldPass
        );
        $sql = "SELECT * FROM tbl_user WHERE id = :id AND password = :oldPass";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            return $this->user($resultSQL);
        }
        return null;
    }
    function login($username) {
        $params = array(
            ":username" => $username
        );
        $sql = "SELECT * FROM tbl_user WHERE username = :username";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            return $this->user($resultSQL);
        }
        return null;
    }
    function checkUserName($username) {
        $params = array(
            ":username" => $username
        );
        $sql = "SELECT * FROM tbl_user WHERE username = :username";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            return $this->user($resultSQL);
        }
        return null;
    }
}
?>