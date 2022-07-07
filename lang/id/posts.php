<?php

return [
    'index' => [
        'title' => 'Data Postingan',
        'addBtn' => 'Tambah Pos',
        'search' => 'Cari disini...',
        'tabs' => [
            'publish' => 'Diterbitkan',
            'draft' => 'Konsep'
        ],
        'table' => [
            'title' => 'Judul',
            'author' => 'Penulis',
            'date' => 'Tanggal'
        ]
    ],

    'create' => [
        'title' => 'Tambah Pos',
        'submit' => 'Tambah',
        'form' => [
            'title' => 'Tulis Judul...',
            'slug' => 'Dibuat Otomatis',
            'desc' => [
                'title' => 'Deskripsi',
                'placeholder' => 'Tulis deskripsi disini...'
            ],
            'content' => 'Tulis Konten disini...',
            'category' => 'Kategori',
            'tag' => [
                'title' => 'Tag',
                'placeholder' => 'Pilih Tag'
            ],
            'thumb' => 'Sampul',
            'status' => [
                'title' => 'Status',
                'publish' => 'Terbitkan',
                'draft' => 'Simpan ke konsep'
            ]
        ]
    ],

    'detail' => [
        'title' => 'Detail Pos',
        'show' => [
            'title' => 'Judul',
            'content' => 'Konten',
            'category' => 'Kategori',
            'tag' => 'Tag',
            'date' => 'Tanggal',
        ]
    ],

    "alert" => [
        "create" => [
            "title" => "Tambah Pos",
            "message" => [
                "success" => "Hore, Pos berhasil dibuat",
                "error" => "Hmm, Pos gagal dibuat nih. :error"
            ]
        ],
        "update" => [
            "title" => "Edit Pos",
            "message" => [
                "success" => "Hore, Edit Posting berhasil.",
                "error" => "Hmm, Edit Posting gagal nih. :error"
            ]
        ],
        "delete" => [
            "title" => "Hapus Pos",
            "message" => [
                "confirm" => "Kamu yakin mau hapus Pos :title ?",
                "success" => "Hore, Pos :title berhasil dihapus",
                "error" => "Hmm, Pos :title gagal dihapus. :error"
            ]
        ],
        "btn" => [
            "confirm" => "Oke",
            "cancel" => "Gak jadi",
        ]
    ],
];
