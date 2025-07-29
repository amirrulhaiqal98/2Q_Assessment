<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class ImageDimensions implements ValidationRule
{
    protected int $minWidth;
    protected int $minHeight;

    public function __construct(int $minWidth, int $minHeight)
    {
        $this->minWidth = $minWidth;
        $this->minHeight = $minHeight;
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value instanceof UploadedFile) {
            $fail('The :attribute must be a file.');
            return;
        }

        if (!$value->isValid()) {
            $fail('The :attribute is not a valid file.');
            return;
        }

        // Get image dimensions
        $imageInfo = getimagesize($value->getPathname());
        
        if ($imageInfo === false) {
            $fail('The :attribute must be a valid image.');
            return;
        }

        [$width, $height] = $imageInfo;

        if ($width < $this->minWidth || $height < $this->minHeight) {
            $fail("The :attribute must be at least {$this->minWidth}x{$this->minHeight} pixels.");
        }
    }
} 