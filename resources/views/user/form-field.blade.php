@include('templates.formularios.input', ['input' => 'cpf', 'attributes'=>['placeholder' => 'CPF', 'class'=>'cpf']])
@include('templates.formularios.input', ['input' => 'name', 'attributes'=>['placeholder' => 'Nome']])
@include('templates.formularios.input', ['input' => 'phone', 'attributes'=>['placeholder' => 'Telefone', 'class'=>'phone']])
@include('templates.formularios.input', ['input' => 'email', 'attributes'=>['placeholder' => 'E-mail']])
@include('templates.formularios.input', ['input' => 'birth', 'attributes'=>['placeholder' => 'Data de Nascimento', 'class'=>'birth', 'id' => 'birth', 'name' =>'birth']])
@include('templates.formularios.select', ['select'=> 'gender', 'attributes' =>['M'=>'Masculino', 'F'=>'Feminino']])
@include('templates.formularios.password', ['input' => 'password', 'attributes'=>['placeholder' => 'Senha']])