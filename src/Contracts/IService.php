<?php

declare(strict_types=1);

namespace App\Contracts;

interface IService
{
  public function all() : array;
  public function find(int $id): \stdClass;
  public function create();
  public function update() : void;
  public function delete(int $id) : void;
}