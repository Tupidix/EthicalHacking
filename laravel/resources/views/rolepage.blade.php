@extends('layouts.app')

@section('content')
    <h2>Page d'administration des rôles</h2>
    <br/>
    @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p class="font-bold">Succès</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

    @foreach($users as $user)
    @if($user->email !== $connectedUserEmail)
        <div>
            <span>{{ $user->email }}</span>
            <br/>
            <span>Compte crée le {{ date('Y-m-d', strtotime($user->created_at)) }}</span>
            <form method="POST" action="{{ route('admin.updateRole', $user->id) }}">
                @csrf
                @method('PUT')
                <select name="role">
                    @foreach($roles as $role)
                        <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                            {{ $role }}
                            </option>
                    @endforeach
                </select>
                <button type="submit">Mettre à jour le rôle</button>
            </form>
        </div>
        <br/>
    @else
    <div>
            <span>{{ $user->email }}</span>
            <br/>
            <span>Compte crée le {{ date('Y-m-d', strtotime($user->created_at)) }}</span>
            <br/>
            <span>{{ $user->role }}</span>
        </div>
        <br/>
    @endif
    @endforeach
@endsection