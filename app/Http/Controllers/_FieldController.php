<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class FieldController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX = 'fields';
        $this->TRANS = 'field';
        $this->Tbl = 'fields';
    }
    
    public function store(Request $request)
    { 
        dd('dasdas');
        
    }


    public function index(Request $request){
        dd('dasdas');
    }
    public function create(){
        if (view()->exists('fields.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('fields.create', $compact);
        }
    }
    public function edit()
    {
        
    }

     

 

    
    public function update()
    {

      
    }
    public function destroy()
    {
 
    }
}
