<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Validations\UserValidator;
use Slim\Http\Request;

class HomeController
{

  public function index(Request $request)
  {
    echo '<pre>';
      print_r($request);
    echo '</pre>';

    $user = new User([
      'first_name' => 'Test',
      'last_name'  => 'Test23',
      'email'      => 'test@test.com',
      'username'   => 'test123',
      'password'   => password_hash('password1234', PASSWORD_DEFAULT),
      'token'      => bin2hex(random_bytes(60))
    ]);
//
//    $validator = new UserValidator($user);
//
//    // print_r($validator);
//
//    $valid = $validator->validate();
//
//    setcookie('jwt', '12', time() + 3600, '', 'localhost', true, true);
//    echo '<pre>';
//      print_r($_ENV);
//    echo '</pre>';


    $user->insert();

  http_response_code(201);
    // $user->save();
  }

  public function all()
  {
    $users = User::query()
      ->select(['email','first_name'])
      ->get();

      if ($users === NULL) {
        return json_encode('prosecna osoba ima 100 kila');
      }

    return json_encode($users);
  }
}