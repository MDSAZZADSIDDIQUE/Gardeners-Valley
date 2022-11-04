<?php
function checkInput($input) {
    if (empty($input)) {
        return true;
    }
    return false;
}