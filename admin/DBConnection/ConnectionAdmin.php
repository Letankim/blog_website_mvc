<?php
class ConnectionAdmin {
    public static $conn;

    public function __construct()
    {
        $this->connect();
    }

    function connect() {
        $servername = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $table = DB_NAME;
        try {
            self::$conn = new PDO("mysql:host=$servername;dbname=$table;charset=utf8", $username, $password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            try {
                $date= date('Y/m/d H:i:s');
                $myLogger = fopen(PATH_ROOT_ADMIN.'/Log/admin_log.log', 'a');
                $content = "Admin: CONNECT (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {
                
            }
        }
        return self::$conn;
    }

    function getAll($sql, $params = array()) {
        $result = [];
        try {
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } catch(Exception $e) {
            try {
                $date= date('Y/m/d H:i:s');
                $myLogger = fopen(PATH_ROOT_ADMIN.'/Log/log_user.log', 'a');
                $content = "User: GET ALL (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
        return $result;
    }

    function get_one($sql, $params = array()) {
        $result = [];
        try {
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        } catch(PDOException $e) {
            try {
                $date= date('Y/m/d H:i:s');
                $myLogger = fopen(PATH_ROOT_ADMIN.'/Log/log_user.log', 'a');
                $content = "User: GET BY ID (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
        return $result;
    }

    function insert($sql, $params = array()) {
        try {
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            try {
                $date= date('Y/m/d H:i:s');
                $myLogger = fopen(PATH_ROOT_ADMIN.'/Log/log_user.log', 'a');
                $content = "User: INSERT VALUE (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
    }

    function update($sql, $params = array()) {
        try {
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            try {
                $date= date('Y/m/d H:i:s');
                $myLogger = fopen(PATH_ROOT_ADMIN.'/Log/log_user.log', 'a');
                $content = "User: UPDATE (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
    }

    function delete($sql, $params = array()) {
        try {
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            try {
                $date= date('Y/m/d H:i:s');
                $myLogger = fopen(PATH_ROOT_ADMIN.'/Log/log_user.log', 'a');
                $content = "User: DELETE (".$e->getMessage().") ".$date."\n";
                fwrite($myLogger, $content);
            } catch(Exception $error) {

            }
        }
    }
    function filterHtml($value) {
        $newVal = trim($value);
        $newVal = htmlspecialchars($newVal);
        return $newVal;
    }
}
?>