<?php
    require_once 'db_connection.php';

    function orders(){
        $db_connect = db_connect();
        $shipping = $_POST['shipping'] ?? '0';
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $address = $_POST['address'] ?? '';
        $city = $_POST['city'] ?? '';
        $postCode = $_POST['postCode'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $country = $_POST['country'] ?? '';
        $paymentMethod = $_POST['payment'] ?? '';
        $totalAmount = $_POST['total_amount'] ?? '0';
		$productInfoJson = $_POST['product_info']; 
		$productInfo = json_decode($productInfoJson, true);
		$productInfoString = mysqli_real_escape_string($db_connect, json_encode($productInfo));
        $sql_insert = "INSERT INTO orders(shipping,firstName, lastName, address, city,postCode,phone,country,payment,total_amount,products ) VALUES ('$shipping','$firstName','$lastName','$address','$city','$postCode','$phone','$country','$paymentMethod','$totalAmount','$productInfoString')";
        mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
		return [
			'status' => 'success',
			'message' => '<div class="text-center">
				<div class="inline-block p-4 bg-green-100 rounded-full mb-6">
				  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12 text-green-500">
					<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
				  </svg>
				</div>
				<h1 class="text-2xl font-bold mb-2">Order Placed Successfully!</h1>
				<p class="text-gray-500">Thank you for your purchase!</p>
			  </div>
			  '
		];

    }
    function updateStatus(){
        $db_connect = db_connect();
		$update_id = $_POST['update_id'];
		$orderStatus = mysqli_real_escape_string($db_connect, $_POST['orderStatus']);
		$error = [];
		// Validation for title, price, old price, and description
		if (empty($orderStatus)) {
			$error['orderStatus'] = 'Order Status Cannot be empty';
		}
		if (count($error) > 0) {
			return [
				'status' => 'error',
				'message' => $error,
			];
		}
		// Update query: only include the image field if an image was uploaded
		$sql_update = "UPDATE orders SET 
			status='$orderStatus'";
		$sql_update .= " WHERE id='$update_id'";
	
		mysqli_query($db_connect, $sql_update);
	
		// Check for SQL errors
		if (mysqli_error($db_connect)) {
			die('Table Error: ' . mysqli_error($db_connect));
		}
	
		return [
			'status' => 'success',
			'message' => 'Status updated successfully',
		];

    }

    function ordersView(){
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM orders";
        $orderResult = mysqli_query($db_connect,$sql_view);

        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return $orderResult;
    }
    function status($phone){
		
        $db_connect = db_connect();
        $sql_view = "SELECT phone, status FROM orders WHERE phone ='$phone'";
        $orderResult = mysqli_query($db_connect,$sql_view);
		
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return $orderResult;
    }
    function order_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$error=[];
		$sql_view = "SELECT * FROM orders WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		
		if(mysqli_num_rows($result) == 0){
			$error['order_delete'] = 'Unknown ID';
		}
		
		if(count($error) > 0){
			return [
				'status' => 'error',
				'message' => $error,
			 ];
		}
		$sql_delete = "DELETE FROM orders WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'Orders Delete Successfully.',
			];
		
	}
	function ordersDetailsView($id) {
		$db_connect = db_connect();
		$sql_view = "SELECT * FROM orders WHERE id = '$id'";
		$ordersDetails_results = mysqli_query($db_connect, $sql_view);
		if (!$ordersDetails_results) {
			die('Query failed: ' . mysqli_error($db_connect));
		}
		if(mysqli_num_rows($ordersDetails_results) > 0) {
			return $ordersDetails_results;
		} else {
			die('No data found for the provided ID.');
		}
	}