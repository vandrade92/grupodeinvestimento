@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
    {{-- Início Formulário de Cadastro de Grupos--}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success')['messages'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {{ Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) }}
      @include('templates.formularios.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes'=>['placeholder' => 'Nome do Grupo']])
      @include('templates.formularios.select', ['label' => 'Usuário', 'select' => 'user_id', 'data'=> $user_list])
      @include('templates.formularios.select', ['label' => 'Instituição', 'select' => 'instituition_id', 'data'=> $institution_list])
      @include('templates.formularios.submit', ['input' => 'Cadastrar'])
    {{ Form::close() }}


{{-- Início Listagem de Grupos--}}
@include('groups.list', ['group_list' => $groups])
{{-- Fim Listagem de Usuários--}}

@endsection
