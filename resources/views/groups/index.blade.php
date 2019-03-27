@extends('templates.master')

@section('conteudo-view')
    {{ Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) }}
      @include('templates.formularios.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes'=>['placeholder' => 'Nome do Grupo']])
      @include('templates.formularios.input', ['label' => 'Usuário', 'input' => 'user_id', 'attributes'=>['placeholder' => 'Usuário']])
      @include('templates.formularios.input', ['label' => 'Instituição', 'input' => 'instituition_id', 'attributes'=>['placeholder' => 'Instituição']])
      @include('templates.formularios.submit', ['input' => 'Cadastrar'])
    {{ Form::close() }}
@endsection
