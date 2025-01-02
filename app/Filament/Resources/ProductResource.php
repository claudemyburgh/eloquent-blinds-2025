<?php /** @noinspection PhpUndefinedMethodInspection */

    namespace App\Filament\Resources;

    use App\Enums\Availability;
    use App\Enums\Guarantee;
    use App\Enums\Supplier;
    use App\Filament\Resources\ProductResource\Pages;
    use App\Filament\Resources\ProductResource\RelationManagers;
    use App\Models\Product;
    use CodeWithDennis\FilamentSelectTree\SelectTree;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;
    use Illuminate\Support\Arr;

    class ProductResource extends Resource
    {
        protected static ?string $model = Product::class;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        protected static ?string $recordTitleAttribute = 'title';
        protected static ?string $navigationGroup = 'Blinds & Shutters';

        public static function getGloballySearchableAttributes(): array
        {
            return ['title', 'content'];
        }


        public static function form(Form $form): Form
        {
            return $form
                ->schema([

                    Forms\Components\Section::make('Product Information')->schema([

                        Forms\Components\SpatieMediaLibraryFileUpload::make('featured_image')
                            ->multiple()
                            ->downloadable()
                            ->panelLayout('grid')
                            ->imageEditor()
                            ->reorderable()
                            ->collection('products')
                            ->columnSpanFull(),

                        SelectTree::make('category_id')
                            ->label('Category')
                            ->searchable()
                            ->relationship(
                                relationship: 'category',
                                titleAttribute: 'title',
                                parentAttribute: 'parent_id',
                            )
                            ->defaultOpenLevel(3)
                            ->expandSelected()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('title')
                            ->unique(table: 'products', column: 'title', ignoreRecord: true)
                            ->required()
                            ->live(onBlur: true)
                            ->copyToField('meta.meta_title')
                            ->generateSlug()
                            ->maxLength(191),

                        Forms\Components\TextInput::make('slug')
                            ->unique(table: 'products', column: 'slug', ignoreRecord: true)
                            ->dehydrated()
                            ->required()
                            ->maxLength(191),

                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->cols(80)
                            ->autosize()
                            ->live(onBlur: true)
                            ->copyToField('meta.meta_description')
                            ->columnSpanFull(),

                        Forms\Components\SpatieTagsInput::make('tags')
                            ->live(onBlur: true)
                            ->type('products'),

                        Forms\Components\MarkdownEditor::make('content')
                            ->minHeight('250px')
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                    Forms\Components\Group::make([
                        Forms\Components\Section::make('Product Status')->schema([
                            Forms\Components\Split::make([
                                Forms\Components\Toggle::make('live')
                                    ->default(true),

                                Forms\Components\Toggle::make('popular'),
                            ])
                        ]),
                        Forms\Components\Group::make([
                            Forms\Components\Section::make('Supplier Details')->schema([

                                Forms\Components\Select::make('availability')
                                    ->native(false)
                                    ->searchable()
                                    ->required()
                                    ->default(Availability::AVAILABLE)
                                    ->options(Arr::sort(Availability::options())),

                                Forms\Components\Select::make('guarantee')
                                    ->native(false)
                                    ->searchable()
                                    ->options(Guarantee::options()),

                                Forms\Components\Select::make('supplier')
                                    ->native(false)
                                    ->searchable()
                                    ->options(Arr::sort(Supplier::options())),

                                Forms\Components\TextInput::make('supplier_code')
                                    ->maxLength(191),


                            ]),
                            Forms\Components\Section::make('Category Meta Tags')
                                ->relationship('meta')
                                ->schema(components: [
                                    Forms\Components\FileUpload::make('meta_image')
                                        ->image()
                                        ->directory('seo-image')
                                        ->imageEditorAspectRatios(['1.91:1'])
                                        ->imageEditor(),
                                    Forms\Components\TextInput::make('meta_title')
                                        ->required()
                                        ->maxLength(191),
                                    Forms\Components\Textarea::make('meta_description')
                                        ->autosize()
                                        ->rows(4)
                                        ->required()
                                        ->maxLength(300),
                                    Forms\Components\TagsInput::make('meta_keywords'),
                                ])
                        ]),

                    ])->columnSpan(1),

                ])->columns(3);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([

                    Tables\Columns\SpatieMediaLibraryImageColumn::make('featured_image')
                        ->label("Images")
                        ->size(42)
                        ->stacked()
                        ->limit(3)
                        ->collection('products')
                        ->ring(4)
                        ->limitedRemainingText(isSeparate: true)
                        ->circular(),

                    Tables\Columns\TextColumn::make('category.title')
                        ->sortable()
                        ->numeric()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('title')
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\TextColumn::make('slug')
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\TextColumn::make('guarantee')
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->searchable(),

                    Tables\Columns\TextColumn::make('supplier')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\TextColumn::make('supplier_code')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\TextColumn::make('availability')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\ToggleColumn::make('live')
                        ->sortable(),

                    Tables\Columns\IconColumn::make('popular')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->sortable()
                        ->boolean(),

                    Tables\Columns\TextColumn::make('deleted_at')
                        ->sortable()
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('created_at')
                        ->sortable()
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('updated_at')
                        ->sortable()
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
                        Tables\Actions\DeleteBulkAction::make(),
                        Tables\Actions\ForceDeleteBulkAction::make(),
                        Tables\Actions\RestoreBulkAction::make(),
                    ]),
                ]);
        }

        public static function getRelations(): array
        {
            return [
                //
            ];
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListProducts::route('/'),
                'create' => Pages\CreateProduct::route('/create'),
                'edit' => Pages\EditProduct::route('/{record}/edit'),
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
