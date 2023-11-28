<?php
declare(strict_types=1);

namespace App\SectionManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use App\SectionManagement\Contracts\ISectionService;

class SectionController extends Controller
{
    public function __construct(
        private readonly ISectionService $sectionService
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
        foreach ($request->order as $sectionId) {
            Section::query()
                ->where('id', $sectionId)
                ->update(['position' => $i++]);
        }
        return $request;
    }


    public function edit(Section $section)
    {
        $method = 'PUT';
        $title = 'Edit';
        return view('admin.section.create_edit', compact('section', 'method', 'title'));
    }

    public function create()
    {
        $method = 'POST';
        $title = 'Create';
        $previousExplode = explode('/', url()->previous());

        $selectedSectionSlug = end($previousExplode);
        $baseSections = Section::query()
            ->where('parent_id', 0)
            ->where('lang', session('lang', 'hu'))
            ->get();

        return view('admin.section.create_edit', compact('method', 'title', 'baseSections', 'selectedSectionSlug'));
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
