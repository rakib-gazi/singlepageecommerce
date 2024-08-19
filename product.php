<section class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="bg-green-100 py-4 px-6">
        <h1 class="text-2xl font-bold">My Products</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <div>
            <!-- Product Image -->
            <div class="flex items-center relative">
                <div class="relative w-3/4">
                    <img id="main-product-image" src="images/1.jpg" alt="Product Image" class="rounded-lg shadow-lg w-full">
                    <!-- Eye Icon -->
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <button type="button"  data-hs-overlay="#hs-scale-animation-modal">
                            <i class="fa-regular fa-eye text-3xl text-cyan-400"></i>
                        </button>
                    </div>
                    <!-- Modal -->
                    <div id="hs-scale-animation-modal" class="hs-overlay hidden fixed inset-0 z-50 overflow-x-hidden overflow-y-auto" aria-hidden="true">
                        <div class="hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto flex items-center justify-center min-h-screen">
                            <div class="w-full bg-white rounded-lg shadow ">
                                <div class="flex justify-between items-center py-2 px-6 border-b rounded-t ">
                                    <h3 class="text-xl font-medium text-gray-900 ">
                                    Seeds Of Change Organic Quinoa, Brown
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-hs-overlay="#hs-scale-animation-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="px-6 py-1">
                                    <!-- Product Information -->
                                    <ul class="mt-4 space-y-2">
                                        <li><span class="font-semibold">Brand:</span> ESTA BETTERU CO</li>
                                        <li><span class="font-semibold">Flavour:</span> Super Saver Pack</li>
                                        <li><span class="font-semibold">Diet Type:</span> Vegetarian</li>
                                        <li><span class="font-semibold">Weight:</span> 200 Grams</li>
                                        <li><span class="font-semibold">Speciality:</span> Gluten Free, Sugar Free</li>
                                        <li><span class="font-semibold">Info:</span> Egg Free, Allergen-Free</li>
                                        <li><span class="font-semibold">Items:</span> 1</li>
                                    </ul>
                                </div>
                                <div class="flex items-center justify-end py-4 px-6 space-x-2 border-t border-gray-200 rounded-b ">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 " data-hs-overlay="#hs-scale-animation-modal">
                                        Close
                                    </button>
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
                <!-- Thumbnail Images -->
                <div class="flex flex-col ms-4 space-y-2">
                    <img src="images/1.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/2.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/3.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/4.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/5.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                </div>
            </div>
            <!-- Product Details -->
            <div class="mt-12">
                <h1 class="text-2xl font-bold text-gray-800">Seeds Of Change Organic Quinoa, Brown</h1>
                <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus?</p>
                <div class="flex items-between justify-between">
                    <div class="flex items-center mt-4">
                        <span class="text-green-500 text-2xl font-bold">$120.25</span>
                        <span class="text-gray-500 line-through ml-4">$123.25</span>
                    </div>
                    <!-- Quantity Selector -->
                    <div class="flex items-center mt-4">
                        <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                        <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2">
                        <button class="px-4 py-2 border rounded-r-lg" onclick="increaseQuantity()">+</button>
                    </div>
                </div>
                <!-- Size/Weight Selector -->
                <div class="mt-6">
                    <div>
            <!-- Product Image -->
            <div class="flex items-center relative">
                <div class="relative w-3/4">
                    <img id="main-product-image" src="images/1.jpg" alt="Product Image" class="rounded-lg shadow-lg w-full">
                    <!-- Eye Icon -->
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <button type="button"  data-hs-overlay="#hs-scale-animation-modal">
                            <i class="fa-regular fa-eye text-3xl text-cyan-400"></i>
                        </button>
                    </div>
                    <!-- Modal -->
                    <div id="hs-scale-animation-modal" class="hs-overlay hidden fixed inset-0 z-50 overflow-x-hidden overflow-y-auto" aria-hidden="true">
                        <div class="hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto flex items-center justify-center min-h-screen">
                            <div class="w-full bg-white rounded-lg shadow ">
                                <div class="flex justify-between items-center py-2 px-6 border-b rounded-t ">
                                    <h3 class="text-xl font-medium text-gray-900 ">
                                    Seeds Of Change Organic Quinoa, Brown
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-hs-overlay="#hs-scale-animation-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="px-6 py-1">





                                <div>
                                    <!-- Product Image -->
                                    <div class="flex items-center relative">
                                        <div class=" w-3/4">
                                            <img id="main-product-image" src="images/1.jpg" alt="Product Image" class="rounded-lg shadow-lg w-full">
                                            
                                        </div>
                                        <!-- Thumbnail Images -->
                                        <div class="flex flex-col ms-4 space-y-2">
                                            <img src="images/1.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/2.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/3.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/4.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/5.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                        </div>
                                    </div>
                                    <!-- Product Details -->
                                    <div class="mt-12">
                                        <h1 class="text-2xl font-bold text-gray-800">Seeds Of Change Organic Quinoa, Brown</h1>
                                        <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus?</p>
                                        <div class="flex items-between justify-between">
                                            <div class="flex items-center mt-4">
                                                <span class="text-green-500 text-2xl font-bold">$120.25</span>
                                                <span class="text-gray-500 line-through ml-4">$123.25</span>
                                            </div>
                                            <!-- Quantity Selector -->
                                            <div class="flex items-center mt-4">
                                                <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                                                <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2">
                                                <button class="px-4 py-2 border rounded-r-lg" onclick="increaseQuantity()">+</button>
                                            </div>
                                        </div>
                                        <!-- Size/Weight Selector -->
                                        <div class="mt-6">
                                            <div>
                                    <!-- Product Image -->
                                    <div class="flex items-center relative">
                                        <div class="relative w-3/4">
                                            <img id="main-product-image" src="images/1.jpg" alt="Product Image" class="rounded-lg shadow-lg w-full">
                                            <!-- Eye Icon -->
                                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                                                <button type="button"  data-hs-overlay="#hs-scale-animation-modal">
                                                    <i class="fa-regular fa-eye text-3xl text-cyan-400"></i>
                                                </button>
                                            </div>
                                            <!-- Modal -->
                                            <div id="hs-scale-animation-modal" class="hs-overlay hidden fixed inset-0 z-50 overflow-x-hidden overflow-y-auto" aria-hidden="true">
                                                <div class="hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto flex items-center justify-center min-h-screen">
                                                    <div class="w-full bg-white rounded-lg shadow ">
                                                        <div class="flex justify-between items-center py-2 px-6 border-b rounded-t ">
                                                            <h3 class="text-xl font-medium text-gray-900 ">
                                                            Seeds Of Change Organic Quinoa, Brown
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-hs-overlay="#hs-scale-animation-modal">
                                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="px-6 py-1">
                                                            <!-- Product Information -->
                                                            <ul class="mt-4 space-y-2">
                                                                <li><span class="font-semibold">Brand:</span> ESTA BETTERU CO</li>
                                                                <li><span class="font-semibold">Flavour:</span> Super Saver Pack</li>
                                                                <li><span class="font-semibold">Diet Type:</span> Vegetarian</li>
                                                                <li><span class="font-semibold">Weight:</span> 200 Grams</li>
                                                                <li><span class="font-semibold">Speciality:</span> Gluten Free, Sugar Free</li>
                                                                <li><span class="font-semibold">Info:</span> Egg Free, Allergen-Free</li>
                                                                <li><span class="font-semibold">Items:</span> 1</li>
                                                            </ul>
                                                        </div>
                                                        <div class="flex items-center justify-end py-4 px-6 space-x-2 border-t border-gray-200 rounded-b ">
                                                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 " data-hs-overlay="#hs-scale-animation-modal">
                                                                Close
                                                            </button>
                                                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                                                Save changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </div>
                                        <!-- Thumbnail Images -->
                                        <div class="flex flex-col ms-4 space-y-2">
                                            <img src="images/1.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/2.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/3.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/4.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                            <img src="images/5.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                                        </div>
                                    </div>
                                    <!-- Product Details -->
                                    <div class="mt-12">
                                        <h1 class="text-2xl font-bold text-gray-800">Seeds Of Change Organic Quinoa, Brown</h1>
                                        <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus?</p>
                                        <div class="flex items-between justify-between">
                                            <div class="flex items-center mt-4">
                                                <span class="text-green-500 text-2xl font-bold">$120.25</span>
                                                <span class="text-gray-500 line-through ml-4">$123.25</span>
                                            </div>
                                            <!-- Quantity Selector -->
                                            <div class="flex items-center mt-4">
                                                <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                                                <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2">
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
                                        <!-- Action Buttons -->
                                        <div class="flex space-x-4 mt-6">
                                            <button class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                                            <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                                            <button type="button"  data-hs-overlay="#hs-scale-animation-modal" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">View</button>
                                        </div>
                                    </div>
                                </div>
                                        </div>
                                        <!-- Action Buttons -->
                                        <div class="flex space-x-4 mt-6">
                                            <button class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                                            <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                                            <button type="button"  data-hs-overlay="#hs-scale-animation-modal" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">View</button>
                                        </div>
                                    </div>
                                </div>







                                </div>
                                <div class="flex items-center justify-end py-4 px-6 space-x-2 border-t border-gray-200 rounded-b ">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 " data-hs-overlay="#hs-scale-animation-modal">
                                        Close
                                    </button>
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
                <!-- Thumbnail Images -->
                <div class="flex flex-col ms-4 space-y-2">
                    <img src="images/1.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/2.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/3.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/4.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                    <img src="images/5.jpg" alt="Thumbnail" class="w-16 h-16 object-cover border rounded-lg cursor-pointer" onclick="updateMainImage(this)">
                </div>
            </div>
            <!-- Product Details -->
            <div class="mt-12">
                <h1 class="text-2xl font-bold text-gray-800">Seeds Of Change Organic Quinoa, Brown</h1>
                <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error doloribus saepe natus?</p>
                <div class="flex items-between justify-between">
                    <div class="flex items-center mt-4">
                        <span class="text-green-500 text-2xl font-bold">$120.25</span>
                        <span class="text-gray-500 line-through ml-4">$123.25</span>
                    </div>
                    <!-- Quantity Selector -->
                    <div class="flex items-center mt-4">
                        <button class="px-4 py-2 border rounded-l-lg" onclick="decreaseQuantity()">-</button>
                        <input id="quantity-input" type="text" value="1" class="w-12 text-center border-t border-b focus:outline-none py-2">
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
                <!-- Action Buttons -->
                <div class="flex space-x-4 mt-6">
                    <button class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                    <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                    <button type="button"  data-hs-overlay="#hs-scale-animation-modal" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">View</button>
                </div>
            </div>
        </div>
                </div>
                <!-- Action Buttons -->
                <div class="flex space-x-4 mt-6">
                    <button class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                    <button class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                    <button type="button"  data-hs-overlay="#hs-scale-animation-modal" class="px-6 py-3 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">View</button>
                </div>
            </div>
        </div>
        
    </div>
</section>