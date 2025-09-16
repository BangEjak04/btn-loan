<?php

namespace App\Filament\Resources\Applications\Pages;

use App\Filament\Resources\Applications\ApplicationResource;
use CodeWithDennis\FilamentLucideIcons\Enums\LucideIcon;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->icon(LucideIcon::Edit),
            Action::make('addComent')
                ->label('Add Comment')
                ->icon(LucideIcon::MessageCircle)
                ->color('success')
                ->schema([
                    RichEditor::make('comment')
                        ->label('Comment')
                        ->required()
                        ->columnSpanFull(),
                ])
                ->action(function (array $data): void {
                    $this->record->comments()->create([
                        'user_id' => auth()->id(),
                        'comment' => $data['comment'],
                    ]);

                    Notification::make()
                        ->title('Comment added successfully')
                        ->success()
                        ->send();
                }),
        ];
    }
}
