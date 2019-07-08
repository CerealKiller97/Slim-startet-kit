<?php

namespace App\Models;

use BrosSquad\FluVal\ValidationModel;
use BrosSquad\MicroORM\Model;

class User extends Model
{
  // protected $guarded = ['password'];

  protected $id;
  protected $username;
  protected $email;
  protected $password;
  protected $first_name;
  protected $last_name;
  protected $token;
  protected $deleted;
  protected $activated_at;
  protected $created_at;
  protected $updated_at;
}