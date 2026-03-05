<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseFeature;
use Illuminate\Http\Request;

class WhyChooseFeatureController extends Controller
{
    public function index()
    {
        $features = WhyChooseFeature::orderBy('sort_order')->get();
        return view('admin.home.why-choose.index', compact('features'));
    }

    public function create()
    {
        return view('admin.home.why-choose.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string|max:255',
            'sort_order' => 'required|integer'
        ]);

        WhyChooseFeature::create($request->all());

        return redirect()->route('admin.why-choose-features.index')->with('success', 'Why Choose feature created successfully.');
    }

    public function edit(WhyChooseFeature $whyChooseFeature)
    {
        return view('admin.home.why-choose.edit', compact('whyChooseFeature'));
    }

    public function update(Request $request, WhyChooseFeature $whyChooseFeature)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string|max:255',
            'sort_order' => 'required|integer'
        ]);

        $whyChooseFeature->update($request->all());

        return redirect()->route('admin.why-choose-features.index')->with('success', 'Why Choose feature updated successfully.');
    }

    public function destroy(WhyChooseFeature $whyChooseFeature)
    {
        $whyChooseFeature->delete();
        return redirect()->route('admin.why-choose-features.index')->with('success', 'Why Choose feature deleted successfully.');
    }
}
