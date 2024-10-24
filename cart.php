<section class="container mx-auto my-12">
    <!-- Breadcrumb -->
    <div class="bg-green-100 py-4 px-6">
        <h1 class="text-2xl font-bold">My Carts</h1>
    </div>
     <!-- Cart Section -->
    <div class="mt-4 bg-gray-100 p-6 rounded-lg" @add-to-cart.window="addToCart($event.detail.product)">
        <template x-if="cart.length > 0">
            <div class="overflow-x-auto">
                <table class="min-w-full text-center">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 ">SL No</th>
                            <th class="py-2 ">Image</th>
                            <th class="py-2 ">PRODUCT NAME</th>
                            <th class="py-2 ">PRICE</th>
                            <th class="py-2 ">QUANTITY</th>
                            <th class="py-2 ">TOTAL</th>
                            <th class="py-2 ">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(item, index) in cart" :key="index">
                            <tr class="border-b">
                                <td class="py-2">
                                    <p x-text="index + 1" class=""></p>
                                </td>
                                <td class="py-2">
                                    <img :src="item.image" alt="" class="h-12 w-12">
                                </td>
                                <td class="py-2">
                                    <h3 x-text="item.name" class=""></h3>
                                </td>
                                <td class="py-2">
                                    <p x-text="'$' + (item.base_price).toFixed(2)" class="text-gray-600"></p>
                                </td>
                                <td class="py-2">
                                    <div class="flex items-center justify-center">
                                        <button class="px-3 py-1 bg-gray-200 rounded-lg" @click="decreaseQuantity(index)">-</button>
                                        <input type="text" x-model.number="item.quantity" readonly class="w-12 text-center border mx-2 py-1 bg-transparent">
                                        <button class="px-3 py-1 bg-gray-200 rounded-lg" @click="increaseQuantity(index)">+</button>
                                    </div>
                                </td>
                                <td class="py-2">
                                    <p x-text="'$' + (item.base_price * item.quantity).toFixed(2)" class="text-gray-600"></p>
                                </td>
                                <td class="py-2">
                                    <button @click="removeFromCart(index)" class="px-4 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">Remove</button>
                                </td>
                            </tr>
                        </template>
                            <tr class="border-b">
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2 ">
                                    <p class="text-xl font-semibold text-end">Subtotal</p>
                                </td>
                                <td class="py-2">
                                <p class="text-xl font-semibold" x-text="'$' + subtotal.toFixed(2)"></p>
                                </td>
                                <td class="py-2">
                                    
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    <p class="text-xl font-semibold text-end">Total</p>
                                </td>
                                <td class="py-2">
                                    <p class="text-xl font-semibold" x-text="'$' + total.toFixed(2)"> </p>
                                </td>
                                <td class="py-2">
                                    
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2">
                                    
                                </td>
                                <td class="py-2 ">
                                    
                                </td>
                                <td class="py-2 flex items-center justify-center gap-x-2">
                                    <a href="#continue_shopping" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">Continue Shopping</a>
                                    <button @click="checkout()" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">Check Out</button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </template>
        <template x-if="cart.length === 0">
            <p class="text-gray-600 text-xl">Your cart is empty now.</p>
        </template>
    </div>
</section>

<div class="container mx-auto" >
    <!-- Billing & Delivery Information Section -->
    <div x-show="showCheckout" class="my-12 ">
        <!-- Breadcrumb -->
        <div class="bg-green-100 py-4 px-6 rounded-lg">
            <h1 class="text-2xl font-bold">Billing & Delivery Information</h1>
        </div>
        <form method="POST"  x-data="{ 
            selectedShipping: 0, 
            billing: { firstName: '', lastName: '', address: '', city: '', postCode: '', phone: '', country: '' },
            paymentMethod: '' ,
            get totalAmount() { 
                return (this.total + parseFloat(this.selectedShipping)).toFixed(2); 
            },
            get productJSON() {
                return JSON.stringify(this.cart.map(item => ({
                    name: item.name,
                    price: (item.base_price * item.quantity).toFixed(2),
                    quantity: item.quantity
                })));
            },
        }">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                <!-- Summary Section -->
                <div class="lg:col-span-1">
                    <!-- Delivery Method -->
                    <div class="border rounded-lg p-4 bg-white mb-6">
                        <h3 class="text-lg font-bold mb-4">Delivery Method</h3>
                        <label class="flex items-center mb-2">
                            <input type="radio" name="shipping" value="0" x-model="selectedShipping" class="form-radio text-green-500">
                            <span class="ml-2">Free Shipping - $0.00</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="shipping" value="5" x-model="selectedShipping" class="form-radio text-green-500">
                            <span class="ml-2">Flat Rate - $5.00</span>
                        </label>
                    </div>
                    <!-- Summary, Delivery Method and Products Details -->
                    <div class="border rounded-lg p-4 bg-white min-h-96">
                        <h2 class="text-xl font-bold mb-4">Summary</h2>
                        <ul class="space-y-2">
                            <li class="flex justify-between">
                                <span>Sub Total</span>
                                <span x-text="'$' + total.toFixed(2)"></span>
                            </li>
                            <li class="flex justify-between">
                                <span>Delivery Charges</span>
                                <span x-text="'$' + selectedShipping"></span>
                            </li>
                            <li class="flex justify-between font-bold">
                                <span>Total Amount</span>
                                <span x-text="'$' + totalAmount"></span>
                            </li>
                            <input type="hidden" name="total_amount" :value="totalAmount">
                        </ul>
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold mb-2">Products</h3>
                            <template x-for="item in cart" :key="item.id"> 
                                <div class="flex justify-between items-center mb-2">
                                    <img :src="item.image" alt="" class="w-12 h-12 rounded">
                                    <div class="flex-1 ml-4">
                                        <p x-text="item.name"></p>
                                        <p x-text="'Price: $' + (item.base_price * item.quantity).toFixed(2)" class="text-green-500 font-semibold"></p>
                                        <p x-text="'Quantity: '+item.quantity"></p>
                                        <!-- Hidden inputs to submit product data -->
                                        <input type="hidden" name="product_info" :value="productJSON">
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <!-- Billing Details -->
                <div class="lg:col-span-2">
                    <div class="border rounded-lg p-4 bg-white">
                        <h2 class="text-xl font-bold mb-4">Billing Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first-name" class="block font-semibold mb-2">First Name*</label>
                                <input type="text" id="first-name" name="firstName" x-model="billing.firstName" class="w-full border rounded-lg p-2" placeholder="Enter your first name" required>
                            </div>
                            <div>
                                <label for="last-name" class="block font-semibold mb-2">Last Name*</label>
                                <input type="text" id="last-name" name="lastName" x-model="billing.lastName" class="w-full border rounded-lg p-2" placeholder="Enter your last name" required>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="block font-semibold mb-2">Address</label>
                                <input type="text" id="address" name="address" x-model="billing.address" class="w-full border rounded-lg p-2" placeholder="Address Line 1">
                            </div>
                            <div>
                                <label for="city" class="block font-semibold mb-2">City*</label>
                                <input type="text" id="city" name="city" x-model="billing.city" class="w-full border rounded-lg p-2" placeholder="City" required>
                            </div>
                            <div>
                                <label for="postcode" class="block font-semibold mb-2">Post Code</label>
                                <input type="text" id="postcode" name="postCode" x-model="billing.postCode" class="w-full border rounded-lg p-2" placeholder="Post Code">
                            </div>
                            <div>
                                <label for="country" class="block font-semibold mb-2">Country*</label>
                                <select id="country" x-model="billing.country" name="country" class="w-full border rounded-lg p-2" required>
                                    <option value="">Select Country</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Bhutan">Bhutan</option>
                                </select>
                            </div>
                            <div>
                            <label for="phone" class="block font-semibold mb-2">Phone Number</label>
                            <input type="text" id="phone" name="phone" x-model="billing.phone" class="w-full border rounded-lg p-2" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                    <!-- Payment Method Section (Full Width) -->
                    <div class="mt-6 border rounded-lg p-4 bg-white">
                        <h3 class="text-lg font-bold mb-4">Payment Method</h3>
                        <div class="flex flex-wrap gap-4 items-center">
                            <label class="flex items-center">
                                <input type="radio" name="payment" value="Cash On Delivery" x-model="paymentMethod" class="form-radio text-green-500">
                                <span class="ml-2">Cash On Delivery</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment" value="Bkash" x-model="paymentMethod" class="form-radio text-green-500">
                                <span class="ml-2"><img src="images/bkash.png" alt="UPI" class="w-full h-8"></span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment" value="Nagad" x-model="paymentMethod" class="form-radio text-green-500">
                                <span class="ml-2"><img src="images/nagad.png" alt="Bank" class="w-full h-8"></span>
                            </label>
                        </div>
                    </div>
                    <!-- Place Order Button -->
                    <button type="submit" name="place_order" class="mt-6 w-full bg-green-500 text-white py-2 rounded-lg shadow-lg hover:bg-green-600">Place Order</button>
                </div>
            </div>
        </form>

    </div>
    
</div>



