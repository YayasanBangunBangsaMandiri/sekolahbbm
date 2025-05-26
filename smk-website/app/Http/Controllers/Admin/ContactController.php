<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of contact submissions.
     */
    public function index()
    {
        $contacts = ContactSubmission::latest()
            ->when(request('status'), function ($query, $status) {
                return $query->where('status', $status);
            })
            ->paginate(20);
            
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified contact submission.
     */
    public function show($id)
    {
        $contact = ContactSubmission::findOrFail($id);
        
        // If the contact was unread, mark it as read
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Update the status of the specified contact submission.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:unread,read,replied,archived',
        ]);
        
        $contact = ContactSubmission::findOrFail($id);
        $contact->update(['status' => $request->status]);
        
        return back()->with('success', 'Contact status updated successfully.');
    }

    /**
     * Remove the specified contact submission.
     */
    public function destroy($id)
    {
        $contact = ContactSubmission::findOrFail($id);
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
    
    /**
     * Export contact submissions to CSV.
     */
    public function export()
    {
        $contacts = ContactSubmission::latest()->get();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ];
        
        $callback = function() use ($contacts) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, [
                'ID',
                'Name',
                'Email',
                'Phone',
                'Subject',
                'Message',
                'Status',
                'Created At',
            ]);
            
            // Add data rows
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->subject,
                    $contact->message,
                    $contact->status,
                    $contact->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            
            fclose($file);
        };
        
        return Response::stream($callback, 200, $headers);
    }
} 