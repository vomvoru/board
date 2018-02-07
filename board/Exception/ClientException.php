<?php
namespace App\Exception;

use Exception;
use RuntimeException;

class ClientException extends RuntimeException{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}