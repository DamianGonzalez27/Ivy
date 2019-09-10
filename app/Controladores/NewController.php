<?php

namespace Controller;

class NewController
{
  /**
  * @author Damian Gonzalez
  * @since 10/09/2019
  * Singleton
  */

  public function __construct()
  {

  }

  public function getFunctions()
  {
    return $this->getFunction();
  }

  private function getFunction()
  {
    return "Esto es un singleton sencillo";
  }

}
