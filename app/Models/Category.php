<?php

    namespace App\Models;

    use App\Traits\Live;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Kalnoy\Nestedset\NodeTrait;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;


    class Category extends Model implements HasMedia
    {
        /** @use HasFactory<\Database\Factories\CategoryFactory> */
        use HasFactory, NodeTrait, SoftDeletes, InteractsWithMedia, Live;

        protected $fillable = [
            'title',
            'slug',
            'parent_id',
            'description',
            'content',
            'popular',
            'live',
        ];


        /**
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function products(): HasMany
        {
            return $this->hasMany(Product::class);
        }


        /**
         * @return string[]
         */
        protected function casts(): array
        {
            return [
                'popular' => 'boolean',
                'live' => 'boolean',
            ];
        }

    }
