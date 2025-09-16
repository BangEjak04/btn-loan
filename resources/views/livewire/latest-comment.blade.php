<div class="">
    @forelse ($comments as $comment)
        <div class="py-4">
            <div class="flex items-start gap-x-4">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-primary-500 flex items-center justify-center text-white">
                        {{ $comment->user ? substr($comment->user->name, 0, 1) : '?' }}
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                            <span>
                                {{ $comment->user->name ?? 'Unknown User' }}
                            </span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                | {{ Str::headline($comment->user->getRoleNames()->last()) ?? 'Unknown Role' }}
                            </span>
                        </div>
                        <div class="flex items-center gap-x-2">
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $comment->created_at->diffForHumans() }}
                            </div>

                            @if (auth()->user()->hasRole(['super_admin']))
                                <div class="flex gap-x-1">
                                    <x-filament::icon-button
                                        icon="heroicon-o-trash"
                                        color="danger"
                                        size="sm"
                                        wire:click="$dispatch('open-modal', { id: 'confirm-comment-deletion-{{ $comment->id }}' })"
                                    />

                                    <x-filament::modal id="confirm-comment-deletion-{{ $comment->id }}"
                                        icon="heroicon-o-trash" icon-color="danger" heading="Delete Comment"
                                        width="md">
                                        <div class="py-4">
                                            Are you sure you want to delete this comment? This action cannot be
                                            undone.
                                        </div>

                                        <x-slot name="footerActions">
                                            <x-filament::button
                                                wire:click="$dispatch('close-modal', { id: 'confirm-comment-deletion-{{ $comment->id }}' })"
                                                color="gray">
                                                Cancel
                                            </x-filament::button>

                                            <x-filament::button
                                                wire:click="deleteComment({{ $comment->id }})"
                                                wire:loading.attr="disabled" color="danger">
                                                Delete
                                            </x-filament::button>
                                        </x-slot>
                                    </x-filament::modal>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2 prose prose-sm max-w-none dark:prose-invert text-gray-700 dark:text-white">
                        {!! $comment->comment !!}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="flex items-center justify-center py-6 text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span class="text-sm font-medium">No comments yet</span>
        </div>
    @endforelse
</div>
