@extends('layouts.main')

@section('content')
    <form action="{{ route('contacts.update',[ 'id' => $contact->id ])}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @include('inc.form')
    </form>
@endsection