<!-- resources/views/email_password.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Email Addresses and Password Hashes</h1>

    <table>
        <tr>
            <th>Email</th>
            <th>Password Hash</th>
        </tr>
        @foreach ($userData as $user)
            <tr>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['hashed_password'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
