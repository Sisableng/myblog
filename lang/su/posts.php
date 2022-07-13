<?php

return [
    'index' => [
        'title' => 'Data Posting',
        'addBtn' => 'Tambih Post',
        'search' => 'Pilari didieu...',
        'null' => 'Aduh, Teu acan aya data',
        'tabs' => [
            'publish' => 'Umum',
            'draft' => 'Draf'
        ],
        'table' => [
            'title' => 'Judul',
            'author' => 'pangarang',
            'date' => 'kaping'
        ],
        'status' => [
            'publish' => 'Umum',
            'draft' => 'Ditunda'
        ]
    ],
    'search' => [
        'null' => 'Aduh, Data henteu kapendak'
    ],

    'create' => [
        'title' => 'Tambih Posting',
        'submit' => 'Tambih',
        'form' => [
            'title' => 'Tulis Judul...',
            'slug' => 'Didamel Otomatis',
            'desc' => [
                'title' => 'Katerangan',
                'placeholder' => 'Tulis Katerangan didieu...'
            ],
            'content' => 'Tulis Konten didieu...',
            'category' => 'Kategori',
            'tag' => [
                'title' => 'Tag',
                'placeholder' => 'Pilih Tag'
            ],
            'thumb' => 'Gambar',
            'status' => [
                'title' => 'Status',
                'publish' => 'Terbitkeun',
                'draft' => 'Simpeun Hela'
            ]
        ]
    ],

    'detail' => [
        'title' => 'Detail Posting',
        'show' => [
            'title' => 'Judul',
            'content' => 'Eusi',
            'category' => 'Kategori',
            'tag' => 'Tag',
            'date' => 'Kaping',
        ]
    ],

    "alert" => [
        "create" => [
            "title" => "Tambih Posting",
            "message" => [
                "success" => "Mantap, Posting parantos ditambahkeun",
                "error" => "Aduh, Posting gagal ditambahkeun euy. :error"
            ]
        ],
        "update" => [
            "title" => "Apdet Posting",
            "message" => [
                "success" => "Mantap, Apdet posting beres.",
                "error" => "Aduh, Apdet posting gagal. :error"
            ]
        ],
        "delete" => [
            "title" => "Hapus Posting",
            "message" => [
                "confirm" => "Ente yakin hoyong ngahapus posting :title ieu?",
                "success" => "Oke, Posting :title parantos dihapus",
                "error" => "Aduh, Posting :title gagal dihapus. :error"
            ]
        ],
        "btn" => [
            "confirm" => "Gass!",
            "cancel" => "Teu jadi",
        ]
    ],
];
