<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use DB;
class UsersController extends Controller
{
    //
    public function index() {
        $users = Users::paginate();
        return response($users, 200);
    }

    public function show($id) {
        $user = Users::where('id', $id)->first();
        if($user){
            return response($user, 200);
        }else {
            return response('', 404);
        }
    }

    public function create(Request $request) {
        // return $request->get('first_name');
        // return $request->get('youtube_links');
        $val = $this->validation($request->all());
        if(!is_null($val)){
            return response($val,400);
        }
        try {
            DB::beginTransaction();
            $user = new Users;
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->gender = $request->get('gender');
            $user->dob = $request->get('dob');
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->status = $request->get('active');;
            $user->save();
            $created_info = [
                'id' => $user->id,
            ];
            DB::commit();
            return  response()->json([
                'message' => 'Info is created successfully',
                'created_info' => $created_info
            ], 200);

        }catch (Exception $e) {
            DB::rollBack();
            return response($e,409);
        }
    }

    public function update(Request $request, $id) {
        //  return $request->get('first_name');
        $val = $this->validation($request->all());
        if(!is_null($val)){
            return response($val, 400);
        }
        try {
            $user = Users::find($id);
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->gender = $request->get('gender');
            $user->dob = $request->get('dob');
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->status = $request->get('active');
            $user->save();
            return response()->json([
                'message' => 'Info is updated successfully',
            ],200);

        }catch (Exception $e) {
            return response($e, 409);
        }
    }

    public function destroy($id){
        $user = Users::find($id);
        if(!$user){
            return response('Info not found', 404);
        }
        try{
            $user->delete();
            return response('Info is deleted successfully',200);
        }catch(Exception $e){
            return response($e,409);
        }
    }

    protected function validation($request){
        $val = \Validator::make($request,[
           'first_name' => 'required|min:4',
           'last_name' => 'required|min:4',
           'gender' => 'required',
           'dob' => 'required|date',
           'email' => 'required|email',
           'phone' => 'required|numeric',
           'address'=>'required|min:10',
           'status'=>'required'
        ]);
        if ($val->fails()) {
            return $val->messages();
        }else{
            return null;
        }
    }
}
