<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'identifier' => $category->id,
            'title' => (string) $category->name,
            'details' => (string) $category->description,
            'creationDate' =>(string) $category->created_at,
            'lastChanged' =>(string) $category->updated_at,
            'deletedDate' => isset($category->deleted_at) ? (string) $category->deleted_at : null,

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('categories.show', $category->id),
                ],  

                [
                    'rel' => 'category.buyers',  
                    'href' => route('category.buyers.index', $category->id),
                ],

                [
                    'rel' => 'category.products',  
                    'href' => route('category.products.index', $category->id),
                ],  

                [
                    'rel' => 'category.sellers',  
                    'href' => route('category.sellers.index', $category->id),
                ],  

                [
                    'rel' => 'category.transactions',  
                    'href' => route('category.transactions.index', $category->id),
                ],
            ]

        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'identifier' => 'id',
            'title' => 'name',
            'details' => 'description',
            'creationDate' => 'created_at',
            'lastChanged' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identifier',
            'name' => 'title',
            'description' => 'details',
            'created_at' => 'creationDate',
            'updated_at' => 'lastChanged',
            'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
