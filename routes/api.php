<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Application;

Route::get('/resume/{id}', function ($id) {
    try {
        $application = App\Models\Application::findOrFail($id);

        $file = $application->applicant_resume_file;

        // Convert URL to relative path if needed
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $parsedUrl = parse_url($file, PHP_URL_PATH);
            $file = ltrim(str_replace('/storage/', '', $parsedUrl), '/');
        }

        if (!$file || !Storage::disk('public')->exists($file)) {
            return response()->json(['error' => "File not found on server: $file"], 404);
        }

        $filePath = storage_path('app/public/' . $file);
        $mimeType = Storage::disk('public')->mimeType($file);
        $fileName = basename($file);

        $inlineTypes = ['application/pdf', 'image/jpeg', 'image/png'];
        $disposition = in_array($mimeType, $inlineTypes) ? 'inline' : 'attachment';

        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => $disposition . '; filename="' . $fileName . '"',
            'Cache-Control' => 'public, max-age=3600',
            'X-Frame-Options' => 'ALLOWALL',
        ]);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Applicant not found.'], 404);
    } catch (\Exception $e) {
        \Log::error('Resume Error: ' . $e->getMessage());
        return response()->json(['error' => 'Server error.', 'message' => $e->getMessage()], 500);
    }
});