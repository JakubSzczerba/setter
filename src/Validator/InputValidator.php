<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Validator;

class InputValidator
{
    public function validate(array $data): bool
    {
        if (!isset($data['first'], $data['second']) || count($data) !== 2) {
            return false;
        } else {
            if (!is_int($data['first'])) {
                return false;
            }

            if (!is_int($data['second'])) {
                return false;
            }
        }

        return true;
    }

}