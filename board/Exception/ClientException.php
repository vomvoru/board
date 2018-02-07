<?php
namespace App\Exception;

use Exception;
use RuntimeException;

class ClientException extends RuntimeException{
    protected $userMessage;
    public function __construct($userMessage, $message)
    {
        $this->userMessage = $userMessage;
        parent::__construct($message);
    }
}