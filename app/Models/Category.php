<?php

    namespace App\Models;

    use App\Traits\Live;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Kalnoy\Nestedset\NodeTrait;
    use Spatie\Image\Enums\Fit;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;


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
         * @param \Spatie\MediaLibrary\MediaCollections\Models\Media|null $media
         *
         * @return void
         */
        public function registerMediaConversions(?Media $media = null): void
        {
            foreach (config('image-conversion.default') as $key => $image) {
                $this->addMediaConversion($key)
                    ->format($image['format'])
                    ->blur($image['blur'])
                    ->fit(Fit::Max, $image['height'], $image['height'])
                    ->nonQueued();
            }
        }

        /**
         * @return void
         */
        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('categories')
                ->useFallbackUrl(url(config('app.placeholder')));
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
