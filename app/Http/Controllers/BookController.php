<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\User;
use App\Jobs\SendVerifyBookMail;
use DataTables;

class BookController extends Controller
{
    public function __construct(Book $book, User $user) {
        $this->book = $book;
        $this->user = $user;
    }

    public function getData() {
        if(auth()->user()->role->name == 'admin') {
            $books = $this->book->with('user')->where('is_verificated', true)->get();
        }
        else {
            $books = $this->book->with('user')->where('is_verificated', true)
                      ->where('user_id', auth()->user()->id)->get();
        }
        return DataTables::of($books)->make(true);
    }

    public function index() {
        return view('book.index');
    }

    public function getDataPending() {
        $books = $this->book->with('user')->where('is_verificated', false)->get();
        return DataTables::of($books)->make(true);
    }

    public function pending() {
        return view('book.pending');
    }

    public function verifyPage($id) {
        $book = $this->book->findOrFail($id);
        return view('book.verify', ['book' => $book]);
    }

    public function verify($id) {
        $book = $this->book->findOrFail($id);
        $book->update([
            'is_verificated' => true
        ]);
        return redirect()->route('book.pending')->with(['message' => "{$book->name} has verificated!"]);
    }

    public function reject($id) {
        $book = $this->book->findOrFail($id);
        $book->delete();
        return redirect()->route('book.pending')->with(['message' => "{$book->name} has rejected!"]);
    }

    public function create() {
        return view('book.create');
    }

    public function store(BookRequest $request) {
        $book = $this->book->create([
            'name' => $request->name,
            'writer' => $request->writer,
            'pages' => $request->pages,
            'release_year' => $request->release_year,
            'is_verificated' => false,
            'user_id' => auth()->user()->id
        ]);
        $users = $this->user->isAdmin()->get();
        foreach($users as $user) {
            dispatch(new SendVerifyBookMail($user, $book));
        }
        return redirect()->route('book.create')->with(['message' => "{$book->name} has added to pending list!"]);
    }

    public function edit($id) {
        $book = $this->book->findOrFail($id);
        return view('book.edit', ['book' => $book]);
    }

    public function update(BookRequest $request, $id) {
        $book = $this->book->findOrFail($id);
        $book->update($request->all());
        return redirect()->route('book.index')->with(['message' => "{$book->name} has edited!"]);
    }

    public function destroy($id) {
        $book = $this->book->findOrFail($id);
        $book->delete();
        return redirect()->route('book.index')->with(['message' => "{$book->name} has deleted!"]);
    }
}
