<?php

declare(strict_types=1);

namespace App\Services\MicroORM;

use App\Contracts\IUserService;
use App\Models\User;
use BrosSquad\MicroORM\Model;

class UserService implements IUserService
{
  public function getAll(): object
  {
    $users = User::query()->get();

    return $users;
  }

  public function findOne(int $id): ?Model
  {
    $user = User::query()
      ->whereEquals('id', $id)
      ->get()
      ->firstOrDefault();

    return $user;
  }
}