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
      @include('templates.formularios.select', ['label' => 'Usuário', 'select' => 'user_id', 'attributes'=> $user_list])
      @include('templates.formularios.select', ['label' => 'Instituição', 'select' => 'instituition_id', 'attributes'=> $institution_list])
      @include('templates.formularios.submit', ['input' => 'Cadastrar'])
    {{ Form::close() }}


{{-- Início Listagem de Grupos--}}
<table class="table table-striped custab">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome do Grupo</th>
      <th>Instituição</th>
      <th>Nome do Responsável</th>
      <th class="text-center">Menu</th>
    </tr>
  </thead>

  <tbody>
    @foreach($groups as $group)
     <tr>
       <td>{{$group->id}}</td>
       <td>{{$group->name}}</td>
       <td>{{$group->instituition->name}}</td>
       <td>{{$group->owner->name}}</td>
       <td class="text-center">
         {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
         {!! Form::submit('Remover', ['class'=>'btn btn-info btn-xs']) !!}
         {!! Form::close() !!}
       </td>
     </tr>
   @endforeach

  </tbody>
</table>
{{-- Fim Listagem de Usuários--}}

@endsection
