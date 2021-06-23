<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoStoreRequest;
use App\Models\Company;
use App\Models\Person;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoContorller extends Controller
{

    public function index($type, $id)
    {
        $itemType = $type;
        $type = $this->firstItem($type, $id);

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



    public function store(PhotoStoreRequest  $request, $type, $id)
    {
        $path = $request->file('image')->store('public/image/'.$type.'/'.$id.'/');

        if ($type=='company') {
            $type = Company::class;
        }else if ($type == 'person'){
            $type = Person::class;
        }else{
            return ;
        }

        Photo::query()->create([
            'image_address'=>$path,
            'title'=>$request->get('title'),
            'photo_type'=>$type,
            'photo_id'=>$id,
        ]);

        return redirect()->back();
    }

    public function destroy(Photo $photo)
    {
        Storage::delete($photo->image_address);
        $photo->delete();

        return redirect()->back();
    }
}
