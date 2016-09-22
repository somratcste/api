<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Note;
use Illuminate\Foundation\Http\response;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes->toArray());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
    	Note::create($request->all());
    	return response()->json(['success' => 'Note Created Successfully']);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }


}
