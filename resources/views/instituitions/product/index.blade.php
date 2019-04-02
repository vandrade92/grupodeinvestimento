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

    {{ Form::open(['route' => ['instituition.product.store',$institution->id], 'method' => 'post', 'class' => 'form-padrao']) }}
      @include('templates.formularios.input', ['label' => 'Nome do Produto','input' => 'name'])
      @include('templates.formularios.input', ['label' => 'Descrição','input' => 'description'])
      @include('templates.formularios.input', ['label' => 'Indexador','input' => 'index'])
      @include('templates.formularios.input', ['label' => 'Taxa de Juros','input' => 'interest_rate'])
      @include('templates.formularios.submit', ['input' => 'Cadastrar'])
    {{ Form::close() }}

    <table class="table table-striped custab">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome do Produto</th>
          <th>Descrição</th>
          <th>Indexador</th>
          <th>Taxa</th>
          <th class="text-center">Menu</th>
        </tr>
      </thead>

      <tbody>
          @forelse($institution->products as $product)
         <tr>
           <td>{{$product->id}}</td>
           <td>{{$product->name}}</td>
           <td>{{$product->description}}</td>
           <td>{{$product->index}}</td>
           <td>{{$product->interest_rate}}</td>
           <td class="text-center">
             {!! Form::open(['route' => ['instituition.product.destroy', $institution->id, $product->id], 'method' => 'DELETE']) !!}
             {!! Form::submit('Remover', ['class'=>'btn btn-info btn-xs']) !!}
             {!! Form::close() !!}
           </td>
         </tr>
          @empty
          <tr>
               <td>Nada cadastrado.</td>
          </tr>
          @endforelse
      </tbody>
    </table>

@endsection
