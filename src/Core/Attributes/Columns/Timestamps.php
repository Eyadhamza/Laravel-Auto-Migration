<?php

namespace Eyadhamza\LaravelEloquentMigration\Core\Attributes\Columns;

use Attribute;
use Illuminate\Database\Schema\Blueprint;

;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
class Timestamps extends ColumnMapper
{
    public function __construct()
    {
        parent::__construct("");
    }
}
