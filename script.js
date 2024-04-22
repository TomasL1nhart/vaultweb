<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageContainer = document.getElementById('image-container');
        const fileInput = document.getElementById('file-input');

        imageContainer.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            // Handle the file input change event here, if needed
        });

        // Prevent the default behavior when dragging over the container
        imageContainer.addEventListener('dragover', function(event) {
            event.preventDefault();
        });

        // Handle the drop event on the container
        imageContainer.addEventListener('drop', function(event) {
            event.preventDefault();
            fileInput.files = event.dataTransfer.files;
        });
    });

    // Function to extract URL parameter
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Check if there is an error message in the URL parameters
    var errorMessage = getParameterByName('error');
    if (errorMessage) {
        // Display the error message at the top of the screen
        var errorMessageDiv = document.createElement('div');
        errorMessageDiv.style.position = 'fixed';
        errorMessageDiv.style.top = '0';
        errorMessageDiv.style.width = '100%';
        errorMessageDiv.style.backgroundColor = 'red';
        errorMessageDiv.style.color = 'white';
        errorMessageDiv.style.textAlign = 'center';
        errorMessageDiv.textContent = errorMessage;
        document.body.appendChild(errorMessageDiv);
        // Hide the error message after 3 seconds
        setTimeout(function() {
            errorMessageDiv.style.display = 'none';
        }, 3000);
    }
</script>
