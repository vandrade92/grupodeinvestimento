@extends('templates.master')

@section('conteudo-view')
    {{-- Início Formulário de Investimento--}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success')['messages'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {{ Form::open(['route' => 'moviment.application.store', 'method' => 'post', 'class' => 'form-padrao']) }}
      @include('templates.formularios.select', ['label' => 'Grupo', 'select' => 'group_id', 'data'=> $group_list ?? [], 'attributes' => ['placeholder' => 'Grupo']])
      @include('templates.formularios.select', ['label' => 'Produto', 'select' => 'product_id', 'data'=> $product_list ?? [], 'attributes' => ['placeholder' => 'Produto']])
      @include('templates.formularios.input',  ['label' => 'Valor', 'input' => 'value', 'attributes'=>['placeholder' => 'Valor de Investimento']])
      @include('templates.formularios.submit', ['input' => 'Cadastrar'])
    {{ Form::close() }}
    {{-- Fim Formulário de Investimento--}}
@endsection
