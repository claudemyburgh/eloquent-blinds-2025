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
         * This command takes the model name as an argument and optional --exclude or --only options for filtering fields.
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


        /**
         * Execute the console command.
         * This method handles the main logic of fetching model data, transforming it into an array, and writing it to a PHP file.
         *  It includes error handling.
         *
         * @return void
         */
        public function handle(): void
        {
            $modelName = $this->argument('model');
            $excludeFields = $this->option('exclude') ? explode(',', $this->option('exclude')) : [];
            $onlyFields = $this->option('only') ? explode(',', $this->option('only')) : [];

            try {
                // 1. Get the Model Class - Attempts to get the model class from the provided model name.  Throws error if not found.
                $modelClass = 'App\\Models\\' . $modelName;  // Adjust namespace if needed.
                if (!class_exists($modelClass)) {
                    $this->error("Model '$modelName' not found.");
                    return;
                }
                $model = new $modelClass();

                // 2. Generate Filename - Creates a unique filename based on the current date and model name. The file will be stored in the database directory.
                $date = Carbon::now()->format('Y_m_d_His');
                $filename = $date . '_' . Str::lower(Str::pluralStudly($modelName)) . '.php';
                $filepath = database_path($filename); // Store in the database directory

                // 3. Fetch and format data - Fetches all records from the model, transforms them into arrays, and applies field filtering based on --exclude and --only options.
                $data = $model::all()->map(function ($item) use ($excludeFields, $onlyFields) {
                    $transformed = $this->transformToArray($item);

                    if (!empty($excludeFields)) {
                        //Exclude specified fields from the array
                        $transformed = array_diff_key($transformed, array_flip($excludeFields));
                    }

                    if (!empty($onlyFields)) {
                        // Include only specified fields in the array
                        $transformed = array_intersect_key($transformed, array_flip($onlyFields));
                    }
                    return $transformed;
                })->toArray();

                //Remove Numberic Keys -  Removes numeric keys from the array, making it a purely associative array.
                $data = array_values($data);


                // 4. Generate PHP code with short array syntax - Generates the content of the PHP file, which will return the data as a PHP array.  Uses short array syntax [] instead of array().
                $content = "<?php\n\nreturn [\n" .
                    implode(",\n", array_map(function ($item) {
                        return '    ' . $this->formatArray($item, 1);
                    }, $data)) .
                    "\n];\n";

                // 5. Write to file - Writes the generated PHP code to the file.
                File::put($filepath, $content);

                $this->info("File '$filename' generated successfully in the database directory.");

            } catch (Exception $e) {
                $this->error('An error occurred: ' . $e->getMessage());
            }
        }


        /**
         * Transforms a model instance (including its relations) into a multi-dimensional array.
         * This method recursively transforms related Eloquent models and collections into arrays.
         *
         * @param Model $item The Eloquent model instance to transform.
         *
         * @return array The transformed array representation of the model.
         */
        private function transformToArray(Model $item): array
        {
            //Get the model's attributes
            $attributes = $item->getAttributes();
            $relations = [];

            //Iterate over the model's relations
            foreach ($item->getRelations() as $relationName => $relation) {
                if ($relation instanceof Collection) {
                    // If relation is a collection, recursively transform each item in the collection
                    $relations[$relationName] = $relation->map(function ($relatedItem) {
                        return $this->transformToArray($relatedItem);
                    })->toArray();
                } elseif ($relation instanceof Model) {
                    // If relation is a single model, recursively transform it
                    $relations[$relationName] = $this->transformToArray($relation);
                } else {
                    // If relation is not a model or collection keep it as is
                    $relations[$relationName] = $relation;
                }
            }
            //Merge the model's attributes and relations into a single array
            return array_merge($attributes, $relations);
        }


        /**
         * Recursively formats an array into a string with proper indentation for a PHP file.
         * Ensures proper formatting with indentation and uses double quotes for keys and string values. Handles null values correctly.
         *
         * @param array $data The array to format.
         * @param int $indentLevel The current indentation level.
         *
         * @return string The formatted array string.
         */
        private function formatArray(array $data, int $indentLevel): string
        {
            $indent = str_repeat('    ', $indentLevel);
            $output = "[\n";

            foreach ($data as $key => $value) {
                $output .= $indent . "    \"$key\" => "; // Use double quotes for keys

                if (is_array($value)) {
                    //Recursive call for nested arrays
                    $output .= $this->formatArray($value, $indentLevel + 1);
                } elseif (is_null($value)) {
                    $output .= "null,\n";
                } elseif (is_string($value)) {
                    // Use double quotes for string values and escape double quotes within the string
                    $output .= "\"$value\",\n";
                } else {
                    $output .= "$value,\n";
                }
            }
            $output .= $indent . ']';
            return $output;
        }
    }
