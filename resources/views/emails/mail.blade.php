Hai {{ $user->name }}<br>
There's a new book called {{ $book->name }},<br>
writed by {{ $book->writer }}.<br>

<a href="http://books.test/book/verify-page/{{ $book->id }}">Click Here</a>