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
    @foreach($group_list as $group)
     <tr>
       <td>{{$group->id}}</td>
       <td>{{$group->name}}</td>
       <td>{{$group->instituition->name}}</td>
       <td>{{$group->owner->name}}</td>
       <td class="text-center">
         {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
         {!! Form::submit('Remover', ['class'=>'btn btn-info btn-xs']) !!}
         {!! Form::close() !!}
         <a href="{{route('group.show', $group->id)}}">Detalhes</a>
       </td>
     </tr>
   @endforeach

  </tbody>
</table>
