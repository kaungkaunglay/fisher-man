<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FAQs;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    //

      //faq
      public function all_faqs()
      {
          $faqs = FAQs::all();
          return view('admin.faqs', compact('faqs'));
      }
      public function faq()
      {
          return view('admin.faq');
      }
      // Store new FAQ
      public function store(Request $request)
      {
          $request->validate([
              'question' => 'required|string|max:255',
              'answer' => 'required|string',
          ]);
  
          FAQs::create($request->all());
  
          return redirect()->route('admin.faqs')->with('success', 'FAQ created successfully.');
      }
  
      public function edit($id)
      {
          // echo "edit";
          $faq = FAQs::findOrFail($id);
          return view('admin.faq', compact('faq'));
      }
  
      public function update(Request $request, $id)
      {
          $request->validate([
              'question' => 'required|string|max:255',
              'answer' => 'required|string',
          ]);
  
          $faq = FAQs::findOrFail($id);
          $faq->update($request->all());
  
          return redirect()->route('admin.faqs')->with('success', 'FAQ updated successfully.');
      }
  
      public function destroy($id)
      {
          $faq = FAQs::findOrFail($id);
          $faq->delete();
          return response()->json(['success' => true, 'message' => 'FAQ deleted successfully']);
          // return redirect()->route('admin.faqs')->with('success', 'FAQ deleted successfully.');
      }
  
}
