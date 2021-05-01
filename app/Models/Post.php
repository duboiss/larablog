<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(public $title, public $date, public $excerpt, public $slug, public $body)
    {
    }

    public static function all(): Collection {
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path('posts')))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->date,
                $document->excerpt,
                $document->slug,
                $document->body(),
            ))
            ->sortByDesc('date');
        });
    }

    public static function find(string $slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail(string $slug)
    {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
