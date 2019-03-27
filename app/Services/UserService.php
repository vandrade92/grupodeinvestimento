<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;


class UserService
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {

      $this->repository = $repository;
      $this->validator = $validator;

    }

    public function store($data)
    {
      try
      {
        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
        $usuario = $this->repository->create($data);

          return [
            'success' => true,
            'messages' => "Usuário Cadastrado",
            'data' => $usuario,
          ];
      }
      catch(Exception $e)
      {
            switch(get_class($e))
            {
              case QueryException::class      : return ['success' => false, 'messages'=>  $e->getMessage()];
              case ValidatorException::class  : return ['success' => false, 'messages'=>  $e->getMessageBag()];
              case Exception::class           : return ['success' => false, 'messages'=>  $e->getMessage()];
              default                         : return ['success' => false, 'messages'=>  $e->getMessage()];

            }
      }
    }
    public function update(){}
    public function destroy($user_id)
    {
      try
      {
          $usuario = $this->repository->delete($user_id);

          return [
            'success' => true,
            'messages' => "Usuário Removido",
            'data' => null,
          ];
      }
      catch(Exception $e)
      {
            switch(get_class($e))
            {
              case QueryException::class      : return ['success' => false, 'messages'=>  $e->getMessage()];
              case ValidatorException::class  : return ['success' => false, 'messages'=>  $e->getMessageBag()];
              case Exception::class           : return ['success' => false, 'messages'=>  $e->getMessage()];
              default                         : return ['success' => false, 'messages'=>  $e->getMessage()];
            }
      }
    }
}
