// This file contains JavaScript functions specifically for handling the downloading process of YouTube videos, including event listeners and AJAX requests.

document.addEventListener('DOMContentLoaded', function() {
    const downloadForm = document.getElementById('download-form');
    const downloadButton = document.getElementById('download-button');
    const formatSelect = document.getElementById('format-select');
    const videoUrlInput = document.getElementById('video-url');

    downloadButton.addEventListener('click', function(event) {
        event.preventDefault();
        const videoUrl = videoUrlInput.value;
        const format = formatSelect.value;

        if (videoUrl === '') {
            alert('Please enter a valid YouTube video URL.');
            return;
        }

        downloadVideo(videoUrl, format);
    });

    function downloadVideo(url, format) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/download.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert('Download started! Check your downloads folder.');
                } else {
                    alert('Error: ' + response.message);
                }
            }
        };

        xhr.send('url=' + encodeURIComponent(url) + '&format=' + encodeURIComponent(format));
    }
});
