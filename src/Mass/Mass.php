<?php
/*****
 * flame 2018.2.21
 * 群发功能需要在Tag相关模块开发完毕后才可能开始编写.
 */
namespace Flameh\Mass;

use Doctrine\Common\Collections\ArrayCollection;
use Flameh\Mass\Mass\MassEntity;

abstract class Mass extends ArrayCollection {
    public function setResponse(MassEntity $entity){
        $body = $entity->getBody();
    }
}