<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            [
                "id" => 1,
                "name" => "Information Technology"
            ],
            [
                "id" => 2,
                "name" => "Travel"
            ],
            [
                "id" => 3,
                "name" => "Food & Receipes"
            ],
            [
                'id' => 4,
                "name" => "Health & Fitness"
            ],
            [
                'id' => 5,
                "name" => "Eduction"
            ]
        ];

        return view('categories.index', compact('categories'));
    }
}
