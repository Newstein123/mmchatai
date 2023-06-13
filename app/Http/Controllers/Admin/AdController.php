<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
 
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->get();
        return view('admin.Ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.Ads.create');
    }

    public function store(Request $request)
    {
        $this->adsDatavalidate($request);
        $data = $this->getData($request);
        Ad::create($data);
        return redirect()->route('ads#Page')->with(['created', 'Ads Created Successfully']);
    }

    public function show()
    {
        return view('admin.Ads.edit');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Ad::where('id',$id)->delete();
        return redirect()->route('ads#Page')->with(['deleted','Ads Deleted Successfully']);
    }

    // ads data
    private function getData($request){
        $response=[
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status
        ];
        return $response;
    }

    // ads validate
    private function adsDatavalidate($request)
    {
        $adsDataValidate = [
            'name' => 'require',
            'description' => 'required',
            'image' => 'mimes:mimes:jpg,png,jpeg,webp|file'
        ];

        Validator::make($request->all(),$adsDataValidate);
    }
}
