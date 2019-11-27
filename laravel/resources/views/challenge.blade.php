@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Tutorials</div>
                    <div class="card-body">
                        <h3>{{ $challenge->title }}</h3>
                        <p>{{ $challenge->description }}</p>
                        <p><a href="{{ $challenge->url() }}" target="_blank">{{ $challenge->url() }}</a></p>
                        <form action="{{ route('submit', ['id' => $challenge->id]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" id="flag" class="form-control" name="flag" placeholder="Flag: m1z0r3{this_is_flag_format}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
