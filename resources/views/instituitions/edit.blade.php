@extends('templates.master')
@section('conteudo-view')
     {{-- Início Formulário de Edição de Instituições--}}
     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success')['messages'] }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
     </div>
     @endif

     {{ Form::model($instituition, ['route' => ['instituitions.update', $instituition->id], 'method' => 'put', 'class' => 'form-padrao']) }}
       @include('templates.formularios.input', ['label' => 'Nome','input' => 'name', 'attributes'=>['placeholder' => 'Nome da Instituição']])
       @include('templates.formularios.submit', ['input' => 'Atualizar'])
     {{ Form::close() }}
     {{-- Fim Formulário de Edição de Instituições--}}
@endsection
