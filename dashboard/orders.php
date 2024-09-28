<?php 

    include 'baseurl.php' ;
    include '../function/order_auth.php';
    if (isset($_POST['order_delete'])) {
        $result = order_delete();
        if ($result['status'] == 'error') {
            $error = $result['message'];
        } else {
            $success = $result['message'];
            header('Refresh: 1; URL=orders.php');
        }
    }
   
    $order_data = ordersView();
    include "dashboardHeader.php";
?>
    
    <main>
        <div class="flex font-nunito ">
           <?php include "dashboardSidebar.php";?>
            <div class="w-5/6  ml-auto overflow-y-auto">
                <div class="">
                    <div class="p-6">
                        <div>
                            <h1 class="font-bold text-2xl capitalize mb-4">all orders</h1>
                            <hr class="border border-black w-full">
                        </div>
                        <p class="text-red-600 ps-6 pb-2 font-semibold"><?php echo $success?? ''; ?></p>
                        <div class="flex flex-col mt-2">
                            <div class="-m-1.5 ">
                                <div class="p-1.5 w-full inline-block align-middle">
                                    <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                        <table class="w-full ">
                                            <thead class="bg-cyan-950">
                                                <tr>
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">SL No</th>
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">Name</th>
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">Address</th>
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">Payment Method</th>
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">Total Amount</th>
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-cyan-950 ">
                                                
                                                    <?php 
                                                        if(mysqli_num_rows($order_data)>0){
                                                            $i=1;
                                                            while($row = mysqli_fetch_assoc($order_data)){
                                                    ?>
                                                    <tr class="border border-cyan-950">
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $i++;?></td>
                                                        </td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['firstName'].' '.$row['lastName'];?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['address'].' '.$row['city'].' '.$row['postCode'].' '.$row['country']?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['payment'];?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black text-wrap"><?php echo $row['total_amount'];?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-end text-sm font-medium inline-flex gap-x-2">
                                                                    <a href="ordersCopy.php?id=<?php echo $row['id']; ?>" 
                                                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-cyan-950" 
                                                                        target="_blank">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </a>
                                                                    <form action="" method="post" onsubmit="return confirm('Do you want to delete?')">
                                                                        <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                                                                        <button type="submit" name="order_delete" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 ">
                                                                            <i class="fa-solid fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                        
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
   <?php include "dashboardFooter.php";?>