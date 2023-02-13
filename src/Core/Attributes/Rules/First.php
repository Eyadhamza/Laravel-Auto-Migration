<?php

namespace Eyadhamza\LaravelAutoMigration\Core\Attributes\Rules;

use Attribute;

#[Attribute]
class First
{
    public function __construct(
        private readonly ?string $value = null
    )
    {
    }
}
