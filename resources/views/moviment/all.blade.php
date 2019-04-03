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
          <th>Data</th>
          <th>tipo</th>
          <th>Produto</th>
          <th>Grupo</th>
          <th>Valor</th>
        </tr>
      </thead>

      <tbody>
          @forelse($moviment_list as $moviment)
         <tr>
           <td>{{$moviment->created_at->format("d/m/Y H:i")}}</td>
           <td>{{$moviment->type == 1 ? "Investimento" : "Resgate"}}</td>
           <td>{{$moviment->product->name}}</td>
           <td>{{$moviment->group->name}}</td>
           <td>R${{ number_format($moviment->type == 1 ? $moviment->value : $moviment->value*-1, 2, ',','.')}}</td>
         </tr>
          @empty
          <tr>
               <td>Nada cadastrado.</td>
          </tr>
          @endforelse

      </tbody>

      <tfoot>
           <tr>
           <td >Total</td>
           <td></td>
           <td></td>
           <td></td>
           <td>R${{ number_format($moviment->sum('value'), 2, ',','.')}}</td>
           </tr>

      </tfoot>
    </table>

@endsection
