<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Auth;
use File;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * @var BookRequest
     */
    //private $request;

    public function __construct(/*BookRequest $request*/)
    {
        $this->middleware('mustBeOwnerOfBook' , ['except' => ['index', 'show']]); //Prevent other user to create/edit/delete using middleware
        //$this->request = $request; //Prevent other user to create/edit/delete using FormRequest
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->where('user_id', Auth::user()->id)->paginate(5);
        return view('books.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'isbn'        => 'required',
            'title'       => 'required',
            'author'      => 'required',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048' // 2mb
        ]);

        $book              = new Book;
        $book->isbn        = $request->isbn;
        $book->title       = $request->title;
        $book->author      = $request->author;
        $book->description = $request->description;
        $book->user_id     = Auth::user()->id;
        $book->save();
        
        if ($request->hasFile('image')) {
            $image           = $request->file('image');
            $name            = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/books');
            $image->move($destinationPath, $name);
            $book->image = /*url('/') . '/book/' . */$name;
            $book->save();
        }
        return redirect()->route('books.index')
                         ->with('success','Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
          $book = Book::findOrFail($id);
          return view('books.show',compact('book'));

        } catch(ModelNotFoundException $e) {
            return \Redirect::route('books.index')
                      ->withMessage('Record not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
          $book = Book::findOrFail($id);
          return view('books.edit',compact('book'));

        } catch(ModelNotFoundException $e) {
            return \Redirect::route('books.index')
                      ->withMessage('Record not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'isbn'        => 'required',
            'title'       => 'required',
            'author'      => 'required',
            'description' => 'required',
            'image'       => 'sometimes|required|image|mimes:jpeg,png,jpg|max:2048' // 2mb
        ]);

        //$book = Book::find($id)->update($request->all());
        $book              = Book::find($id);
        $book->isbn        = $request->isbn;
        $book->title       = $request->title;
        $book->author      = $request->author;
        $book->description = $request->description;        

        if ($request->hasFile('image')) {
            //delete old
            File::delete(public_path('/uploads/books/'. $book->image));
            
            $image           = $request->file('image');
            $name            = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/books');
            $image->move($destinationPath, $name);
            $book->image = /*url('/') . '/book/' . */$name;            
        }
        $book->save();

        return redirect()->route('books.index')
                        ->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        //delete old
        File::delete(public_path('/uploads/books/'. $book->image));
        $book->delete();
        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }
}
