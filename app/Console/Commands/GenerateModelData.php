<?php

    namespace App\Console\Commands;

    use Carbon\Carbon;
    use Exception;
    use Illuminate\Console\Command;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Str;


    class GenerateModelData extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'generate:model-data {model} {--exclude=} {--only=}';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Generate a file with model data as a multi-dimensional array.';


        public function handle()
        {
            $modelName = $this->argument('model');
            $excludeFields = $this->option('exclude') ? explode(',', $this->option('exclude')) : [];
            $onlyFields = $this->option('only') ? explode(',', $this->option('only')) : [];


            try {
                // 1. Get the Model Class
                $modelClass = 'App\\Models\\' . $modelName;  // Adjust namespace if needed.
                if (!class_exists($modelClass)) {
                    $this->error("Model '$modelName' not found.");
                    return;
                }
                $model = new $modelClass();


                // 2. Generate Filename
                $date = Carbon::now()->format('Y-m-d');
                $filename = $date . '-' . Str::lower(Str::pluralStudly($modelName)) . '.php';
                $filepath = database_path($filename); // Store in the database directory

                // 3. Fetch and format data
                $data = $model::all()->map(function ($item) use ($excludeFields, $onlyFields) {
                    $transformed = $this->transformToArray($item);

                    if (!empty($excludeFields)) {
                        $transformed = array_diff_key($transformed, array_flip($excludeFields));
                    }

                    if (!empty($onlyFields)) {
                        $transformed = array_intersect_key($transformed, array_flip($onlyFields));
                    }
                    return $transformed;
                })->toArray();

                //Remove Numberic Keys
                $data = array_values($data);

                // 4. Generate PHP code with short array syntax
                $content = "<?php\n\nreturn [\n" .
                    implode(",\n", array_map(function ($item) {
                        return '    ' . $this->formatArray($item, 1);
                    }, $data)) .
                    "\n];\n";


                // 5. Write to file
                File::put($filepath, $content);

                $this->info("File '$filename' generated successfully in the database directory.");


            } catch (Exception $e) {
                $this->error('An error occurred: ' . $e->getMessage());
            }
        }


        private function transformToArray($item): array
        {
            $attributes = $item->getAttributes();
            $relations = [];

            foreach ($item->getRelations() as $relationName => $relation) {
                if ($relation instanceof Collection) {
                    $relations[$relationName] = $relation->map(function ($relatedItem) {
                        return $this->transformToArray($relatedItem); // Recursively transform related models
                    })->toArray();
                } elseif ($relation instanceof Model) {
                    $relations[$relationName] = $this->transformToArray($relation); // Recursively transform related models
                } else {
                    $relations[$relationName] = $relation; // Keep non-model relations as is
                }
            }


            return array_merge($attributes, $relations); // Merge attributes and relations
        }


        private function formatArray(array $data, int $indentLevel): string
        {
            $indent = str_repeat('    ', $indentLevel);
            $output = "[\n";

            foreach ($data as $key => $value) {
                $output .= $indent . "    \"$key\" => "; // Use double quotes for keys

                if (is_array($value)) {
                    $output .= $this->formatArray($value, $indentLevel + 1);  // Recursive call for nested arrays
                } elseif (is_null($value)) {
                    $output .= "null,\n";
                } elseif (is_string($value)) {
                    $output .= "\"$value\",\n";  // Use double quotes for string values and escape double quotes within the string
                } else {
                    $output .= "$value,\n";
                }
            }

            $output .= $indent . ']';
            return $output;
        }


    }
