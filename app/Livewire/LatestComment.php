<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\ApplicationComment;
use Filament\Notifications\Notification;
use Livewire\Component;

class LatestComment extends Component
{
    public Application $application;

    public function deleteComment($id)
    {
        $comment = ApplicationComment::find($id);

        if (! $comment) {
            Notification::make()
                ->title('Comment not found')
                ->danger()
                ->send();
            return;
        }

        if (!auth()->user()->hasRole('super_admin')) {
            Notification::make()
                ->title('You do not have permission to delete this comment')
                ->danger()
                ->send();
            return;
        }

        $comment->delete();

        Notification::make()
            ->title('Comment deleted successfully')
            ->success()
            ->send();

        // Refresh list
        $this->application->refresh();
    }

    public function render()
    {
        return view('livewire.latest-comment', [
            'comments' => $this->application->comments()->latest()->get(),
        ]);
    }
}
