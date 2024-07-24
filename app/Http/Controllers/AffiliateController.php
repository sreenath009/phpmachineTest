<?php

namespace App\Http\Controllers;

use App\Http\Requests\addUser;
use App\Http\Requests\recordSale;
use App\Models\commission;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{

    public function index(){
        $users=User::all();
        return view('users.adduser',compact('users'));
    }
    public function showRecordSale(){
        $users=User::where('parent_id','!=','')->get();
        return view('users.recordSale',compact('users'));
    }
    public function addUser(addUser $request){
        // echo"hi";exit;
       $input= $request->validated();
       if($input){
        $user = User::create($input);
        return redirect()->route('add.user')->with('success','User Added Successfully');
       }else{
        return redirect()->route('add.user')->with('Error','Data Validation Error');
       }

    }
    public function recordSale(recordSale $request){
        $input= $request->validated();
      if($input){
         $sale = Sale::create($input);
         $this->distributeCommissions($sale);
         return redirect()->route('record.sale')->with('success','Sale Recorded Successfully');
      }else{
        return redirect()->route('record.sale')->with('Error','Data Validation Error');
      }
      
 
     }
     protected function distributeCommissions(Sale $sale){
       
        $commissionRate=[0.10,0.05,0.03,0.02,0.01];
        $user=$sale->user;
       
        for($level =0; $level <5 && $user->parent; $level++){
            $user = $user->parent;
           
            $commission = $sale->amount * $commissionRate[$level];
        
            commission::create([
                'sale_id'=>$sale->id,
                'user_id'=>$user->id,               
                'amount'=>$commission,
                'level'=>$level + 1,
            ]);
            info("Level".($level +1)."commission for user {$user->id}: {$commission}");
           
        }


     }
}
