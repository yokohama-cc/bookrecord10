<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadingRecordRequest;
use App\Http\Requests\UpdateReadingRecordRequest;
use App\Models\ReadingRecord;
use App\Models\Team;

use Inertia\Inertia;

class ReadingRecordController extends Controller
{
    public function search(StoreReadingRecordRequest $request)
    {
        //$page = $request->session()->pull('page');
        $team_id = $request->input('team_id');
        $teams = Team::pluck('name','id');
        $param = $request->input('param');
        $key = '%'.$param.'%';
        $readers_id = MemberShip::where('team_id',$team_id)->pluck('user_id');
        $books_id = Book::where('name','like',$key)->pluck('id');
        $reading_records = ReadingRecord::whereIn('book_id',$books_id)->whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        
        return Inertia::render('ReadingRecord/Index',,compact('reading_records','departments','team_id'));
    }
    
    public function searchbyreader(StoreReadingRecordRequest $request)
    {
        $page = $request->session()->pull('page');
        $departments = Department::pluck('name','id');
        $team_id = Auth::user()->reader->team_id;
        $param = $request->input('paramreader');
        $key = '%'.$param.'%';
        $readers_id = Reader::where('name','like',$key)->pluck('id');
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        
        return view('reading_records.index',compact('reading_records','departments','team_id'));
    }
    
    public function booklist(StoreReadingRecordRequest $request, $book_id)
    {
        $departments = Department::pluck('name','id');
        $team_id = Auth::user()->reader->team_id;
        $page = $request->session()->pull('page');
        $reading_records = ReadingRecord::where('book_id',$book_id)->paginate(10,array('*'),'page',$page);
        return view('reading_records.index',compact('reading_records','departments','team_id'));
    }
    
    public function readerlist(StoreReadingRecordRequest $request)
    {
        //$reader_id = Auth::user()->reader->id;
        $departments = Department::pluck('name','id');
        $team_id = Auth::user()->reader->team_id;
        $page = $request->session()->pull('page');
        $readers_id = Reader::where('team_id',$team_id)->pluck('id');
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        return view('reading_records.index',compact('reading_records','departments','team_id'));
    }
 
    public function add($book_id)
    {
        $book = Book::find($book_id);
        $reader = Reader::find(Auth::user()->reader->id);
        return view('reading_records.add',compact('book','reader'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reading_records = ReadingRecord::with('reader')->with('book')->get();
        return Inertia::render('ReadingRecord/Index',compact('reading_records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::pluck('name','id');
        $readers = Reader::pluck('name','id');
        return view('reading_records.form',compact('books','readers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReadingRecordRequest $request)
    {
        $reading_record = $request->all();
        ReadingRecord::create($reading_record);
        //$url = 'reading_records/readerlist/'.$reading_record['reader_id'];
        return redirect('reading_records/readerlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReadingRecord $readingRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReadingRecord $readingRecord)
    {
        $this->authorize('update_and_delete', $reading_record);
        //$books = Book::pluck('name','id');
        //$readers = Reader::pluck('name','id');
        $book = Book::find($reading_record->book_id);
        $reader = Reader::find(Auth::user()->reader->id);        
        return view('reading_records.add',compact('reading_record','book','reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReadingRecordRequest $request, ReadingRecord $readingRecord)
    {
        $this->authorize('update_and_delete', $reading_record);
        $input = $request->all();
        
        $reading_record->update($input);
        //$url = 'reading_records/readerlist/'.$reading_record['reader_id'];
        return redirect('reading_records/readerlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReadingRecord $readingRecord)
    {
        $this->authorize('update_and_delete', $reading_record);
        $reading_record->delete();
        $page = $request->input('page');
        return redirect('reading_records/readerlist');
    }
}
