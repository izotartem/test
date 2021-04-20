<?php

namespace App\Http\Requests;

use App\DTO\Images\ImageDTO;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class StoreImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['images' => "array"])]
    public function rules(): array
    {
        return [
            'images' => 'required',
        ];
    }

    public function imageDTO(): ImageDTO
    {
        return new ImageDTO(
            $this->images,
            $this->input('tags')
        );
    }
}
