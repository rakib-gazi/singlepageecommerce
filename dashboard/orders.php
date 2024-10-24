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
    if (isset($_POST['updateStatus'])) {
        $result = updateStatus();
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
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">Status</th>
                                                    <th scope="col" class="px-2 py-1.5 text-start text-sm font-medium text-white uppercase ">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-cyan-950 ">
                                                
                                                    <?php 
                                                        if(mysqli_num_rows($order_data)>0){
                                                            $currentStatus = $row['orderStatus'] ?? '';
                                                            $statuses = [
                                                                'Order Received',
                                                                'Order processing',
                                                                'Order sent to courier',
                                                                'Order Delivered',
                                                                'Order closed'
                                                            ];
                                                            $i=1;
                                                            while($row = mysqli_fetch_assoc($order_data)){
                                                                $productId = $row['id'];
                                                    ?>
                                                    <tr class="border border-cyan-950">
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $i++;?></td>
                                                        </td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['firstName'].' '.$row['lastName'];?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['address'].' '.$row['city'].' '.$row['postCode'].' '.$row['country']?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['payment'];?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black text-wrap"><?php echo $row['total_amount'];?></td>
                                                        <td class="px-2 py-1.5 whitespace-nowrap text-sm font-medium text-black text-wrap">
                                                            <button id="update-<?php echo $productId; ?>" class="updateOrder inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-green-700">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>
                                                            </button>
                                                            <Span><?php echo $row['status'];?></Span>
                                                            <!-- Modal for each product -->
                                                            <div id="modal-<?php echo $productId; ?>" class="modal hidden">
                                                                <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                                                                    <div class="bg-white p-8 rounded-lg shadow-lg w-[500px]">
                                                                        <form id="updateForm" method="post" class="flex flex-col gap-y-2" enctype="multipart/form-data">
                                                                            <p class="font-bold text-xl text-center">Update products</p>
                                                                            <hr class="border border-black mb-4">
                                                                            <input type="hidden" name="update_id" value="<?php echo $row['id']?? '';?>">
                                                                            <select name="orderStatus" class="mb-4 px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400 w-full">
                                                                                <option disabled>Select Order Status</option>
                                                                                <?php foreach ($statuses as $status): ?>
                                                                                    <option value="<?php echo $status; ?>" <?php echo ($status === $currentStatus) ? 'selected' : ''; ?>>
                                                                                        <?php echo $status; ?>
                                                                                    </option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            <div class="flex items-center justify-center gap-x-4">
                                                                                <button type="submit" name="updateStatus" class="bg-cyan-950 px-8 py-2 shadow-lg rounded-3xl text-white text-xl font-semibold">Submit</button>
                                                                                <button type="button" class="closeModal bg-cyan-950 px-8 py-2 shadow-lg rounded-3xl text-white text-xl font-semibold" data-modal-id="modal-<?php echo $productId; ?>">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
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