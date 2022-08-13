<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\Danhmuctruyen;
use App\Models\Theloai;

class TruyenController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$list_truyen = Truyen::with('danhmuctruyen','theloai')->orderBy('id','ASC')->get();
		// dd($list_truyen);exit;
		return view('admintt.truyen.index')->with(compact('list_truyen'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();
		return view('admintt.truyen.create')->with(compact('danhmuc', 'theloai'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$data = $request->validate(
			[
				'tentruyen' => 'required|unique:truyen|max:255',
				'tacgia' => 'required',
				'slug_truyen' => 'required|unique:truyen|max:255',
				'motatruyen' => 'required',

				'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',

				'kichhoat' => 'required',
				'danhmuc' => 'required',
				'theloai' => 'required',

			],
			[
				'tentruyen.unique' => 'Tên truyện đã có, điền tên khác nhé!',
				'slug_truyen.unique' => 'Slug truyện đã có, điền slug khác nhé!',
				'tentruyen.required' => 'Cần thêm tên truyện nhé!',
				'tacgia.required' => 'Cần thêm tên của tác giả nhé!',
				'motatruyen.required' => 'Cần thêm mô tả cho truyện nhé!',
				'hinhanh.required' => 'Hình ảnh cần phải có nhé!',
			]

		);
		//$data = $request->all();
		$truyen = new Truyen();

		$truyen->tentruyen = $data['tentruyen'];
		$truyen->tacgia = $data['tacgia'];
		$truyen->slug_truyen = $data['slug_truyen'];
		$truyen->motatruyen = $data['motatruyen'];
		$truyen->kichhoat = $data['kichhoat'];
		$truyen->danhmuc_id = $data['danhmuc'];
		$truyen->theloai_id = $data['theloai'];
		// thêm ảnh vào folder
		$get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName(); //dùng để lấy tên ảnh
        $name_image = current(explode('.',$get_name_image)); //tách tên ảnh là đuôi định dạng
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //đổi lại tên hình ảnh
        $get_image->move($path,$new_image); //đưa ảnh vào đường dẫn path
        
        $truyen->hinhanh = $new_image;

        //var_dump($truyen);exit;
		$truyen->save();
		return redirect()->back()->with('status', 'thêm truyện thành công!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$truyen = Truyen::find($id);
		$theloai = Theloai::orderBy('id', 'ASC')->get();
		$danhmuc = Danhmuctruyen::orderBy('id', 'ASC')->get();
		return view('admintt.truyen.edit')->with(compact('truyen', 'danhmuc', 'theloai'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$data = $request->validate(
			[
				'tentruyen' => 'required|max:255',
				'tacgia' => 'required',
				'slug_truyen' => 'required|max:255',
				'motatruyen' => 'required',

				// 'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',

				'kichhoat' => 'required',
				'danhmuc' => 'required',
				'theloai' => 'required',

			],
			[
								
				'tentruyen.required' => 'Cần thêm tên danh mục nhé!',
				'tacgia.required' => 'Cần thêm tên của tác giả nhé!',
				'slug_truyen.required' => 'Slug truyện đã có, điền slug khác nhé!',
				'motatruyen.required' => 'Cần thêm mô tả cho truyện nhé!',
				// 'hinhanh.required' => 'Hình ảnh cần phải có nhé!',
			]

		);
		//$data = $request->all();
		$truyen = Truyen::find($id);

		$truyen->tentruyen = $data['tentruyen'];
		$truyen->tacgia = $data['tacgia'];
		$truyen->slug_truyen = $data['slug_truyen'];
		$truyen->motatruyen = $data['motatruyen'];
		$truyen->kichhoat = $data['kichhoat'];
		$truyen->danhmuc_id = $data['danhmuc'];
		$truyen->theloai_id = $data['theloai'];
		// thêm ảnh vào folder
		$get_image = $request->hinhanh;
		if($get_image){
			if(file_exists($path)){
			unlink($path);
		}
			$path = 'public/uploads/truyen/'.$truyen->hinhanh;
        $get_name_image = $get_image->getClientOriginalName(); //dùng để lấy tên ảnh
        $name_image = current(explode('.',$get_name_image)); //tách tên ảnh là đuôi định dạng
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //đổi lại tên hình ảnh
        $get_image->move($path,$new_image); //đưa ảnh vào đường dẫn path
        
        $truyen->hinhanh = $new_image;
		}
        
        //var_dump($truyen);exit;
		$truyen->save();
		return redirect()->back()->with('status', 'thêm truyện thành công!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$truyen = Truyen::find($id);
		$path = 'public/uploads/truyen/'.$truyen->hinhanh;
		if(file_exists($path)){
			unlink($path);
		}
		Truyen::find($id)->delete();
		return redirect()->back()->with('status', 'Xóa truyện thành công!');
	}
}
