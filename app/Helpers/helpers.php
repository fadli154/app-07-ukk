<?php

if (!function_exists("currencyPhoneToNumeric")) {
    function currencyPhoneToNumeric($number)
    {
        $number = preg_replace('/[^0-9]/', '', $number);

        return $number;
    }
}
