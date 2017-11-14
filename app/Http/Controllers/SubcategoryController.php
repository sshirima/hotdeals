<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/15/2017
 * Time: 12:37 AM
 */

namespace App\Http\Controllers;

use App\SubCategory;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function addSubCategory(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'subcat_name' => 'New subcategory'
            ]);

        return SubCategory::addModel(new SubCategory(), $request->attributes->all());
    }

    public function updateSubCategory(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'subcat_id' => 2,
                'subcat_name' => 'Updated subcategory'
            ]);
        $params = $request->attributes->all();

        $id = $params[SubCategory::$SUBCATEGORY_ID];

        $subcategory = self::getSubCategoryById($id);

        $subcategory instanceof SubCategory ? $response = SubCategory::updateModel($subcategory, $params) : $response = $subcategory;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getSubCategoryById($id)
    {

        try {
            return SubCategory::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }

    public function deleteSubCategory()
    {
        $id = 1;

        $subcategory = self::getSubCategoryById($id);

        $subcategory instanceof SubCategory ? $response = SubCategory::deleteModel($subcategory) : $response = $subcategory;

        return $response;
    }
}