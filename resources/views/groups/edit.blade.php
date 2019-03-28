@extends('templates.master')
@section('conteudo-view')
     {{-- Início Formulário de Edição de Grupos--}}
     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success')['messages'] }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
     </div>
     @endif
     {{ Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'put', 'class' => 'form-padrao']) }}
      @include('templates.formularios.input',  ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes'=>['placeholder' => 'Nome do Grupo']])
      @include('templates.formularios.select', ['label' => 'Usuário', 'select' => 'user_id', 'data'=> $user_list])
      @include('templates.formularios.select', ['label' => 'Instituição', 'select' => 'instituition_id', 'data'=> $institution_list])
      @include('templates.formularios.submit', ['input' => 'Atualizar'])
    {{ Form::close() }}
     {{-- Fim Formulário de Edição de Instituições--}}
@endsection
