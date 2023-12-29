<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();
        //select * from books (if in mysql command)
        return view('book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'desc'=> 'required',

        ]);
        // dd($request->all()); //command for testing
        //follow oop style
        try{
        $storeBook = new Book();
        $storeBook->name = $request->name;
        $storeBook->desc = $request->desc;
        $storeBook->save();
    }catch(\Exception $e){
        dd($e);
    }

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book) //need to call Book in front cuz no hide the data 
    {
        //show in the form
        return view('show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book) //for interface use
    {
        //edit the data
        return view('edit',compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book) //for action of edit use
    {
        //
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        
        ]);

    
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->save();

        return redirect()->route('book.index')
            ->with('success','Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book) //no need have Book as route in front cuz hide the data
    {
        //delete item from table 
        $book = Book::find($book);
        $book -> delete();
        return redirect()->route('book.index')-> with ('success','Book Data is successfully deleted.');
    }
}
