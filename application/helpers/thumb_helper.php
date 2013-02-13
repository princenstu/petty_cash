<?php

class ThumbHelper
{
    public static function getThumb($filename)
    {
        return substr($filename, 0, strpos($filename, '.')) . '_thumb' . substr($filename, strpos($filename, '.'));
    }
}