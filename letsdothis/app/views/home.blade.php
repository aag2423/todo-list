@extends('layouts.main')

@section('content')
    <h1>Your Items</h1>
    <ul>
        @foreach ($items as $item)
            <li>
                {{ Form:open() }}

                {{ Form:close() }}
            </li>
        @endforeach
    </ul>
@stop