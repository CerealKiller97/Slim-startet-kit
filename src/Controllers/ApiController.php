<?php

namespace App\Controllers;

use Exception;
use Slim\Http\Response;

abstract class ApiController implements HttpStatusCodes
{
  protected function ok(Response $response, $data)
  {
    return $response->withJson($data, static::OK);
  }

  protected function created(Response $response, $data): Response
  {
    return $response->withJson($data, static::CREATED);
  }

  protected function accepted(Response $response, $data): Response
  {
    return $response->withJson($data, static::ACCEPTED);
  }

  protected function noContent(Response $response): Response
  {
    return $response->withJson(null, static::NO_CONTENT);
  }

  protected function movedPermanently(Response $response, $data)
  {
    return $response->withJson($data, static::MOVED_PERMANENTLY);
  }

  protected function badRequest(Response $response, Exception $e): Response
  {
    return $response->withJson(['message' => $e->getMessage()], static::BAD_REQUEST);
  }

  protected function unauthorized(Response $response, $data): Response
  {
    return $response->withJson($data, static::UNAUTHORIZED);
  }

  protected function forbidden(Response $response, $data): Response
  {
    return $response->withJson($data, static::FORBIDDEN);
  }

  protected function notFound(Response $response, string $entity): Response
  {
    return $response->withJson(['message' => "{$entity} not Found."], static::NOT_FOUND);
  }

  protected function methodNotAllowed(Response $response, $data): Response
  {
    return $response->withJson($data, static::METHOD_NOT_ALLOWED);
  }

  protected function internalServerError(Response $response, $data): Response
  {
    return $response->withJson($data, static::INTERNAL_SERVER_ERROR);
  }

  protected function badGateway(Response $response, $data): Response
  {
    return $response->withJson($data, static::BAD_GATEWAY);
  }

  protected function serviceUnavailable(Response $response, $data): Response
  {
    return $response->withJson($data, static::SERVICE_UNAVAILABLE);
  }
}