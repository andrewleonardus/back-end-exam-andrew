<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UnitRumah;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
   

    function GetUnit(){
            $unit = DB::table('unit_rumahs')->get();
            
            return response()->json($users, 200);
        }
    
    function CreateNewUnit(Request $request){
        
        try{
                
            $this->validate($request,[
            'kavling' => 'required',
            'blok' => 'required',
            'no_rumah' => 'required',
            'harga_rumah' => 'required',
            'luas_tanah' => 'required',
            'luas_bangunan' => 'required',
            'customers_id' => 'required',
                                
            ]);
        
                $unit = new UnitRumah;
                $unit->Kavling =  $request->input('kavling');
                $unit->Blok = $request->input('blok');
                $unit->No_Rumah =$request->input('no_rumah');
                $unit->Harga_Rumah= $request->input('harga_rumah');
                $unit->Luas_Tanah=$request->input('luas_tanah');
                $unit->Luas_Bangunan=$request->input('luas_bangunan');
                $unit->customers_id=$request->input('customers_id');
                $unit->save();
                return response()->json(['message' =>'Berhasil'], 200);
        }
            catch(\Exception $e){
                
                //return "Gagal";
                return response()->json(['message' =>'Failed to create unit, exception:' + $e], 500);
            }
        }   
    
    
        
    function DeleteUnit(Request $request){
                $id = $request->input('id');
                $unit_del = DB::delete(
                    'delete from unit_rumahs
                    where id =?',[$id]);
                
                return response()->json($unit_del, 200);
            

    }
}
        






