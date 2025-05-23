<x-layout>
    <x-slot:title>
        Add new post| Minimal Laravel V2
    </x-slot:title>

    <h1>Add new post</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <div>
            <label>Title
                <input type="text" name="title" value="{{ old('title') }}">
            </label>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>
                Body
                <textarea name="body">{{ old('body') }}</textarea>
            </label>
            @error('body')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div><button>Add</button></div>
    </form>
    <p class="back-link"><a href="{{ route('posts.index') }}">Back</a></p>
</x-layout>
