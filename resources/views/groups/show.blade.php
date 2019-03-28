@extends('templates.master')
@section('conteudo-view')

<header>
    <h1>Nome do Grupo: {{$group->name}}</h1>
    <h2>Instituição: {{$group->instituition->name}}</h2>
    <h2>Responsável: {{$group->owner->name}}</h2>
</header>

{{ Form::open(['route'=>['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) }}
@include('templates.formularios.select',
['label' => "Usuário",
    'select' => 'user_id',
    'attributes' => ['placeholder' => "Usuário"],
    'data' => $user_list
])

@include('templates.formularios.submit', ['input' => 'Relacionar ao Grupo ' . $group->name])

{{ Form::close() }}

@include('user.list',['user_list' =>$group->users])


@endsection
