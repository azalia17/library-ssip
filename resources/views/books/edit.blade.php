<!-- use the header and footer from the layouts.app -->
@extends('layouts.app')

<!-- anything inside the @section('content') will be attached to the layouts.app -->
@section('content')
<div>
<!-- if the user didn't login yet they can't access anything inside this and go to the else -->
@if(Auth::user())
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Update Book</h1>
        </div>
    </div>

    <div class="flex justify-center px-5 py-5">
        <form action="/books/{{$book->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group py-2">
                <label>Title</label>
                <input class="form-control" value="{{$book->title}}" type="text" name="title" placeholder="Book's Title">
            </div>
            <div class="form-group py-2">
                <label>Author</label>
                <input class="form-control" value="{{$book->author}}" type="text" name="author" placeholder="Book's Author">
            </div>
            <div class="form-group py-2">
                <label>Publisher</label>
                <input class="form-control" value="{{$book->publisher}}" type="text" name="publisher" placeholder="Book's Publisher">
            </div>
            <div class="form-group py-2">
                <label>Total Page</label>
                <input class="form-control" value="{{$book->total_pages}}" type="number" name="total_pages" placeholder="Book's Total Page">
            </div>
            <div class="form-group py-2">
                <label>Synopsis</label>
                <input class="form-control" value="{{$book->synopsis}}" type="text" name="synopsis" placeholder="Book's Synopsis">
            </div>
            <div class="form-group py-2">
                <label>Availability</label>
                <input class="form-control" value="{{$book->availability}}" type="number" name="availability" placeholder="Book's Availability (1/0)">
            </div>
            <div class="form-group py-2">
                <label>Publish Date</label>
                <input class="form-control" value="{{$book->publish_date}}" type="text" name="publish_date" placeholder="Book's Title">
            </div>
            <div class="form-group py-2">
                <label>Genre</label>
                <select class="form-control form-control-sm" name="genre_id">
                    @if($book->publish_date = 1)
                        <option value='1' selected>Science Fiction</option>
                        <option value='2'>Education</option>
                        <option value='3'>Mythology</option>
                    @elseif($book->publish_date = 2)
                        <option value='1'>Science Fiction</option>
                        <option value='2' selected>Education</option>
                        <option value='3'>Mythology</option>
                    @else($book->publish_date = 3)
                        <option value='1'>Science Fiction</option>
                        <option value='2'>Education</option>
                        <option value='3' selected>Mythology</option>
                    @endif
                </select>
            </div>
            <div class="form-group py-2">
                <label for="exampleFormControlFile1">Cover</label>
                <input type="file" value="{{$book->cover}}" class="form-control-file" name="cover" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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