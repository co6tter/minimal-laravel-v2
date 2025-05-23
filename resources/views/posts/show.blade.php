<x-layout>
    <x-slot:title>
        {{ $post->title }} | Minimal Laravel V2
    </x-slot:title>

    <h1>{{ $post->title }}
        <a href="{{ route('posts.edit', $post) }}">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post" id="delete-form">
            @method('DELETE')
            @csrf
            <button>Delete</button>
        </form>

    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <h2>Comments</h2>
    <ul>
        @forelse ($post->comments as $comment)
            <li>{{ $comment->body }}
                <form action="{{ route('posts.comments.destroy', [$post, $comment]) }}" method="post"
                    class="comment-delete-form">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </li>
        @empty
            <li>No comment.</li>
        @endforelse
    </ul>

    <h2>Add a comment</h2>

    <form action="{{ route('posts.comments.store', $post) }}" method="post">
        @csrf
        <div>
            <input type="text" name="body">
            @error('body')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button>Add</button>
        </div>
    </form>

    <p class="back-link"><a href="{{ route('posts.index') }}">Back</a></p>

    <script>
        'use strict';

        {
            const form = document.querySelector('#delete-form');
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                if (!confirm('Sure?')) {
                    return;
                }

                form.submit();
            });

            const commentForms = document.querySelectorAll('.comment-delete-form');
            commentForms.forEach((commentForm) => {
                commentForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    if (!confirm('Sure?')) {
                        return;
                    }

                    commentForm.submit();
                })
            });
        }
    </script>
</x-layout>
