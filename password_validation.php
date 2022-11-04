<?php
function checkPassword($password) {
    if (strlen($password) < 6) {
        return true;
    }
    return false;
}