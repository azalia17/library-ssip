<!-- use the header and footer from the layouts.app -->
@extends('layouts.app')

<!-- anything inside the @section('content') will be attached to the layouts.app -->
@section('content')
<div>
<!-- if the user didn't login yet they can't access anything inside this and go to the else -->

@if(Auth::user())
<div class="container">
    <div class="row">
        <div class="col-10">
            <div class="m-auto w-4/5 py-24">
                <div class="text-center">
                    <h1 class="text-5l uppercase bold">
                        Books
                    </h1>
                </div>
            </div>

            <!-- this only shows when the role of the user is admin. Admin = 3, student=1, librarian=2 -->
            @if(Auth::user()->role==3)
            <div class="pt-10">
                <a href="books/create" class="border=b-2 pb-2 border-dotted text-muted">
                    Add a new Book
                </a>
            </div>
            @endif

            <div class="w-5/6 py-10">
                <!-- looping to retrieve the book from database -->
                @foreach ($books as $book)
                    <div class="m-auto">
                        <h2 class="mt-3"><strong>{{$book -> title}}</strong></h2>
                        <p class="text-primary"><strong>Genre: {{$book->genre}}</strong></p>
                        <p class="text-lg text-secondary">{{$book -> synopsis}}</p>
                        <!-- only admin cn access the edit and delete method -->
                        @if(Auth::user()->role==3)
                        <div class="float-right">
                            <a href="books/{{$book->id}}/edit" class="text-success px-3">Edit</a>
                            <form action="/books/{{$book->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-link text-danger">Delete</button>
                            </form>
                        </div>
                        @endif

                        <hr class="mt-4 mb-8">
                        
                    </div>
               @endforeach
            </div>
        </div>
        <div class="col">
            <!-- the right hand menu wit its respective role. admin=3 librarian=2 student=1 -->
            <li>
                <ol>Books</ol>
                @if(Auth::user()->role !== 1)
                    <ol>Reservation</ol>
                @elseif(Auth::user()->role==1)
                    <ol>My Reservation</ol>
                    <ol>My Book</ol>
                @elseif(Auth::user()->role==3)
                    <ol>Register</ol>
                @endif
            </li>
        </div>
    </div>
</div>
<!-- anyone who hasn't login and try to access this page will go to this block -->
@else
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5l uppercase bold">
            please login
        </h1>
    </div>
</div>
            
@endif

</div>
@endsection