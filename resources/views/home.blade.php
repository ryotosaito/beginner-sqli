@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-header">Tutorials</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($tutorials as $tutorial)
                            <div class="col-sm-3 mb-2">
                                <a href="{{ route('challenge', ['id' => $tutorial->id]) }}" class="card text-center @if($tutorial->is_solved_by(Auth::id())) text-white bg-success @endif">
                                    <div class="card-body">Stage {{ $tutorial->number }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
