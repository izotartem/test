<?php
declare(strict_types=1);

namespace App\Services;

use App\DTO\Images\ImageDTO;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ImageService
{
    public function storeImagesAndTags(ImageDTO $imageDTO): void
    {
        $tagsName = explode(',', $imageDTO->tags);

        foreach ($imageDTO->images as $image) {
            $name = $image->getClientOriginalName();
            $path = $image->storeAs('uploads', $name, 'public');

            $image = Image::query()->create([
                'title' => $name,
                'path' => '/storage/' . $path
            ]);

            foreach ($tagsName as $tagName) {
                $tags = Tag::query()->updateOrCreate(
                    ['name' => $tagName],
                );

                $image->tags()->sync($tags->id, false);
            }
        }
    }

    public function searchImageByTag(string $search): array
    {
        return Image::query()
            ->whereHas('tags', function (Builder $query) use ($search) {
                $query->where('tags.name', 'iLIKE', "%$search%");
            })->get()->toArray();
    }
}
