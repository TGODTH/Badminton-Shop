<?php

class CreateDb
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $usertb;
    private $producttb;
    private $ordertb;
    private $con;

    public function __construct(
        $servername = "localhost",
        $username = "root",
        $password = "",
        $dbname = "shopdb",
        $usertb = "usertb",
        $producttb = "producttb",
        $ordertb = "ordertb",

    ) {
        $this->dbname = $dbname;
        $this->usertb = $usertb;
        $this->producttb = $producttb;
        $this->ordertb = $ordertb;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        $this->con = mysqli_connect($servername, $username, $password);

        if (!$this->con) {
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */";

        if (mysqli_query($this->con, $sql)) {

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            $sql1 = "CREATE TABLE IF NOT EXISTS $usertb (
                        user_name VARCHAR(50) NOT NULL PRIMARY KEY,
                        user_password VARCHAR(50) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            $sql2 = "CREATE TABLE IF NOT EXISTS $producttb (
    product_name VARCHAR(50) NOT NULL PRIMARY KEY,
    product_description VARCHAR(200) NOT NULL,
    product_price FLOAT DEFAULT NULL,
    product_image VARCHAR(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            $sqlAddData = "INSERT INTO $producttb (product_name, product_description, product_price, product_image) VALUES
('AERONAUT 9000C COMBAT', 'Color : Blue/Red\r\nWeight : W3 (88±1G)\r\nBalance Point : 295 ±2MM.\r\nFlexibility : Medium', 5790, 'https://www.badmintonplaza.com/images/AYPP122-1D-A.jpg'),
('ASTROX 99 PRO ', 'ก้าน: แข็ง\r\nน้ำหนัก/ขนาดกริ๊ป: 3U (Ave.88g) G5 / 4U (Ave.83g) G5\r\nความตึงของเอ็น: 3U 21-29lbs / 4U 20-28lbs\r\nจุดสมดุล: หัวหนัก', 5365, 'https://www.badmintonplaza.com/images/AX99-PYX-CS-A.jpg'),
('ASTROX 88D PRO ', 'Flex: Stiff\r\nBalance : Head Heavy\r\nWeight/Grip Size : 4U (Ave.83g) G5, 3U (Ave.88g) G5\r\nString Tension : 3U: 21-29lbs, 4U: 20-28lbs', 5295, 'https://www.badmintonplaza.com/images/AX88D-PYX-CMGO-A.jpg'),
('THRUSTER K F CLAW LTD ', 'Length: 675 mm\r\nBalance: Head Heavy\r\nResponse Indicator:\r\nString tension: ≤31lbs(14kg)\r\nWeight / Grip Size : 4U/G5', 5390, 'https://www.badmintonplaza.com/images/TK-FC-A-A.jpg');";

            $sql3 = "CREATE TABLE IF NOT EXISTS $ordertb (
                        order_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        user_name VARCHAR(50) NOT NULL,
                        product_name VARCHAR(50) NOT NULL,
                        product_price FLOAT DEFAULT NULL,
                        product_amount INT DEFAULT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
            $sql_check = "SELECT COUNT(*) FROM $producttb";
            if (
                !mysqli_query($this->con, $sql1) ||
                !mysqli_query($this->con, $sql2) ||
                !mysqli_query($this->con, $sql3)
            ) {
                echo "Error creating table : " . mysqli_error($this->con);
            } else {
                $result = mysqli_query($this->con, $sql_check);
                $row = mysqli_fetch_row($result);
                if ($row[0] == 0) {
                    mysqli_query($this->con, $sqlAddData);
                }
            }
        } else {
            return false;
        }
    }

    public function getData($tablename)
    {
        $sql = "SELECT * FROM $tablename";

        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function insertUser($username, $password)
    {

        $sql = "INSERT INTO $this->usertb (user_name, user_password) VALUES ('$username', '$password')";
        $result = mysqli_query($this->con, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function loginUser($username, $password)
    {
        $username = mysqli_real_escape_string($this->con, $username);
        $password = mysqli_real_escape_string($this->con, $password);

        $sql = "SELECT * FROM $this->usertb WHERE user_name='$username' AND user_password='$password'";
        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addOrder($user_name, $product_name, $product_amount)
    {
        $sql_get_price = "SELECT product_price FROM $this->producttb WHERE product_name = '$product_name'";
        $result = mysqli_query($this->con, $sql_get_price);
        $row = mysqli_fetch_assoc($result);
        $product_price = $row['product_price'];

        $sql_add_order = "INSERT INTO $this->ordertb (user_name, product_name, product_price, product_amount) VALUES ('$user_name', '$product_name', $product_price, $product_amount)";

        if (mysqli_query($this->con, $sql_add_order)) {
            return true;
        } else {
            echo "Error adding order list: " . mysqli_error($this->con);
            return false;
        }
    }
}
