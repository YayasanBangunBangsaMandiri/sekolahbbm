<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    /**
     * Upload a new media file.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048', // 2MB max size
            'type' => 'required|in:image,video,document',
            'mediable_id' => 'required|integer',
            'mediable_type' => 'required|string',
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
        ]);
        
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getMimeType();
        $size = $file->getSize();
        
        // Generate a unique filename
        $filename = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
        $path = $request->type . '/' . date('Y/m');
        
        // Store the original file
        $filePath = $file->storeAs($path, $filename, 'public');
        
        // If it's an image, create a thumbnail
        if ($request->type === 'image') {
            $thumbnailPath = $path . '/' . pathinfo($filename, PATHINFO_FILENAME) . '_thumbnail.' . $extension;
            $thumbnail = Image::make($file)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            
            Storage::disk('public')->put($thumbnailPath, (string) $thumbnail->encode());
        }
        
        // Create media record
        $media = Media::create([
            'filename' => $filename,
            'path' => $filePath,
            'type' => $request->type,
            'size' => $size,
            'mime_type' => $mimeType,
            'title' => $request->title ?? pathinfo($originalName, PATHINFO_FILENAME),
            'caption' => $request->caption,
            'alt_text' => $request->alt_text,
            'mediable_id' => $request->mediable_id,
            'mediable_type' => $request->mediable_type,
            'order' => $request->order ?? 0,
        ]);
        
        return response()->json([
            'success' => true,
            'media' => $media,
            'url' => $media->url,
            'thumbnail' => $request->type === 'image' ? $media->thumbnail_url : null,
        ]);
    }

    /**
     * Remove the specified media.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        
        // Delete the file from storage
        Storage::disk('public')->delete($media->path);
        
        // If it's an image, also delete the thumbnail
        if ($media->type === 'image') {
            $pathInfo = pathinfo($media->path);
            $thumbnailPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_thumbnail.' . $pathInfo['extension'];
            Storage::disk('public')->delete($thumbnailPath);
        }
        
        // Delete the record
        $media->delete();
        
        return response()->json(['success' => true]);
    }
} 