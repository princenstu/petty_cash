<?php

class FormValidationHelper
{
    public static function getValue($name)
    {
        $personIndex = (int) $_SESSION['person_index'];
        return (!empty($_SESSION['persons'][$personIndex][$name])) ? $_SESSION['persons'][$personIndex][$name] : '';
    }

    public static function getBillingValue($name)
    {
        return (!empty($_SESSION['billing'][$name])) ? $_SESSION['billing'][$name] : '';
    }
}