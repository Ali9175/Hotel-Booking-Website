<?php 


    $hname = 'localhost';
    $uname = 'root';
    $pass= '';
    $db = 'hbwebsite';

    $con = mysqli_connect($hname,$uname,$pass,$db);


    if(!$con){
        die("Cannot Cnnect to Database".mysqli_connect_error());
    }

    function filteration($data){
        foreach($data as $key => $value){
            $data[$key] = trim($value);
            $data[$key] = stripcslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);       
        }
        return $data;
    }

    function select($sql,$values,$datatypes){
        $con = $GLOBALS['con'];
        //print_r($GLOBALS) ;
        if($stmt = mysqli_prepare($con,$sql)){ // prepares an SQL statement for execution.
            // $con: This is an object representing a connection to MySQL Server
            // $sql: This is string value specifying the required query.
            //print(ok);
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_excute($stmt)){ ////Executing the statement
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt); 
                return $res;
            }
            else{
                die("Query cannot be executed - Select");
            }
        }
        else{
            die("Query cannot be prepared - Select");
        }
    }

    function update($sql,$values,$datatypes){
        $con = $GLOBALS['con'];
        //print_r($GLOBALS) ;
        if($stmt = mysqli_prepare($con,$sql)){ // prepares an SQL statement for execution.
            // $con: This is an object representing a connection to MySQL Server
            // $sql: This is string value specifying the required query.
            //print(ok);
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_excute($stmt)){ ////Executing the statement
                $res = mysqli_stmt_affcted_rows($stmt);
                mysqli_stmt_close($stmt); 
                return $res;
            }
            else{
                die("Query cannot be executed - Update");
            }
        }
        else{
            die("Query cannot be prepared - Update");
        }
    }


?>