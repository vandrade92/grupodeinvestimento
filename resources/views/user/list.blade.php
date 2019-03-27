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
    @foreach($user_list as $user)
     <tr>
       <td>{{$user->id}}</td>
       <td class="cpf">{{$user->cpf}}</td>
       <td>{{$user->name}}</td>
       <td class="phone">{{$user->phone}}</td>
       <td>{{$user->birth ? Carbon\Carbon::parse($user->birth)->format('d/m/Y') : null}}</td>
       <td>{{$user->email}}</td>
       <td>{{$user->status}}</td>
       <td>{{$user->permission}}</td>
       <td class="text-center">
         {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
         {!! Form::submit('Remover', ['class'=>'btn btn-info btn-xs']) !!}
         {!! Form::close() !!}
         <a href="{{ route('user.edit', $user->id)}}">Editar</a>
       </td>
     </tr>
   @endforeach

  </tbody>
</table>
