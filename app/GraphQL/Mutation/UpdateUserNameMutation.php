<?php
namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\User;

class UpdateUserNameMutation extends Mutation {
    protected $attributes = [
        'name' => 'updateUserName'
    ];

    public function type() {
        return GraphQL::type('User');
    }

    public function args() {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())],
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
            'email' => ['email' => 'name', 'type' => Type::nonNull(Type::string())],
        ];
    }

    public function resolve($root, $args) {
        $user = User::find($args['id']);
        if (!$user) return null;

        $user->name = $args['name'];
        $user->email = $args['email'];
        $user->save();

        return $user;
    }
}
