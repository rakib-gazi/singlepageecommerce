<?php
    require_once 'db_connection.php';

    function products(){
        $db_connect = db_connect();
        $title = mysqli_real_escape_string($db_connect, $_POST['title']);
        $price = mysqli_real_escape_string($db_connect, $_POST['price']);
        $oldPrice = mysqli_real_escape_string($db_connect, $_POST['oldPrice']);
        $description = mysqli_real_escape_string($db_connect, $_POST['description']);
        $profile_img_name = $_FILES['image']['name'];
		$profile_img_size = $_FILES['image']['size'];
		$profile_img_tmp = $_FILES['image']['tmp_name'];

        $error =[];

        if(empty($title)){
            $error['title'] = 'Product Title Cannot be empty';
        }
        if(empty($price)){
            $error['price'] = 'Product price Cannot be empty';
        }
        if(empty($oldPrice)){
            $error['oldPrice'] = 'Product old price Cannot be empty';
        }
        if(empty($description)){
            $error['description'] = 'Product description Cannot be empty';
        }
        if($profile_img_tmp){
			if( $profile_img_size >1049576 ){
			$error['image'] = 'Max Size 1 MB';
			}
			$targeted_extensions = ['jpg','jpeg','png','gif','webp'];
			$getExtension = strtolower (pathinfo($profile_img_name, PATHINFO_EXTENSION));
			if(!in_array($getExtension,$targeted_extensions)){
				$error['image'] = 'jpg/jpeg/png/gig/webp File Required';
			}
		}
        if(count($error)>0){
            return [
				'status' => 'error',
				'message' => $error,
			];
        }
        $location = 'images/products';
        if(!file_exists('../'.$location)){
            mkdir('../'.$location,  permissions: 0777, recursive: true);
        }
        if($profile_img_tmp){
            $path = $location . '/' . $profile_img_name;
            move_uploaded_file($profile_img_tmp, '../' . $path);
        }
			
        $sql_insert = "INSERT INTO products(image,title, price, oldPrice, description ) VALUES ('$path','$title','$price','$oldPrice','$description')";
        $result =  mysqli_query ($db_connect,$sql_insert);
        
        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return [
            'status' => 'success',
            'message' => 'Product Added Successfully',
        ];

    }
    function productsView(){
        $db_connect = db_connect();
        $sql_view = "SELECT * FROM products";
        $productsResult = mysqli_query($db_connect,$sql_view);

        if(mysqli_error($db_connect)){
            die('Table Error:'.mysqli_error($db_connect));
        }
        return $productsResult;
    }
    function product_delete(){
		$db_connect = db_connect();
		$id = $_POST['delete_id'];
		
		$error=[];
		$sql_view = "SELECT * FROM products WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_view);
		
		if(mysqli_num_rows($result) == 0){
			$error['data_delete'] = 'Unknown ID';
		}
		
		if(count($error) > 0){
			return [
				'status' => 'error',
				'message' => $error,
			 ];
		}
		$sql_delete = "DELETE FROM products WHERE id='$id'";
		$result = mysqli_query($db_connect, $sql_delete);
			
			if(mysqli_error($db_connect)){
				die('Table Error:'.mysqli_error($db_connect));
			}
			
			return [
				'status' => 'success',
				'message' => 'Product Delete Successfully.',
			];
		
	}
    

	function updateProducts(){
		$db_connect = db_connect();
		$update_id = $_POST['update_id'];
		
		$UpdateTitle = mysqli_real_escape_string($db_connect, $_POST['update-title']);
		$UpdatePrice = mysqli_real_escape_string($db_connect, $_POST['update-price']);
		$UpdateOldPrice = mysqli_real_escape_string($db_connect, $_POST['update-oldPrice']);
		$UpdateDescription = mysqli_real_escape_string($db_connect, $_POST['update-description']);
		$UpdateProfile_img_name = $_FILES['update-image']['name'];
		$UpdateProfile_img_size = $_FILES['update-image']['size'];
		$UpdateProfile_img_tmp = $_FILES['update-image']['tmp_name'];
	
		$error = [];
	
		// Validation for title, price, old price, and description
		if (empty($UpdateTitle)) {
			$error['update-title'] = 'Product Title Cannot be empty';
		}
		if (empty($UpdatePrice)) {
			$error['update-price'] = 'Product price Cannot be empty';
		}
		if (empty($UpdateOldPrice)) {
			$error['update-oldPrice'] = 'Product old price Cannot be empty';
		}
		if (empty($UpdateDescription)) {
			$error['update-description'] = 'Product description Cannot be empty';
		}
	
		// Validate image if provided
		if ($UpdateProfile_img_tmp) {
			if ($UpdateProfile_img_size > 1049576) {
				$error['update-image'] = 'Max Size 1 MB';
			}
			$targeted_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
			$getExtension = strtolower(pathinfo($UpdateProfile_img_name, PATHINFO_EXTENSION));
			if (!in_array($getExtension, $targeted_extensions)) {
				$error['update-image'] = 'jpg/jpeg/png/gif/webp File Required';
			}
		}
	
		// If there are any validation errors, return them
		if (count($error) > 0) {
			return [
				'status' => 'error',
				'message' => $error,
			];
		}
	
		// Path where the images are stored
		$location = 'images/products';
		if (!file_exists('../' . $location)) {
			mkdir('../' . $location, permissions: 0777, recursive: true);
		}
	
		// Check if an image exists and delete it if a new image is uploaded
		if ($UpdateProfile_img_tmp) {
			// Get the old image path from the database
			$sql_select = "SELECT image FROM products WHERE id = '$update_id'";
			$result_select = mysqli_query($db_connect, $sql_select);
			if ($result_select && mysqli_num_rows($result_select) > 0) {
				$row = mysqli_fetch_assoc($result_select);
				$old_image_path = '../' . $row['image'];
	
				// Check if the old image exists, if so delete it
				if (file_exists($old_image_path)) {
					unlink($old_image_path); // Deletes the old image
				}
			}
	
			// Upload the new image
			$path = $location . '/' . $UpdateProfile_img_name;
			move_uploaded_file($UpdateProfile_img_tmp, '../' . $path);
		}
	
		// Update query: only include the image field if an image was uploaded
		$sql_update = "UPDATE products SET 
			title='$UpdateTitle', 
			price='$UpdatePrice', 
			oldPrice='$UpdateOldPrice', 
			description='$UpdateDescription'";
	
		if (isset($path)) {
			$sql_update .= ", image='$path'";
		}
	
		$sql_update .= " WHERE id='$update_id'";
	
		$result = mysqli_query($db_connect, $sql_update);
	
		// Check for SQL errors
		if (mysqli_error($db_connect)) {
			die('Table Error: ' . mysqli_error($db_connect));
		}
	
		return [
			'status' => 'success',
			'message' => 'Product updated successfully',
		];
	}

// 	function updateProducts(){
//     $db_connect = db_connect();
//     $update_id = $_POST['update_id'];
//     print_r($update_id);

//     $UpdateTitle = mysqli_real_escape_string($db_connect, $_POST['update-title']);
//     $UpdatePrice = mysqli_real_escape_string($db_connect, $_POST['update-price']);
//     $UpdateOldPrice = mysqli_real_escape_string($db_connect, $_POST['update-oldPrice']);
//     $UpdateDescription = mysqli_real_escape_string($db_connect, $_POST['update-description']);
//     $UpdateProfile_img_name = $_FILES['update-image']['name'];
//     $UpdateProfile_img_size = $_FILES['update-image']['size'];
//     $UpdateProfile_img_tmp = $_FILES['update-image']['tmp_name'];

//     $error = [];

//     // Validation for title, price, old price, and description
//     if (empty($UpdateTitle)) {
//         $error['update-title'] = 'Product Title Cannot be empty';
//     }
//     if (empty($UpdatePrice)) {
//         $error['update-price'] = 'Product price Cannot be empty';
//     }
//     if (empty($UpdateOldPrice)) {
//         $error['update-oldPrice'] = 'Product old price Cannot be empty';
//     }
//     if (empty($UpdateDescription)) {
//         $error['update-description'] = 'Product description Cannot be empty';
//     }

//     // Validate image if provided
//     if ($UpdateProfile_img_tmp) {
//         if ($UpdateProfile_img_size > 1049576) {
//             $error['update-image'] = 'Max Size 1 MB';
//         }
//         $targeted_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
//         $getExtension = strtolower(pathinfo($UpdateProfile_img_name, PATHINFO_EXTENSION));
//         if (!in_array($getExtension, $targeted_extensions)) {
//             $error['update-image'] = 'jpg/jpeg/png/gif/webp File Required';
//         }
//     }

//     // If there are any validation errors, return them
//     if (count($error) > 0) {
//         return [
//             'status' => 'error',
//             'message' => $error,
//         ];
//     }

//     // Path where the images are stored
//     $location = 'images/products';
//     if (!file_exists('../' . $location)) {
//         mkdir('../' . $location, 0777, true);
//     }

//     // Check if an image exists and delete it if a new image is uploaded
//     if ($UpdateProfile_img_tmp) {
//         // Get the old image path from the database
//         $sql_select = "SELECT image FROM products WHERE id = '$update_id'";
//         $result_select = mysqli_query($db_connect, $sql_select);
//         if ($result_select && mysqli_num_rows($result_select) > 0) {
//             $row = mysqli_fetch_assoc($result_select);
//             $old_image_path = '../' . $row['image'];

//             // Check if the old image exists, if so delete it
//             if (file_exists($old_image_path)) {
//                 if (unlink($old_image_path)) {
//                     echo "Old image deleted successfully.";
//                 } else {
//                     echo "Failed to delete the old image.";
//                 }
//             } else {
//                 echo "Old image not found.";
//             }
//         }

//         // Upload the new image
//         $path = $location . '/' . $UpdateProfile_img_name;
//         if (move_uploaded_file($UpdateProfile_img_tmp, '../' . $path)) {
//             echo "New image uploaded successfully.";
//         } else {
//             echo "Failed to upload new image.";
//         }
//     }

//     // Update query: only include the image field if an image was uploaded
//     $sql_update = "UPDATE products SET 
//         title='$UpdateTitle', 
//         price='$UpdatePrice', 
//         oldPrice='$UpdateOldPrice', 
//         description='$UpdateDescription'";

//     if (isset($path)) {
//         $sql_update .= ", image='$path'";
//     }

//     $sql_update .= " WHERE id='$update_id'";

//     // Debugging SQL update
//     echo "Update query: " . $sql_update; 

//     $result = mysqli_query($db_connect, $sql_update);

//     // Check for SQL errors
//     if (mysqli_error($db_connect)) {
//         die('Table Error: ' . mysqli_error($db_connect));
//     }

//     return [
//         'status' => 'success',
//         'message' => 'Product updated successfully',
//     ];
// }

	