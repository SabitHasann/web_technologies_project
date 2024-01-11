<?php
    function getConnection()
    {
        $servername="localhost";
        $username="root";
        $pass="";
        $dbname="doctor";
        $conn= new mysqli($servername,$username,$pass,$dbname);
        return $conn;
    }
?>