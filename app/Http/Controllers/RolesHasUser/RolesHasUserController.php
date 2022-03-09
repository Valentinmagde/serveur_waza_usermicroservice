<?php

namespace App\Http\Controllers\RolesHasUser;

use Illuminate\Http\Request;
use App\Models\RoleHasUser;
use Validator;

class RolesHasUserController extends Controller
{
    /** 
     * Create a memberHasUser api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function createRoleHasUser(Request $request)
    {
        // check if all fields are filled
        $validator = Validator::make($request->all(), [
            'utilisateurs_id' => 'required',
            'membres_id' => 'required'
        ]);
        if ($validator->fails()) {
            $err['errNo'] = 10;
            $err['errMsg'] = implode(", ", $validator->errors()->all());
            $error['status'] = 'NOK';
            $error['data'] = $err;
            return response()->json($error, 400);
        }

        return RoleHasUser::createMemberHasUser($request);
    }

    /**
     * Get memberHasUser by id
     * @param MembreHasUser $id
     * @return MembreHasUser
     */
    public function getMemberHasUserById(Request $request)
    {
        return MembresHasUserMethods::getMemberHasUserByid($request);
    }
}
