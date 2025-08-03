<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategorieController extends Controller
{
    public function addCategorie(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation error",
                "errors" => $validator->errors()
            ], 422);
        }

        try {
            $category = Category::create($validator->validated());
            return response()->json([
                "message" => "Category created successfully",
                "category" => $category
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateCategorie(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:20',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation error",
                "errors" => $validator->errors()
            ], 422);
        }

        try {
            $category = Category::findOrFail($id);
            $category->update($validator->validated());

            return response()->json([
                "message" => "Category updated successfully",
                "category" => $category
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteCategorie($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json([
                "message" => "Category deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getCategorie()
    {
        try {
            $categories = Category::paginate(10);

            return response()->json([
                "message" => "Categories retrieved successfully",
                "categories" => $categories
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllCategorie()
    {
        try {
            $categories = Category::active()->get();

            return response()->json([
                "message" => "Categories retrieved successfully",
                "categories" => $categories
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
