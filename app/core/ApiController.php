<?php
namespace ApiCondor\core;

use JsonSerializable;

abstract class ApiController
{
    abstract public function fetch() :JsonSerializable;
}