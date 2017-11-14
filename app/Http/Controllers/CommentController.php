<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 11/14/2017
 * Time: 10:33 PM
 */

namespace App\Http\Controllers;

use App\Comment;
use App\Exceptions\BaseHandler;
use App\Response;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function addComment(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'com_contents' => 'This is the comment',
                'fk_acc_id' => 33,
                'fk_adv_id' => 3
            ]);

        return Comment::addModel(new Comment(), $request->attributes->all());
    }

    public function updateComment(Request $request)
    {
        $request = new Request();
        $request->attributes
            ->add([
                'com_id' => 4,
                'com_contents' => 'Some Comment from account',
                'fk_acc_id' => 33,
                'fk_adv_id' => 3
            ]);
        $params = $request->attributes->all();

        $id = $params[Comment::$COMMENT_ID];

        $comment = self::getCommentById($id);

        $comment instanceof Comment ? $response = Comment::updateModel($comment, $params) : $response = $comment;

        return $response;
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getCommentById($id)
    {

        try {
            return Comment::findOrFail($id);
        } catch (\Exception $ex) {
            return array('response' => BaseHandler::setFailedResponse(new Response(), 'Failed to retrieve data with id{' . $id . '}', $ex),
                'data' => null);
        }
    }

    public function deleteComment()
    {
        $id = 3;

        $comment = self::getCommentById($id);

        $comment instanceof Comment ? $response = Comment::deleteModel($comment) : $response = $comment;

        return $response;
    }
}