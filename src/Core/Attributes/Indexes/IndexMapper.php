<?php

namespace Eyadhamza\LaravelEloquentMigration\Core\Attributes\Indexes;

use Attribute;
use Eyadhamza\LaravelEloquentMigration\Core\Attributes\AttributeEntity;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Support\Fluent;


#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
class IndexMapper extends AttributeEntity
{
    protected string|array $columns;
    protected string|null $algorithm;
    protected Fluent $definition;

    public function __construct($columns, $algorithm = null)
    {
        parent::__construct("");
        $this->columns = $columns;
        $this->algorithm = $algorithm;
    }

    public function setDefinition(string $tableName): self
    {

        $indexKeyName = (new Blueprint($tableName))->index($this->columns)->get('index');
        $this->definition = new IndexDefinition([
            'columns' => $this->columns,
            'name' => $indexKeyName,
            'type' => 'index',
        ]);

        $this->setName($indexKeyName);

        return $this;
    }
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
    public static function make(IndexMapper $modelProperty): self
    {
        return new self($modelProperty->getColumns(), $modelProperty->getAlgorithm());
    }
    public function getColumns(): array|string
    {
        return $this->columns;
    }

    private function getAlgorithm()
    {
        return $this->algorithm;
    }
}
