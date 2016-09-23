<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Note;
use Illuminate\Foundation\Http\response;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class NoteController extends Controller
{
    // public function __construct()
    // {
    //     $this->beforeFilter('@find' , ['only' => ['show','update','destroy']]);
    // }
    
    // public function __construct()
    // {
    //     $this->middleware('web' , ['only' => ['show','update','destroy']]);
    // }

    public function find(Route $route)
    {
        $this->note = Note::find($route->getParameter('notes'));
    }

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
        return response()->json($this->note);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $this->note->fill($request->all());
        $this->note->save();
        return response()->json(['message' => 'Note Updated']);
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return response()->json(['message' => 'Note Deleted']);
    }


}
