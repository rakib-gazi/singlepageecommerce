<footer></footer>
    <!-- <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result; // Set the image source to the file content
            };
            reader.readAsDataURL(event.target.files[0]); // Read the file as a data URL
        }
        function previewUpdateImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('updatePreview');
                output.src = reader.result; // Set the image source to the file content
            };
            reader.readAsDataURL(event.target.files[0]); // Read the file as a data URL
        }
    </script> -->
    <script>
        // Function for previewing the main form image
        function previewMainImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result; // Set the image source to the file content
            };
            reader.readAsDataURL(event.target.files[0]); // Read the file as a data URL
        }

    
        function previewUpdateImage(event, productId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('updatePreview-' + productId);
                output.src = reader.result; // Set the image source to the file content
            };
            reader.readAsDataURL(event.target.files[0]); // Read the file as a data URL
        }
    </script>

<script>
    // Get all buttons with the class "updateBtn" and attach event listeners dynamically
    document.querySelectorAll('.updateBtn').forEach(button => {
        button.addEventListener('click', function(event){
            event.preventDefault();
            const modalId = this.id.replace('update-', 'modal-'); // Extract modal ID
            const modal = document.getElementById(modalId).classList;
            modal.remove('hidden');
            modal.add('block');
        });
    });

    // Close modal when close button is clicked
    document.querySelectorAll('.closeModal').forEach(button => {
        button.addEventListener('click', function(event){
            event.preventDefault();
            const modalId = this.getAttribute('data-modal-id'); // Get the corresponding modal ID
            const modal = document.getElementById(modalId).classList;
            modal.remove('block');
            modal.add('hidden');
        });
    });
</script>

    
</body>
</html>