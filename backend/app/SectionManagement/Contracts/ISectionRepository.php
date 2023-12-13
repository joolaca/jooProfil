<?php

namespace App\SectionManagement\Contracts;

use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;

interface ISectionRepository
{
    public function getSectionUseSlugAndLang(string $slug, string $lang): Section;
    public function getBaseSectionsUseLang(string $lang): Collection;

    public function setSectionPosition(int $sectionId, int $position): void;
}
