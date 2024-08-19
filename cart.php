<section class="container mx-auto mt-12">
    <!-- Breadcrumb -->
    <div class="bg-green-100 py-4 px-6">
        <h1 class="text-2xl font-bold">My Cart</h1>
    </div>

    <!-- Cart Table -->
    <div class="px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="w-full bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Product</th>
                        <th class="py-3 px-6 text-center">Price</th>
                        <th class="py-3 px-6 text-center">Quantity</th>
                        <th class="py-3 px-6 text-center">Total</th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <!-- Cart Item -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100" data-id="1">
                        <td class="py-3 px-6 text-left flex items-center">
                            <img class="w-10 h-10 rounded-full mr-2" src="images/2.jpg" alt="Organic Lemon">
                            <span>Organic Lemon</span>
                        </td>
                        <td class="py-3 px-6 text-center">$56.00</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center items-center">
                                <button class="px-2 py-1 border" onclick="changeQuantity(this, -1)">-</button>
                                <input class="mx-2 w-10 text-center border" type="text" value="1" readonly>
                                <button class="px-2 py-1 border" onclick="changeQuantity(this, 1)">+</button>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">$<span class="item-total">56.00</span></td>
                        <td class="py-3 px-6 text-center">
                            <button class="text-gray-400 hover:text-red-600" onclick="removeItem(this)">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Repeat similar block for each cart item -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100" data-id="2">
                        <td class="py-3 px-6 text-left flex items-center">
                            <img class="w-10 h-10 rounded-full mr-2" src="images/4.jpg" alt="Apple Juice">
                            <span>Apple Juice</span>
                        </td>
                        <td class="py-3 px-6 text-center">$75.00</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center items-center">
                                <button class="px-2 py-1 border" onclick="changeQuantity(this, -1)">-</button>
                                <input class="mx-2 w-10 text-center border" type="text" value="1" readonly>
                                <button class="px-2 py-1 border" onclick="changeQuantity(this, 1)">+</button>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">$<span class="item-total">75.00</span></td>
                        <td class="py-3 px-6 text-center">
                            <button class="text-gray-400 hover:text-red-600" onclick="removeItem(this)">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Add other items similarly -->
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right py-3 px-6">Subtotal</td>
                        <td class="text-center py-3 px-6">$<span id="subtotal">0.00</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right py-3 px-6 font-bold">Total</td>
                        <td class="text-center py-3 px-6 font-bold">$<span id="total">0.00</span></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="flex justify-between items-center p-6">
                <a href="#" class="text-green-500 hover:underline">Continue Shopping</a>
                <button class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600">Check Out</button>
            </div>
        </div>
    </div>
</section>