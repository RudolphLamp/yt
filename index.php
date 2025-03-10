<?php
include 'includes/header.php';
?>

<div class="container">
    <h1>YouTube Video Downloader</h1>
    <p>Enter the URL of the YouTube video you want to download as MP3 or WAV:</p>
    <form id="downloadForm" method="POST" action="php/download.php">
        <input type="text" name="video_url" placeholder="YouTube Video URL" required>
        <select name="format" required>
            <option value="mp3">MP3</option>
            <option value="wav">WAV</option>
        </select>
        <button type="submit">Download</button>
    </form>
</div>

<?php
include 'includes/footer.php';
?>