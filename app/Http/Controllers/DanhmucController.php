<?php

namespace App\Http\Controllers;

use App\Models\Danhmuctruyen;
use Illuminate\Http\Request;

class DanhmucController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$danhmuctruyen = Danhmuctruyen::orderBy('id', 'ASC')->get();
		return view('admintt.danhmuctruyen.index')->with(compact('danhmuctruyen'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admintt.danhmuctruyen.create');
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
				'tendanhmuc' => 'required|unique:danhmuc|max:255',
				'slug_danhmuc' => 'required|unique:danhmuc|max:255',
				'motadanhmuc' => 'required|max:255',
				'kichhoat' => 'required',
			],
			[
				'tendanhmuc.unique' => 'Tên danh mục đã có, điền tên khác nhé!',
				'slug_danhmuc.unique' => 'Slug danh mục đã có, điền slug khác nhé!',
				'tendanhmuc.required' => 'Cần thêm tên danh mục nhé!',
				'motadanhmuc.required' => 'Cần thêm mô tả cho danh mục nhé!',
			]

		);
		//$data = $request->all();
		$danhmuctruyen = new Danhmuctruyen();

		$danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
		$danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];
		$danhmuctruyen->motadanhmuc = $data['motadanhmuc'];
		$danhmuctruyen->kichhoat = $data['kichhoat'];

		$danhmuctruyen->save();
		return redirect()->back()->with('status', 'thêm danh mục thành công!');
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
		$danhmuc = Danhmuctruyen::find($id);
		return view('admintt.danhmuctruyen.edit')->with(compact('danhmuc'));
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
				'tendanhmuc' => 'required|max:255',
				'slug_danhmuc' => 'required|max:255',
				'motadanhmuc' => 'required|max:255',
				'kichhoat' => 'required',
			],
			[
				'tendanhmuc.required' => 'Cần thêm tên danh mục nhé!',
				'slug_danhmuc.unique' => 'Slug danh mục đã có, điền slug khác nhé!',
				'motadanhmuc.required' => 'Cần thêm mô tả cho danh mục nhé!',
			]

		);
		//$data = $request->all();
		$danhmuctruyen = Danhmuctruyen::find($id);

		$danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
		$danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];
		$danhmuctruyen->motadanhmuc = $data['motadanhmuc'];
		$danhmuctruyen->kichhoat = $data['kichhoat'];

		$danhmuctruyen->save();

		return redirect()->back()->with('status', 'Cập nhật danh mục thành công!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Danhmuctruyen::find($id)->delete();
		return redirect()->back()->with('status', 'Xóa danh mục thành công!');
	}
}
