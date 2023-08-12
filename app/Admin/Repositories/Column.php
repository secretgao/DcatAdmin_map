<?php

namespace App\Admin\Repositories;

use App\Models\Column as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Column extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
