<?php
declare(strict_types=1);

namespace App\SectionManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\SectionManagement\Services\SectionDtoFactory;
use Illuminate\Http\Request;
use App\SectionManagement\Contracts\ISectionService;
use Illuminate\Support\Facades\App;

class SectionController extends Controller
{
    public function __construct(
        private readonly ISectionService   $sectionService,
        private readonly SectionDtoFactory $sectionDtoFactory
    )
    {
    }

    function get(Request $request): string
    {
        $slug = $request->input('slug');
        $lang = $request->header('lang', 'hu');
        $baseSection = $this->sectionService->getSectionUseSlugAndLang($slug, $lang);
        return json_encode($baseSection->subSections);
    }

    function showBaseSection(string $slug)
    {
        $lang = session('lang', 'hu');
        $baseSection = $this->sectionService->getSectionUseSlugAndLang($slug, $lang);
        return view('admin/section/base_section', compact('baseSection'));
    }

    function setOrder(Request $request)
    {
        $i = 0;
        foreach ($request->get('order') as $sectionId) {
            $this->sectionService->setSectionPosition((int)$sectionId, $i++);
        }
        return $request;
    }


    public function edit(Section $section)
    {
        $method = 'PUT';
        $title = 'Edit';

        $slug = $section->parent->slug;
        $sectionDto = $this->sectionDtoFactory->getSectionDtoUseSlug($slug);

        return view('admin.section.create_edit',
            compact(
                'sectionDto',
                'section',
                'method',
                'title')
        );
    }

    public function create()
    {
        $method = 'POST';
        $title = 'Create';
        $previousExplode = explode('/', url()->previous());

        $slug = end($previousExplode);
        $sectionDto = $this->sectionDtoFactory->getSectionDtoUseSlug($slug);
        $baseSections = $this->sectionService->getBaseSectionsUseLang(session('lang', 'hu'));

        return view('admin.section.create_edit',
            compact(
                'sectionDto',
                'method',
                'slug',
                'baseSections',
                'title')
        );
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $section->update($request->all());
        return redirect('/section/showBaseSection/' . $section->parent->slug)->with('success', 'Saved');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $sectionData = $request->all();
        $sectionData['lang'] = session('lang', 'hu');

        $section = Section::create($sectionData);

        return redirect('/section/showBaseSection/' . $section->parent->slug)->with('success', 'Saved');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect('/section/showBaseSection/' . $section->parent->slug)->with('success', 'Deleted');
    }

}
