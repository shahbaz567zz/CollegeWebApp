@extends('layouts.admin')

@section('content')

<h1>Users</h1>
<table class="table table-bordered table-responsive">
    <thead class="table-head">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>ACTIVE</th>
            <th>CREATED</th>
            <th>UPDATED</th>
        </tr>
        </thead>
        <tbody>
            @if ($users)
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{$user->id}}</td>
                    <td scope="row">{{$user->name}}</td>
                    <td scope="row">{{$user->email}}</td>
                    <td scope="row">{{$user->role->name}}</td>
                    <td scope="row">
                    @if ($user->is_active==1)
                        Yes
                    @else
                        No                            
                    @endif
                    </td>
                    <td scope="row">{{$user->created_at->diffForHumans()}}</td>
                    <td scope="row">{{$user->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
</table>
    
@endsection
