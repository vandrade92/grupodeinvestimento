@extends('templates.master')

@section('conteudo-view')

  {{-- Início Formulário de Cadastro de Instituições--}}
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('success')['messages'] }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif

  {{ Form::open(['route' => 'instituitions.store', 'method' => 'post', 'class' => 'form-padrao']) }}
    @include('templates.formularios.input', ['label' => 'Nome','input' => 'name', 'attributes'=>['placeholder' => 'Nome da Instituição']])
    @include('templates.formularios.submit', ['input' => 'Cadastrar'])
  {{ Form::close() }}
  {{-- Fim Formulário de Cadastro de Instituições--}}

  {{-- Início Listagem de Instituições--}}
  <table class="table table-striped custab">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome da Instiuição</th>
        <th class="text-center">Menu</th>
       </tr>
    </thead>

    <tbody>
      @foreach($instituitions as $instituition)
       <tr>
         <td>{{$instituition->id}}</td>
         <td>{{$instituition->name}}</td>
         <td class="text-center">
           {!! Form::open(['route' => ['instituitions.destroy', $instituition->id], 'method' => 'DELETE']) !!}
           {!! Form::submit('Remover',['class'=>'btn btn-info btn-xs']) !!}
           {!! Form::close() !!}
         </td>
       </tr>
     @endforeach
   </tbody>
 </table>
 {{-- Fim Listagem de Instituições--}}
@endsection
