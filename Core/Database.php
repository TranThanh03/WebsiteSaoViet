<?php
class Database
{
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB_NAME = 'toursaoviet';

    public function connect()
    {
        $conn = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB_NAME);
        mysqli_set_charset($conn, 'utf8');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
