@extends('layouts.app')

@section('content')
<h2>Liste de messages</h2>
<h3>
    Ici sont les messages de la base de données
</h3>
@foreach($messages as $message)
    <div classe="message">
        <span>{{ $message->userEmail }}</span>
        <span>{{ $message->name }}</span>
        <br/>
        <span>{{ $message->message }}</span>
        <br/>
        <span>Message crée le {{ date('Y-m-d', strtotime($message->created_at)) }}</span>
    </div>
    <br/>
@endforeach
@endsection