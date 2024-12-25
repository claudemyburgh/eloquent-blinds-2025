<?php

    namespace App\Models;

    use App\Enums\Supplier;
    use App\Traits\Live;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Image\Enums\Fit;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;
    use Spatie\Tags\HasTags;

    class Product extends Model implements HasMedia
    {
        /** @use HasFactory<\Database\Factories\ProductFactory> */
        use HasFactory, InteractsWithMedia, HasTags, SoftDeletes, Live;

        protected $fillable = [
            'category_id',
            'title',
            'slug',
            'description',
            'content',
            'live',
            'popular',
            'guarantee',
            'supplier',
            'supplier_code',
            'availability',
        ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
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
            $this->addMediaCollection('products')
                ->useFallbackUrl(url(config('app.placeholder')));
        }

        /**
         * @param \Illuminate\Database\Eloquent\Builder $builder
         * @param \App\Enums\Supplier $supplier
         *
         * @return void
         */
        public function scopeSupplier(Builder $builder, Supplier $supplier): void
        {
            $builder->where('supplier', $supplier->value);
        }

        /**
         * @param \Illuminate\Database\Eloquent\Builder $builder
         *
         * @return void
         */
        public function scopeTaylor(Builder $builder): void
        {
            $builder->supplier(Supplier::TAYLOR);
        }

        /**
         * @param \Illuminate\Database\Eloquent\Builder $builder
         *
         * @return void
         */
        public function scopeAluvert(Builder $builder): void
        {
            $builder->supplier(Supplier::ALUVERT);
        }

        /**
         * @param \Illuminate\Database\Eloquent\Builder $builder
         *
         * @return void
         */
        public function scopeQuantum(Builder $builder): void
        {
            $builder->supplier(Supplier::QUANTUM);
        }


    }
