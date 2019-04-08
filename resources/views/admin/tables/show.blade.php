@extends('layouts.admin')

@section('content')

<h1 class="text-center">{{ $table->title }}</h1>
<br><br>
{!! $table->body !!}
    
@endsection
