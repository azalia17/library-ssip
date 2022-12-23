<!-- use the header and footer from the layouts.app -->
@extends('layouts.app')

<!-- anything inside the @section('content') will be attached to the layouts.app -->
@section('content')
<div>
<!-- if the user didn't login yet they can't access anything inside this and go to the else -->
@if(Auth::user())
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Create Book</h1>
        </div>
    </div>

    <div class="flex justify-center px-5 py-5">
        <form action="/books" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group py-2">
                <label>Title</label>
                <input class="form-control" type="text" name="title" placeholder="Book's Title">
            </div>
            <div class="form-group py-2">
                <label>Author</label>
                <input class="form-control" type="text" name="author" placeholder="Book's Author">
            </div>
            <div class="form-group py-2">
                <label>Publisher</label>
                <input class="form-control" type="text" name="publisher" placeholder="Book's Publisher">
            </div>
            <div class="form-group py-2">
                <label>Total Page</label>
                <input class="form-control" type="number" name="total_pages" placeholder="Book's Total Page">
            </div>
            <div class="form-group py-2">
                <label>Synopsis</label>
                <input class="form-control" type="text" name="synopsis" placeholder="Book's Synopsis">
            </div>
            <div class="form-group py-2">
                <label>Availability</label>
                <input class="form-control" type="number" name="availability" placeholder="Book's Availability (1/0)">
            </div>
            <div class="form-group py-2">
                <label>Publish Date</label>
                <input class="form-control" type="text" name="publish_date" placeholder="Book's Title">
            </div>
            <div class="form-group py-2">
                <label>Genre</label>
                <select class="form-control form-control-sm" name="genre_id">
                    <option disabled selected>Select genre</option>
                    <option value='1'>Science Fiction</option>
                    <option value='2'>Education</option>
                    <option value='3'>Mythology</option>
                </select>
            </div>
            <div class="form-group py-2">
                <label for="exampleFormControlFile1">Cover</label>
                <input type="file" class="form-control-file" name="cover" id="exampleFormControlFile1">
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