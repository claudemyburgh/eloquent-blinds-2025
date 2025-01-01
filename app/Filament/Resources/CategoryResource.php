<?php /** @noinspection ALL */

    namespace App\Filament\Resources;

    use App\Filament\Exports\CategoryExporter;
    use App\Filament\Resources\CategoryResource\Pages;
    use App\Models\Category;
    use CodeWithDennis\FilamentSelectTree\SelectTree;
    use Filament\Forms;
    use Filament\Forms\{Form};
    use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Actions\{ExportAction, ExportBulkAction};
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\{Builder, SoftDeletingScope};


    class CategoryResource extends Resource
    {
        protected static ?string $model = Category::class;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        protected static ?string $navigationGroup = 'Blinds & Shutters';


//        protected static ?string $recordTitleAttribute = 'title';

        public static function getGloballySearchableAttributes(): array
        {
            return ['title', 'description'];
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema(components: [

                    Forms\Components\Section::make('Category Information')->schema(components: [
                        SpatieMediaLibraryFileUpload::make('featured_image')
                            ->downloadable()
                            ->imageEditor()
                            ->collection('categories')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('title')
                            ->unique(table: 'categories', column: 'title', ignoreRecord: true)
                            ->required()
                            ->generateSlug()
                            ->maxLength(191),

                        Forms\Components\TextInput::make('slug')
                            ->unique(table: 'categories', column: 'slug', ignoreRecord: true)
                            ->dehydrated()
                            ->required()
                            ->maxLength(191),


                        SelectTree::make('parent_id')
                            ->label('Parent')
                            ->relationship('parent', 'title', 'parent_id')
                            ->withCount()
                            ->searchable()
                            ->defaultOpenLevel(3)
                            ->expandSelected()
                            ->enableBranchNode()
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->cols(80)
                            ->autosize()
                            ->columnSpanFull(),

                        Forms\Components\MarkdownEditor::make('content')
                            ->minHeight('250px')
                            ->columnSpanFull(),
                    ]),
                    Forms\Components\Section::make('Status')->schema([
                        Forms\Components\Toggle::make('popular')
                            ->required(),

                        Forms\Components\Toggle::make('live')
                            ->required(),

                    ]),


                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->headerActions([
//                    ImportAction::make()->importer(CategoryImporter::class),
                    ExportAction::make()->exporter(CategoryExporter::class),
                ])
                ->columns([

                    Tables\Columns\SpatieMediaLibraryImageColumn::make('featured_image')
                        ->label('Image')
                        ->size(42)
                        ->stacked()
                        ->limit(3)
                        ->collection('categories')
                        ->ring(4)
                        ->limitedRemainingText(isSeparate: true)
                        ->circular(),

                    Tables\Columns\TextColumn::make('id')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('title')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('slug')
                        ->searchable(),
                    Tables\Columns\ToggleColumn::make('popular')
                        ->onColor('success'),

                    Tables\Columns\ToggleColumn::make('live'),

                    Tables\Columns\TextInputColumn::make('parent_id')
                        ->width("10px")
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->sortable(),

                    Tables\Columns\TextColumn::make('deleted_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    Tables\Filters\TrashedFilter::make(),
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        ExportBulkAction::make()->exporter(CategoryExporter::class),
                        Tables\Actions\DeleteBulkAction::make(),
                        Tables\Actions\ForceDeleteBulkAction::make(),
                        Tables\Actions\RestoreBulkAction::make(),
                    ]),
                ]);
        }

        public static function getRelations(): array
        {
            return [

            ];
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListCategories::route('/'),
                'create' => Pages\CreateCategory::route('/create'),
                'edit' => Pages\EditCategory::route('/{record}/edit'),
            ];
        }

        public static function getEloquentQuery(): Builder
        {
            return parent::getEloquentQuery()
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]);
        }
    }
