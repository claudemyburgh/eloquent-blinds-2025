<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\PostResource\Pages;
    use App\Filament\Resources\PostResource\RelationManagers;
    use App\Models\Post;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;

    class PostResource extends Resource
    {
        protected static ?string $model = Post::class;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        protected static ?string $navigationGroup = "Media Posts";

        protected static ?string $recordTitleAttribute = 'title';

        public static function getGloballySearchableAttributes(): array
        {
            return ['title', 'description', 'content'];
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Section::make('Blog')->schema([

                        Forms\Components\SpatieMediaLibraryFileUpload::make('featured_image')
                            ->downloadable()
                            ->imageEditor()
                            ->collection('posts')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('title')
                            ->generateSlug()
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('type')
                            ->columnSpanFull()
                            ->maxLength(191),
                        Forms\Components\Textarea::make('description')
                            ->autosize()
                            ->cols(80)
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\MarkdownEditor::make('content')
                            ->minHeight('300px')
                            ->columnSpanFull(),

                    ])->columns(2)->columnSpan(2),
                    Forms\Components\Section::make('Status')->schema([
                        Forms\Components\DateTimePicker::make('published_at'),

                        Forms\Components\Toggle::make('live')
                            ->required(),
                    ])->columnSpan(1)
                ])->columns(3);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([

                    Tables\Columns\SpatieMediaLibraryImageColumn::make('featured_image')
                        ->label('Image')
                        ->size(42)
                        ->collection('posts')
                        ->ring(4)
                        ->circular(),

                    Tables\Columns\TextColumn::make('user.name')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('title')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('slug')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('type')
                        ->searchable(),
                    Tables\Columns\IconColumn::make('live')
                        ->boolean(),
                    Tables\Columns\TextColumn::make('published_at')
                        ->dateTime()
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
                'index' => Pages\ListPosts::route('/'),
                'create' => Pages\CreatePost::route('/create'),
                'edit' => Pages\EditPost::route('/{record}/edit'),
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
