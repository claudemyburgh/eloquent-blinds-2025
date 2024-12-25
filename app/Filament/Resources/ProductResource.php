<?php

    namespace App\Filament\Resources;

    use App\Enums\Availability;
    use App\Enums\Guarantee;
    use App\Enums\Supplier;
    use App\Filament\Resources\ProductResource\Pages;
    use App\Filament\Resources\ProductResource\RelationManagers;
    use App\Models\Product;
    use CodeWithDennis\FilamentSelectTree\SelectTree;
    use Filament\Forms;
    use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
    use Filament\Forms\Form;
    use Filament\Forms\Set;
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

        protected static ?string $navigationGroup = 'Blinds & Shutters';

        public static function form(Form $form): Form
        {
            return $form
                ->schema([

                    Forms\Components\Section::make('Product Information')->schema([

                        SpatieMediaLibraryFileUpload::make('image')
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
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug()))
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
                            ->columnSpanFull(),

                        Forms\Components\MarkdownEditor::make('content')
                            ->minHeight('250px')
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                    Forms\Components\Group::make([
                        Forms\Components\Section::make('Product Status')->schema([
                            Forms\Components\Split::make([
                                Forms\Components\Toggle::make('live'),

                                Forms\Components\Toggle::make('popular'),
                            ])
                        ]),
                        Forms\Components\Section::make('Supplier Details')->schema([

                            Forms\Components\Select::make('availability')
                                ->native(false)
                                ->searchable()
                                ->required()
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
                    ])->columnSpan(1),

                ])->columns(3);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('category.title')
                        ->numeric()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('title')
                        ->searchable(),

                    Tables\Columns\TextColumn::make('slug')
                        ->searchable(),

                    Tables\Columns\TextColumn::make('guarantee')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->searchable(),

                    Tables\Columns\TextColumn::make('supplier')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->searchable(),

                    Tables\Columns\TextColumn::make('supplier_code')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->searchable(),

                    Tables\Columns\TextColumn::make('availability')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->searchable(),

                    Tables\Columns\ToggleColumn::make('live'),

                    Tables\Columns\IconColumn::make('popular')
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->boolean(),

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
