<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\ClientResource\Pages;
    use App\Models\Client;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletingScope;

    class ClientResource extends Resource
    {
        protected static ?string $model = Client::class;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        protected static ?string $navigationGroup = "Rep's and Clients";

        protected static ?string $recordTitleAttribute = 'first_name';

        public static function getGloballySearchableAttributes(): array
        {
            return ['first_name', 'last_name', 'email', 'phone'];
        }

        public static function getNavigationBadge(): ?string
        {
            return static::getModel()::count();
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Section::make('Client Info')->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(191),

                    ])
                        ->columnSpan(2),
                    Forms\Components\Group::make([
                        Forms\Components\Section::make('Client Status')->schema([
                            Forms\Components\Toggle::make('active')
                                ->required(),
                        ]),
                        Forms\Components\Section::make('Vat Info')->schema([
                            Forms\Components\TextInput::make('vat_registration')
                                ->maxLength(191),
                        ])
                    ])
                        ->columnSpan(1)
                ])->columns(3);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('first_name')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('last_name')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('email')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('phone')
                        ->searchable(),
                    Tables\Columns\IconColumn::make('active')
                        ->boolean(),
                    Tables\Columns\TextColumn::make('vat_registration')
                        ->searchable(),
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
                    Tables\Actions\ActionGroup::make([
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\DeleteAction::make(),
                        Tables\Actions\ForceDeleteAction::make(),
                        Tables\Actions\RestoreAction::make(),
                    ])
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
                'index' => Pages\ListClients::route('/'),
                'create' => Pages\CreateClient::route('/create'),
                'edit' => Pages\EditClient::route('/{record}/edit'),
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
