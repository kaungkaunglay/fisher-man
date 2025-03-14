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
        $message = [
            'question.required' => '質問は必須です。',
            'question.string' => '質問は文字列で入力してください。',
            'question.max' => '質問は255文字以内で入力してください。',
            'answer.required' => '回答は必須です。',
            'answer.string' => '回答は文字列で入力してください。',
        ];
          $request->validate([
              'question' => 'required|string|max:255',
              'answer' => 'required|string',
          ],$message);
  
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
        $message = [
            'question.required' => '質問は必須です。',
            'question.string' => '質問は文字列で入力してください。',
            'question.max' => '質問は255文字以内で入力してください。',
            'answer.required' => '回答は必須です。',
            'answer.string' => '回答は文字列で入力してください。',
        ];
          $request->validate([
              'question' => 'required|string|max:255',
              'answer' => 'required|string',
          ],$message);
  
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
