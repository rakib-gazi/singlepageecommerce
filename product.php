

<section class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="bg-green-100 py-4 px-6">
        <h1 class="text-2xl font-bold">My Products</h1>
    </div>
    <!-- Products -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-x-6 gap-y-12 mt-12" id="continue_shopping">
        <template x-for="product in products" :key="product.id">
            <div class="p-6 shadow-lg rounded-3xl">
                <div>
                    <img :src="product.image" alt="" class="">
                </div>
                <div>
                    <h1 x-text="product.name" class="text-xl font-bold text-gray-800"></h1>
                    <div class="flex items-center justify-start mt-4">
                        <span x-text="'$' + (product.base_price * product.quantity).toFixed(2)" class="text-green-500 text-2xl font-bold"></span>
                        <span x-text="product.old_price" class="text-gray-500 line-through ml-4"></span>
                    </div>
                    <div class="flex items-center justify-start mt-4 gap-x-4">
                        <p class="text-medium font-semibold py-0.5">Quantity:</p>
                        <div class="outline rounded-lg outline-1 outline-gray-500 flex items-center">
                            <button class="px-3 py-0.5" @click="product.quantity > 1 ? product.quantity-- : null">-</button>
                            <input type="text" x-model.number="product.quantity" readonly class="w-12 text-center border-r border-l border-gray-500 focus:outline-none py-0.5 bg-transparent">
                            <button class="px-3 py-0.5" @click="product.quantity++">+</button>
                        </div>
                    </div>
                    <p x-text="product.description" class="py-2"></p>
                    <div class="flex space-x-4 mt-6">
                        <button @click="$dispatch('add-to-cart', { product: product })" class="px-4 py-2 text-sm bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                        <button @click="$dispatch('add-to-cart', { product: product })" class="px-4 py-2 text-sm bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                        <button @click="selectedProduct = product; showModal = true" class="px-4 py-2 text-sm bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">view</button>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center" x-cloak>
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold" x-text="selectedProduct.name"></h2>
                <button @click="showModal = false" class="text-gray-500 hover:text-gray-800 ">&times;</button>
            </div>
            <img :src="selectedProduct.image" alt="" class="w-full h-48 object-cover rounded-lg mb-4">
            <div class="flex items-center justify-start mt-4">
                <span x-text="'$' + (selectedProduct.base_price * selectedProduct.quantity).toFixed(2)" class="text-green-500 text-2xl font-bold"></span>
                <span x-text="selectedProduct.old_price" class="text-gray-500 line-through ml-4"></span>
            </div>
            <div class="flex items-center justify-start mt-4 gap-x-4">
                <p class="text-medium font-semibold py-0.5">Quantity:</p>
                <div class="outline rounded-lg outline-1 outline-gray-500 flex items-center">
                    <button class="px-3 py-0.5" @click="selectedProduct.quantity > 1 ? selectedProduct.quantity-- : null">-</button>
                    <input type="text" x-model.number="selectedProduct.quantity" readonly class="w-12 text-center border-r border-l border-gray-500 focus:outline-none py-0.5 bg-transparent">
                    <button class="px-3 py-0.5" @click="selectedProduct.quantity++">+</button>
                </div>
            </div>
            <p class="text-gray-700 py-2" x-text="selectedProduct.description"></p>
            <div class="flex items-center justify-between">
                <button @click="$dispatch('add-to-cart', { product: selectedProduct }); showModal = false"  class="px-4 py-2 text-sm bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add To Cart</button>
                <button @click="$dispatch('add-to-cart', { product: selectedProduct }); showModal = false" class="px-4 py-2 text-sm bg-green-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Buy Now</button>
                <button @click="showModal = false" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">Close</button>
            </div>
        </div>
    </div>
</section>

