<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadingRecordRequest;
use App\Http\Requests\UpdateReadingRecordRequest;
use App\Models\ReadingRecord;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Reader;
use DateTime;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use Illuminate\Support\Facades\Gate;


class ReadingRecordController extends Controller
{
    public function search(StoreReadingRecordRequest $request)
    {
        
        if ($request->has('team_id')){
            $current_team_id = $request->input('team_id');
            $team = Team::find($current_team_id);
            $users_id = DB::table('team_user')->where('team_id',$current_team_id)->get()->pluck('user_id');
            if (Auth::user()->id == $team->user_id){
                $users_id->push(Auth::user()->id);
            }
            $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        }
        $teams = Team::all();
        
        $param = $request->input('param');
        $key = '%'.$param.'%';
                
        $books_id = Book::where('name','like',$key)->pluck('id');
       
        $reading_records = ReadingRecord::whereIn('book_id',$books_id)->whereIn('reader_id',$readers_id)->with('book')->with('reader')->paginate(10);
        
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
    
    public function searchbyreader(StoreReadingRecordRequest $request)
    {
        
        $teams = Team::all();
        $current_team_id = Auth::user()->current_team_id;
        $param = $request->input('paramreader');
        $key = '%'.$param.'%';
        $team = Team::find($current_team_id);
        $users_id = DB::table('team_user')->where('team_id',$current_team_id)->get()->pluck('user_id');
        
        if (Auth::user()->id == $team->user_id){
            $users_id->push(Auth::user()->id);
        }
        
        $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->with('book')->with('reader')->paginate(10);
        
        
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
    
    public function booklist(StoreReadingRecordRequest $request, $book_id)
    {
        $teams = Team::all();
        $team_id = Auth::user()->current_team_id;
        $current_team_id = Team::where('id',$team_id)->get();
        
        $reading_records = ReadingRecord::where('book_id',$book_id)->with('book')->with('reader')->paginate(10);
        
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
    
    public function readerlist(StoreReadingRecordRequest $request)
    {
        
        $teams = Team::all();
        $current_team_id = Auth::user()->current_team_id;
        
        $team = Team::find($current_team_id);
        $users_id = DB::table('team_user')->where('team_id',$current_team_id)->get()->pluck('user_id');
        
        if (Auth::user()->id == $team->user_id){
            $users_id->push(Auth::user()->id);
        }
        
        $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        
        $reading_records = ReadingRecord::whereIn('reader_id',$readers_id)->with('book')->with('reader')->paginate(10);
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }
 
    public function add($book_id)
    {
        $book = Book::find($book_id);
        $book_name = $book->name;
        
        return Inertia::render('ReadingRecord/Create',compact('book_id','book_name'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_team_id = Auth::user()->current_team_id;
        $current_team = Team::where('id',$current_team_id)->get();
        $teams = Team::all();
        $team = Team::find($current_team_id);
        $users_id = DB::table('team_user')->where('team_id',$current_team_id)->get()->pluck('user_id');
        
        if (Auth::user()->id == $team->user_id){
            $users_id->push(Auth::user()->id);
        }
        $readers_id = Reader::whereIn('user_id',$users_id)->pluck('id');
        
        $reading_records = ReadingRecord::with('reader')->with('book')->paginate(10);
        
        return Inertia::render('ReadingRecord/Index',compact('reading_records','teams','current_team_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::pluck('name','id');
        
        return Inertia::render('ReadingRecord/Create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReadingRecordRequest $request)
    {
        $input = $request->all();
        $reading_record = new ReadingRecord();
        $reading_record->book_id = $input['book_id'];
        $date = new DateTime($input['yearmonth_read']['year'].'-'.$input['yearmonth_read']['month'].'-1');
        $date->modify('+1 months');
        $month = $date->format('n');
        $reading_record->year_read = $input['yearmonth_read']['year'];
        $reading_record->month_read = $month;
        $reading_record->reader_id = Auth::user()->reader->id;
        $reading_record->report = $input['report'];
        $reading_record->save();
       
        return redirect()->route('reading_records.readerlist');
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
        $canUpdate = Gate::forUser(Auth::user())->allows('update_and_delete', $reading_record);
        $reading_record->load('book','reader');
                
        return Inertia::render('ReadingRecord/Edit',compact('reading_record','canUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReadingRecordRequest $request, ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        $input = $request->all();
        $date = new DateTime($input['yearmonth_read']['year'].'-'.$input['yearmonth_read']['month'].'-1');
        $date->modify('+1 months');
        $month = $date->format('n');
        $reading_record->year_read = $input['yearmonth_read']['year'];
        $reading_record->month_read = $month;
        $reading_record->report = $input['report'];
        $reading_record->update();
        
        return redirect()->route('reading_records.readerlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReadingRecord $reading_record)
    {
        $this->authorize('update_and_delete', $reading_record);
        $reading_record->delete();
        
        return redirect()->route('reading_records.readerlist');
    }
}
