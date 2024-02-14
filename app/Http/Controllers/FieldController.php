<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class FieldController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX     = 'fields';        
        $this->TRANS            = 'field';
        $this->Tbl              = 'fields';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('index hello');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Display the specified resource.
     */
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
