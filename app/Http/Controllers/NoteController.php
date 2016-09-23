<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Note;
use Illuminate\Foundation\Http\response;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

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
        $note = Note::find($id);
        return response()->json($note);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        $note->fill($request->all());
        $note->save();
        return response()->json(['message' => 'Note Updated']);
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return response()->json(['message' => 'Note Deleted']);
    }


}
