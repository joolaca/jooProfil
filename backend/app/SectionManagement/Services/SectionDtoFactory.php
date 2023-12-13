<?php

namespace App\SectionManagement\Services;

use App\SectionManagement\Contracts\ISectionDto;
use App\SectionManagement\Dtos\BrickSectionDto;
use App\SectionManagement\Dtos\HeroSectionDto;
use App\SectionManagement\Dtos\SimpleTextSectionDto;

class SectionDtoFactory
{
    public function getSectionDtoUseSlug(string $slug): ISectionDto
    {
        return match ($slug) {
            'hero-section' => resolve(HeroSectionDto::class),
            'brick-section' => resolve(BrickSectionDto::class),
            'simple-text-section' => resolve(SimpleTextSectionDto::class),
        };
    }
}
