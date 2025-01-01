<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Client extends Model
    {
        /** @use HasFactory<\Database\Factories\ClientFactory> */
        use HasFactory, SoftDeletes;

        /**
         * @var string[]
         */
        protected $fillable = [
            "first_name",
            "last_name",
            "email",
            "phone",
            "active",
            "vat_registration",
        ];

        protected $appends = [
            'full_name'
        ];


        public function getFullNameAttribute(): string
        {
            return $this->first_name . " " . $this->last_name;
        }


    }
