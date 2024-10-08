<?php
// File: utils.php

function formatDateForInput($datetime) {
    if (!$datetime) {
        return '';
    }
    
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
    return $date ? $date->format('Y-m-d') : ''; // Chuyển thành định dạng 'Y-m-d' nếu có
}
?>
