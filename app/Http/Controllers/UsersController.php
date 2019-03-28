<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $service;
    protected $repository;



    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserService $service)
    {

        $this->repository   = $repository;
        $this->service      = $service;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $users = $this->repository->all();

      return view('user.index', [
        'users' => $users
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $usuario = $request['success'] ? $request['data'] : null;

      session()->flash('success', [
          'success'    => $request['success'],
          'messages'   => $request['messages'],
        ]);


        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('user.edit', [
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {

        //Tratando valores antes de enviar pro service.
        $value = $request->except('cpf','birth','phone');
        $value['cpf'] = str_replace(['.','-'], '', $request->input('cpf'));
        $value['phone'] = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('phone'));
        $birth = explode('/', $request->input('birth'));
        if(count($birth) == 3){
        $value['birth'] = $birth[2] . "-" . $birth[1] . "-" . $birth[0];
        }else {$value['birth'] = "";}
        $request['cpf'] = $value['cpf'];
        $request['phone'] = $value['phone'];
        $request['birth'] = $value['birth'];


        $request = $this->service->update($request->all(), $id);
        $usuario = $request['success'] ? $request['data'] : null;

      session()->flash('success', [
          'success'    => $request['success'],
          'messages'   => $request['messages'],
        ]);


        return redirect()->route('user.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $request = $this->service->destroy($id);

    session()->flash('success', [
        'success'    => $request['success'],
        'messages'   => $request['messages'],
      ]);


      return redirect()->route('user.index');

    }
}
