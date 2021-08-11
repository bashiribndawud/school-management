<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\FeeCategory;

class FeeAmountCategoryController extends Controller
{
    
    public function FeeAmountView(){
        //$data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', $data);

    }

    public function AddFeeAmount(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function StoreFeeAmount(Request $request){
        //$countClass = count($request->class_id);
        //dd($countClass);
        if($request->class_id != NULL) {
            for($i = 0; $i < count($request->class_id); $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i]; 
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
                
            }
        }else {
            $notifications = array(
                "message" => "Please enter class and fee amount",
                "alert-type" => "error"
            );
    
            return redirect()->route('add.fee.amount')->with($notifications);
        }

        $notifications = array(
            "message" => "Fee Amount Inserted Successfully",
            "alert-type" => "success"
        );

        return redirect()->route('student.fee_amount.view')->with($notifications);
    }


    public function EditFeeAmount($fee_category_id){
        // this returns an arrays of records 
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        //dd($data['editData']->toArray());
        
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount', $data);

    }


    public function UpdateFeeAmount(Request $request, $fee_category_id){
        if($request->class_id == NULL){
            $notifications = array(
                "message" => "Please select a class type and amount",
                "alert-type" => "error"
            );
    
            return redirect()->route('fee.amount.edit',$fee_category_id)->with($notifications);

        }else {
            // check category id and match with requested id then delete;
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            
            for($i = 0; $i < count($request->class_id); $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            }
        }

        $notifications = array(
            "message" => "Fee category amount updated",
            "alert-type" => "success"
        );

        return redirect()->route('student.fee_amount.view')->with($notifications);
    }


    public function GetDetails($fee_category_id){
        $data['allData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_amount.detail_fee_view', $data);
    }


}
