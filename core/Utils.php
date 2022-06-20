<?php
/**class Cookie*/

namespace app\core;

function encrypt(string $input): string{
    /**
     * encrypts input with sha256 algorithm
     * @param string $input - input to hash
     * @return string
     */
    return hash('sha256', $input);
}