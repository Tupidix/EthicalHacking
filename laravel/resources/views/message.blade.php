@extends('layouts.app')

@section('content')


<h2>Liste de messages</h2>
<h3>
    Ici sont les messages de la base de données
</h3>
<br/>
@if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p class="font-bold">Succès</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
<br/>
@if ($userRole === 'Admin' || $userRole === 'Editor')
<a href="{{ route('create-message') }}" class="btn btn-primary">Create Message</a>
<br/>
@endif
@foreach($messages as $message)
    <div>
        <span>{{ $message->userEmail }}</span>
        <br/>
        <span>{{ $message->name }}</span>
        <br/>
        <span>{{ $message->message }}</span>
        <br/>
        <span>Message crée le {{ $message->created_at }}</span>
        @if ($userRole === 'Admin')
        <br/>
        <form action="{{ route('messages.destroy', ['id' => $message->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
        @endif
    </div>
    <br/>
    <br/>
@endforeach
@endsection