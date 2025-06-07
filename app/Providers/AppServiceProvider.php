<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Page;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\miniCategory;
use Illuminate\Pagination\Paginator;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    
    {
        {
            Paginator::useBootstrap();
        }
        Builder::macro('filter', function($key, $column = null, $compareWith = null, $filterIf = true) {
            if(($value = request($key, null)) !== null && $filterIf) {
                return $this->where($column ?? $key, $compareWith ?? '=', $value);
            }
            return $this;
        });

        Builder::macro('filterWith', function($key, $column = null) {
            if((request($key, null)) !== null) {
                $value = request($key, null);
                return $this->whereIn($column ?? $key, $value);
            }
            return $this;
        });

        
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach ($attributes as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);
        
                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });
        
            return $this;
        });

        $footerPages=page::where('status','1')->where('position','1')->get();
        $categories_f     = Category::where('status', true)->orderBy('updated_at','desc')->where('is_feature', '1')->take(10)->get();
        $sub_f     = subCategory::where('status', true)->orderBy('updated_at','desc')->where('is_feature', '1')->take(10)->get();
        $mini_f     = miniCategory::where('status', true)->orderBy('updated_at','desc')->where('is_feature', '1')->take(10)->get();

        View::share(
            [
                'footerPages'=>$footerPages,
                'categories_f'=>$categories_f,
                'sub_f'=>$sub_f,
                'mini_f'=>$mini_f,
            ]
        );
    }
}
