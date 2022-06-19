<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConstructionsController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('constructions.index')
            ->with('constructions', Auth::user()->constructions);
    }

    public function create()
    {
        return view('constructions.create');
    }

    public function store(Request $request)
    {
        Construction::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'type' => $request->type,
        ]);
        return to_route('constructions.index');
    }

    public function destroy(Construction $construction)
    {
        $construction->delete();

        return to_route('constructions.index');
    }
}
