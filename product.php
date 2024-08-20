<?php


// Dynamic values stored in arrays
$products = [
    [
        'id' => 1,
        'image' => 'images/1.jpg',
        'name' => 'Seeds Of Change Organic Quinoa, Brown',
        'price' => '$120.25',
        'old_price' => '$123.25',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus?'
    ],
    [
        'id' => 2,
        'image' => 'images/2.jpg',
        'name' => 'Organic Brown Rice, Long Grain',
        'price' => '$80.50',
        'old_price' => '$85.00',
        'description' => 'Amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus? Lorem ipsum dolor sit.'
    ],
    [
        'id' => 3,
        'image' => 'images/3.jpg',
        'name' => 'Premium White Basmati Rice',
        'price' => '$150.00',
        'old_price' => '$155.00',
        'description' => 'Error doloribus saepe natus? Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ],
    [
        'id' => 4,
        'image' => 'images/4.jpg',
        'name' => 'Organic Whole Wheat Flour',
        'price' => '$60.00',
        'old_price' => '$65.00',
        'description' => 'Adipisicing elit. In, iure minus error doloribus saepe natus? Lorem ipsum dolor sit amet consectetur.'
    ],
    [
        'id' => 4,
        'image' => 'images/5.jpg',
        'name' => 'Pure Natural Honey',
        'price' => '$45.00',
        'old_price' => '$50.00',
        'description' => 'Natus? Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe.'
    ],
    [
        'id' => 6,
        'image' => 'images/6.jpg',
        'name' => 'Extra Virgin Olive Oil',
        'price' => '$90.75',
        'old_price' => '$95.00',
        'description' => 'Minus error doloribus saepe natus? Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ]
];

// Add to Cart functionality
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product = array_filter($products, function($p) use ($product_id) {
        return $p['id'] == $product_id;
    });
    $product = array_shift($product);

    if ($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $cart_item = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => 1
        ];

        // Check if product is already in the cart
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product['id']) {
                $item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = $cart_item;
        }

        // If "Buy Now" button was clicked, redirect to the cart
        if (isset($_POST['buy_now'])) {
            header("Location: cart.php");
            exit;
        }
    }
}
?>

<section class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="bg-green-100 py-4 px-6">
        <h1 class="text-2xl font-bold">My Products</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12 mt-12">
        <?php foreach ($products as $index => $product): ?>
            <div>
                <!-- Product Image -->
                <div class="flex items-center relative">
                    <div class="relative w-3/4">
                        <img id="main-product-image-<?php echo $index; ?>" src="<?php echo $product['image']; ?>" alt="Product Image" class="rounded-lg shadow-lg w-full">
                        <!-- Eye Icon -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <button type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-large-modal-<?php echo $index; ?>" data-hs-overlay="#hs-large-modal-<?php echo $index; ?>">
                                <i class="fa-regular fa-eye text-3xl text-cyan-400"></i>
                            </button>
                    </div>        
                        </div>
                        <div class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" id="hs-large-modal-<?php echo $index; ?>" role="dialog" tabindex="-1" aria-labelledby="hs-large-modal-label-<?php echo $index; ?>">
                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                                    <div class="flex justify-between items-center py-3 px-4 border-b">
                                        <h3 id="hs-large-modal-label-<?php echo $index; ?>" class="font-bold text-gray-800">
                                            <?php echo $product['name']; ?>
                                        </h3>
                                        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-large-modal-<?php echo $index; ?>">
                                            <span class="sr-only">Close</span>
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-4 overflow-y-auto grid grid-cols-2">
                                        <!-- Product Image -->
                                        <div class="flex relative">
                                            <div class="w-3/4">
                                                <img id="modal-main-product-image-<?php echo $index; ?>" src="<?php echo $product['image']; ?>" alt="Product Image" class="rounded-lg shadow-lg w-full">
                                            </div>
                                            <!-- Thumbnail Images -->
                                            <div class="flex flex-col ms-4 space-y-2">
                                                <?php foreach ($products as $thumb): ?>
                                                    <img src="<?php echo $thumb['image']; ?>" alt="Thumbnail" class="modal-thumbnail w-16 h-16 object-cover border rounded-lg cursor-pointer">
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <!-- Product Details -->
                                        <div>
                                            <p class="text-sm text-gray-500 mt-2"><?php echo $product['description']; ?></p>
                                            <div class="flex items-between justify-between">
                                                <div class="flex items-center mt-4">
                                                    <span class="text-green-500 text-2xl font-bold"><?php echo $product['price']; ?></span>
                                                    <span class="text-gray-500 line-through ml-4"><?php echo $product['old_price']; ?></span>
                                                </div>
                                                <!-- Quantity Selector -->
                                                <div class="flex items-center mt-4">
                                                    <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                                                    <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2 bg-transparent">
                                                    <button class="px-4 py-2 border rounded-r-lg" onclick="increaseQuantity()">+</button>
                                                </div>
                                            </div>
                                            <!-- Size/Weight Selector -->
                                            <div class="mt-6">
                                                <span class="font-semibold">Size/Weight:</span>
                                                <div class="flex space-x-2 mt-2">
                                                    <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">50kg</button>
                                                    <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">80kg</button>
                                                    <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">120kg</button>
                                                    <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">200kg</button>
                                                </div>
                                            </div>
                                            <ul class="mt-4 space-y-2">
                                                <li><span class="font-semibold">Brand:</span> ESTA BETTERU CO</li>
                                                <li><span class="font-semibold">Flavour:</span> Super Saver Pack</li>
                                                <li><span class="font-semibold">Diet Type:</span> Vegetarian</li>
                                                <li><span class="font-semibold">Weight:</span> 200 Grams</li>
                                                <li><span class="font-semibold">Speciality:</span> Gluten Free, Sugar Free</li>
                                                <li><span class="font-semibold">Info:</span> Egg Free, Allergen-Free</li>
                                                <li><span class="font-semibold">Items:</span> 1</li>
                                            </ul>
                                            <!-- Action Buttons -->
                                            <div class="flex space-x-4 mt-6">
                                                <button class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                                                <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-large-modal-<?php echo $index; ?>">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Modal -->
                    
                    <!-- Thumbnail Images -->
                    <div class="flex flex-col ms-4 space-y-2">
                        <?php foreach ($products as $thumb): ?>
                            <img src="<?php echo $thumb['image']; ?>" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Product Details -->
                <div class="mt-12">
                    <h1 class="text-2xl font-bold text-gray-800"><?php echo $product['name']; ?></h1>
                    <p class="text-sm text-gray-500 mt-2"><?php echo $product['description']; ?></p>
                </div>
                <div class="flex items-between justify-between">
                    <div class="flex items-center mt-4">
                        <span class="text-green-500 text-2xl font-bold">$120.25</span>
                        <span class="text-gray-500 line-through ml-4">$123.25</span>
                    </div>
                    
                    <div class="flex items-center mt-4">
                        <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                        <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2 bg-transparent">
                        <button class="px-4 py-2 border rounded-r-lg" onclick="increaseQuantity()">+</button>
                    </div>
                </div>
                <ul class="mt-4 space-y-2">
                    <li><span class="font-semibold">Brand:</span> ESTA BETTERU CO</li>
                    <li><span class="font-semibold">Flavour:</span> Super Saver Pack</li>
                    <li><span class="font-semibold">Diet Type:</span> Vegetarian</li>
                    <li><span class="font-semibold">Weight:</span> 200 Grams</li>
                    <li><span class="font-semibold">Speciality:</span> Gluten Free, Sugar Free</li>
                    <li><span class="font-semibold">Info:</span> Egg Free, Allergen-Free</li>
                    <li><span class="font-semibold">Items:</span> 1</li>
                </ul>
                <div class="mt-6">
                    <span class="font-semibold">Size/Weight:</span>
                    <div class="flex space-x-2 mt-2">
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">50kg</button>
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">80kg</button>
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">120kg</button>
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">200kg</button>
                    </div>
                </div>
                
                <div class="flex space-x-4 mt-6">
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="add_to_cart" class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                        <button type="submit" name="buy_now" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                        <button type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-large-modal-<?php echo $index; ?>" data-hs-overlay="#hs-large-modal-<?php echo $index; ?>" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">
                        View
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <div>
            
            <div class="flex items-center relative">
                <div class="relative w-3/4">
                    <img id="main-product-image" src="images/1.jpg" alt="Product Image" class="rounded-lg shadow-lg w-full">
                    
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <button type="button"  aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-large-modal" data-hs-overlay="#hs-large-modal">
                            <i class="fa-regular fa-eye text-3xl text-cyan-400"></i>
                        </button>
                    </div>
                    <div id="hs-large-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-large-modal-label">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto ">
                            <div class="flex justify-between items-center py-3 px-4 border-b ">
                                <h3 id="hs-large-modal-label" class="font-bold text-gray-800 ">
                                Seeds Of Change Organic Quinoa, Brown
                                </h3>
                                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none " aria-label="Close" data-hs-overlay="#hs-large-modal">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                                </button>
                            </div>
                            <div class="p-4 overflow-y-auto grid grid-cols-2">
                                
                                <div class="flex  relative">
                                    <div class="w-3/4">
                                        <img id="main-product-image" src="images/1.jpg" alt="Product Image" class="rounded-lg shadow-lg w-full">
                                        
                                    </div>
                                    
                                    <div class="flex flex-col ms-4 space-y-2">
                                        <img src="images/1.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                        <img src="images/2.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                        <img src="images/3.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                        <img src="images/4.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                        <img src="images/5.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                    </div>
                                </div>
                                
                                <div class="">
                                    
                                    <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus?</p>
                                    <div class="flex items-between justify-between">
                                        <div class="flex items-center mt-4">
                                            <span class="text-green-500 text-2xl font-bold">$120.25</span>
                                            <span class="text-gray-500 line-through ml-4">$123.25</span>
                                        </div>
                                        
                                        <div class="flex items-center mt-4">
                                            <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                                            <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2">
                                            <button class="px-4 py-2 border rounded-r-lg" onclick="increaseQuantity()">+</button>
                                        </div>
                                    </div>
                                    
                                    <ul class="mt-4 space-y-2">
                                            <li><span class="font-semibold">Brand:</span> ESTA BETTERU CO</li>
                                            <li><span class="font-semibold">Flavour:</span> Super Saver Pack</li>
                                            <li><span class="font-semibold">Diet Type:</span> Vegetarian</li>
                                            <li><span class="font-semibold">Weight:</span> 200 Grams</li>
                                            <li><span class="font-semibold">Speciality:</span> Gluten Free, Sugar Free</li>
                                            <li><span class="font-semibold">Info:</span> Egg Free, Allergen-Free</li>
                                            <li><span class="font-semibold">Items:</span> 1</li>
                                        </ul>
                                    
                                    <div class="mt-6">
                                        <span class="font-semibold">Size/Weight:</span>
                                        <div class="flex space-x-2 mt-2">
                                            <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">50kg</button>
                                            <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">80kg</button>
                                            <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">120kg</button>
                                            <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">200kg</button>
                                        </div>
                                    </div>
                                    
                                    <div class="flex space-x-4 mt-6">
                                        <button class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                                        <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                                        <button type="button"  data-hs-overlay="#hs-scale-animation-modal" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">View</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t ">
                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none " data-hs-overlay="#hs-large-modal">
                                Close
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="flex flex-col ms-4 space-y-2">
                    <img src="images/1.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/2.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/3.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/4.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/5.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                </div>
            </div>
            
            <div class="mt-12">
                <h1 class="text-2xl font-bold text-gray-800">Seeds Of Change Organic Quinoa, Brown</h1>
                <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus?</p>
                <div class="flex items-between justify-between">
                    <div class="flex items-center mt-4">
                        <span class="text-green-500 text-2xl font-bold">$120.25</span>
                        <span class="text-gray-500 line-through ml-4">$123.25</span>
                    </div>
                    
                    <div class="flex items-center mt-4">
                        <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                        <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2">
                        <button class="px-4 py-2 border rounded-r-lg" onclick="increaseQuantity()">+</button>
                    </div>
                </div>
                
                <div class="mt-6">
                    <span class="font-semibold">Size/Weight:</span>
                    <div class="flex space-x-2 mt-2">
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">50kg</button>
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">80kg</button>
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">120kg</button>
                        <button class="px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500">200kg</button>
                    </div>
                </div>
                
                <div class="flex space-x-4 mt-6">
                    <button class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                    <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                    <button type="button"  data-hs-overlay="#hs-scale-animation-modal" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">View</button>
                </div>
            </div>
        </div>
    </div> -->
</section>
