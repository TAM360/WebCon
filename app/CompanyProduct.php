<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;

class CompanyProduct extends Model
{
    use Searchable;
    public $timestamps = false;
    /**
     * @var string
     */
    protected $indexConfigurator = ProductsIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    protected $mapping = [
        'properties' => [
            'id' => [
                'type' => 'integer',
                'index' => 'not_analyzed'
            ],
            'name' => [
                'type' => 'string',
                'analyzer' => 'english'
            ],
            'description' => [
                'type' => 'string',
                'analyzer' => 'english'
            ],
            'category' => [
                'type' => 'string',
                'index' => 'english'
            ],
            'price' => [
                'type' => 'double',
                'index' => 'not_analyzed'
            ]
        ]
    ];
}