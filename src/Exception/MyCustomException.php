<?php
declare(strict_types=1);

namespace App\Exception;

use Cake\Http\Exception\HttpException;

class MyCustomException extends HttpException
{
    protected $_defaultCode = 403;
}
