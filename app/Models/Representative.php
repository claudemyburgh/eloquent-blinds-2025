<?php

    namespace App\Models;


    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Casts\Attribute;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;

    class Representative extends Model implements HasMedia
    {
        /** @use HasFactory<\Database\Factories\RepresentativeFactory> */
        use HasFactory, InteractsWithMedia, SoftDeletes;

        protected $fillable = [
            'first_name',
            'last_name',
            'phone',
            'email',
            'avatar',
            'active',
            'bio',
        ];

        protected $appends = ['full_name'];


        /**
         * @param \Illuminate\Database\Eloquent\Builder $builder
         *
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeActive(Builder $builder): Builder
        {
            return $builder->where('active', true);
        }

        /**
         * @return string
         */
        public function getFullNameAttribute(): string
        {
            return trim($this->first_name) . " " . trim($this->last_name);
        }

        /**
         * @return string[]
         */
        protected function casts(): array
        {
            return [
                'active' => 'boolean',
                'full_name' => 'string'
            ];
        }

        /**
         * @return \Illuminate\Database\Eloquent\Casts\Attribute
         */
        protected function avatar(): Attribute
        {
            return Attribute::make(
                get: fn (string $value) => '/storage/' . $value,
            );
        }


    }
