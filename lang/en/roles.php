<?php

// English

return [
    'title' => 'Roles',
    'index' => [
        'title' => 'Role',
        'addBtn' => 'Add Role',
    ],
    'detail' => [
        'title' => 'Detail :title',
        'name' => 'Name'
    ],
    'create' => [
        'title' => 'Create Role',
        'name' => 'Role Name',
        'submit' => 'Lets Go!'
    ],
    'edit' => [
        'title' => 'Edite Roles',
        'name' => 'Role Name',
        'submit' => 'Save Now!'
    ],
    'alert' => [
        'create' => [
            'title' => 'Add Role',
            'message' => [
                'success' => 'Great! Role created successfully',
                'error' => 'Oops, category failed to create. :error'
            ]
        ],
        'update' => [
            'title' => 'Update Role',
            'message' => [
                'success' => 'Great! Role updated successfully.',
                'error' => 'Oops, category failed to update. :error'
            ]
        ],
        'delete' => [
            'title' => 'Delete Role',
            'message' => [
                'confirm' => 'Are you sure want to delete <b>:title</b> ?',
                'success' => 'Great! Role :title deleted successfully',
                'error' => 'Oops, Role :title failed to delete. :error',
                "warning" => "Sorry, the <b>:name</b> role cannot be deleted, Because it's still in use :("
            ]
        ],
        'btn' => [
            'confirm' => 'Yes!',
            'cancel' => 'Im not sure',
        ]
    ]
];
