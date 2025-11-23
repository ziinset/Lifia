<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class NotesController extends Controller
{
    /**
     * Get all notes for the authenticated user
     */
    public function index(): JsonResponse
    {
        try {
            $notes = Note::byUser(Auth::id())
                        ->orderByPriority()
                        ->get()
                        ->map(function ($note) {
                            return [
                                'id' => $note->id,
                                'title' => $note->title,
                                'content' => $note->content,
                                'content_preview' => $note->content_preview,
                                'color' => $note->color,
                                'is_pinned' => $note->is_pinned,
                                'time_ago' => $note->time_ago,
                                'formatted_updated_at' => $note->formatted_updated_at
                            ];
                        });

            return response()->json([
                'success' => true,
                'notes' => $notes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch notes'
            ], 500);
        }
    }

    /**
     * Store a new note
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
                'is_pinned' => 'nullable|boolean'
            ]);

            $validated['user_id'] = Auth::id();
            $validated['color'] = $validated['color'] ?? '#FFE066';
            $validated['is_pinned'] = $validated['is_pinned'] ?? false;

            $note = Note::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Note created successfully',
                'note' => [
                    'id' => $note->id,
                    'title' => $note->title,
                    'content' => $note->content,
                    'content_preview' => $note->content_preview,
                    'color' => $note->color,
                    'is_pinned' => $note->is_pinned,
                    'time_ago' => $note->time_ago,
                    'formatted_updated_at' => $note->formatted_updated_at
                ]
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create note'
            ], 500);
        }
    }

    /**
     * Update an existing note
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $note = Note::byUser(Auth::id())->findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
                'is_pinned' => 'nullable|boolean'
            ]);

            $note->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Note updated successfully',
                'note' => [
                    'id' => $note->id,
                    'title' => $note->title,
                    'content' => $note->content,
                    'content_preview' => $note->content_preview,
                    'color' => $note->color,
                    'is_pinned' => $note->is_pinned,
                    'time_ago' => $note->time_ago,
                    'formatted_updated_at' => $note->formatted_updated_at
                ]
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update note'
            ], 500);
        }
    }

    /**
     * Delete a note
     */
    public function destroy($id): JsonResponse
    {
        try {
            $note = Note::byUser(Auth::id())->findOrFail($id);
            $note->delete();

            return response()->json([
                'success' => true,
                'message' => 'Note deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete note'
            ], 500);
        }
    }

    /**
     * Toggle pin status of a note
     */
    public function togglePin($id): JsonResponse
    {
        try {
            $note = Note::byUser(Auth::id())->findOrFail($id);
            $note->is_pinned = !$note->is_pinned;
            $note->save();

            return response()->json([
                'success' => true,
                'message' => $note->is_pinned ? 'Note pinned successfully' : 'Note unpinned successfully',
                'is_pinned' => $note->is_pinned
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to toggle pin status'
            ], 500);
        }
    }

    /**
     * Get a specific note
     */
    public function show($id): JsonResponse
    {
        try {
            $note = Note::byUser(Auth::id())->findOrFail($id);

            return response()->json([
                'success' => true,
                'note' => [
                    'id' => $note->id,
                    'title' => $note->title,
                    'content' => $note->content,
                    'color' => $note->color,
                    'is_pinned' => $note->is_pinned,
                    'time_ago' => $note->time_ago,
                    'formatted_updated_at' => $note->formatted_updated_at
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Note not found'
            ], 404);
        }
    }
}
