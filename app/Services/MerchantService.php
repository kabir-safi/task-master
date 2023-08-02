<?php

namespace App\Services;

use App\Jobs\PayoutOrderJob;
use App\Models\Affiliate;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\User;
use Hash;
use http\Env\Response;
use Str;
use Illuminate\Support\Facades\DB;

class MerchantService
{
/**
 * Register a new user and associated merchant.
 * Hint: Use the password field to store the API key.
 * Hint: Be sure to set the correct user type according to the constants in the User model.
 *
 * @param array{domain: string, name: string, email: string, api_key: string} $data
 * @return Merchant
 */
public function register(array $data): Merchant
{
    DB::beginTransaction();
    try {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(10),
            'type' => User::TYPE_MERCHANT
        ]);
        $user->merchant()->create($data);
        DB::commit();
        return $user->merchant;
    }catch(\Exception $ex){
        DB::rollback();
        return $ex->getMessage();
    }
// TODO: Complete this method
}

/**
 * Update the user
 *
 * @param array{domain: string, name: string, email: string, api_key: string} $data
 * @return void
 */
public function updateMerchant(User $user, array $data)
{
    try {
        $user = User::where('email',$email)->first();
    }catch(\Exception $ex){
        return $ex->getMessage();
    }
// TODO: Complete this method
}

/**
 * Find a merchant by their email.
 * Hint: You'll need to look up the user first.
 *
 * @param string $email
 * @return Merchant|null
 */
public function findMerchantByEmail(string $email): ?Merchant
{
    try {
        // Lazy loading
        $user = User::where('email',$email)->first();
        return $user->merchant;
        /**
         * We Can also do with ,which is call Eager loading.
         * But Throw error Return value must be of type, we will change : ?Merchant To User Model
         * return User::Where('email',$email)->with('merchant')->first();
         */
    }catch(\Exception $ex){
        return $ex->getMessage();
    }
// TODO: Complete this method,
}

/**
 * Pay out all of an affiliate's orders.
 * Hint: You'll need to dispatch the job for each unpaid order.
 *
 * @param Affiliate $affiliate
 * @return void
 */
public function payout(Affiliate $affiliate)
{
// TODO: Complete this method
}
}
