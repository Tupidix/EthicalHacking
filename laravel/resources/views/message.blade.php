@extends('layouts.app')

@section('content')
<style>
        /* Styles CSS ici */
        .message {
            border: 1px solid #333;
            padding: 10px;
            margin-bottom: 10px;
        }
</style>

<h2>Liste de messages</h2>
<h3>
    Ici sont les messages de la base de données
</h3>
<br/>
@if ($userRole === 'Admin' || $userRole === 'Editor')
<a href="{{ route('create-message') }}" class="btn btn-primary">Create Message</a>
<br/>
@endif
@foreach($messages as $message)
    <div classe="message">
        <span>{{ $message->userEmail }}</span>
        <br/>
        <span>{{ $message->name }}</span>
        <br/>
        <span>{{ $message->message }}</span>
        <br/>
        <span>Message crée le {{ $message->created_at }}</span>
        @if ($userRole === 'Admin')
        <br/>
        <button>Supprimer Message</button>
        @endif
    </div>
    <br/>
    <br/>
@endforeach
@endsection