<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Danhmuctruyen;
use App\Models\Theloai;
use App\Models\Truyen;

class IndexController extends Controller 
{
	public function home($value = '') 
	{
		$theloai = Theloai::orderBy('id', 'ASC')->get();

		$slide_truyen = Truyen::orderBy('id', 'ASC')->where('kichhoat', 0)->take(8)->get();

		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();
		$truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();

		return view('.pages.home')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
	}
	public function danhmuc($slug) 
    {
		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();

		$slide_truyen = Truyen::orderBy('id', 'ASC')->where('kichhoat', 0)->take(8)->get();

		$danhmuc_id = Danhmuctruyen::where('slug_danhmuc', $slug)->first();
		$tendanhmuc = $danhmuc_id->tendanhmuc;
		// echo $danhmuc_id->id;
		$truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();

		return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'theloai', 'tendanhmuc', 'slide_truyen'));
	}
	public function theloai($slug) 
    {
		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

		$slide_truyen = Truyen::orderBy('id', 'ASC')->where('kichhoat', 0)->take(8)->get();

		$theloai_id = Theloai::where('slug_theloai', $slug)->first();
		$tentheloai = $theloai_id->tentheloai;

		$truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();

		return view('pages.theloai')->with(compact('danhmuc', 'truyen', 'theloai', 'tentheloai', 'slide_truyen'));
	}
	public function doctruyen($slug) 
    {
		// $info = Info::find(1);

		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();

		$slide_truyen = Truyen::orderBy('id', 'ASC')->where('kichhoat', 0)->take(8)->get();

		$truyen = Truyen::with('danhmuctruyen', 'theloai')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();
		$chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->get();

		$chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();

		$cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();
		$truyenxemnhieu = Truyen::orderBy('id', 'ASC')->where('kichhoat', 0)->get();

		return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'cungdanhmuc', 'chapter_dau', 'theloai', 'slide_truyen','truyenxemnhieu'));
	}
	public function docchapter($slug) 
    {
		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();
		$truyen = Chapter::where('slug_chapter', $slug)->first();

		$slide_truyen = Truyen::orderBy('id', 'ASC')->where('kichhoat', 0)->take(8)->get();

		// breadcrumb
		$truyen_breadcrumb = Truyen::with('danhmuctruyen', 'theloai')->where('id', $truyen->truyen_id)->first();
		// breadcrumb-end
		$chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id',$truyen->truyen_id)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();

		//
		$next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug_chapter');
		$max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();
		// --
		$min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();
		$previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug_chapter');

		return view('pages.chapter')->with(compact('danhmuc', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'min_id', 'max_id', 'theloai', 'truyen_breadcrumb', 'slide_truyen'));
	}
	public function timkiem($value = '') 
    {
		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();

		$slide_truyen = Truyen::orderBy('id', 'ASC')->where('kichhoat', 0)->take(8)->get();

		$tukhoa = $_GET['tukhoa'];
		$truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')->orWhere('motatruyen', 'LIKE', '%' . $tukhoa . '%')->orWhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->get();

		return view('.pages.timkiem')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'tukhoa'));
	}

	public function search(Request $request) {

		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();
		$tukhoa = $_GET['tukhoa'];
		$truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')->orWhere('motatruyen', 'LIKE', '%' . $tukhoa . '%')->orWhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->get();

        return response()->json($truyen);
	}

}
