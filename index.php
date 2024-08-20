<?php include 'header.php'; ?>
    <main>
        <?php include 'slider.php'; ?> 
        <?php include 'product.php'; ?> 
        <?php include 'cart.php'; ?> 
        <?php include 'checkout.php'; ?> 
    </main>
    <footer>
        <?php include 'footer.php'; ?> 
    </footer>
    <!-- Product Container -->
    
    <script src="node_modules/preline/dist/preline.js"></script>
    <script>
        function addToCart(productId, productName, productPrice, productImage) {
            // Create a product object
            const product = {
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1
            };

            // Retrieve existing cart from local storage or initialize an empty array
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Check if product is already in the cart
            const existingProductIndex = cart.findIndex(item => item.id === productId);
            if (existingProductIndex !== -1) {
                // If product is already in the cart, increase the quantity
                cart[existingProductIndex].quantity += 1;
            } else {
                // If product is not in the cart, add it to the cart
                cart.push(product);
            }

            // Save the updated cart back to local storage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Update cart count (Assuming you have a cart count element)
            updateCartCount();
        }

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartCountElement = document.getElementById('cart-count');
            cartCountElement.innerText = cart.length;
        }

        // Ensure cart count is updated when the page loads
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
    <script>
        // Function to update the main product image
        // Function to update the main product image inside the modal
        function updateModalMainImage(thumb) {
            // Find the closest main image element within the modal
            var modalContainer = thumb.closest('.hs-overlay');
            var mainImage = modalContainer.querySelector('img[id^="modal-main-product-image-"]');
            
            // Check if the main image exists
            if (mainImage) {
                // Update the source of the main image with the source of the clicked thumbnail
                mainImage.src = thumb.src;
            } else {
                console.error("Main image element not found inside the modal.");
            }
        }

        // Function to increase quantity
        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity-input');
            var currentQuantity = parseInt(quantityInput.value);
            if (!isNaN(currentQuantity)) {
                quantityInput.value = currentQuantity + 1;
            }
        }

        // Function to decrease quantity
        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity-input');
            var currentQuantity = parseInt(quantityInput.value);
            if (!isNaN(currentQuantity) && currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }

        // Adding event listeners to all modal thumbnail images
        document.querySelectorAll('.modal-thumbnail').forEach(thumb => {
            thumb.addEventListener('click', function() {
                updateModalMainImage(this);
            });
        });

    </script>
    <script>
        function updateMainImage(thumb) {
            // Find the closest main image element within the same product container
            var productContainer = thumb.closest('.flex.items-center.relative');
            var mainImage = productContainer.querySelector('img[id^="main-product-image-"]');
            
            // Check if the main image exists
            if (mainImage) {
                // Update the source of the main image with the source of the clicked thumbnail
                mainImage.src = thumb.src;
            } else {
                console.error("Main image element not found.");
            }
        }

        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity-input');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity-input');
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
    <script>
        // Initialize the modal from Preline.js
        document.addEventListener('DOMContentLoaded', function () {
            window.hsOverlay = new HSOverlay({
                toggle: {
                    trigger: '[data-hs-overlay]'
                }
            });
        });
    </script>
    <script>
        function updateCart() {
            let subtotal = 0;
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const total = parseFloat(row.querySelector('.item-total').textContent);
                subtotal += total;
            });

            const total = subtotal; // Add taxes or discounts if needed
            document.getElementById('subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('total').textContent = total.toFixed(2);
        }

        function changeQuantity(button, change) {
            const row = button.closest('tr');
            const quantityInput = row.querySelector('input[type="text"]');
            let quantity = parseInt(quantityInput.value);
            quantity = Math.max(1, quantity + change);
            quantityInput.value = quantity;

            const price = parseFloat(row.cells[1].textContent.replace('$', ''));
            const totalCell = row.querySelector('.item-total');
            totalCell.textContent = (price * quantity).toFixed(2);

            updateCart();
        }

        function removeItem(button) {
            const row = button.closest('tr');
            row.remove();
            updateCart();
        }

        // Initialize the cart totals on page load
        updateCart();
    </script>

    <!-- checkout -->
     <script>
        // Update Subtotal and Total
        function updatePrices() {
            const productPrices = document.querySelectorAll('.product-price');
            let subtotal = 0;

            productPrices.forEach(price => {
                subtotal += parseFloat(price.textContent.replace('$', ''));
            });

            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('total').textContent = `$${(subtotal + 80).toFixed(2)}`; // Assuming $80 is delivery charge
        }

        // Increase Quantity
        function increaseQuantity(element) {
            const quantityInput = element.previousElementSibling;
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updatePrices();
        }

        // Decrease Quantity
        function decreaseQuantity(element) {
            const quantityInput = element.nextElementSibling;
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
            updatePrices();
        }

        // Add Event Listeners
        document.querySelectorAll('.increase-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                increaseQuantity(this);
            });
        });

        document.querySelectorAll('.decrease-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                decreaseQuantity(this);
            });
        });

        // Run on page load
        updatePrices();

     </script>

    
</body>
</html>
