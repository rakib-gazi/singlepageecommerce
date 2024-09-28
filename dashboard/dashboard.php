<?php 

    include 'baseurl.php' ;
    include '../function/order_auth.php';
    include '../function/dashboard_auth.php';
    $products_data = countAllProducts();
    $order_data = countAllOrders();
    $income_data = totalIncome();
    $row = mysqli_fetch_assoc($products_data);
    $row2 = mysqli_fetch_assoc($order_data);
    $row3 = mysqli_fetch_assoc($income_data);
    include "dashboardHeader.php";
?>
    
    <main>
        <div class="flex font-nunito ">
           <?php include "dashboardSidebar.php";?>
            <div class="w-5/6  ml-auto overflow-y-auto">
                <div class="">
                    <div class="p-6">
                        <div>
                            <h1 class="font-bold text-2xl capitalize mb-4">dashboard</h1>
                            <hr class="border border-black w-full">
                        </div>
                        <div class="grid grid-cols-3 gap-6 pt-12">
                            <div class="flex flex-col justify-center items-center rounded-3xl shadow-lg p-12 bg-cyan-950">
                                <h1 class="font-bold py-2 text-2xl text-white">Total Products</h1>
                                <p class="font-bold py-2 text-2xl text-white"><?php echo $row['total_rows'];?></p>
                            </div>
                            <div class="flex flex-col justify-center items-center rounded-3xl shadow-lg p-12 bg-cyan-950">
                                <h1 class="font-bold py-2 text-2xl text-white">Total Orders</h1>
                                <p class="font-bold py-2 text-2xl text-white"><?php echo $row2['total_rows'];?></p>
                            </div>
                            <div class="flex flex-col justify-center items-center rounded-3xl shadow-lg p-12 bg-cyan-950">
                                <h1 class="font-bold py-2 text-2xl text-white">Total Income</h1>
                                <p class="font-bold py-2 text-2xl text-white"><?php echo number_format($row3['total_sum'], 2 ).' TK';?></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
   <?php include "dashboardFooter.php";?>