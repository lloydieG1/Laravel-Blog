@props(["model"])

<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4"><br>Comments</h2>
    @auth
        <textarea wire:model="body" rows="4" class="w-full rounded-md p-4 border-2 border-gray-200" placeholder="Leave a comment..."></textarea>
        <button wire:click="addComment" type="submit" class="mb-8 px-4 py-2 mt-4 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900">
            Comment
        </button>
    @else
      <p class="mb-4 text-gray-600">
        Please <a href="/login" class="text-gray-800 font-bold hover:text-gray-800 underline">log in</a> to leave a comment.
      </p>
    @endauth
    <div>
        <ul wire:poll.750ms class="list-reset">
        @foreach ($this->getComments() as $comment)
            <li class="mb-4">
            <div class="bg-gray-200 p-4 rounded-md">
                <div class="text-gray-600 font-bold mb-2">
                by <a href="/users/{{ $comment->user->page->id }}">{{ $comment->user->name }}</a>
                on {{ $comment->created_at->format('F j, Y') }}
                </div>
                <div class="text-gray-700">{{ $comment->body }}</div>
            </div>
            </li>
        @endforeach
        </ul>
    </div>
</div>
