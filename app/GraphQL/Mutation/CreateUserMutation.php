<?php
namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\User;

class CreateUserMutation extends Mutation {
    protected $attributes = [
        'name' => 'updateUserName'
    ];

    public function type() {
        return GraphQL::type('User');
    }

    public function args() {
        return [
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
            'email' => ['email' => 'email', 'type' => Type::nonNull(Type::string())],
            'password' => ['password' => 'email', 'type' => Type::nonNull(Type::string())],
        ];
    }

    public function resolve($root, $args) {
        $args['password'] = bcrypt($args['password']);
        $user = User::create($args);
        return $user;
    }
}
