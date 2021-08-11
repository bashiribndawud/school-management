<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    //

    public function ViewFeeCategory() {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee', $data);
    }

    public function AddFeeCategory(){
        return view('backend.setup.fee_category.add_fee');
    }

    public function StoreFeeCategory(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ],
        [
            'name.required' => 'This Field is Required',
            'name.unique' => 'This value already exist',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notifications = array(
            "message" => "Fee Category Inserted",
            "alert-type" => "success"
        );

        return redirect()->route('student.fee.view')->with($notifications);


    }

    public function EditFeeCategory($id){
        $datas = FeeCategory::findOrFail($id);
        return view('backend.setup.fee_category.edit_fee', compact('datas'));
    }

    public function UpdateFeeCategory(Request $request, $id){
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ],
        [
            'name.required' => 'This Field is Required',
            'name.unique' => 'This value already exist',
        ]);

        $editFee = FeeCategory::findOrFail($id);
        $editFee->name = $request->name;
        $editFee->update();

        $notifications = array(
            "message" => "Fee Category Updated",
            "alert-type" => "success"
        );

        return redirect()->route('student.fee.view')->with($notifications);
    }

    public function DeleteFeeCategory($id) {
        $category = FeeCategory::findOrFail($id);
        $category->delete();

        $notifications = array(
            "message" => "Fee Category Deleted Successfully",
            "alert-type" => "success"
        );

        return redirect()->route('student.fee.view')->with($notifications);


    }



}
