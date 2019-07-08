<?php

namespace App\Controllers;

interface HttpStatusCodes
{
  const OK = 200;
  const CREATED = 201;
  const BAD_REQUEST = 400;
  const UN_AUTHORIZED = 401;
  const FORBIDDEN = 403;
  const NOT_FOUND = 404;
  const METHOD_NOT_ALLOWED = 405;
  const BAD_ENTITY = 422;
  const INTERNAL_SEVER_ERROR = 500;
  const BAD_GATEWAY = 502;
}