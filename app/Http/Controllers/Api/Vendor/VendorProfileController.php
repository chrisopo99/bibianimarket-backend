<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\CreateVendorProfileRequest;
use App\Models\VendorProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class VendorProfileController extends Controller
{
    public function store(CreateVendorProfileRequest $request): JsonResponse
    {
        $user = $request->user();

        if ($user->vendorProfile) {
            return response()->json([
                'status' => false,
                'message' => 'You already have a vendor store.',
            ], 409);
        }

        $vendor = VendorProfile::create([
            'user_id' => $user->id,
            'business_name' => $request->business_name,
            'slug' => Str::slug($request->business_name) . '-' . $user->id,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Vendor store created successfully.',
            'vendor' => $vendor,
        ], 201);
    }
}