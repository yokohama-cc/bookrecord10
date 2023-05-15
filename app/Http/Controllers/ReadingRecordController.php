<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadingRecordRequest;
use App\Http\Requests\UpdateReadingRecordRequest;
use App\Models\ReadingRecord;
use App\Models\Team;
use App\Models\Membership;
use App\Models\Book;
use App\Models\Reader;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class ReadingRecordController extends Controller
{
    public function search(StoreReadingRecordRequest $request)
    {
        //$page = $request->session()->pull('page');
        $current_team_id = $request->input('team_id');
        $teams = Team::all();
        $param = $request->input('param');
        $key = '%'.$param.'%';
        $temp = Team::where('id',$current_team_id)->with('allUsers');
        //$temp = DB::table('team_user')->where('id',$team_id)->get();
        $users_id = $temp->pluck('user_id');
        $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        $books_id = Book::where('name','like',$key)->pluck('id');
        //$reading_records = ReadingRecord::whereIn('book_id',$books_id)->whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        $reading_records = ReadingRecord::whereIn('book_id',$books_id)->whereIn('reader_id',$readers_id)->with('book')->with('reader')->get();
        foreach ($reading_records as $reading_record) {
            $canUpdate = $this->authorize('update_and_delete', $reading_record);
            $reading_record->append(['canUpdate',$canUpdate]);
        }
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
    
    public function searchbyreader(StoreReadingRecordRequest $request)
    {
        $page = $request->session()->pull('page');
        $teams = Team::all();
        $current_team_id = Auth::user()->current_team_id;
        $param = $request->input('paramreader');
        $key = '%'.$param.'%';
        $temp = Team::where('id',$current_team_id)->with('allUsers');
        //$temp = DB::table('team_user')->where('id',$team_id)->get();
        $users_id = $temp->pluck('user_id');
        $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->with('book')->with('reader')->get();
        //$reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        foreach ($reading_records as $reading_record) {
            $canUpdate = $this->authorize('update_and_delete', $reading_record);
            $reading_record->append(['canUpdate',$canUpdate]);
        }
        
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
    
    public function booklist(StoreReadingRecordRequest $request, $book_id)
    {
        $teams = Team::all();
        $team_id = Auth::user()->current_team_id;
        $current_team_id = Team::where('id',$team_id)->get();
        $page = $request->session()->pull('page');
        $reading_records = ReadingRecord::where('book_id',$book_id)->paginate(10,array('*'),'page',$page);
        foreach ($reading_records as $reading_record) {
            $canUpdate = $this->authorize('update_and_delete', $reading_record);
            $reading_record->append(['canUpdate',$canUpdate]);
        }
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
    
    public function readerlist(StoreReadingRecordRequest $request)
    {
        //$reader_id = Auth::user()->reader->id;
        $teams = Team::all();
        $current_team_id = Auth::user()->current_team_id;
        $page = $request->session()->pull('page');
        $temp = Team::where('id',$current_team_id)->with('allUsers');
        $users_id = $temp->pluck('user_id');
        $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        //$reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->with('book')->with('reader')->get();
        $collection_Reading_records = collect();
        foreach ($reading_records as $reading_record) {
            $canUpdate = $this->authorize('update_and_delete', $reading_record);
            $array_reading_record = $reading_record->toArray();
            $array_reading_record['canUpdate'] =  $canUpdate;
            $collection_Reading_records->push($array_reading_record);
            }
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
 
    public function add($book_id)
    {
        $book = Book::find($book_id);
        $book_name = $book->name;
        //$reader = Reader::find(Auth::user()->reader->id);
        return Inertia::render('ReadingRecord/Create',compact('book_id','book_name'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team_id = Auth::user()->current_team_id;
        $current_team = Team::where('id',$team_id)->get();
        $teams = Team::all();
        
        $users_id = Team::where('id',$team_id)->with('allUsers')->pluck('user_id');
        $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        //$reading_records = ReadingRecord::whereIn('book_id',$books_id)->whereIn('reader_id',$readers_id)->paginate(10,array('*'),'page',$page);
        $reading_records = ReadingRecord::with('reader')->with('book')->get();
        foreach ($reading_records as $reading_record) {
            $canUpdate = $this->authorize('update_and_delete', $reading_record);
            $reading_record->append(['canUpdate',$canUpdate]);
        }
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::pluck('name','id');
        //$readers = Reader::pluck('name','id');
        return Inertia::render('ReadingRecord/Create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReadingRecordRequest $request)
    {
        $input = $request->all();
        $reading_record = new ReadingRecord();
        $book_id = $input['book_id'];
        $reading_record->book_id = $input['book_id'];
        $reading_record->year_read = $input['yearmonth_read']['year'];
        $reading_record->month_read = $input['yearmonth_read']['month'];
        $reading_record->reader_id = Auth::user()->reader->id;
        $reading_record->report = $input['report'];
        $reading_record->save();
        //$url = 'reading_records/readerlist/'.$reading_record['reader_id'];
        return redirect()->route('reading_records/readerlist');
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
    public function edit(ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        //$books = Book::pluck('name','id');
        //$readers = Reader::pluck('name','id');
        $book_id = $reading_record->book_id;
        $book = Book::find($book_id);
        $book_name = $book->name;       
        return Inertia::render('ReadingRecord/Edit',compact('reading_record','book_id','book_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReadingRecordRequest $request, ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        $input = $request->all();
        
        $reading_record->update($input);
        //$url = 'reading_records/readerlist/'.$reading_record['reader_id'];
        return redirect()->route('reading_records/readerlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        $reading_record->delete();
        //$page = $request->input('page');
        return redirect()->route('reading_records/readerlist');
    }
}
