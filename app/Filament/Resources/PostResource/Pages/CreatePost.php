<?php

    namespace App\Filament\Resources\PostResource\Pages;

    use App\Filament\Resources\PostResource;
    use Filament\Resources\Pages\CreateRecord;
    use function auth;

    class CreatePost extends CreateRecord
    {
        protected static string $resource = PostResource::class;

        protected function mutateFormDataBeforeCreate(array $data): array
        {
            $data['user_id'] = auth()->user();
            return parent::mutateFormDataBeforeCreate($data);
        }


    }
