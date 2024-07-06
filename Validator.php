<?php

class Validator {
    /**
     * checks if input is blank and is above $max characters
     */
    public static function stringInputChecker($input, $max = INF) {
        return empty($input) || strlen($input) >= $max;
    }
}