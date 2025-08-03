<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Architect;

class AuthController extends Controller
{
    /**
     * Register a new client
     */
    public function registerClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required', 'string', 'confirmed',
                Password::min(8)->mixedCase()->letters()->numbers()->symbols()
            ],
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'company_name' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:100',
            'industry' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'budget_range' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation error",
                "errors" => $validator->errors()
            ], 422);
        }

        try {
            $photoUrl = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('clients/photos', 'public');
                $photoUrl = asset('storage/' . $photoPath);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'photo' => $photoUrl,
                'role' => 'client',
            ]);

            Client::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'company_size' => $request->company_size,
                'industry' => $request->industry,
                'website' => $request->website,
                'linkedin' => $request->linkedin,
                'budget_range' => $request->budget_range,
            ]);

            return response()->json([
                "message" => "Client registered successfully",
                "user" => $user->load('client')
            ], 201);

        } catch (\Exception $e) {
            if (isset($user)) {
                $user->delete();
            }
            return response()->json([
                "message" => "Registration error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Register a new architect
     */
    public function registerArchitect(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required', 'string', 'confirmed',
                Password::min(8)->mixedCase()->letters()->numbers()->symbols()
            ],
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'license_number' => 'required|string|max:100|unique:architects',
            'years_of_experience' => 'required|integer|min:0',
            'specializations' => 'required|array',
            'education' => 'required|array',
            'hourly_rate' => 'required|numeric|min:0',
            'portfolio_url' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'verification_documents' => 'required|array',
            'verification_documents.*' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation error",
                "errors" => $validator->errors()
            ], 422);
        }

        try {
            $photoUrl = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('architects/photos', 'public');
                $photoUrl = asset('storage/' . $photoPath);
            }

            $verificationDocs = [];
            if ($request->hasFile('verification_documents')) {
                foreach ($request->file('verification_documents') as $file) {
                    $path = $file->store('architects/documents', 'public');
                    $verificationDocs[] = asset('storage/' . $path);
                }
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'photo' => $photoUrl,
                'role' => 'architect',
            ]);

            Architect::create([
                'user_id' => $user->id,
                'license_number' => $request->license_number,
                'years_of_experience' => $request->years_of_experience,
                'specializations' => $request->specializations,
                'education' => $request->education,
                'hourly_rate' => $request->hourly_rate,
                'portfolio_url' => $request->portfolio_url,
                'linkedin' => $request->linkedin,
                'website' => $request->website,
                'verification_documents' => $verificationDocs,
            ]);

            return response()->json([
                "message" => "Architect registered successfully. Your account will be verified by admin.",
                "user" => $user->load('architect')
            ], 201);

        } catch (\Exception $e) {
            if (isset($user)) {
                $user->delete();
            }
            return response()->json([
                "message" => "Registration error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Login user
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        try {
            $user = User::where('email', $validatedData['email'])->first();

            if (!$user || !Hash::check($validatedData['password'], $user->password)) {
                return response()->json([
                    "message" => "Invalid credentials"
                ], 401);
            }

            if (!$user->is_active) {
                return response()->json([
                    "message" => "Account is deactivated"
                ], 403);
            }

            // Check if architect is verified
            if ($user->role === 'architect') {
                $architect = $user->architect;
                if (!$architect || !$architect->is_verified) {
                    return response()->json([
                        "message" => "Your account is pending verification by admin"
                    ], 403);
                }
            }

            $user->tokens()->delete();
            $token = $user->createToken("AuthToken", ["*"], now()->addDays(30))->plainTextToken;

            return response()->json([
                "message" => "Login successful",
                "token" => $token,
                "user" => $user->load(['client', 'architect'])
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => "Login error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            
            return response()->json([
                "message" => "Logged out successfully"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => "Logout error",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check authentication status
     */
    public function authStatus(Request $request)
    {
        try {
            if (Auth::check()) {
                return response()->json([
                    'authenticated' => true,
                    'user' => $request->user()->load(['client', 'architect'])
                ], 200);
            }

            return response()->json([
                'authenticated' => false,
                'message' => 'User is not authenticated'
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Authentication check error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify architect account (Admin only)
     */
    public function verifyArchitect(Request $request, $architectId)
    {
        $validator = Validator::make($request->all(), [
            'is_verified' => 'required|boolean',
            'rejection_reason' => 'nullable|string|required_if:is_verified,false'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $architect = Architect::findOrFail($architectId);
            $architect->is_verified = $request->is_verified;
            $architect->verification_date = now();
            $architect->save();

            $user = $architect->user;
            
            $statusMessage = $request->is_verified 
                ? 'Congratulations! Your architect account has been verified.' 
                : 'Your architect account verification was rejected. Reason: ' . $request->rejection_reason;

            // Send email notification
            Mail::raw("Hello {$user->name},\n\n{$statusMessage}\n\nBest regards,\nArshiPristige Team", function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Architect Account Verification - ArshiPristige');
            });

            return response()->json([
                'message' => 'Architect verification status updated successfully',
                'architect' => $architect->load('user')
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating verification status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all architects (Admin only)
     */
    public function getAllArchitects(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);
            $status = $request->input('status'); // verified, pending, all

            $query = Architect::with('user');

            if ($status === 'verified') {
                $query->where('is_verified', true);
            } elseif ($status === 'pending') {
                $query->where('is_verified', false);
            }

            $architects = $query->orderBy('created_at', 'desc')->paginate($perPage);

            return response()->json([
                'message' => 'Architects retrieved successfully',
                'architects' => $architects
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving architects',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all clients (Admin only)
     */
    public function getAllClients(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);

            $clients = Client::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);

            return response()->json([
                'message' => 'Clients retrieved successfully',
                'clients' => $clients
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving clients',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
