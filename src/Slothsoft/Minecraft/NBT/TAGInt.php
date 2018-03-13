<?php
declare(strict_types = 1);
namespace Slothsoft\Minecraft\NBT;

class TAGInt extends TAGNumber
{

    const TYPE = 3;

    public function loadPayload()
    {
        parent::loadPayload(4);
    }
}

