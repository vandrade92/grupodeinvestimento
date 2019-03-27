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
    <div class="alert alert-success">
   {{ session('success')['messages'] }}
</div>


  @endif

  {{ Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) }}
    @include('templates.formularios.input', ['input' => 'cpf', 'attributes'=>['placeholder' => 'CPF', 'class'=>'cpf']])
    @include('templates.formularios.input', ['input' => 'name', 'attributes'=>['placeholder' => 'Nome']])
    @include('templates.formularios.input', ['input' => 'phone', 'attributes'=>['placeholder' => 'Telefone', 'class'=>'phone']])
    @include('templates.formularios.input', ['input' => 'email', 'attributes'=>['placeholder' => 'E-mail']])
    @include('templates.formularios.input', ['input' => 'birth', 'attributes'=>['placeholder' => 'Data de Nascimento', 'class'=>'birth']])
    @include('templates.formularios.select', ['input'=> 'gender', 'attributes' =>['M'=>'Masculino', 'F'=>'Feminino']])
    @include('templates.formularios.password', ['input' => 'password', 'attributes'=>['placeholder' => 'Senha']])
    @include('templates.formularios.submit', ['input' => 'Cadastrar'])
  {{ Form::close() }}
  {{-- Fim Formulário de Cadastro de Usuários--}}

  {{-- Início Listagem de Usuários--}}
  <table class="table table-striped custab">
    <thead>
      <tr>
        <th>#</th>
        <th>CPF</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Nascimento</th>
        <th>E-mail</th>
        <th>Status</th>
        <th>Permissão</th>
        <th class="text-center">Menu</th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)
       <tr>
         <td>{{$user->id}}</td>
         <td class="cpf">{{$user->cpf}}</td>
         <td>{{$user->name}}</td>
         <td class="phone">{{$user->phone}}</td>
         <td>{{Carbon\Carbon::parse($user->birth)->format('d/m/Y')}}</td>
         <td>{{$user->email}}</td>
         <td>{{$user->status}}</td>
         <td>{{$user->permission}}</td>
         <td class="text-center">
           {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
           {!! Form::submit('Remover', ['class'=>'btn btn-info btn-xs']) !!}
           {!! Form::close() !!}
         </td>
       </tr>
     @endforeach

    </tbody>
  </table>
  {{-- Fim Listagem de Usuários--}}

@endsection
