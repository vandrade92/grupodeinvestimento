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

    <table class="table table-striped custab">
      <thead>
        <tr>
          <th>Produto</th>
          <th>Nome da Instituição</th>
          <th>Valor Investido</th>
        </tr>
      </thead>

      <tbody>
          @forelse($product_list as $product)
         <tr>
           <td>{{$product->name}}</td>
           <td>{{$product->instituition->name}}</td>
           <td>{{$product->valueFromUser(Auth::user())}}</td>
         </tr>
          @empty
          <tr>
               <td>Nada cadastrado.</td>
          </tr>
          @endforelse
      </tbody>
    </table>

@endsection
