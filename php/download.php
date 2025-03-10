<?php
if (isset($_POST['url']) && isset($_POST['format'])) {
    $url = $_POST['url'];
    $format = $_POST['format'];

    // Validate URL and format
    if (filter_var($url, FILTER_VALIDATE_URL) && in_array($format, ['mp3', 'wav'])) {
        // Include necessary functions
        include_once 'functions.php';

        // Download the video and convert it
        $videoFile = downloadVideo($url);
        if ($videoFile) {
            $audioFile = convertToAudio($videoFile, $format);
            if ($audioFile) {
                // Initiate download
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($audioFile) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($audioFile));
                readfile($audioFile);
                exit;
            } else {
                echo "Error converting video to audio.";
            }
        } else {
            echo "Error downloading video.";
        }
    } else {
        echo "Invalid URL or format.";
    }
} else {
    echo "No URL or format specified.";
}
?>