<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CommentController extends Controller
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * CommentController constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->middleware('auth');
        $this->commentRepository = $commentRepository;
    }

    /**
     * Store a newly created Comment in storage.
     *
     * @param CreateCommentRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentRequest $request)
    {
        $input = $request->all();

        $comment = $this->commentRepository->create($input);

        Flash::success('Comment has been saved successfully');

        //return redirect(route('user.product-advert.show', $input['advert_id']))->with(['comment' => $comment]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($region)) {
            //Flash::error('Comment not found');

            return response()->json(['error' => 'Comment not found']);
        }

        return response()->json(['comment' => $comment]);
    }

    public function update($id, UpdateCommentRequest $request)
    {

        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            //Flash::error('Comment not found');

            return response()->json(['error' => 'Comment not found']);
        }

        $comment = $this->commentRepository->update($request->all(), $id);

        return response()->json(['comment' => $comment]);
    }
}
