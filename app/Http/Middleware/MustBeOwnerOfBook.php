<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Book;

class MustBeOwnerOfBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->book; // For example, the current URL is: /books/1/edit        
        $book = Book::findOrFail($id); // Fetch the book     
        
        if($book->user_id == $request->user()->id)
        {
            return $next($request); // They're the owner, lets continue...
        }

        return redirect()->route('books.index')
                         ->with('error','You are not authorized.');

        //return redirect()->to('books'); // Nope! Get outta' here.
    }
}
