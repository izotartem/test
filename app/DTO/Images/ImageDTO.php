<?php

namespace App\DTO\Images;

class ImageDTO
{
    public array $images;
public ?string $tags;

    public function __construct(array $images, ?string $tags)
    {
        $this->images = $images;
        $this->tags = $tags;
    }
}