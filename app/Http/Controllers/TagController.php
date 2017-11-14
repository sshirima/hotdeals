<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/15/2017
 * Time: 12:25 AM
 */

namespace App\Http\Controllers;

use App\Tag;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function addTag(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'tag_name' => 'New tag',
                'fk_acc_id' => 33
            ]);

        return Tag::addModel(new Tag(), $request->attributes->all());
    }

    public function updateTag(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'tag_id' => 1,
                'tag_name' => 'Updated tag',
                'fk_acc_id' => 33
            ]);
        $params = $request->attributes->all();

        $id = $params[Tag::$TAG_ID];

        $tag = self::getTagById($id);

        $tag instanceof Tag ? $response = Tag::updateModel($tag, $params) : $response = $tag;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getTagById($id)
    {

        try {
            return Tag::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }

    public function deleteTag()
    {
        $id = 1;

        $tag = self::getTagById($id);

        $tag instanceof Tag ? $response = Tag::deleteModel($tag) : $response = $tag;

        return $response;
    }
}