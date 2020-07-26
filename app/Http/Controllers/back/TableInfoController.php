<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\TableInfo;
use Illuminate\Http\Request;

class TableInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $this->middleware('Access:settings');

        $tableInfo = TableInfo::find($id);
        $request->validate([
            'img' => 'mimes:jpeg,bmp,jpg,png|max:500kb'
        ]);

        $tableInfo->price = $request->price;
        $file = $request->file('img1');
        if ( $request->hasFile('img1') && !is_null($request->img1) ) {
            $path = random_int(0 , 99999).time().'_.'.$request->img1->getClientOriginalExtension();
            $request->img1->move(public_path('upload') , $path);
            $imgPath = $path;
            $tableInfo->img1 = $imgPath;
        }
        $file = $request->file('img2');
        if ( $request->hasFile('img2') && !is_null($request->img2) ) {
            $path = random_int(0 , 99999).time().'_.'.$request->img2->getClientOriginalExtension();
            $request->img2->move(public_path('upload') , $path);
            $imgPath = $path;
            $tableInfo->img2 = [$imgPath];
        }
        $tableInfo->save();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
