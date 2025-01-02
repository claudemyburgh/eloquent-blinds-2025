<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphTo;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Meta extends Model
    {
        use SoftDeletes, HasFactory;

        protected $fillable = [
            'meta_title',
            'meta_description',
            'meta_image',
            'meta_keywords',
        ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo
         */
        public function metaable(): MorphTo
        {
            return $this->morphTo();
        }

        /**
         * @return array{meta_keywords: string}
         */
        protected function casts(): array
        {
            return [
                'meta_keywords' => 'array'
            ];
        }
    }
