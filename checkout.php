<div class="container mx-auto" >
    <!-- Billing & Delivery Information Section -->
    <div x-show="showCheckout" class="my-12 ">
        <!-- Breadcrumb -->
        <div class="bg-green-100 py-4 px-6 rounded-lg">
            <h1 class="text-2xl font-bold">Billing & Delivery Information</h1>
        </div>
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
                            <span x-text="'$' + (total + parseFloat(selectedShipping)).toFixed(2)"></span>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold mb-2">Products</h3>
                        <template x-for="item in cart" :key="item.id"> 
                            <div class="flex justify-between items-center mb-2">
                                <img :src="item.image" alt="" class="w-12 h-12 rounded">
                                <div class="flex-1 ml-4">
                                    <p x-text="item.name"></p>
                                    <p x-text="'$' + item.base_price.toFixed(2)" class="text-green-500 font-bold"></p>
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
                            <input type="text" id="first-name" x-model="billing.firstName" class="w-full border rounded-lg p-2" placeholder="Enter your first name">
                        </div>
                        <div>
                            <label for="last-name" class="block font-semibold mb-2">Last Name*</label>
                            <input type="text" id="last-name" x-model="billing.lastName" class="w-full border rounded-lg p-2" placeholder="Enter your last name">
                        </div>
                        <div class="col-span-2">
                            <label for="address" class="block font-semibold mb-2">Address</label>
                            <input type="text" id="address" x-model="billing.address" class="w-full border rounded-lg p-2" placeholder="Address Line 1">
                        </div>
                        <div>
                            <label for="city" class="block font-semibold mb-2">City*</label>
                            <input type="text" id="city" x-model="billing.city" class="w-full border rounded-lg p-2" placeholder="City">
                        </div>
                        <div>
                            <label for="postcode" class="block font-semibold mb-2">Post Code</label>
                            <input type="text" id="postcode" x-model="billing.postCode" class="w-full border rounded-lg p-2" placeholder="Post Code">
                        </div>
                        <div>
                            <label for="country" class="block font-semibold mb-2">Country*</label>
                            <select id="country" x-model="billing.country" class="w-full border rounded-lg p-2">
                                <option>Select Country</option>
                                <option>Bangladesh</option>
                                <option>India</option>
                                <option>Nepal</option>
                                <option>Bhutan</option>
                            </select>
                        </div>
                        <div>
                            <label for="country" class="block font-semibold mb-2">Country*</label>
                            <select id="country" x-model="billing.country" class="w-full border rounded-lg p-2">
                                <option>Select Country</option>
                                <option>Bangladesh</option>
                                <option>India</option>
                                <option>Nepal</option>
                                <option>Bhutan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Payment Method Section (Full Width) -->
                <div class="mt-6 border rounded-lg p-4 bg-white">
                    <h3 class="text-lg font-bold mb-4">Payment Method</h3>
                    <div class="flex flex-wrap gap-4 items-center">
                        <label class="flex items-center">
                            <input type="radio" name="payment" value="cod" x-model="paymentMethod" class="form-radio text-green-500">
                            <span class="ml-2">Cash On Delivery</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="payment" value="upi" x-model="paymentMethod" class="form-radio text-green-500">
                            <span class="ml-2"><img src="images/bkash.png" alt="UPI" class="w-full h-8"></span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="payment" value="bank" x-model="paymentMethod" class="form-radio text-green-500">
                            <span class="ml-2"><img src="images/nagad.png" alt="Bank" class="w-full h-8"></span>
                        </label>
                    </div>
                </div>
                <!-- Place Order Button -->
                <button class="mt-6 w-full bg-green-500 text-white py-2 rounded-lg shadow-lg hover:bg-green-600" @click="generateInvoice()">Place Order</button>
            </div>
        </div>
    </div>
    <!-- Invoice Section (hidden initially) -->
    <div x-show="showInvoice" class="mt-12 p-6 bg-white border rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Invoice</h2>
        <p><strong>Date:</strong> <span x-text="new Date().toLocaleDateString()"></span></p>
        <p><strong>Time:</strong> <span x-text="new Date().toLocaleTimeString()"></span></p>

        <h3 class="mt-6 text-xl font-bold">Billing Information:</h3>
        <p><strong>Name:</strong> <span x-text="billing.firstName + ' ' + billing.lastName"></span></p>
        <p><strong>Address:</strong> <span x-text="billing.address"></span></p>
        <p><strong>City:</strong> <span x-text="billing.city"></span></p>
        <p><strong>Post Code:</strong> <span x-text="billing.postCode"></span></p>
        <p><strong>Country:</strong> <span x-text="billing.country"></span></p>

        <h3 class="mt-6 text-xl font-bold">Products:</h3>
        <ul>
            <template x-for="(item, index) in cart" :key="item.id">
                <li class="mb-2" x-text="(index + 1) + '. ' + item.name + ' - $' + item.base_price + ' x ' + item.quantity + ' = $' + (item.base_price * item.quantity).toFixed(2)"></li>
            </template>
        </ul>

        <p class="mt-4"><strong>Subtotal:</strong> <span x-text="'$' + subtotal.toFixed(2)"></span></p>
        <p><strong>Shipping:</strong> <span x-text="'$' + selectedShipping"></span></p>
        <p class="font-bold"><strong>Total:</strong> <span x-text="'$' + (total + parseFloat(selectedShipping)).toFixed(2)"></span></p>

        <h3 class="mt-6 text-xl font-bold">Payment Method:</h3>
        <p x-text="paymentMethod"></p>

        <button class="mt-6 w-full bg-green-500 text-white py-2 rounded-lg shadow-lg hover:bg-green-600" @click="downloadInvoice()">Download Invoice as PDF</button>
    </div>
</div>



