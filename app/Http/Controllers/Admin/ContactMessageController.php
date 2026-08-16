<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(15);
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        $message->markAsRead();
        return view('admin.contact-messages.show', compact('message'));
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $validated = $request->validate([
            'admin_reply' => 'required|string',
        ]);

        $message->update([
            'admin_reply' => $validated['admin_reply'],
            'status' => 'processing',
            'replied_by' => auth()->id(),
        ]);

        return redirect()->route('admin.contact-messages.show', $message)->with('success', 'Reply sent successfully.');
    }

    public function markResolved(ContactMessage $message)
    {
        $message->markAsResolved(auth()->id());
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message marked as resolved.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}
