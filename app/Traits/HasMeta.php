<?php

    namespace App\Traits;

    use App\Models\Meta;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphOne;

    trait HasMeta
    {
        /**
         * @param array $data
         *
         * @return \Illuminate\Database\Eloquent\Model|int
         */
        public function updateMeta(array $data): Model|int
        {
            if ($this->meta) {
                return $this->meta()->update($data);
            }

            return $this->createMeta($data);
        }

        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphOne
         */
        public function meta(): MorphOne
        {
            return $this->morphOne(Meta::class, 'metaable');
        }

        /**
         * @param array $data
         *
         * @return \Illuminate\Database\Eloquent\Model
         */
        public function createMeta(array $data): Model
        {
            return $this->meta()->create($data);
        }
    }
