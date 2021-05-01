<x-layout>
    @foreach ($posts as $post)
        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>

        <div>{{ $post->excerpt }}</div>
    @endforeach
</x-layout>
