@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/jobs/store" method="POST">
    @csrf
    <div class="container">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="title" class="form-control" name="title" id="title" placeholder="Enter the title of the job">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Add a small description">
      </div>
      <div class="form-group">
        <label for="description">Company</label>
        <input type="text" class="form-control" name="company" id="company" placeholder="Add a small description">
      </div>
      <div class="form-group">
        <label for="description">Type</label>
        <input type="text" class="form-control" name="type" id="type" placeholder="Add a small description">
      </div>
      <input type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


</div>
@endsection