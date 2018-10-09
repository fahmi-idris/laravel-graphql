<?php
namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType {
    protected $attributes = [
        'name' => 'User',
        'description' => 'Description'
    ];

    public function fields() {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The Name of user'
            ]
        ];
    }

    
    protected function resolveEmailField($root, $args) {
        return strtolower($root->email);
    }
}
