<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ]
];
// method
// function tampilkanMenuBertingkat(array $menu)
// {
//     echo"<ul>";
//     foreach ($menu as $key => $item) {
//         echo"<li>{$item['nama']}</li>";
//     }
//     echo"<ul>";
// }

function tampilkanMenuBertingkat(array $menu)
{
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>{$item['nama']}</li>";
        // isset untuk mengecek apakah terdapat subMenu
        if (isset($item['subMenu'])) {
            // pemanggilan recursive
            tampilkanMenuBertingkat($item['subMenu']);
        }
    }
    echo "</ul>";
}
// recursive call
tampilkanMenuBertingkat($menu);
