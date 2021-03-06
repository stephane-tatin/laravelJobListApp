@extends('layouts.app')

@section('content')
<div class="container">


  <form action="{{ route('jobs.update', $job->id) }}" method="post">
    @csrf
    @method('put')

    <div class="container">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="title" class="form-control" name="title" id="title" placeholder="Enter the title of the job" value="{{$job->title}}">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Add a small description" value="{{$job->description}}">
      </div>
      <div class="form-group">
        <label for="description">Company</label>
        <input type="text" readonly="readonly" class="form-control" name="company" id="company" placeholder="{{$job->companyName}}" value="{{$job->companyName}}">
      </div>
      <div class="form-group">
        <label for="description">Type</label>
        <input type="text" class="form-control" name="type" id="type" placeholder="Add a small description" value="{{$job->type}}">
      </div>
      <input type="submit" class="btn btn-primary"></button>



    </div>
  </form>

  @can('delete', $job)
  <form action="{{ route('jobs.delete', $job->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="float-right btn btn-danger m-5">delete Post</button>
  </form>
  @endcan



</div>
@endsection