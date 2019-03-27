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
    let date = document.getElementById("birth").getAttribute("value");
    date = date.split("-").reverse().join("/");
    console.log(date);
    $('input[name=birth]').val(date);



  })
</script>
@endsection

@section('conteudo-view')

  {{-- Início Formulário de Edição de Usuários--}}
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('success')['messages'] }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif

  {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-padrao']) }}
    @include('user.form-field')
    @include('templates.formularios.submit', ['input' => 'Atualizar'])
  {{ Form::close() }}
  {{-- Fim Formulário de Edição de Usuários--}}
@endsection
