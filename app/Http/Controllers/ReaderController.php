<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReaderRequest;
use App\Http\Requests\UpdateReaderRequest;
use App\Models\Reader;

use Inertia\Inertia;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readers = Reader::all();
        return Inertia::render('Reader/Index',compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Reader/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReaderRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        Reader::create($input);
        
        return redirect()->route('readers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reader $reader)
    {
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reader $reader)
    {
        $this->authorize('update_and_delete', $reader);
        return Inertia::render('Reader/Edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReaderRequest $request, Reader $reader)
    {
        $this->authorize('update_and_delete', $reader);
        $input = $request->all();        
        $reader->update($input);
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reader $reader)
    {
        $this->authorize('update_and_delete', $reader);
        $reader->delete();
        return redirect()->route('readers.index');
    }
}
