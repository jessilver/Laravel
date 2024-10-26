<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $fillable = ['name', 'email', 'password'];

    public function is_invalid_id($inputs){

        if (array_key_exists('id', $inputs)){
            if (intval($inputs['id']) <= 0 || !ctype_digit($inputs['id'])) {
                return 'Array key id must be a valid positive integer and cannot contain characters';
            }else{
                if (!empty($inputs['id'])) {
                    if (empty(User::find($inputs['id']))) {
                        return "id {$inputs['id']} not found";
                    }
                }else{
                    return  'Array key id is empty';
                }
            }
        }else{
            return 'Array key id not found';
        }
    }

    public function is_valid_imputs($inputs = []){
        $restult['error'] = [];
        $restult['is_error'] = false;

        $accepted_keys = ['id','name', 'email', 'password'];

        $array_keys = array_keys($inputs);

        $diff = array_diff($array_keys, $accepted_keys);


        if (empty($inputs)) {

            $restult['error'][] = 'Array is empty';
        }

        if (!empty($diff)) {

            $restult['error'][] = "Array keys {" . implode(', ', $diff) . "} not accepted. Accepted keys are {" . implode(', ', $accepted_keys)."}";
        }

        // values validation

        // id validation
        if ($this->is_invalid_id($inputs)){
            $restult['error'][] = $this->is_invalid_id($inputs);
        }


        if (!empty($restult['error'])) {
            $restult['is_error'] = true;
        }

        return $restult;

    }

    public function index(Request $request)
    {
        return User::all() ?? 'No users found';
    }

    public function showOne(Request $request, $id)
    {
        $values = [
            'id' => $id,
        ];

        $validator = $this->is_valid_imputs($values);

        if($validator['is_error'] == false){
            $user = User::find($id);
            $user['address'] = $user->address;
            return $user;
        }else{
            return $validator;
        }
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->save();
        return $user;
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->address_id = $request->address_id ?? $user->address_id;
        $user->save();

        return $user;
    }

    public function showAddresses(Request $request, $id)
    {
        $user = User::find($id);
        return $user->address;
    }
}
