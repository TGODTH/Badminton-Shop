<?php

class CreateDb
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $usertb;
    private $producttb;
    private $boughtlisttb;
    private $con;

    // class constructor
    public function __construct(
        $dbname = "shopdb",
        $usertb = "usertb",
        $producttb = "producttb",
        $boughtlisttb = "boughtlisttb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {
        $this->dbname = $dbname;
        $this->usertb = $usertb;
        $this->producttb = $producttb;
        $this->boughtlisttb = $boughtlisttb;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con) {
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */";

        // execute query
        if (mysqli_query($this->con, $sql)) {

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new tables
            $sql1 = "CREATE TABLE IF NOT EXISTS $usertb (
                        user_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        user_name VARCHAR(50) NOT NULL,
                        user_password VARCHAR(50) NOT NULL,
                        role VARCHAR(60) DEFAULT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            $sql2 = "CREATE TABLE IF NOT EXISTS $producttb (
                        product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR(25) NOT NULL,
                        product_description VARCHAR(200) NOT NULL,
                        product_price FLOAT DEFAULT NULL,
                        product_image VARCHAR(100) DEFAULT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            $sql3 = "CREATE TABLE IF NOT EXISTS $boughtlisttb (
                        user_id INT(11) NOT NULL,
                        product_id INT(11) NOT NULL,
                        product_name VARCHAR(25) NOT NULL,
                        product_price FLOAT DEFAULT NULL,
                        product_amount INT DEFAULT NULL,
                        PRIMARY KEY (user_id, product_id)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            if (
                !mysqli_query($this->con, $sql1) ||
                !mysqli_query($this->con, $sql2) ||
                !mysqli_query($this->con, $sql3)
            ) {
                echo "Error creating table : " . mysqli_error($this->con);
            }
        } else {
            return false;
        }
    }

    // get product from the database
    public function getData($tablename)
    {
        $sql = "SELECT * FROM $tablename";

        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}
