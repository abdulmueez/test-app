<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Http\Resources\UserResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $query = Package::query();
        $query->where('enabled', 1);
        return PackageResource::collection($query->paginate());
    }


    public function show(Package $package)
    {
        return new UserResource($package);
    }

}
