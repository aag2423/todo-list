@extends('layouts.main')

@section('content')
    <a href="{{ URL::route('logout') }}" class="logout" >Logout</a>

    <h1>{{ $username }}'s Items <small>(<a href="{{ URL::route('new') }}">New Task</a>)</small></h1>
    <ul>
        @foreach ($items as $item)
            <li>
                {{ Form::open() }}
                    <input
                        type="checkbox"
                        name="item"
                        id="item_{{ $item->id }}"
                        value="{{ $item->id }}"
                        {{ $item->done? 'checked' : '' }}
                        onClick="this.form.submit()"
                     />
                     <input type="hidden" name="id" value="{{ $item->id }}" />
                    <label for="item_{{ $item->id }}"> {{ e($item->name) }} </label> <small> (<a href="{{ URL::route('delete', $item->id) }}">x</a>)</small>
                {{ Form::close() }}
            </li>
        @endforeach
    </ul>
@stop