<?php
    session_start();
	 
	if(isset($_POST['submit-logout'])){
		include ('../function/user_auth.php');
		logout();
	}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<body >
    <header class="bg-cyan-950 sticky top-0 z-50">
        <nav class="container mx-auto py-4 ">
            <div class="flex justify-between items-center ">
                <img src="<?php echo $baseurl?>images/logo.png" alt="" class="h-12">
                <p class="text-white">Single Page E-commerce</p>
            </div>
        </nav>
    </header>