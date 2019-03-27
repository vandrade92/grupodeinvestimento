<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    #use SoftDeletes;

    protected $fillable = ['cpf','name','phone','birth','gender','notes','email','password', 'status','permission'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime',];
    protected $table = 'users';
    public $timestamps = true;

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function setPasswordAtrribute($value)
    {
      $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

  /*  public function getCpfAttribute()
    {
      $cpf=$this->attributes['cpf'];

      return substr($cpf, 0, 3). '.' .substr($cpf, 3, 3). '.' .substr($cpf, 7, 3). '-' .substr($cpf, -2);
    }

    public function getPhoneAttribute()
    {
      $phone=$this->attributes['phone'];

      if (strlen($phone) == 10 )
      {
      return "(" . substr($phone, 0, 2) . ") " . substr($phone, 2, 4) . '-' .substr($phone, -4);
      }
      if (strlen($phone) == 11)
      {
      return "(" . substr($phone, 0, 2) . ") " .substr($phone, 3, 1). " " . substr($phone, 3, 4) . '-' .substr($phone, -4);
      }
      else
      {
      return "(" . substr($phone, 0, 2) . ") " . substr($phone, 2, 4) . '-' .substr($phone, -4);
      }
    }
    public function getBirthAttribute()
    {
      $birth = explode('-', $this->attributes['birth']);

      if(count($birth) != 3)
      {
        return "";
      }
      else
      {
      return $birth[2] . "/" . $birth[1] . "/" . $birth[0];
      }
    }*/





}
