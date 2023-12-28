<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\Functions; 

/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    use Functions;
        public function UpdateStatus(Request $request){               
        return $this->dataTableUpdateStatus($request);
    }

}
