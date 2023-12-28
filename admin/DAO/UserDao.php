<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/User.php";
class UserDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
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
        $sql = "SELECT * FROM tbl_user order by role desc, id desc";
        $resultSQL = self::$db->getAll($sql);
        $users = array();
        foreach ($resultSQL as $row) {
            $users[] = $this->user($row);
        }
        return $users;
    }

    function checkUserName($username) {
        $params = array(":username"=>$username);
        $sql = "SELECT * FROM tbl_user WHERE username = :username";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->user($row);
        }
        return null;
    }

    function getFilterUsers($status) {
        $params = array(":status"=>$status);
        $sql = "SELECT * FROM tbl_user WHERE status=:status order by role desc, id desc";
        $resultSQL = self::$db->getAll($sql, $params);
        $users = array();
        foreach ($resultSQL as $row) {
            $users[] = $this->user($row);;
        }
        return $users;
    }

    function addUser($user) {
        $params = array(
            ":name"=>$user->getName(),
            ":username"=>$user->getUsername(),
            ":email"=>$user->getEmail(),
            ":password"=>$user->getPassword(),
            ":role"=>$user->getRole(),
            ":status"=>$user->getStatus(),
            ":date"=>$user->getDate(),
        );
        $sql = "INSERT INTO tbl_user (name, username, email, password, role, status, date) 
        VALUES (:name, :username, :email, :password, :role, :status, :date)";
        return self::$db->insert($sql, $params);
    }

    function forestPass($email, $username) {
        $params = array(
            ":username"=>$username,
            ":email"=>$email
        );
        $sql = "SELECT * FROM tbl_user WHERE email = :email AND username =:username";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->user($row);
        }
        return null;
    }
    
    function getOneUser($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_user WHERE id = :id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->user($row);
        }
        return null;
    }
    function updateUser($user) {
        $params = array(
            ":name"=>$user->getName(),
            ":username"=>$user->getUsername(),
            ":email"=>$user->getEmail(),
            ":password"=>$user->getPassword(),
            ":role"=>$user->getRole(),
            ":status"=>$user->getStatus(),
            ":id"=>$user->getId()
        );
        $sql = "UPDATE tbl_user SET name=:name, username=:username, email=:email, 
        password=:password, role=:role, status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateAdminPersonal($user) {
        $params = array(
            ":id"=>$user->getId(),
            ":name"=>$user->getName(),
            ":email"=>$user->getEmail(),
            ":img"=>$user->getAvatar(),
            ":password"=>$user->getPassword()
        );
        $sql = "UPDATE tbl_user SET name=:name, email=:email, avatar=:img, password=:password WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateStatusUser($id,$status) {
        $params = array(
            ":status"=>$status,
            ":id"=>$id
        );
        $sql = "UPDATE tbl_user SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateNewPass($id, $newPass) {
        $params = array(
            ":newPass"=>$newPass,
            ":id"=>$id
        );
        $sql = "UPDATE tbl_user SET password=:newPass WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function deleteUser($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_user WHERE id=:id";
        return self::$db->delete($sql, $params);
    }

    function login($username) {
        $params = array(":username"=>$username);
        $sql = "SELECT * FROM tbl_user WHERE username = :username";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->user($row);
        }
        return null;
    }
   
}
?>