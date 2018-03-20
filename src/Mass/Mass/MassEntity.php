<?php
namespace Flameh\Mass\Mass;


abstract class MassEntity {
    abstract public function getType();
    abstract public function getBody();
}