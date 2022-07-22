<?php

// Sunda

return [
    'title' => 'Hak Akses',
    'index' => [
        'title' => 'Gelar',
        'addBtn' => 'Tambih',
    ],
    'detail' => [
        'title' => 'Rinci :title',
        'name' => 'Nami'
    ],
    'create' => [
        'title' => 'Tambih Role',
        'name' => 'Nami Role',
        'submit' => 'Gass!'
    ],
    'edit' => [
        'title' => 'Ngedit Roles',
        'name' => 'Role Name',
        'submit' => 'Sip lur!'
    ],
    'alert' => [
        'create' => [
            'title' => 'Tambih Role',
            'message' => [
                'success' => 'Mantap, Role parantos ditambahkeun',
                'error' => 'Aduh, Role gagal ditambahkeun euy. :error'
            ]
        ],
        'update' => [
            'title' => 'Apdet Role',
            'message' => [
                'success' => 'Mantap, Apdet Role beres.',
                'error' => 'Aduh, Apdet Role gagal. :error'
            ]
        ],
        'delete' => [
            'title' => 'Hapus Role',
            'message' => [
                'confirm' => 'Ente yakin hoyong ngahapus Role :title ieu?',
                'success' => 'Oke, Role :title parantos dihapus',
                'error' => 'Aduh, Role :title gagal dihapus. :error',
                "warning" => "Aduh, Role <b>:name</b> teu tiasa dihapus euy, soalna nuju diangge :("
            ]
        ],
        'btn' => [
            'confirm' => 'Gass!',
            'cancel' => 'Teu jadi',
        ]
    ],
];
