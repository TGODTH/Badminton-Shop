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
        $servername = "localhost",
        $username = "root",
        $password = "",
        $dbname = "shopdb",
        $usertb = "usertb",
        $producttb = "producttb",
        $boughtlisttb = "boughtlisttb",

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
                        user_role VARCHAR(60) DEFAULT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            $sql2 = "CREATE TABLE IF NOT EXISTS $producttb (
    product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(25) NOT NULL,
    product_description VARCHAR(200) NOT NULL,
    product_price FLOAT DEFAULT NULL,
    product_image VARCHAR(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

            $sqlAddData = "INSERT INTO $producttb (product_id, product_name, product_description, product_price, product_image) VALUES
(1, 'AERONAUT 9000C COMBAT', 'Color : Blue/Red\r\nWeight : W3 (88±1G)\r\nBalance Point : 295 ±2MM.\r\nFlexibility : Medium', 5790, 'https://www.badmintonplaza.com/images/AYPP122-1D-A.jpg'),
(2, 'ASTROX 99 PRO ', 'ก้าน: แข็ง\r\nน้ำหนัก/ขนาดกริ๊ป: 3U (Ave.88g) G5 / 4U (Ave.83g) G5\r\nความตึงของเอ็น: 3U 21-29lbs / 4U 20-28lbs\r\nจุดสมดุล: หัวหนัก', 5365, 'https://www.badmintonplaza.com/images/AX99-PYX-CS-A.jpg'),
(3, 'ASTROX 88D PRO ', 'Flex: Stiff\r\nBalance : Head Heavy\r\nWeight/Grip Size : 4U (Ave.83g) G5, 3U (Ave.88g) G5\r\nString Tension : 3U: 21-29lbs, 4U: 20-28lbs', 5295, 'https://www.badmintonplaza.com/images/AX88D-PYX-CMGO-A.jpg'),
(4, 'THRUSTER K F CLAW LTD ', 'Length: 675 mm\r\nBalance: Head Heavy\r\nResponse Indicator:\r\nString tension: ≤31lbs(14kg)\r\nWeight / Grip Size : 4U/G5', 5390, 'https://www.badmintonplaza.com/images/TK-FC-A-A.jpg');";

            $sql3 = "CREATE TABLE IF NOT EXISTS $boughtlisttb (
                        user_id INT(11) NOT NULL,
                        product_id INT(11) NOT NULL,
                        product_name VARCHAR(25) NOT NULL,
                        product_price FLOAT DEFAULT NULL,
                        product_amount INT DEFAULT NULL,
                        PRIMARY KEY (user_id, product_id)
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
