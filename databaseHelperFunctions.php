<?php

    function connectToDatabase(){
        $dbName = "";
		$serverName = "10.0.19.74";
		$username = "";
		$password = "";
		$conn = new mysqli($serverName, $username, $password, $dbName);
		if($conn->connect_error){
			die("Connection Failed: " . $conn->connect_error);
		}else{
			echo "connection successful";
            return $conn;
		}
    }

/*
    Creates an insert SQL query
    parameters: $tableName: string, $columnNames: array of strings , $valuesCount: number of values
    output: string
*/ 
    function createInsertQuery($tableName, $columnNames , $valuesCount){
        $valuePlaceholders = "";
        $columns = "";
        for($i = 0; $i < $valuesCount; $i++){
            if($i == $valuesCount - 1){
                $valuePlaceholders = $valuePlaceholders . "?";
            }else{
                $valuePlaceholders = $valuePlaceholders . "?,";
            }
        }
        for($i = 0; $i < count($columnNames); $i++){
            if($i == count($columnNames) - 1){
                $columns = $columns . $columnNames[$i];
            }else{
                $columns = $columns . $columnNames[$i] . ",";
            }
        }
        return "INSERT INTO " . $tableName . "(" . $columns . ") " . "VALUES(" . $valuePlaceholders . ")";
    }

    // function createTables($conn){
    //     $createTutorTable = "CREATE TABLE Tutors(
    //         fullName VARCHAR(255) NOT NULL,
    //         email VARCHAR(255) NOT NULL,
    //         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //         gender VARCHAR(5) NOT NULL,
    //         experience INT(5) NOT NULL,
    //         subjects VARCHAR(50) NOT NULL
    //     )";

    //     $stm = $conn->prepare($createTutorTable);
    //     if($stm->execute()){
    //         echo "tutors table created";
    //     }else{

    //     }
    // }
?>