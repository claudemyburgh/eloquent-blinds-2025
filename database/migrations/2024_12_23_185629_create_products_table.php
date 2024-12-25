<?php

    use App\Enums\Availability;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete();
                $table->string('title')->index();
                $table->string('slug')->unique()->index();
                $table->text('description')->nullable();
                $table->text('content')->nullable();
                $table->string('guarantee')->nullable();
                $table->string('supplier')->nullable();
                $table->string('supplier_code')->nullable();
                $table->string('availability')->default(Availability::AVAILABLE->value);
                $table->boolean('live')->default(true);
                $table->boolean('popular')->default(false);
                $table->softDeletes();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('products');
        }
    };
