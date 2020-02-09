<?php

namespace App\Http\Controllers\back;

use App\Cyberspace;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CyberspaceController extends Controller
{
    public function index()
    {
        $cyberspaces = Cyberspace::get();
        return view('admin.cyberspace.cyberspace', compact('cyberspaces'));
    }



    public function edit(Cyberspace $cyberspace)
    {
        return view('admin.cyberspace.edit', compact('cyberspace'));
    }




    public function update(Request $request, Cyberspace $Cyberspace)
    {

        $messages = [
            'url.required' => 'فیلد آدرس را وارد نمایید.'
        ];
        $validateCategory = $request->validate([
            'url' => 'required'
        ], $messages);
        try {
            $Cyberspace->update($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.Cyberspace.edit'))->with('warning', $exception->getCode());
        }
        $msg = "ویرایش با موفقیت انجام شد.";
        return redirect(route('admin.cyberspace'))->with('success', $msg);
    }
}
