<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Customer::query();

        //Get column names
        $tableColumns = Schema::getColumnListing('customers');

        //Loop through all columns
        foreach ($tableColumns as $column) {
            //Apply filters if a query parameter for the column is provided
            if ($request->has($column)) {
                $query->where($column, 'like', '%' . $request->input($column) . '%');
            }
        }

        // Apply sorting if provided
        if ($request->has('sort_by') && $request->has('sort_order')) {
            $query->orderBy($request->input('sort_by'), $request->input('sort_order'));
        }

        //Paginate the results
        $customers = $query->paginate(10);

        return response()->json($customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //DOES NOT APPLY TO JSON API
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'address' => 'nullable|string|max:255',
        ];

        //Validate the request data
        $validator = Validator::make($request->all(), $validationRules);

        //If validation fails, returns JSON with error
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $customer = Customer::query()->create($request->all());

        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //DOES NOT APPLY TO JSON API
    }

    /**
     * Update the specified resource in storage.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Customer $customer): JsonResponse
    {
        //Define validation rules
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'address' => 'nullable|string|max:255',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        //If validation fails, return JSON with error
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        //Update the customer with validated data
        $customer->update($validator->validated());

        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();
        return response()->json(null, 204);
    }
}
