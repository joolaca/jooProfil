<?php
declare(strict_types=1);

namespace App\SectionManagement\Contracts;


use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;

interface ISectionService
{
    public function getSectionUseSlugAndLang(string $slug, string $lang): Section;

    public function getBaseSectionsUseLang(string $lang): Collection;

    public function setSectionPosition(int $sectionId, int $position): void;
}
