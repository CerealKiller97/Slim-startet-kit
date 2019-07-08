<?php

namespace App\Validations;

use BrosSquad\FluVal\Fluent\FluentValidator;
use BrosSquad\FluVal\ValidationModel;

class UserValidator extends FluentValidator
{
  public function __construct(ValidationModel $model)
  {
    parent::__construct($model);

    $this->forMember('first_name', 'First name')
      ->notEmpty()
      ->withMessage('First name is required.');
  }
}