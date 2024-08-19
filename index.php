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
        function updateMainImage(element) {
            let mainImage = element.closest('.relative').querySelector('.rounded-lg.shadow-lg.w-full');
            mainImage.src = element.src;
        }

        function decreaseQuantity() {
            let quantityInput = document.getElementById('quantity-input');
            let currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }

        function increaseQuantity() {
            let quantityInput = document.getElementById('quantity-input');
            let currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
        }
    </script>
    <script>
        function updateMainImage(thumbnail) {
            const mainImage = document.getElementById('main-product-image');
            mainImage.src = thumbnail.src;
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
