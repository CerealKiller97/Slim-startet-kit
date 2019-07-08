<?php

declare(strict_types=1);

namespace App\Contracts;

use BrosSquad\MicroORM\Model;

interface IUserService
{
  public function getAll(): object;
  public function findOne(int $id): ?Model;
//  public function add(): void;
//  public function update(): void;
//  public function delete(int $id): void;
}