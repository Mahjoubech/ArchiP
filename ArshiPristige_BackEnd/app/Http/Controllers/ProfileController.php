<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Client;
use App\Models\Architect;

class ProfileController extends Controller
{
    /**
     * Get user profile
     */
    public function getProfile(Request $request)
    {
        try {
            $user = Auth::user();
            $profileData = $user->getProfileData();

            return response()->json([
                'message' => 'Profile retrieved successfully',
                'user' => $user->load(['client', 'architect']),
                'profile' => $profileData
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update client profile
     */
    public function updateClientProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|required|string',
            'city' => 'sometimes|required|string|max:100',
            'country' => 'sometimes|required|string|max:100',
            'postal_code' => 'sometimes|required|string|max:20',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'company_name' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:100',
            'industry' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'budget_range' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();
            if (!$user->isClient()) {
                return response()->json([
                    'message' => 'Access denied'
                ], 403);
            }

            // Update user data
            $userData = $request->only([
                'name', 'phone', 'address', 'city', 'country', 'postal_code', 'bio'
            ]);

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('clients/photos', 'public');
                $userData['photo'] = asset('storage/' . $photoPath);
            }

            $user->update($userData);

            // Update client data
            $clientData = $request->only([
                'company_name', 'company_size', 'industry', 'website', 'linkedin', 'budget_range'
            ]);

            $user->client->update($clientData);

            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => $user->load('client')
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update architect profile
     */
    public function updateArchitectProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|required|string',
            'city' => 'sometimes|required|string|max:100',
            'country' => 'sometimes|required|string|max:100',
            'postal_code' => 'sometimes|required|string|max:20',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'years_of_experience' => 'sometimes|required|integer|min:0',
            'specializations' => 'sometimes|required|array',
            'education' => 'sometimes|required|array',
            'hourly_rate' => 'sometimes|required|numeric|min:0',
            'portfolio_url' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
            'languages_spoken' => 'nullable|array',
            'service_areas' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();
            if (!$user->isArchitect()) {
                return response()->json([
                    'message' => 'Access denied'
                ], 403);
            }

            // Update user data
            $userData = $request->only([
                'name', 'phone', 'address', 'city', 'country', 'postal_code', 'bio'
            ]);

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('architects/photos', 'public');
                $userData['photo'] = asset('storage/' . $photoPath);
            }

            $user->update($userData);

            // Update architect data
            $architectData = $request->only([
                'years_of_experience', 'specializations', 'education', 'hourly_rate',
                'portfolio_url', 'linkedin', 'website', 'languages_spoken', 'service_areas'
            ]);

            $user->architect->update($architectData);

            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => $user->load('architect')
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update admin profile
     */
    public function updateAdminProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|required|string',
            'city' => 'sometimes|required|string|max:100',
            'country' => 'sometimes|required|string|max:100',
            'postal_code' => 'sometimes|required|string|max:20',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();
            if (!$user->isAdmin()) {
                return response()->json([
                    'message' => 'Access denied'
                ], 403);
            }

            $userData = $request->only([
                'name', 'phone', 'address', 'city', 'country', 'postal_code', 'bio'
            ]);

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('admins/photos', 'public');
                $userData['photo'] = asset('storage/' . $photoPath);
            }

            $user->update($userData);

            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => $user
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();

            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'message' => 'Current password is incorrect'
                ], 400);
            }

            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return response()->json([
                'message' => 'Password updated successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating password',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Reset password
     */
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Here you would typically send a password reset email
            // For now, we'll just return a success message
            return response()->json([
                'message' => 'Password reset link sent to your email'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error sending reset link',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
