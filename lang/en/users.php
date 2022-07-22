<?php

// English

return [
    'title' => [
        'index' => 'Users',
        'create' => 'Create Users',
        'edit' => 'Edit Users'
    ],

    'index' => [
        'addBtn' => 'Add Users',
        'search' => [
            'placeholder' => 'Search Here...',
            'null' => '<span class="text-white mr-1">:keyword</span> Not Found'
        ],
        'table' => [
            'name' => 'Name',
            'roles' => 'Roles',
            'status' => [
                'title' => 'Status',
                'online' => 'Online',
                'offline' => 'Offline'
            ]
        ]
    ],

    'create' => [
        'avatarBtn' => 'Chose File',
        'role' => [
            'title' => 'Roles',
            'placeholder' => 'Select Roles'
        ],
        'name' => 'Name',
        'email' => 'Email',
        'password' => [
            'title' => 'Password',
            'rule' => 'Max 8 Characters'
        ],
        'confirmPw' => 'Confirm Password',
        'submit' => 'Ok, Save'
    ],

    'edit' => [
        'submit' => 'Ok, Done'
    ],

    'attributes' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'avatar' => 'Avatar',
        'role' => 'Roles',
    ],

    'alert' => [
        'create' => [
            'title' => 'Add Users',
            'message' => [
                'success' => 'Great! Users created successfully',
                'error' => 'Oops, category failed to create. :error'
            ]
        ],
        'update' => [
            'title' => 'Update Users',
            'message' => [
                'success' => 'Great! Users updated successfully.',
                'error' => 'Oops, category failed to update. :error'
            ]
        ],
        'delete' => [
            'title' => 'Delete Users',
            'message' => [
                'confirm' => 'Are you sure want to delete :title ?',
                'success' => 'Great! Users :title deleted successfully',
                'error' => 'Oops, Users :title failed to delete. :error'
            ]
        ],
        'btn' => [
            'confirm' => 'Yup!',
            'cancel' => 'Im not sure',
        ]
    ],
];
