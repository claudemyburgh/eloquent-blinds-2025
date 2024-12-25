<?php

    namespace App\Filament\Imports;

    use App\Models\Category;
    use Filament\Actions\Imports\ImportColumn;
    use Filament\Actions\Imports\Importer;
    use Filament\Actions\Imports\Models\Import;

    class CategoryImporter extends Importer
    {
        protected static ?string $model = Category::class;

        public static function getColumns(): array
        {
            return [
                ImportColumn::make('title')
                    ->rules(['max:191']),
                ImportColumn::make('slug')
                    ->requiredMapping()
                    ->rules(['required', 'max:191']),
                ImportColumn::make('description'),
                ImportColumn::make('content'),
                ImportColumn::make('popular')
                    ->boolean()
                    ->rules(['boolean']),
                ImportColumn::make('live')
                    ->boolean()
                    ->rules(['boolean', 'nullable']),
                ImportColumn::make('_lft')
                    ->numeric()
                    ->rules(['integer', 'nullable']),
                ImportColumn::make('_rgt')
                    ->numeric()
                    ->rules(['integer', 'nullable']),
                ImportColumn::make('parent_id')
                    ->numeric()
                    ->rules(['integer', 'nullable']),
            ];
        }

        public static function getCompletedNotificationBody(Import $import): string
        {
            $body = 'Your category import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

            if ($failedRowsCount = $import->getFailedRowsCount()) {
                $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
            }

            return $body;
        }

        public function resolveRecord(): ?Category
        {
            // return Category::firstOrNew([
            //     // Update existing records, matching them by `$this->data['column_name']`
            //     'email' => $this->data['email'],
            // ]);

            return new Category();
        }
    }
