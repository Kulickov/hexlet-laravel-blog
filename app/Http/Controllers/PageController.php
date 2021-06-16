<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $team = array(
            'id_1' => array(
                'name' => 'Алексей',
                'position' => 'Журналист'
            ),
            'id_2' => array(
                'name' => 'Евгений',
                'position' => 'Редактор'
            ),
            'id_3' => array(
                'name' => 'Максим',
                'position' => 'Биг Босс'
            ),
        );
        return view('about', ['team' => $team]);
    }
}
