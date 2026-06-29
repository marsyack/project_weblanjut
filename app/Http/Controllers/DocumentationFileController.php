<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentationFile;

class DocumentationFileController extends Controller
{
    public function index()
    {
        $files = DocumentationFile::latest()->get();

        return view('documentation_files', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'file'=>'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $path = $request->file('file')->store('documentation','public');

        DocumentationFile::create([
            'title'=>$request->title,
            'file_path'=>$path,
            'file_type'=>$request->file('file')->extension()
        ]);

        return redirect()->back()->with('success','Upload berhasil');
    }
}