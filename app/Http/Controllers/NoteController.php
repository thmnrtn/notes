<?php namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{

    /**
     * View all of the notes
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('notes/index', ['data' => Note::all()]);
    }

    /**
     * Create a note
     * @param Request $request
     */
    public function store(Request $request)
    {
        // TODO
    }

    /**
     * Update a note
     * @param Request $request
     */
    public function update(Request $request)
    {
        // TODO
    }

    /**
     * Delete a note
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        // TODO
    }
}
