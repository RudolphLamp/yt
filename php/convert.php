<?php
if (isset($_POST['video_url']) && isset($_POST['format'])) {
    $videoUrl = $_POST['video_url'];
    $format = $_POST['format'];

    // Validate the video URL and format
    if (filter_var($videoUrl, FILTER_VALIDATE_URL) && in_array($format, ['mp3', 'wav'])) {
        // Define the command to convert the video to audio
        $outputFile = 'downloads/audio.' . $format;
        $command = "youtube-dl -x --audio-format $format $videoUrl -o $outputFile";

        // Execute the command
        exec($command, $output, $returnVar);

        // Check if the conversion was successful
        if ($returnVar === 0) {
            echo json_encode(['success' => true, 'file' => $outputFile]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Conversion failed.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid URL or format.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No video URL or format specified.']);
}
?>
