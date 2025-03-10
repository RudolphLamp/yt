<?php
function validateUrl($url) {
    return filter_var($url, FILTER_VALIDATE_URL) && strpos($url, 'youtube.com') !== false;
}

function sanitizeFileName($filename) {
    return preg_replace('/[^A-Za-z0-9_\-]/', '_', $filename);
}

function logError($message) {
    error_log($message, 3, 'error_log.txt');
}

function createDirectory($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

function deleteFile($filePath) {
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}
?>