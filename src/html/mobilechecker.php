<?php
function isMobileDevice() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileKeywords = ['Mobile', 'Android', 'iPhone', 'iPad', 'Windows Phone'];

    // Check if the user agent contains any of the mobile keywords
    foreach ($mobileKeywords as $keyword) {
        if (stripos($userAgent, $keyword) !== false) {
            return true;
        }
    }

    return false;
  }
?>