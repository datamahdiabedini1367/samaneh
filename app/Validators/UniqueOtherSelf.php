<?php
namespace App\Validators;
use Illuminate\Support\Facades\DB;

class UniqueOtherSelf
{

    public  function validate($attribute ,$value ,$parameters ,$validator ){
//            dd('appServiceProvider',$attribute ,$value ,$parameters ,$validator );

        $table=$parameters[0];
        $column=$parameters[1];
        $id=$parameters[2];

        $result = DB::table($table)->where($column,$value)->first();
//        dd($result);
        return !DB::table($table)->where('id','!=',$id)->where($column,$value)->exists();

//        dd($result);
//        dd($table ,$column);

    }

}
