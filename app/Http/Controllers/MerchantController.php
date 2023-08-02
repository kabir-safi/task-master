<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\User;
use App\Services\MerchantService;
use  App\Services\AffiliateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\StoreUserRequest;

class MerchantController extends Controller
{

//private $merchantService;
    public function __construct(protected MerchantService $merchantService, protected AffiliateService $affiliateService)
    {

    }

    /**
     * Useful order statistics for the merchant API.
     *
     * @param Request $request Will include a from and to date
     * @return JsonResponse Should be in the form {count: total number of orders in range, commission_owed: amount of unpaid commissions for orders with an affiliate, revenue: sum order subtotals}
     */
    public function orderStats(Request $request): JsonResponse
    {
        dd($request);
// TODO: Complete this method
    }

//public function create(Merchant $merchant,Request $request) {
//
//        $this->affiliateService->register($merchant, 'kabirsafi62@gmail.com','kabirsafi',2);
////    (new MerchantService()) or
////    $merchantService = resolve(MerchantService::class); //resolve dependency injection,
////    $merchantService->register([
////        'name' => 'kabir',
////        'email' => 'kabir@exalted.pk',
////        'password' => 'kabir@exalted.pk',
////        'domain' => 'domain',
////        'display_name' => 'display_name'
////    ]);
//////     (new MerchantService())->register([]);
//////    dd();
//// TODO: Complete this method
//}

/**
* Display all users
*
* @return \Illuminate\Http\Response
*/
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('merchant.index', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        $request->validated();
        try{
            $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "domain" => $request->domain,
            "display_name" => $request->display_name,
            ];
            $this->merchantService->register($data);
        }catch (\Exception $ex){
            $ex->getMessage();
        }


        return redirect()->route('merchant.index')->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('merchant.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('merchant.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated());

        return redirect()->route('merchant.index')->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('merchant.index')->withSuccess(__('User deleted successfully.'));
    }
}
