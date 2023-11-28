<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.video.index', [
            'videos' => Video::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'youtube_code' => 'required',
        ];

        $message = [
            'judul.required' => 'Judul harus diisi',
            'youtube_code.required' => 'Youtube code harus diisi',
        ];

        $this->validate($request, $rules, $message);

        Video::create([
            'judul' => $request->judul,
            'youtube_code' => $request->youtube_code,
        ]);

        return redirect()->route('video.index')->with('success', 'Video berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $rules = [
            'judul' => 'required',
            'youtube_code' => 'required',
        ];

        $message = [
            'judul.required' => 'Judul harus diisi',
            'youtube_code.required' => 'Youtube code harus diisi',
        ];

        $this->validate($request, $rules, $message);

        $video->update([
            'judul' => $request->judul,
            'youtube_code' => $request->youtube_code,
        ]);

        return redirect()->route('video.index')->with('success', 'Video berhasil diupdate');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        $video->delete();

        return redirect()->route('video.index')->with('success', 'Video berhasil dihapus');
    }
}
