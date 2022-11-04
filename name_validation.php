<?php
function checkName($name) {
    foreach (str_split($name) as $character) {
        if (is_numeric($character)) {
            return true;
        }
    }
    return false;
}