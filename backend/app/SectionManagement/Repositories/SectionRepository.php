<?php

namespace App\SectionManagement\Repositories;

use App\Models\Section;
use App\SectionManagement\Contracts\ISectionRepository;
use Illuminate\Database\Eloquent\Collection;

class SectionRepository implements ISectionRepository
{

    public function getSectionUseSlugAndLang(string $slug, string $lang): Section
    {

        return Section::query()
            ->where('slug', $slug)
            ->where('lang', $lang)
            ->first();
    }

    public function getBaseSectionsUseLang(string $lang): Collection
    {
        return Section::query()
            ->where('parent_id', 0)
            ->where('lang', session('lang', 'hu'))
            ->get();
    }

    public function setSectionPosition(int $sectionId, int $position): void
    {
        Section::query()
            ->where('id', $sectionId)
            ->update(['position' => $position]);
    }


}
