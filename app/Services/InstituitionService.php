<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;


class InstituitionService
{
  private $repository;
  private $validator;

  public function __construct(InstituitionRepository $repository, InstituitionValidator $validator)
  {
    $this->repository   = $repository;
    $this->validator     = $validator;
  }

  public function store($data)
  {
    try
    {
      $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
      $instituition = $this->repository->create($data);

      return [
        'success' => true,
        'messages' => "Instituição Cadastrada",
        'data' => $instituition,
      ];
    }
    catch(Exception $e )
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
