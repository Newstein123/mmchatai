<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        $this->adsDatavalidate($request,'create');
        $data = $this->getData($request);
        if ($request->hasFile('image')) {
            $fileName = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/ads', $fileName);
            $data['image'] = $fileName;
        }
        Ad::create($data);
        return redirect()->route('ads#Page')->with(['created', 'Ads Created Successfully']);
    }

    public function show($id)
    {
        $ads = Ad::where('id', $id)->first();
        return view('admin.Ads.edit', compact('ads'));
    }

    public function edit($id)
    {
        $ads = Ad::where('id', $id)->first();
        return view('admin.Ads.edit', compact('ads'));
    }

    public function update(Request $request, $id)
    {
        $this->adsDatavalidate($request,'update');
        $data = $this->getData($request);

        // image 
        if ($request->hasFile('image')) {
            $oldImageName = Ad::where('id', $id)->first();
            $oldImageName = $oldImageName->image;

            if ($oldImageName != null) {
                Storage::delete('public/ads' . $oldImageName);
            }

            $fileName = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/ads', $fileName);
            $data['image'] = $fileName;
        }

        Ad::where('id', $id)->update($data);
        return redirect()->route('ads#Page')->with(['updated', 'Ads Created Successfully']);
    }

    public function destroy($id)
    {
        Ad::where('id', $id)->delete();
        return redirect()->route('ads#Page')->with(['deleted', 'Ads Deleted Successfully']);
    }

    // ads data
    private function getData($request)
    {
        $response = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ];
        return $response;
    }

    // ads validate
    private function adsDatavalidate($request,$action)
    {
        $adsDataValidate = [
            'name' => 'require',
            'description' => 'required',
            'image' => 'mimes:mimes:jpg,png,jpeg,webp|file'
        ];
        $validationRule['image'] = $action == 'create' ? 'required|mimes:jpg,png,jpeg,webp|file' : "mimes:jpg,png,jpeg,webp|file";
        Validator::make($request->all(), $adsDataValidate);
    }
}
