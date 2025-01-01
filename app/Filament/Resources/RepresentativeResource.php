<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\RepresentativeResource\Pages;
    use App\Filament\Resources\RepresentativeResource\RelationManagers;
    use App\Models\Representative;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;

    class RepresentativeResource extends Resource
    {
        protected static ?string $model = Representative::class;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


        protected static ?string $navigationGroup = "Rep's and Clients";

        protected static ?string $recordTitleAttribute = 'first_name';

        public static function getGloballySearchableAttributes(): array
        {
            return ['first_name', 'last_name', 'phone', 'email'];
        }


        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\TextInput::make('first_name')
                        ->required()
                        ->maxLength(191),

                    Forms\Components\TextInput::make('last_name')
                        ->required()
                        ->maxLength(191),

                    Forms\Components\TextInput::make('phone')
                        ->tel()
                        ->maxLength(191),

                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->maxLength(191),

                    Forms\Components\SpatieMediaLibraryFileUpload::make('avatar')
                        ->imageEditor()
                        ->directory('avatars')
                        ->previewable(true)
                        ->avatar()
                        ->circleCropper()
                        ->downloadable(),

                    Forms\Components\Textarea::make('bio')
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('active')
                        ->required(),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\SpatieMediaLibraryImageColumn::make('avatar')
                        ->circular()
                        ->size(42),

                    Tables\Columns\TextColumn::make('first_name')
                        ->searchable(),

                    Tables\Columns\TextColumn::make('last_name')
                        ->searchable(),

                    Tables\Columns\TextColumn::make('phone')
                        ->searchable(),

                    Tables\Columns\TextColumn::make('email')
                        ->searchable(),


                    Tables\Columns\ToggleColumn::make('active'),

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
                'index' => Pages\ListRepresentatives::route('/'),
                'create' => Pages\CreateRepresentative::route('/create'),
                'edit' => Pages\EditRepresentative::route('/{record}/edit'),
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
