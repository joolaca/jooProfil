<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    function get(Request $request){

        $slug = $request->input('slug');
        $baseSection = Section::query()
            ->where('slug' , $slug)
            ->where('lang', $request->header('lang', 'hu'))
            ->first();
        return json_encode($baseSection->subSections);
    }

    function showBaseSection($slug){
        $baseSection = Section::getSubSectionUseSlug($slug);
        return view('admin/section/base_section', compact('baseSection'));
    }

    function setOrder(Request $request){
        $i=0;
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
        return view('admin.section.create_edit', compact('section' , 'method', 'title'));
    }

    public function create()
    {
        $method = 'POST';
        $title = 'Create';
        $previousExplode = explode('/',url()->previous());

        $selectedSectionSlug = end($previousExplode);
        $baseSections = Section::query()
            ->where('parent_id' , 0)
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
        return redirect('/section/showBaseSection/'.$section->parent->slug)->with('success', 'Saved');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $sectionData = $request->all();
        $sectionData['lang'] = session('lang', 'hu');

        $section = Section::create($sectionData);

        return redirect('/section/showBaseSection/'.$section->parent->slug)->with('success', 'Saved');
    }

    public function destroy(Section $section)
    {
        $section ->delete();
        return redirect('/section/showBaseSection/'.$section->parent->slug)->with('success', 'Deleted');
    }


}
