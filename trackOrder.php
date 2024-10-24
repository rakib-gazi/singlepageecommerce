<?php 
    ob_start();
    include 'baseurl.php'; 
    include_once 'function/order_auth.php'; // Assuming your db_connect is in order_auth.php

    if(isset($_POST['track'])){
        $phone = $_POST['phoneNumber']; //
        
        // Call the status function with the phone number
        $result = status($phone);
        
        if(mysqli_num_rows($result) > 0) {
            
            $orderData = mysqli_fetch_assoc($result);// Fetch // Get the status of the order
            $orderStatus = $orderData['status']; // Get the status of the order
        } else {
            $error = "No order found for this phone number.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single Product E-commerce</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="<?php echo $baseurl?>css/all.min.css" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    </head>
    <body class="bg-gray-50" x-data="cartComponent()">
        <header class="sticky top-0 z-50">
            <section class="relative flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-gray-800 text-sm py-3 ">
                <nav class="container w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between ">
                    <div class="flex items-center justify-between">
                        <a class="flex-none text-xl font-semibold  focus:outline-none focus:opacity-80" href="<?php echo $baseurl;?>" aria-label="Brand">
                            <img class="w-auto h-12" src="images/logo.png" alt="Logo">
                        </a>
                        <div class="sm:hidden">
                            <button type="button" class="hs-collapse-toggle relative size-7 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none " id="hs-navbar-example-collapse" aria-expanded="false" aria-controls="hs-navbar-example" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-example">
                            <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                            <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            <span class="sr-only">Toggle navigation</span>
                            </button>
                        </div>
                    </div>
                    <div id="hs-navbar-example" class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow sm:block" aria-labelledby="hs-navbar-example-collapse">
                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5 relative">
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green" href="#" aria-current="page">Organic Lemon</a>
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green " href="#">Organic Apple</a>
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green " href="#">Bread & Toast</a>
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green " href="trackOrder.php">Track Order</a>
                        <a href="#" class="">
                            <i class="fa-solid fa-cart-plus text-white text-xl"></i>
                        </a>
                    </div>
                    </div>
                </nav>
            </section>
        </header> 
        <main>
        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div class="flex flex-col gap-y-4">
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Track Your Order
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Enter your phone number to track the status of your order
                    </p>
                </div>
                <form class="mt-8 space-y-6" method="POST">
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="phone-number" class="sr-only">Phone Number</label>
                            <input id="phone-number" name="phoneNumber" type="text" required 
                                class="appearance-none rounded-none relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                                placeholder="Enter your phone number">
                        </div>
                    </div>

                    <div>
                        <button type="submit" name="track"
                            class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-3xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Track Order
                        </button>
                    </div>
                </form>

                <!-- Display Order Status -->
                <?php if (isset($orderStatus)): ?>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
                        <h3 class="text-xl font-bold mb-4">Order Status</h3>
                        <p class="text-lg"><strong>Status:</strong> <?php echo $orderStatus; ?></p>
                    </div>
                <?php else: ?>
                    <div class="bg-red-100 text-red-700 p-4 rounded-lg">
                        <h3 class="text-xl font-bold mb-4">Order Status</h3>
                        <p class="text-lg"><strong>Status:</strong> No Data Available</p>
                    </div>
                <?php  endif; ?>

            </div>
        </div>
    </main>
    <footer>
        <?php include 'footer.php'; ?> 
    </footer>