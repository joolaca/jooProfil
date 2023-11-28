<?php

namespace App\SectionManagement\Repositories;

use App\Models\Section;
use App\SectionManagement\Contracts\ISectionRepository;

class SectionRepository implements ISectionRepository
{

    public function getSectionUseSlugAndLang(string $slug, string $lang): Section
    {

        return Section::query()
            ->where('slug', $slug)
            ->where('lang', $lang)
            ->first();
    }

}
