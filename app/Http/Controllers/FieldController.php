<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
 
    }
 
    public function index()
    {
        dd('index hello');
        //
    }
 
    public function create()
    {
        if (view()->exists('fields.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('fields.create', $compact);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        dd('asdas');
        //
    }

 
    public function edit(string $id)
    {
        dd('das');
        //
    }
 
    public function update(Request $request, string $id)
    {
        //
    }
 
    public function destroy(string $id)
    {
        //
    }
}
