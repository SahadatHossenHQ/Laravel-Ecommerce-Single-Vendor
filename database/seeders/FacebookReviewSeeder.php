<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FbReview; // Import the FbReview model
class FacebookReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FbReview::create([
            'image_path' => 'uploads/fb-review/1.jpg',
        ]);

        FbReview::create([
            'image_path' => 'uploads/fb-review/2.jpg',
        ]);
        FbReview::create([
            'image_path' => 'uploads/fb-review/3.jpg',
        ]);

        FbReview::create([
            'image_path' => 'uploads/fb-review/4.jpg',
        ]);
        FbReview::create([
            'image_path' => 'uploads/fb-review/5.jpg',
        ]);

        FbReview::create([
            'image_path' => 'uploads/fb-review/6.jpg',
        ]);
        FbReview::create([
            'image_path' => 'uploads/fb-review/7.jpg',
        ]);

        FbReview::create([
            'image_path' => 'uploads/fb-review/8.jpg',
        ]);
        FbReview::create([
            'image_path' => 'uploads/fb-review/9.jpg',
        ]);

        FbReview::create([
            'image_path' => 'uploads/fb-review/10.jpg',
        ]);
        FbReview::create([
            'image_path' => 'uploads/fb-review/11.jpg',
        ]);

        FbReview::create([
            'image_path' => 'uploads/fb-review/12.jpg',
        ]);
        FbReview::create([
            'image_path' => 'uploads/fb-review/13.jpg',
        ]);

        FbReview::create([
            'image_path' => 'uploads/fb-review/14.jpg',
        ]);
    }
}
