<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Book;
use Auth;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        echo '<pre>';
        print_r(Auth::id());exit;
        switch($this->method())
        {
            case 'DELETE':
            case 'PATCH':
            case 'PUT':
            case 'POST':
            {
                // where 'book' is the placeholder for the book id of the route                
                $book = Book::find($this->book);                
                echo '<pre>';
                print_r($request->user()->id);exit;
                return $book->user_id == $this->user()->id;
            }
            case 'GET':
            {
                return true;
            }
            default:
            {
                break;
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
