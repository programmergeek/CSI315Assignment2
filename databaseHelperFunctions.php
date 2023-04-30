<?php
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
?>