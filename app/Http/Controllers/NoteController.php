<?php namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use App\Http\Requests\SaveNoteRequest;
use Inertia\Inertia;

class NoteController extends Controller
{

    /**
     * View all of the notes
     * @return \Inertia\Response
     */
    public function index()
    {
        $notes = Note::orderBy('updated_at', 'desc')->get();
        return Inertia::render('notes/index', ['data' => $notes]);
    }

    /**
     * Create a note
     * @param SaveNoteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveNoteRequest $request)
    {
        Note::create($request->all());
        return redirect()->back();
    }

    /**
     * Update a note
     * @param SaveNoteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveNoteRequest $request, $id)
    {
        $note = Note::find($id);
        $note->update($request->all());
        return redirect()->back();
    }

    /**
     * Delete a note
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->back();
    }
}
