<?php

namespace App\Http\Controllers;

use App\Models\GroupPermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class GroupPermissionController extends Controller
{

    public function index(Request $request)
    {
        $field = $request->get('field');
        $phrase = $request->get('phrase');

        if ($request->has('field') && !empty($field) && !empty($phrase)) {
            $groupPermission = GroupPermission::query()->where($field, 'like', "%{$phrase}%")->orderBy('id')->paginate();
        } else {
            $groupPermission = GroupPermission::query()->paginate();
        }

        $fields = [
            'title' => 'عنوان گروه',
        ];
        return view('pages.groupPermissions.index', [
                'group_permissions' => $groupPermission,
                'fields' => $fields
            ]
        );
    }

    public function create()
    {
        return view('pages.groupPermissions.create',[
            'permissions'=>''
        ]);
    }

}
