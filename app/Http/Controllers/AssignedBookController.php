<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignedBookRequest;
use App\Http\Requests\UpdateAssignedBookRequest;
use App\Models\AssignedBook;
use App\Models\Book;
use App\Models\Team;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;

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
            $current_team_id = $request->input('team_id');
        else 
            $current_team_id = Auth::user()->current_team_id;
        list ($assigned_books,$books,$teams) = $this->getbooks($current_team_id);

               
        switch ($request->path()) {
            case 'assigned_books/list':
                $vue = 'AssignedBook/List';
                break;
            case 'AssignedBook/Index':
            case 'assigned_books':
                $vue = 'AssignedBook/Index';
                break;
            default:
            $vue = 'AssignedBook/List';
        }      
        return Inertia::render($vue,compact('assigned_books','books','teams','current_team_id'));
    }

    public function select(StoreAssignedBookRequest $request)
    {
        
        if ($request->has('team_id')) 
            $current_team_id = $request->input('team_id');
        else 
            $current_team_id = Auth::user()->current_team_id;
              
        list ($assigned_books,$books,$teams) = $this->getbooks($current_team_id);
        
        switch ($request->path()) {
            case 'assigned_books/list':
                $vue = 'AssignedBook/List';
                break;
            case 'AssignedBook/Index':
            case 'assigned_books':
                $vue = 'AssignedBook/Index';
                break;
            default:
            $vue = 'AssignedBook/List';
        }  
        
        
        return Inertia::render($vue,compact('assigned_books','books','teams','current_team_id'));
    }

    public function add(StoreAssignedBookRequest $request)
    {
        
        $assigned_book = $request->all();
        AssignedBook::create($assigned_book);
        $current_team_id = $request->input('team_id');
        list ($assigned_books,$books,$teams) = $this->getbooks($current_team_id);
        $request->replace(array('team_id' => $current_team_id));
        
        return Inertia::render('AssignedBook/Index',compact('assigned_books','books','teams','current_team_id'));
    }
    public function destroy(AssignedBook $assigned_book,StoreAssignedBookRequest $request)
    {
        $assigned_book->delete();
        
        $current_team_id = $request->input('team_id');
        
        list ($assigned_books,$books,$teams) = $this->getbooks($current_team_id);
        
        return Inertia::render('AssignedBook/Index',compact('assigned_books','books','teams','current_team_id'));
    }
    
    public function search(StoreAssignedBookRequest $request)
    {
        $param = $request->input('param');
        $current_team_id = $request->input('team_id');
        if (empty($param))
        {
            
            list ($assigned_books,$books,$teams) = $this->getbooks($current_team_id);
        }
        else 
        {
        $key = '%'.$param.'%';
        $books = Book::where('name','like',$key)->orwhere('author','like',$key)->orwhere('company','like',$key)->get();
                
        
        
        $books_id = $books->pluck('id');
        $assigned_books = AssignedBook::where('team_id',$current_team_id)->whereIn('book_id',$books_id)->with('book')->get();
           
        $assigned_books_id = $assigned_books->pluck('book_id');
        $books = $books->whereNotIn('id',$assigned_books_id)->sortBy('id')->all();
        
        }
        return Inertia::render('assigned_books.list',compact('assigned_books','books','teams','current_team_id'));
    }
    
    private function getbooks(Int $team_id)
    {
        $teams = Team::all();
        
        
        foreach ($teams as $team) {
            
            $team->setAttribute('canUpdateTeam',Gate::check('update', $team));
            
        }

        $assigned_books = AssignedBook::where('team_id',$team_id)->orderBy('book_id')->with('book')->get();
        
        if (empty($assigned_books))
            $books = Book::all();
            else
            {
                $assigned_books_id = $assigned_books->pluck('book_id');
                $books = Book::whereNotIn('id',$assigned_books_id)->orderBy('id')->get();
            }
            return array ($assigned_books,$books,$teams);    
    }
}
