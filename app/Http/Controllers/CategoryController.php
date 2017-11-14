<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 10:06 PM
 */

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function addCategory(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'cat_name' => 'Phones'
            ]);

        return Category::addCategory($request->attributes->all());
    }

    public function updateCategory(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'cat_id' => 1,
                'cat_name' => 'Shoes'
            ]);

        return Category::updateCategory($request->attributes->all());
    }

    public function deleteCategory()
    {
        return Category::deleteCategory(1);
    }

}