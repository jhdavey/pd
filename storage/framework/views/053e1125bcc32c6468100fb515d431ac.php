<!-- Display status message for 5 seconds when build is updated -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusMessage = document.getElementById('status-message');
        if (statusMessage) {
            setTimeout(function() {
                statusMessage.style.display = 'none';
            }, 5000); // Adjust the duration here (5000 milliseconds = 5 seconds)
        }
    });
</script>

<?php if(session('status')): ?>
<div id="status-message" class="alert alert-success">
    <?php echo e(session('status')); ?>

</div>
<?php endif; ?><?php /**PATH C:\Users\jhdav\OneDrive\coding\php\pd\resources\views/components/status-message.blade.php ENDPATH**/ ?>