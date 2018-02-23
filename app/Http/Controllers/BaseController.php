<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $_request;
    public function __construct(Request $request)
    {
        $this->_request = $request;
    }
}