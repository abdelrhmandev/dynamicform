<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\Region;
use App\Models\Field;
use App\Models\FormField;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormDRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormDUpdateRequest;

class FieldController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
 
    }
 
    public function index()
    {
        return view('fields.index');
        //
    }
 
    public function create()
    {
    
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
