<?php

namespace Eyadhamza\LaravelAutoMigration\Core\Attributes\Columns;

use Attribute;;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
class Year extends ColumnMapper
{

}
