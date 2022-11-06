<?php
include_once 'empty_input_validation.php';
function checkEmail($email) {
    if (!strpos($email, '@')) {
        return true;
    } else {
        if (!strpos($email, '.')) {
            return true;
        } else {
            $explodingAtAtTheRateOf = explode('@', $email);
            foreach ($explodingAtAtTheRateOf as $string)
            {
                if (checkInput($string)) {
                    return true;
                } else {
                    $explodingAtdot = explode('.', $email);
                    foreach ($explodingAtdot as $string)
                    {
                        if (checkInput($string)) {
                            return true;
                        } else {
                            if (substr($email, 1) == '@' && substr($email, 1) == '.' && substr($email, -1) == '@' &&substr($email, -1) == '.') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                }
            }
        }
    }
}
