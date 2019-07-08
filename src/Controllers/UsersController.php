<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Contracts\IUserService;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response;

class UsersController extends ApiController
{
  private $userService;

  public function __construct(IUserService $service)
  {
    $this->userService = $service;
  }

  public function index(Request $request, Response $response)
  {
    $users = $this->userService->getAll();
    return $this->ok($response, $users);
  }

  public function find(Request $request, Response $response)
  {
    $id = (int) $request->getAttribute('id');

    $user = $this->userService->findOne($id);

    if ($user === null) {
      return $this->notFound($response, 'User');
    }

    return $this->ok($response, $user);
  }

  public function create()
  {

  }

  public function update(Request $request, Response $response)
  {

  }

  public function delete(Request $request, Response $response)
  {

  }
}