<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Person;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoContorller extends Controller
{

    public function index($type, $id)
    {

        $itemType = $type;
        $type = $this->firstItem($type, $id);
//        dd($type,$id);

        return view('photos.index', [
            'itemType' => $itemType,
            'type' => $type,
        ]);


    }

    private function firstItem($type, $id)
    {
        if ($type == 'company') {
            $type = Company::query()->where('id', $id)->first();
        } else if ($type == 'person') {
            $type = Person::query()->where('id', $id)->first();
        }
        return $type;

    }


    public function create()
    {
        //
    }


    public function store(Request $request, $type, $id)
    {
        $path = $request->file('image')->store('public/image/'.$type.'/'.$id.'/');

//        $type=$this->firstItem($type,$id);
//        dd(gettype($type));
        if ($type=='company') {
            $type = Company::class;
        }else if ($type == 'person'){
            $type = Person::class;
        }

        Photo::query()->create([
            'image_address'=>$path,
            'title'=>$request->get('title'),
            'photo_type'=>$type,
            'photo_id'=>$id,
        ]);

        return redirect()->back();

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Photo $photo)
    {
        Storage::delete($photo->image_address);
        $photo->delete();

        return redirect()->back();
    }
}
