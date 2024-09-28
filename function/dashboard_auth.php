<?php
    require_once 'db_connection.php';


    function countAllProducts(){
        $db_connect = db_connect();
        $sql_view = "SELECT COUNT(*) AS total_rows FROM products";
        $countResult = mysqli_query($db_connect,$sql_view);

        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return $countResult;
    }
    function countAllOrders(){
        $db_connect = db_connect();
        $sql_view = "SELECT COUNT(*) AS total_rows FROM orders";
        $ordersResult = mysqli_query($db_connect,$sql_view);

        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return $ordersResult;
    }
    function totalIncome(){
        $db_connect = db_connect();
        $sql_view = "SELECT SUM(total_amount) AS total_sum FROM orders;
";
        $totalIncomeResult = mysqli_query($db_connect,$sql_view);

        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return $totalIncomeResult;
    }
   