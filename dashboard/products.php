<?php 

    include 'baseurl.php' ;
    include '../function/products_auth.php' ;

    if(isset($_POST['productSubmit'])){
        $old = $_POST;
        $result = products();
        if ($result['status'] == 'error') {
            $error = $result['message'];
        }else {
            $success = $result['message'];
            header('Refresh: 1; URL=products.php');
        }
    }
    if(isset($_POST['updateProduct'])){
        $old = $_POST;
        $result = updateProducts();
        if ($result['status'] == 'error') {
            $error = $result['message'];
        }else {
            $updateSuccess = $result['message'];
            header('Refresh: 1; URL=products.php');
        }
    }
    if (isset($_POST['product_delete'])) {
        $result = product_delete();
        if ($result['status'] == 'error') {
            $error = $result['message'];
        } else {
            $success = $result['message'];
            header('Refresh: 1; URL=products.php');
        }
    }
    $product_data = productsView();

?>
<?php include "dashboardHeader.php";?>
    <main>
        <div class="flex font-nunito ">
            <?php include "dashboardSidebar.php";?>
            <div class="w-5/6  ml-auto overflow-y-auto">
                <div class="p-6">
                    <div class="grid grid-cols-3">
                        <div class="col-span-1 px-6">
                            <form method="post" class="flex flex-col gap-y-2" enctype="multipart/form-data">
                                <p class="font-bold text-xl ">Add products</p>
                                <hr class="border border-black mb-4">
                                <p class="text-green-600 ps-6 pb-2 font-semibold"><?php echo $success?? ''; ?></p>
                                <label for="image">
                                    <img id="preview" src="../images/image_preview.jpg" alt="Selected Image" class="h-60 w-60 rounded-3xl">
                                </label>
                                <input type="file" id="image" name="image" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400 w-full" placeholder="Product title" onchange="previewMainImage(event)">
                                <p class="text-red-600 ps-6"><?php echo $error['image']?? '';?></p>
                                <input type="text" value="<?php $old['title'] ?? ''; ?>" name="title" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400  w-full" placeholder="Product title">
                                <p class="text-red-600 ps-6"><?php echo $error['title']?? '';?></p>
                                <input type="text" value="<?php $old['price'] ?? ''; ?>" name="price" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400  w-full" placeholder="Price">
                                <p class="text-red-600 ps-6"><?php echo $error['price']?? '';?></p>
                                <input type="text" value="<?php $old['oldPrice'] ?? ''; ?>" name="oldPrice" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400  w-full" placeholder="old price">
                                <p class="text-red-600 ps-6"><?php echo $error['oldPrice']?? '';?></p>
                                <textarea type="text" value="<?php $old['description'] ?? ''; ?>" name="description" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400  w-full" placeholder="Product description"></textarea>
                                <p class="text-red-600 ps-6"><?php echo $error['description']?? '';?></p>
                                <button type="submit" name="productSubmit" class="bg-cyan-950 px-6 py-3 shadow-lg rounded-3xl w-full text-white text-xl font-bold mt-6">submit</button>
                            </form>
                        </div>
                        <div class="col-span-2">
                            <p class="font-bold text-xl pb-2">All products</p>
                            <hr class="border border-black mb-4">
                            <p class="text-green-600 ps-6 pb-2 font-semibold"><?php echo  $updateSuccess??''; ?></p>
                            <div class="flex flex-col mt-2" >
                                <div class="-m-1.5 ">
                                    <div class="p-1.5 w-full inline-block align-middle">
                                        <div class="border border-cyan-950 rounded-lg overflow-hidden">
                                        
                                            <table class="w-full ">
                                                
                                                <thead class="bg-cyan-950">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-1.5 text-start text-sm font-medium text-white uppercase ">SL No</th>
                                                        <th scope="col" class="px-6 py-1.5 text-start text-sm font-medium text-white uppercase ">Product Image</th>
                                                        <th scope="col" class="px-6 py-1.5 text-start text-sm font-medium text-white uppercase ">Product Title</th>
                                                        <th scope="col" class="px-6 py-1.5 text-start text-sm font-medium text-white uppercase ">Price</th>
                                                        <th scope="col" class="px-6 py-1.5 text-start text-sm font-medium text-white uppercase ">Old Price</th>
                                                        <th scope="col" class="px-6 py-1.5 text-start text-sm font-medium text-white uppercase ">Description</th>
                                                        <th scope="col" class="px-6 py-1.5 text-start text-sm font-medium text-white uppercase ">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-cyan-950 ">
                                                    <?php 
                                                        if(mysqli_num_rows($product_data)>0){
                                                            $i=1;
                                                            while($row = mysqli_fetch_assoc($product_data)){
                                                                $productId = $row['id'];
                                                    ?>
                                                    <tr class="border border-cyan-950">
                                                        <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $i++;?></td>
                                                        <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-black">
                                                            <?php if($row['image']){ ?>
                                                            <img src="../<?php echo $row['image']?? '';?>" alt="product-image" class="h-32 w-32">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['title'];?></td>
                                                        <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['price'];?></td>
                                                        <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-black"><?php echo $row['oldPrice'];?></td>
                                                        <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-black text-wrap"><?php echo $row['description'];?></td>
                                                        <td class="px-6 py-1.5 whitespace-nowrap text-end text-sm font-medium inline-flex gap-x-2">
                                                            <button id="update-<?php echo $productId; ?>" class="updateBtn inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-green-700">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>

                                                            </button>
                                                            <form action="" method="post" onsubmit="return confirm('Do you want to delete?')">
                                                                <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                                                                <button type="submit" name="product_delete" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 ">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>

                                                            <!-- Modal for each product -->
                                                            <div id="modal-<?php echo $productId; ?>" class="modal hidden">
                                                                <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                                                                    <div class="bg-white p-8 rounded-lg shadow-lg w-[500px]">
                                                                        <form id="updateForm" method="post" class="flex flex-col gap-y-2" enctype="multipart/form-data">
                                                                            <p class="font-bold text-xl text-center">Update products</p>
                                                                            <hr class="border border-black mb-4">
                                                                            <input type="hidden" name="update_id" value="<?php echo $row['id']?? '';?>">
                                                                            <label for="updateImage-<?php echo $productId; ?>">
                                                                                <img id="updatePreview-<?php echo $productId; ?>" src=" <?php echo '../'.$row['image'] ?? '../images/image_preview.jpg'; ?>" alt="Selected Image" class="h-40 w-40 rounded-3xl">
                                                                            </label>
                                                                            <input type="file" id="updateImage-<?php echo $productId; ?>" name="update-image" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400 w-full" placeholder="Product title" onchange="previewUpdateImage(event, <?php echo $productId; ?>)">
                                                                            <input type="text" value="<?php echo $row['title'] ?? ''; ?>" name="update-title" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400 w-full" placeholder="Product title">
                                                                            <input type="text" value="<?php echo $row['price'] ?? ''; ?>" name="update-price" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400 w-full" placeholder="Price">
                                                                            <input type="text" value="<?php echo $row['oldPrice'] ?? ''; ?>" name="update-oldPrice" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400 w-full" placeholder="old price">
                                                                            <textarea name="update-description" class="px-4 py-4 shadow-lg rounded-3xl focus:outline-none outline-gray-400 w-full" placeholder="Product description"><?php echo $row['description'] ?? ''; ?></textarea>
                                                                            <div class="flex items-center justify-center gap-x-4">
                                                                                <button type="submit" name="updateProduct" class="bg-cyan-950 px-8 py-2 shadow-lg rounded-3xl text-white text-xl font-semibold">Submit</button>
                                                                                <button type="button" class="closeModal bg-cyan-950 px-8 py-2 shadow-lg rounded-3xl text-white text-xl font-semibold" data-modal-id="modal-<?php echo $productId; ?>">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
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
        </div>
    </main>
<?php include "dashboardFooter.php"?>
