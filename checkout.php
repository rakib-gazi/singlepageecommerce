<div class="container mx-auto p-6">
    <!-- Breadcrumb -->
    <div class="bg-green-100 py-4 px-6">
        <h1 class="text-2xl font-bold">Billing & Delivery Information</h1>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <!-- Summary Section -->
        <div class="lg:col-span-1">
            <!-- Summary, Delivery Method and Products Details -->
            <div class="border rounded-lg p-4 bg-white">
                <h2 class="text-xl font-bold mb-4">Summary</h2>
                <ul class="space-y-2">
                    <li class="flex justify-between">
                        <span>Sub Total</span>
                        <span>$80.00</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Delivery Charges</span>
                        <span>$80.00</span>
                    </li>
                    <li class="flex justify-between font-bold">
                        <span>Total Amount</span>
                        <span>$160.00</span>
                    </li>
                </ul>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-2">Products</h3>
                    <div class="flex justify-between items-center mb-2">
                        <img src="images/3.jpg" alt="Dates" class="w-12 h-12 rounded">
                        <div class="flex-1 ml-4">
                            <p>Dates Value Pack Pouch</p>
                            <p class="text-green-500 font-bold">$120.25</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <img src="images/6.jpg" alt="Nuts" class="w-12 h-12 rounded">
                        <div class="flex-1 ml-4">
                            <p>Smoked Honey Spiced Nuts</p>
                            <p class="text-green-500 font-bold">$120.25</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Delivery Method -->
            <div class="border rounded-lg p-4 bg-white mt-6">
                <h3 class="text-lg font-bold mb-4">Delivery Method</h3>
                <label class="flex items-center mb-2">
                    <input type="radio" name="delivery" value="free" class="form-radio text-green-500">
                    <span class="ml-2">Free Shipping - $0.00</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="delivery" value="flat" class="form-radio text-green-500">
                    <span class="ml-2">Flat Rate - $5.00</span>
                </label>
            </div>
        </div>

        <!-- Billing Details -->
        <div class="lg:col-span-2">
            <div class="border rounded-lg p-4 bg-white">
                <h2 class="text-xl font-bold mb-4">Billing Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="first-name" class="block font-semibold mb-2">First Name*</label>
                        <input type="text" id="first-name" class="w-full border rounded-lg p-2" placeholder="Enter your first name">
                    </div>
                    <div>
                        <label for="last-name" class="block font-semibold mb-2">Last Name*</label>
                        <input type="text" id="last-name" class="w-full border rounded-lg p-2" placeholder="Enter your last name">
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="block font-semibold mb-2">Address</label>
                        <input type="text" id="address" class="w-full border rounded-lg p-2" placeholder="Address Line 1">
                    </div>
                    <div>
                        <label for="city" class="block font-semibold mb-2">City*</label>
                        <input type="text" id="city" class="w-full border rounded-lg p-2" placeholder="City">
                    </div>
                    <div>
                        <label for="postcode" class="block font-semibold mb-2">Post Code</label>
                        <input type="text" id="postcode" class="w-full border rounded-lg p-2" placeholder="Post Code">
                    </div>
                    <div>
                        <label for="country" class="block font-semibold mb-2">Country*</label>
                        <select id="country" class="w-full border rounded-lg p-2">
                            <option>Select Country</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                    <div>
                        <label for="state" class="block font-semibold mb-2">Region/State*</label>
                        <select id="state" class="w-full border rounded-lg p-2">
                            <option>Select State</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
            </div>

            <!-- Payment Method Section (Full Width) -->
            <div class="mt-6 border rounded-lg p-4 bg-white">
                <h3 class="text-lg font-bold mb-4">Payment Method</h3>
                <div class="flex flex-wrap gap-4 items-center">
                    <label class="flex items-center">
                        <input type="radio" name="payment" value="cod" class="form-radio text-green-500">
                        <span class="ml-2">Cash On Delivery</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="payment" value="upi" class="form-radio text-green-500">
                        <span class="ml-2"><img src="images/bkash.png" alt="Visa" class="w-full h-8"></span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="payment" value="bank" class="form-radio text-green-500">
                        <span class="ml-2"><img src="images/nagad.png" alt="PayPal" class="w-full h-8"></span>
                    </label>
                </div>
            </div>

            <!-- Place Order Button -->
            <button class="mt-6 w-full bg-green-500 text-white py-2 rounded-lg shadow-lg hover:bg-green-600">Place Order</button>
        </div>
    </div>
</div>
