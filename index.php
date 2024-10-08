<?php 
    include 'header.php';  
    include 'function/products_auth.php';
    include 'function/order_auth.php';
    $allProducts = productsView();
    
    if(mysqli_num_rows($allProducts)>0){
       
        while ($row = mysqli_fetch_assoc( $allProducts ) ) {
            $rows[] = [
                'id' => $row['id'], 
                'image'=> $row['image'],
                'name'=> $row['title'], 
                'base_price'=> $row['price'], 
                'old_price'=> $row['oldPrice'], 
                'quantity'=> 1, 
                'description'=> $row['description'], 
            ];
        }
    }
    if(isset($_POST['place_order'])){
        $old = $_POST;
        $result = orders();
        if($result['status'] == 'error') {
            $error = $result['message'];
        } else {
            $successMessage = $result['message']; // Store the success message here
        }
    }
    
?>
    <main>
        <?php include 'slider.php'; ?> 
        <?php include 'product.php'; ?> 
        <?php include 'cart.php'; ?> 
    </main>
    <footer>
        <?php include 'footer.php'; ?> 
    </footer>

    <!-- Modal Structure -->
    <div x-show="showSuccessModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md flex flex-col justify-center items-center">
            <?php 
            // Display the success message in the modal if available
            if (!empty($successMessage)) {
                echo $successMessage;
            } 
            ?>
            <a href="<?php echo $baseurl?>" class="mt-4 bg-black text-white py-2 px-4 rounded" @click="showSuccessModal = false">Close</a>
        </div>
    </div>
    <!-- Product Container -->
    
    <script src="node_modules/preline/dist/preline.js"></script>
    <!-- this is latest script which is skipped for testing . if my new script is failue then it will be repleaced -->
    <script>
        function cartComponent() {
            return {
                products: <?php echo json_encode($rows); ?>,
                showSuccessModal: <?php echo !empty($successMessage) ? 'true' : 'false'; ?>,
                showModal: false, 
                selectedProduct: {},
                cart: [],
                selectedShipping: 0,
                showCheckout: false,
                addToCart(product) {
                    if(product){
                        const index = this.cart.findIndex(item => item.id === product.id);
                        if (index === -1) {
                            this.cart.push({ ...product });
                        } else {
                            this.cart[index].quantity += product.quantity;
                        }
                    }
                    
                },
                removeFromCart(index) {
                    this.cart.splice(index, 1);
                },
                increaseQuantity(index) {
                    this.cart[index].quantity++;
                },
                decreaseQuantity(index) {
                    if (this.cart[index].quantity > 1) {
                        this.cart[index].quantity--;
                    }
                },
                get subtotal() {
                    return this.cart.reduce((sum, item) => sum + item.base_price * item.quantity, 0);
                },
                get total() {
                    return this.subtotal;
                },
                checkout() {
                    this.showCheckout = true;
                },
            }
        }
    </script> 
    
</body>
</html>
