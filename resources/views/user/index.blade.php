@extends('templates.master')


@section('css-view')
@endsection

@section('js-view')
  <script>
  $(document).ready(function(){
    $(".cpf").mask("000.000.000-00")
    $(".phone").mask("(00) 00000-0009")
    $(".phone").blur(function(event){
      if($(this).val().length == 15){
         $(".phone").mask("(00) 0 0000-0009")
      }else{
         $(".phone").mask("(00) 0000-00009")
      }
    })

    $(".birth").mask("00/00/0000")
  })
</script>
@endsection

@section('conteudo-view')

  {{-- Início Formulário de Cadastro de Usuários--}}
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('success')['messages'] }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif

  {{ Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) }}
    @include('user.form-field')
    @include('templates.formularios.submit', ['input' => 'Cadastrar'])
  {{ Form::close() }}
  {{-- Fim Formulário de Cadastro de Usuários--}}

  {{-- Início Listagem de Usuários--}}
  @include('user.list',['user_list' => $users])
  {{-- Fim Listagem de Usuários--}}

@endsection
