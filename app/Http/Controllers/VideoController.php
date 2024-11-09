<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;  // Ensure Storage is imported correctly
use Symfony\Component\HttpFoundation\StreamedResponse;

class VideoController extends Controller
{
    // Method to stream the video from FTP
    public function streamVideo($filename)
    {
        // Access the FTP disk
        $ftpDisk = Storage::disk('ftp');  // Correct usage of the Storage facade

        // Check if the file exists on the FTP server
        if ($ftpDisk->exists($filename)) {
            // Create a streamed response to return the video content
            $response = new StreamedResponse(function () use ($ftpDisk, $filename) {
                echo $ftpDisk->get($filename);
            });

            // Set the appropriate headers for streaming
            $response->headers->set('Content-Type', 'video/mp4');
            $response->headers->set('Content-Disposition', 'inline; filename="' . basename($filename) . '"');
            $response->headers->set('Cache-Control', 'no-cache');

            return $response;
        }

        // If file not found, return 404
        return abort(404, "Video not found on the server.");
    }
}
