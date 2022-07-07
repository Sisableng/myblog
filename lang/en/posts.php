<?php

return [
    'index' => [
        'title' => 'Data Post',
        'addBtn' => 'Add Post',
        'search' => 'Search here...',
        'tabs' => [
            'publish' => 'Published',
            'draft' => 'Drafts'
        ],
        'table' => [
            'title' => 'Title',
            'author' => 'Author',
            'date' => 'Date'
        ]
    ],

    'create' => [
        'title' => 'Add Post',
        'submit' => 'Lets Go!',
        'form' => [
            'title' => 'Title here...',
            'slug' => 'Auto created',
            'desc' => [
                'title' => 'Description',
                'placeholder' => 'Write here...'
            ],
            'content' => 'Write your idea here...',
            'category' => 'Category',
            'tag' => [
                'title' => 'Tags',
                'placeholder' => 'Select Tag'
            ],
            'thumb' => 'Cover Photo',
            'status' => [
                'title' => 'Status',
                'publish' => 'Publish',
                'draft' => 'Draft'
            ]
        ]
    ],

    'detail' => [
        'title' => 'Detail Post',
        'show' => [
            'title' => 'Title',
            'content' => 'Content',
            'category' => 'Category',
            'tag' => 'Tag',
            'date' => 'Date',
        ]
    ],

    "alert" => [
        "create" => [
            "title" => "Add Post",
            "message" => [
                "success" => "Great! Post created successfully",
                "error" => "Oops, category failed to create. :error"
            ]
        ],
        "update" => [
            "title" => "Update Post",
            "message" => [
                "success" => "Great! Post updated successfully.",
                "error" => "Oops, category failed to update. :error"
            ]
        ],
        "delete" => [
            "title" => "Delete Post",
            "message" => [
                "confirm" => "Are you sure want to delete this :title category ?",
                "success" => "Great! Post :title deleted successfully",
                "error" => "Oops, Post :title failed to delete. :error"
            ]
        ],
        "btn" => [
            "confirm" => "Yes!",
            "cancel" => "Im not sure",
        ]
    ],
];
