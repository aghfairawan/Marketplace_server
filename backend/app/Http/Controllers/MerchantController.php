<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MerchantController extends Controller
{
    /**
     * Display a listing of the merchants.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $merchants = Merchant::all();
        return response()->json($merchants);
    }

    /**
     * Display the specified merchant.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $merchant = Merchant::findOrFail($id);
        return response()->json($merchant);
    }

    /**
     * Store a newly created merchant in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $merchant = Merchant::create($request->only(['name', 'address', 'contact', 'description']));
        return response()->json($merchant, 201); // Return HTTP 201 Created
    }

    /**
     * Update the specified merchant in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $merchant = Merchant::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'contact' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);

        $merchant->update($request->only(['name', 'address', 'contact', 'description']));
        return response()->json($merchant);
    }

    /**
     * Remove the specified merchant from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $merchant = Merchant::findOrFail($id);
        $merchant->delete();
        return response()->json(['message' => 'Merchant deleted']);
    }
}
