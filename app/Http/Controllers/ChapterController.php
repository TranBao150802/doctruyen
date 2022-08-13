<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Truyen;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->get();

        return view('admintt.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id', 'ASC')->get();
        return view('admintt.chapter.create')->with(compact('truyen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tieude' => 'required|max:255',
                'slug_chapter' => 'required|max:255',

                'truyen_id' => 'required',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
            ],
            [
                'tieude.unique' => 'Tiêu đề đã có , điền tiêu đề khác nhé!',
                'tieude.required' => 'Tiêu đề phải có nhé!',
                'slug_chapter.unique' => 'Slug đã có , điền slug khác nhé!',
                'slug_chapter.required' => 'Slug chapter phải có nhé!',
                'tomtat.required' => 'Tóm tắt chapter phải có nhé!',
                'noidung.required' => 'Nội dung chapter phải có nhé!',
                
            ]

        );
        //$data = $request->all();
        $chapter = new Chapter();

        $chapter->truyen_id = $data['truyen_id'];
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        
        //var_dump($chapter);exit;
        $chapter->save();
        return redirect()->back()->with('status', 'thêm chapter cho truyện thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id','ASC')->get();
        return view('admintt.chapter.edit')->with(compact('truyen','chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'tieude' => 'required|max:255',
                'slug_chapter' => 'required|max:255',

                'truyen_id' => 'required',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
            ],
            [
                'tieude.unique' => 'Tiêu đề đã có , điền tiêu đề khác nhé!',
                'tieude.required' => 'Tiêu đề phải có nhé!',
                'slug_chapter.unique' => 'Slug đã có , điền slug khác nhé!',
                'slug_chapter.required' => 'Slug chapter phải có nhé!',
                'tomtat.required' => 'Tóm tắt chapter phải có nhé!',
                'noidung.required' => 'Nội dung chapter phải có nhé!',
                
            ]

        );
        //$data = $request->all();
        $chapter = Chapter::find($id);

        $chapter->truyen_id = $data['truyen_id'];
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        
        //var_dump($chapter);exit;
        $chapter->save();
        return redirect()->back()->with('status', 'Cập nhật chapter cho truyện thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
    }
}
