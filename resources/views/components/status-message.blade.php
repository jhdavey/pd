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

@if (session('status'))
<div id="status-message" class="alert alert-success">
    {{ session('status') }}
</div>
@endif