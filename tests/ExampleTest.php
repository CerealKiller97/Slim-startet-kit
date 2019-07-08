<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
  public function test_exmaple()
  {
    $num = 2;
    $num2 = 3;

    $this->assertEquals(5, $num + $num2);
  }
}