<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq_view', compact('faqs'));
    }
    public function create()
    {
        return view('Admin.faq_create');
    }
    public function store(Request $request)
    {
        $new_faq = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $new_faq['question'] = $request->question;
        $new_faq['answer'] = $request->answer;
        Faq::create($new_faq);
        return redirect()->route('admin_faq_view')->with('success', 'Faq save');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('Admin.faq_edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq = Faq::findOrFail($id);
        $faq['question'] = $request->question;
        $faq['answer'] = $request->answer;
        $faq->update();
        return redirect()->route('admin_faq_view')->with('success', 'Faq updated');
    }
    public function delete($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'Faq deleted');
    }
}