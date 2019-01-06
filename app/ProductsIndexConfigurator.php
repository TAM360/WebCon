<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ProductsIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    /**
     * @var array
     */
    protected $settings = [
        'analysis' => [
            'analyzer' => [
                'es_std' => [
                    'type' => 'standard',
                    // 'stopwords' => '_spanish_'
                ]
            ]    
        ]
    ];
}