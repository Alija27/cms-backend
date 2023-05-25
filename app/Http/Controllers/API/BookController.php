<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return ApiResponse::success(BookResource::collection($books));
    }


    public function store(BookRequest $request)
    {
        $data = $request->validated();
       $book= Book::create($data);

        $course=$request->course_id;
        $book->courses()->attach($course);

        return ApiResponse::success(null, "Book created successfully");
    }


    public function show(Book $book)
    {
        return ApiResponse::success(new BookResource($book));
    }


    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        return ApiResponse::success(null, "Book updated successfully");
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return ApiResponse::success(null, "Book deleted successfully");
    }
}
