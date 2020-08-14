<?php


namespace Faed\Json;

use Throwable;
class RuntimeException extends \RuntimeException
{
    public $code;

    public function __construct($message = "", $code = 200, Throwable $previous = null)
    {
        $this->code = $code;

        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        return jsonData($this->getMessage());
    }
}
