<?php

namespace App\Actions\Fortify;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(array $input): User


    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $str_name=substr($input['name'],0,3);
        $random_int=random_int(1000,9999);
        $unique_name=$str_name.$random_int;

        $name_check=$input['name'];
         
       
      

        

        return User::create([
            'name' => $input['name'],
            'nik' => $input['nik'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
            'role_id'=> $input['role_id'],
            'nomor_kartu'=> $input['nomor_kartu'],
            'unique_name'=> $unique_name,
        ]);
        if (array_key_exists('nomor_kartu', $input)) {
            $userData['nomor_kartu'] = $input['nomor_kartu'];
        }


        return $user;
    }
}
