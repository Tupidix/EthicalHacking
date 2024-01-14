<!-- resources/views/messages/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Message</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('store-message') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Title:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea name="message" class="form-control" required></textarea>
                            </div>

                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                            <button type="submit" class="btn btn-primary">Create Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
