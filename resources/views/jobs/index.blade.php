@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($jobs as $job)
        <div class="card">
        <h5 class="card-header">{{ $job->title }}</h5>
            <div class="card-body">
                <div class="card-text">{{ $job->description }}</div>
                <a href="{{ route('jobs.show', $job->id) }}">More details...</a>
            </div>
        </div>
    @endforeach
    <button><a href="/jobs/create">Add an entry</a></button>


</div>
@endsection