<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPackageRequest;
use App\Models\Package;
use App\Models\User;
use Carbon\AbstractTranslator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserPackageController extends Controller
{
    public function create(User $user)
    {
        $user->load('packages');
        $packages = Package::whereNotIn('id', $user->packages->pluck('id'))->where('enabled',1)->get();
        return view('user-packages.create', compact('user', 'packages'));
    }

    public function store(UserPackageRequest $request, User $user)
    {
        $package = Package::with('users')->find($request->input('package_id'));
        $months = 1;

        if ($request->filled('end_date')) {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'));
            $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
            $months = $startDate->diffInMonths($endDate);
        }

        $amountToDeduct = $package->credits * $months;

        if ( $request->filled('end_date') &&  !$months >= $package->commitment_period) {
            return back()->with('error', 'minimum number of months this package can be assigned to user are ' . $package->commitment_period);
        } else {

            if ($amountToDeduct <= $user->purchased_credits && $package->users()->count() <= $package->sell_limit && $package->sell_limit != 0) {
                $user->packages()->attach($request->input('package_id'), $request->only('start_date', 'end_date'));
                $user->update(['purchased_credits' => $user->purchased_credits - $amountToDeduct]);
                $package->update(['sell_limit' => $package->sell_limit - 1]);
            } else {

                if ($amountToDeduct >= $user->purchased_credits) {

                    $message = "User does not have sufficient credit for this package";
                } else {
                    $message = "Package Sell Limit has been reached";
                }
                return back()->with('error', $message);

            }
        }


        return back()->with('success', 'User Packages updated successfully');
    }
}
