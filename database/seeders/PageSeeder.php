<?php

namespace Database\Seeders;

use App\Models\Menu\PagesMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slideMenu = File::get('database/data/slide-menu.json');
        $simpleMenu = File::get('database/data/simple-menu.json');
        $topMenu = File::get('database/data/top-menu.json');
        $data = [
            ['id' => 1, 'slug' => 'slide-menu', 'menu_items' => $slideMenu],
            ['id' => 2, 'slug' => 'simple-menu', 'menu_items' => $simpleMenu],
            ['id' => 3, 'slug' => 'top-menu', 'menu_items' => $topMenu]
        ];
        PagesMenu::insert($data);
    }
}
