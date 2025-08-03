<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatistiqueController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register/client', [AuthController::class, 'registerClient']);
Route::post('/register/architect', [AuthController::class, 'registerArchitect']);

// Public project routes
Route::get('/projects', [ProjectController::class, 'getAllProjects']);
Route::get('/projects/featured', [ProjectController::class, 'getFeaturedProjects']);
Route::get('/projects/search', [ProjectController::class, 'searchProjects']);
Route::get('/projects/{id}', [ProjectController::class, 'getProjectById']);

// Public category routes
Route::get('/categories', [CategorieController::class, 'getAllCategorie']);

// Contact route
Route::post('/contact', [ContactController::class, 'sendMessage']);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {
    // Common authenticated routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/auth-status', [AuthController::class, 'authStatus']);
    Route::put('/profile/password', [ProfileController::class, 'updatePassword']);
    Route::post('/profile/reset-password', [ProfileController::class, 'reset']);
});

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'role:client'])->group(function () {
    // Project management
    Route::post('/projects', [ProjectController::class, 'createProject']);
    Route::get('/client/projects', [ProjectController::class, 'getClientProjects']);
    Route::put('/projects/{id}', [ProjectController::class, 'updateProject']);
    Route::delete('/projects/{id}', [ProjectController::class, 'deleteProject']);
    
    // Proposal management
    Route::put('/proposals/{id}/status', [ProjectController::class, 'updateProposalStatus']);
    
    // Profile management
    Route::get('/client/profile', [ProfileController::class, 'getProfile']);
    Route::put('/client/profile', [ProfileController::class, 'updateClientProfile']);
});

/*
|--------------------------------------------------------------------------
| Architect Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'role:architect'])->group(function () {
    // Proposal management
    Route::post('/projects/{id}/proposals', [ProjectController::class, 'submitProposal']);
    Route::get('/architect/proposals', [ProjectController::class, 'getArchitectProposals']);
    
    // Profile management
    Route::get('/architect/profile', [ProfileController::class, 'getProfile']);
    Route::put('/architect/profile', [ProfileController::class, 'updateArchitectProfile']);
    
    // Portfolio management
    Route::get('/architect/portfolio', [ProfileController::class, 'getPortfolio']);
    Route::post('/architect/portfolio', [ProfileController::class, 'addPortfolioItem']);
    Route::put('/architect/portfolio/{id}', [ProfileController::class, 'updatePortfolioItem']);
    Route::delete('/architect/portfolio/{id}', [ProfileController::class, 'deletePortfolioItem']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // User management
    Route::get('/admin/architects', [AuthController::class, 'getAllArchitects']);
    Route::get('/admin/clients', [AuthController::class, 'getAllClients']);
    Route::put('/admin/architects/{id}/verify', [AuthController::class, 'verifyArchitect']);
    
    // Category management
    Route::post('/admin/categories', [CategorieController::class, 'addCategorie']);
    Route::put('/admin/categories/{id}', [CategorieController::class, 'updateCategorie']);
    Route::delete('/admin/categories/{id}', [CategorieController::class, 'deleteCategorie']);
    Route::get('/admin/categories', [CategorieController::class, 'getCategorie']);
    
    // Project management
    Route::get('/admin/projects', [ProjectController::class, 'getAllProjects']);
    Route::put('/admin/projects/{id}/feature', [ProjectController::class, 'toggleFeatured']);
    Route::delete('/admin/projects/{id}', [ProjectController::class, 'deleteProject']);
    
    // Statistics
    Route::get('/admin/statistics', [StatistiqueController::class, 'getAdminStatistics']);
    
    // Contact management
    Route::get('/admin/contacts', [ContactController::class, 'getAllMessages']);
    Route::delete('/admin/contacts', [ContactController::class, 'deleteAllMessages']);
    
    // Profile management
    Route::get('/admin/profile', [ProfileController::class, 'getProfile']);
    Route::put('/admin/profile', [ProfileController::class, 'updateAdminProfile']);
});
