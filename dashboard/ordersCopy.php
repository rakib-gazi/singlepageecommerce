<?php 

    include 'baseurl.php' ;
    include '../function/order_auth.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $ordersDetailsView = ordersDetailsView($id);
    } else {
        die('Reservation ID not provided.');
    }
    $order_data = ordersView();
?>
    <?php include "dashboardHeader.php"; ?>
    <main>
        <div class="flex font-nunito ">
           <?php include "dashboardSidebar.php";?>
            <div class="w-5/6  ml-auto overflow-y-auto">
                <div class="">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                            <h1 class="text-3xl font-bold  font-serif capitalize">all orders</h1>
                            <div class="flex justify-center items-center gap-x-2">
                                <button class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black" onclick="downloadPDF()">
                                    <i class="fa-solid fa-download me-4"></i> PDF
                                </button>
                                <a href="orders.php" class="bg-cyan-950 hover:bg-slate-800 text-white transition duration-700 ease-in-out font-serif text-lg font-semibold px-8 py-1.5 rounded outline outline-1 outline-black">
                                    <i class="fa-solid fa-long-arrow-alt-left me-4"></i>Go Back
                                </a>
                            </div>
                        </div>
                        <hr class="border border-black w-full">
                        <div class="container mx-auto " id="booking_print">
                            <div class="max-w-4xl mx-auto bg-white px-4 py-4 shadow-md rounded-lg">
                            <?php 
                                if(mysqli_num_rows($ordersDetailsView)>0){
                                    $i=1;
                                    while($row = mysqli_fetch_assoc($ordersDetailsView)){
                                        $productData = $row['products'];
                                        $products = json_decode($productData, true);
                                        $total_amount = 0;
                            ?>
                                <!-- Header -->
                                <div class="bg-cyan-950 p-4 rounded-t-lg mb-4  flex justify-between items-center">
                                    <img src="../images/logo.png" alt="Logo" class="h-16">
                                    <h1 class="text-3xl font-semibold text-white font-nunito">INVOICE</h1>
                                </div>
                                <!-- Bank Invoice  Details -->
                                <div class="grid grid-cols-2 gap-4 mt-12">
                                    <!-- Bill to Infor -->
                                    <div class="p-4 rounded-lg  border-2 border-cyan-950">
                                        <h3 class="font-bold text-medium font-nunito mb-2">Bill to</h3>
                                        <h3 class="font-semibold text-medium font-nunito"><?php echo $row['firstName'].' '.$row['lastName'];?></h3>
                                        <p><?php echo $row['address'];?></p>
                                        <p><?php echo $row['city'].' '.$row['postCode'].' '.$row['country'];?></p>
                                    </div>
                                    <!-- Invoie info -->
                                    <div class="p-4 rounded-lg  border-2 border-cyan-950">
                                        <table class="w-full ">
                                            <tr class="text-left">
                                                <th class="w-1/2 font-serif text-sm">Invoice No</th>
                                                <td class="w-1/2 text-black font-nunito text-sm">
                                                <?php echo $row['id'];?> 
                                                </td>
                                            </tr>
                                            <tr class="text-left">
                                                <th class="w-1/2 font-serif text-sm">Invoice Date</th>
                                                <td class="w-1/2 text-black font-nunito text-sm">
                                                <?php echo date("d-m-Y");?></td>
                                            </tr>
                                            <tr class="text-left">
                                                <th class="w-1/2 font-serif text-sm">Amount Due </th>
                                                <td class="w-1/2 text-black font-nunito text-sm"><?php echo $row['total_amount'].' Tk';?>  </td>
                                            </tr>
                                            <tr class="text-left">
                                                <th class="w-1/2 font-serif text-sm">Delivery Method</th>
                                                <td class="w-1/2 text-black font-nunito text-sm"><?php echo $row['shipping'] == 5 ? 'Paid Delivery' : 'Free Delivery';?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-12">
                                    <div class="-m-1.5 ">
                                        <div class="p-1.5 w-full inline-block align-middle">
                                            <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                            <table class="w-full">
                                                <thead class="bg-cyan-950">
                                                    <tr>
                                                        <th scope="col" class="p-4 text-start text-sm font-medium text-white uppercase">SL</th>
                                                        <th scope="col" class="p-4 text-start text-sm font-medium text-white uppercase">ITEMS</th>
                                                        <th scope="col" class="p-4 text-start text-sm font-medium text-white uppercase">QT</th>
                                                        <th scope="col" class="p-4 text-start text-sm font-medium text-white uppercase">PRICE</th>
                                                        <th scope="col" class="p-4 text-start text-sm font-medium text-white uppercase">AMOUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-cyan-950">
                                                    <?php 
                                                    $sl = 1;
                                                    foreach ($products as $product) {

                                                        $amount = $product['price'] * $product['quantity'];
                                                        $total_amount += $amount;
                                                        ?>
                                                        <tr class="border border-cyan-950">
                                                            <td class="p-4 whitespace-nowrap text-sm "><?php echo str_pad($sl, 2, '0', STR_PAD_LEFT); ?></td>
                                                            <td class="p-4 whitespace-nowrap text-sm "><?php echo $product['name']; ?></td>
                                                            <td class="p-4 whitespace-nowrap text-sm "><?php echo $product['quantity']; ?></td>
                                                            <td class="p-4 whitespace-nowrap text-sm ">$<?php echo number_format($product['price'], 2); ?></td>
                                                            <td class="p-4 whitespace-nowrap text-sm ">$<?php echo number_format($amount, 2); ?></td>
                                                        </tr>
                                                    <?php 
                                                    $sl++;
                                                    } 
                                                    ?>
                                                    <tr class="border border-cyan-950">
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class="p-4 text-start text-sm font-medium text-black uppercase">Total</td>
                                                        <td class="p-4 text-start text-sm font-medium text-black uppercase">$<?php echo number_format($total_amount, 2); ?></td>
                                                    </tr>
                                                    <tr class="border border-cyan-950">
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class="p-4 text-start text-sm font-medium text-black uppercase">Paid</td>
                                                        <td class="p-4 text-start text-sm font-medium text-black uppercase">$0.00</td>
                                                    </tr>
                                                    <tr class="border border-cyan-950">
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class="p-4 text-start text-sm font-medium text-black uppercase">Total Due</td>
                                                        <td class="p-4 text-start text-sm font-medium text-black uppercase">$<?php echo number_format($total_amount, 2); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                                <!-- Footer -->
                                <div class="bg-cyan-950 px-8 py-4 rounded-b-lg my-4 shadow shadow-black grid grid-cols-2">
                                    <div>
                                        <div class="flex justify-start items-center gap-x-4">
                                            <p class=""><i class="fa-solid fa-phone-flip text-white text-medium"></i></p>
                                            <p class=" text-white font-semibold text-sm">+880-181 000 4180</p>
                                        </div>
                                        <div class="flex justify-start items-center gap-x-4">
                                            <p class=""><i class="fa-solid fa-globe text-white text-medium"></i></p>
                                            <p class=" text-white font-semibold text-sm">singlepageecommerce.com</p>
                                        </div>
                                        <div class="flex justify-start items-center gap-x-4">
                                            <p class=""><i class="fa-solid fa-envelope text-white text-medium"></i></p>
                                            <p class=" text-white font-semibold text-sm">contact@singlepageecommerce.com</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex flex-col justify-center items-start">
                                            <p class=" text-white font-semibold text-sm">Office Address </p>
                                            <p class=" text-white font-semibold text-sm">House-514, Suite#A/1, Road#07,<br>Avenue#3, Mirpur DOHS,Dhaka-1216</p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                            ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function downloadPDF() {
            var element = document.getElementById('booking_print');
            var opt = {
                margin: 0,
                filename: 'Orders-details.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'A4', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        }
    </script>
   <?php include "dashboardFooter.php";?>