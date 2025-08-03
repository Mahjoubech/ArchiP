<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Category;

class ProjectController extends Controller
{
    /**
     * Create a new project (Client only)
     */
    public function createProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'budget_min' => 'required|numeric|min:0',
            'budget_max' => 'required|numeric|min:0|gte:budget_min',
            'deadline' => 'required|date|after:today',
            'location' => 'required|string|max:255',
            'project_type' => 'required|in:residential,commercial,industrial,landscape,interior,other',
            'requirements' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'tags' => 'nullable|array',
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
                    'message' => 'Only clients can create projects'
                ], 403);
            }

            $attachments = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('projects/attachments', 'public');
                    $attachments[] = asset('storage/' . $path);
                }
            }

            $project = Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'client_id' => $user->client->id,
                'category_id' => $request->category_id,
                'budget_min' => $request->budget_min,
                'budget_max' => $request->budget_max,
                'deadline' => $request->deadline,
                'location' => $request->location,
                'project_type' => $request->project_type,
                'requirements' => $request->requirements,
                'attachments' => $attachments,
                'tags' => $request->tags,
            ]);

            return response()->json([
                'message' => 'Project created successfully',
                'project' => $project->load(['category', 'client.user'])
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating project',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all projects (Public)
     */
    public function getAllProjects(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);
            $status = $request->input('status', 'open');
            $category = $request->input('category_id');
            $projectType = $request->input('project_type');
            $location = $request->input('location');

            $query = Project::with(['category', 'client.user'])
                ->where('status', $status);

            if ($category) {
                $query->where('category_id', $category);
            }

            if ($projectType) {
                $query->where('project_type', $projectType);
            }

            if ($location) {
                $query->where('location', 'like', "%{$location}%");
            }

            $projects = $query->orderBy('created_at', 'desc')->paginate($perPage);

            return response()->json([
                'message' => 'Projects retrieved successfully',
                'projects' => $projects
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving projects',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get project by ID (Public)
     */
    public function getProjectById($id)
    {
        try {
            $project = Project::with(['category', 'client.user', 'proposals.architect.user'])
                ->findOrFail($id);

            // Increment view count
            $project->increment('views_count');

            return response()->json([
                'message' => 'Project retrieved successfully',
                'project' => $project
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving project',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get client's projects (Client only)
     */
    public function getClientProjects(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user->isClient()) {
                return response()->json([
                    'message' => 'Access denied'
                ], 403);
            }

            $perPage = $request->input('per_page', 10);
            $status = $request->input('status');

            $query = Project::with(['category', 'proposals.architect.user'])
                ->where('client_id', $user->client->id);

            if ($status) {
                $query->where('status', $status);
            }

            $projects = $query->orderBy('created_at', 'desc')->paginate($perPage);

            return response()->json([
                'message' => 'Client projects retrieved successfully',
                'projects' => $projects
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving client projects',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update project (Client only)
     */
    public function updateProject(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'category_id' => 'sometimes|required|exists:categories,id',
            'budget_min' => 'sometimes|required|numeric|min:0',
            'budget_max' => 'sometimes|required|numeric|min:0|gte:budget_min',
            'deadline' => 'sometimes|required|date|after:today',
            'location' => 'sometimes|required|string|max:255',
            'project_type' => 'sometimes|required|in:residential,commercial,industrial,landscape,interior,other',
            'requirements' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'tags' => 'nullable|array',
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
                    'message' => 'Only clients can update projects'
                ], 403);
            }

            $project = Project::where('id', $id)
                ->where('client_id', $user->client->id)
                ->first();

            if (!$project) {
                return response()->json([
                    'message' => 'Project not found or access denied'
                ], 404);
            }

            if ($project->status !== 'open') {
                return response()->json([
                    'message' => 'Cannot update project that is not open'
                ], 400);
            }

            $attachments = $project->attachments;
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('projects/attachments', 'public');
                    $attachments[] = asset('storage/' . $path);
                }
            }

            $project->update(array_merge($request->except('attachments'), [
                'attachments' => $attachments
            ]));

            return response()->json([
                'message' => 'Project updated successfully',
                'project' => $project->load(['category', 'client.user'])
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating project',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete project (Client only)
     */
    public function deleteProject($id)
    {
        try {
            $user = Auth::user();
            if (!$user->isClient()) {
                return response()->json([
                    'message' => 'Only clients can delete projects'
                ], 403);
            }

            $project = Project::where('id', $id)
                ->where('client_id', $user->client->id)
                ->first();

            if (!$project) {
                return response()->json([
                    'message' => 'Project not found or access denied'
                ], 404);
            }

            if ($project->status !== 'open') {
                return response()->json([
                    'message' => 'Cannot delete project that is not open'
                ], 400);
            }

            $project->delete();

            return response()->json([
                'message' => 'Project deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting project',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Submit proposal (Architect only)
     */
    public function submitProposal(Request $request, $projectId)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'proposed_budget' => 'required|numeric|min:0',
            'estimated_duration' => 'required|integer|min:1',
            'delivery_date' => 'required|date|after:today',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
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
                    'message' => 'Only architects can submit proposals'
                ], 403);
            }

            $project = Project::findOrFail($projectId);
            if ($project->status !== 'open') {
                return response()->json([
                    'message' => 'Project is not open for proposals'
                ], 400);
            }

            // Check if architect already submitted a proposal
            $existingProposal = Proposal::where('project_id', $projectId)
                ->where('architect_id', $user->architect->id)
                ->first();

            if ($existingProposal) {
                return response()->json([
                    'message' => 'You have already submitted a proposal for this project'
                ], 400);
            }

            $attachments = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('proposals/attachments', 'public');
                    $attachments[] = asset('storage/' . $path);
                }
            }

            $proposal = Proposal::create([
                'project_id' => $projectId,
                'architect_id' => $user->architect->id,
                'title' => $request->title,
                'description' => $request->description,
                'proposed_budget' => $request->proposed_budget,
                'estimated_duration' => $request->estimated_duration,
                'delivery_date' => $request->delivery_date,
                'attachments' => $attachments,
            ]);

            // Increment project proposals count
            $project->increment('proposals_count');

            return response()->json([
                'message' => 'Proposal submitted successfully',
                'proposal' => $proposal->load(['architect.user'])
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error submitting proposal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get architect's proposals (Architect only)
     */
    public function getArchitectProposals(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user->isArchitect()) {
                return response()->json([
                    'message' => 'Access denied'
                ], 403);
            }

            $perPage = $request->input('per_page', 10);
            $status = $request->input('status');

            $query = Proposal::with(['project.category', 'project.client.user'])
                ->where('architect_id', $user->architect->id);

            if ($status) {
                $query->where('status', $status);
            }

            $proposals = $query->orderBy('created_at', 'desc')->paginate($perPage);

            return response()->json([
                'message' => 'Architect proposals retrieved successfully',
                'proposals' => $proposals
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving proposals',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Accept/Reject proposal (Client only)
     */
    public function updateProposalStatus(Request $request, $proposalId)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:accepted,rejected',
            'rejection_reason' => 'nullable|string|required_if:status,rejected',
            'client_notes' => 'nullable|string',
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
                    'message' => 'Only clients can update proposal status'
                ], 403);
            }

            $proposal = Proposal::with(['project', 'architect.user'])
                ->whereHas('project', function ($query) use ($user) {
                    $query->where('client_id', $user->client->id);
                })
                ->findOrFail($proposalId);

            if ($proposal->status !== 'pending') {
                return response()->json([
                    'message' => 'Proposal status cannot be changed'
                ], 400);
            }

            $proposal->update([
                'status' => $request->status,
                'is_accepted' => $request->status === 'accepted',
                'accepted_at' => $request->status === 'accepted' ? now() : null,
                'rejection_reason' => $request->rejection_reason,
                'client_notes' => $request->client_notes,
            ]);

            if ($request->status === 'accepted') {
                // Update project status and assign architect
                $proposal->project->update([
                    'status' => 'in_progress',
                    'architect_id' => $proposal->architect_id,
                ]);

                // Reject all other proposals for this project
                Proposal::where('project_id', $proposal->project_id)
                    ->where('id', '!=', $proposalId)
                    ->update([
                        'status' => 'rejected',
                        'rejection_reason' => 'Another proposal was accepted'
                    ]);
            }

            return response()->json([
                'message' => 'Proposal status updated successfully',
                'proposal' => $proposal->load(['project', 'architect.user'])
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating proposal status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get featured projects (Public)
     */
    public function getFeaturedProjects()
    {
        try {
            $projects = Project::with(['category', 'client.user'])
                ->where('is_featured', true)
                ->where('status', 'open')
                ->orderBy('created_at', 'desc')
                ->limit(6)
                ->get();

            return response()->json([
                'message' => 'Featured projects retrieved successfully',
                'projects' => $projects
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving featured projects',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search projects (Public)
     */
    public function searchProjects(Request $request)
    {
        try {
            $query = $request->input('q');
            $category = $request->input('category_id');
            $projectType = $request->input('project_type');
            $location = $request->input('location');
            $budgetMin = $request->input('budget_min');
            $budgetMax = $request->input('budget_max');

            $projectsQuery = Project::with(['category', 'client.user'])
                ->where('status', 'open');

            if ($query) {
                $projectsQuery->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%")
                      ->orWhere('location', 'like', "%{$query}%");
                });
            }

            if ($category) {
                $projectsQuery->where('category_id', $category);
            }

            if ($projectType) {
                $projectsQuery->where('project_type', $projectType);
            }

            if ($location) {
                $projectsQuery->where('location', 'like', "%{$location}%");
            }

            if ($budgetMin) {
                $projectsQuery->where('budget_max', '>=', $budgetMin);
            }

            if ($budgetMax) {
                $projectsQuery->where('budget_min', '<=', $budgetMax);
            }

            $projects = $projectsQuery->orderBy('created_at', 'desc')->paginate(10);

            return response()->json([
                'message' => 'Search results retrieved successfully',
                'projects' => $projects
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error searching projects',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 