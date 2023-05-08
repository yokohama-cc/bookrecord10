<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignedBookRequest;
use App\Http\Requests\UpdateAssignedBookRequest;
use App\Models\AssignedBook;
use App\Models\Book;
use App\Models\Team;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AssignedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreAssignedBookRequest $request)
    {
        if ($request->has('team_id')) 
            $team_id = $request->input('team_id');
        else 
            $team_id = Auth::user()->current_team_id;
        $current_team = Team::where('id',$team_id)->get();
        list ($assigned_books,$books) = $this->getbooks($team_id);

        if ($request->fullUrl() === url('assigned_books/list'))
            $vue = 'AssignedBook/List';
        else 
            $vue = 'AssignedBook/Index';
        
        
        return Inertia::render($vue,compact('assigned_books','books','current_team'));
    }

    public function select(StoreAssignedBookRequest $request)
    {
        if ($request->has('team_id')) 
            $team_id = $request->input('team_id');
        else 
            $team_id = Auth::user()->current_team_id;
        $current_team = Team::where('id',$team_id)->get();    
        list ($assigned_books,$books) = $this->getbooks($team_id);
        
        if ($request->fullUrl() === url('assigned_books/list'))
            $vue = 'AssignedBook/List';
        else 
            $vue = 'AssignedBook/Index';
        
        
        return Inertia::render($vue,compact('assigned_books','books','current_team'));
    }

    public function add(StoreAssignedBookRequest $request)
    {
        $assigned_book = $request->all();
        AssignedBook::create($assigned_book);
        $team_id = $request->input('team_id');
        $current_team = Team::where('id',$team_id)->get();
        list ($assigned_books,$books) = $this->getbooks($team_id);
        $request->replace(array('team_id' => $team_id));
        //return $this->index($request);
        return Inertia::render('AssignedBook/Index',compact('assigned_books','books','current_team'));
    }
    public function destroy(AssignedBook $assigned_book,StoreAssignedBookRequest $request)
    {
        $assigned_book->delete();
        
        $team_id = $request->input('team_id');
        $current_team = Team::where('id',$team_id)->get();
        list ($assigned_books,$books) = $this->getbooks($team_id);
        
        return Inertia::render('AssignedBook/Index',compact('assigned_books','books','current_team'));
    }
    
    public function search(Request $request)
    {
        $param = $request->input('param');
        $team_id = $request->input('team_id');
        if (empty($param))
        {
            
            list ($assigned_books,$books,$teams) = $this->getbooks($team_id);
        }
        else 
        {
        $key = '%'.$param.'%';
        $books = Book::where('name','like',$key)->orwhere('author','like',$key)->orwhere('company','like',$key)->get();
                
        $teams = team::pluck('name','id');
        
        $books_id = $books->pluck('id');
        $assigned_books = AssignedBook::where('team_id',$team_id)->whereIn('book_id',$books_id)->with(book)->get();
           
        $assigned_books_id = $assigned_books->pluck('book_id');
        $books = $books->whereNotIn('id',$assigned_books_id)->sortBy('id')->all();
        
        }
        return Inertia::render('assigned_books.list',compact('assigned_books','books','teams','team_id'));
    }
    
    private function getbooks(Int $team_id)
    {
        $assigned_books = AssignedBook::where('team_id',$team_id)->orderBy('book_id')->with('book')->get();
        
        if (empty($assigned_books))
            $books = Book::all();
            else
            {
                $assigned_books_id = $assigned_books->pluck('book_id');
                $books = Book::whereNotIn('id',$assigned_books_id)->orderBy('id')->get();
            }
            return array ($assigned_books,$books);    
    }
}
