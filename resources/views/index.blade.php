<x-layout>
    <x-slot:title>
        Minimal Laravel V2
    </x-slot:title>

    <h1>Posts
        <a href="{{ route('posts.create') }}">Add new</a>
    </h1>
    <ul>
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </li>
        @empty
            <li>No post!</li>
        @endforelse
    </ul>
</x-layout>
