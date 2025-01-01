<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Image\Enums\Fit;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;

    class Post extends Model implements HasMedia
    {
        /** @use HasFactory<\Database\Factories\PostFactory> */
        use HasFactory, SoftDeletes, InteractsWithMedia;

        protected $fillable = [
            'title',
            'slug',
            'type',
            'description',
            'content',
            'user_id',
        ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
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
//                    ->blur($image['blur'])
                    ->fit(Fit::Max, $image['height'], $image['height'])
                    ->nonQueued();
            }
        }

        /**
         * @return void
         */
        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('posts')
                ->useFallbackUrl(url(config('app.placeholder')));
        }


    }
