<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Products\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    private $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function store(Request $request, $order_line_id, $product_id) {
        $request->validate([
            'title'   => 'required|min:1|max:255',
            'comment' => 'required|min:1',
            'rating'  => 'required|integer|between:1,5'
        ], [
            'title.required'   => 'Please enter a title.',
            'title.min'        => 'Title must be at least 1 characters.',
            'title.max'        => 'Title may not be greater than 255 characters.',
            'comment.required' => 'Please enter a comment.',
            'comment.min'      => 'Comment must be at least 1 characters.',
            'rating.required'  => 'Please select a rating.',
            'rating.integer'   => 'Rating must be a whole number.',
            'rating.between'   => 'Rating must be between :min and :max.'
        ]);

        $this->review->title         = $request->title;
        $this->review->content       = $request->comment;
        $this->review->rating        = $request->rating;
        $this->review->order_line_id = $order_line_id;
        $this->review->product_id    = $product_id;
        $this->review->customer_id   = Auth::user()->id;
        
        $this->review->save();
        
        return redirect()->back();
    }

    public function update(Request $request, $review_id, $order_line_id, $product_id) {
        $request->validate([
            'title'   => 'required|min:1|max:255',
            'comment' => 'required|min:1',
            'rating'  => 'required|integer|between:1,5'
        ], [
            'title.required'   => 'Please enter a title.',
            'title.min'        => 'Title must be at least 1 characters.',
            'title.max'        => 'Title may not be greater than 255 characters.',
            'comment.required' => 'Please enter a comment.',
            'comment.min'      => 'Comment must be at least 1 characters.',
            'rating.required'  => 'Please select a rating.',
            'rating.integer'   => 'Rating must be a whole number.',
            'rating.between'   => 'Rating must be between :min and :max.'
        ]);

        $review = $this->review->findOrFail($review_id);

        $review->title         = $request->title;
        $review->content       = $request->comment;
        $review->rating        = $request->rating;
        $review->order_line_id = $order_line_id;
        $review->product_id    = $product_id;
        $review->customer_id   = Auth::user()->id;
        
        $review->save();
        
        return redirect()->back();
    }

    public function destroy($review_id) {
        $this->review->destroy($review_id);

        return redirect()->back();
    }
}

