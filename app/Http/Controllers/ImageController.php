<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ImageController extends Controller
{
    private ImageService $imageService;

    /**
     * ImageController constructor.
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index(): View
    {
        return view('images.store');
    }

    public function show(): View
    {
        $images = Image::query()->get()->toArray();

        return view('images.show', ['images' => $images]);
    }

    public function store(StoreImageRequest $request): RedirectResponse
    {
        if ($request->hasfile('images')) {
            $this->imageService->storeImagesAndTags($request->imageDTO());
        }

        return redirect()->route('images.store');
    }

    public function search(SearchRequest $request): View
    {
        $search = $request->input('search');

        $images = $this->imageService->searchImageByTag($search);

        return view('images.show', ['images' => $images]);
    }
}