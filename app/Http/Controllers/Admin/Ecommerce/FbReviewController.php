<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\FbReview;
use Illuminate\Http\Request;

class FbReviewController extends Controller
{
    // List all reviews
    public function index()
    {
        $reviews = FbReview::all();
        return view('admin.e-commerce.fb-review.index', compact('reviews'));
    }

    // Show the form to upload a new image
    public function create()
    {
        return view('admin.e-commerce.fb-review.create');
    }

    // Store the uploaded image path in the database
    public function store(Request $request)
{
    $validated = $request->validate([
        'image_path' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validate the uploaded image
    ]);

    // Define the destination path
    $destinationPath = public_path('uploads/fb-review');

    // Get the uploaded file
    $file = $request->file('image_path');

    // Generate a unique file name
    $fileName = time() . '_' . $file->getClientOriginalName();

    // Move the file to the destination path
    $file->move($destinationPath, $fileName);

    // Save the relative path in the database
    $imagePath = 'uploads/fb-review/' . $fileName;
    FbReview::create(['image_path' => $imagePath]);

    return redirect()->route('admin.fb-review.index')->with('success', 'Image uploaded successfully!');
}


    // Delete an image
    public function destroy(FbReview $fbReview)
{
    // Delete the image from the public/uploads/fb-review folder
    if ($fbReview->image_path && file_exists(public_path($fbReview->image_path))) {
        unlink(public_path($fbReview->image_path));
    }

    $fbReview->delete();

    return redirect()->route('admin.fb-review.index')->with('success', 'Image deleted successfully!');
}

}

