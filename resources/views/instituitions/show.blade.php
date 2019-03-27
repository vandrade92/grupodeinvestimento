@extends('templates.master')

@section('conteudo-view')
    <header>
        <h1>{{$institutions->name}}</h1>
    </header>

@include('groups.list',['group_list' =>$institutions->groups])
@endsection
