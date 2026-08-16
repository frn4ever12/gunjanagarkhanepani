@extends('admin.layouts.app')

@section('title', 'View Contact Message - Admin')

@section('page-title', 'सन्देश हेर्नुहोस्')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">सन्देश विवरण</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>नाम:</strong></div>
                    <div class="col-md-8">{{ $message->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>फोन:</strong></div>
                    <div class="col-md-8">{{ $message->phone }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>इमेल:</strong></div>
                    <div class="col-md-8">{{ $message->email ?? '-' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>विषय:</strong></div>
                    <div class="col-md-8">{{ $message->subject }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>सन्देश:</strong></div>
                    <div class="col-md-8">{{ $message->message }}</div>
                </div>
                @if($message->attachment)
                <div class="row mb-3">
                    <div class="col-md-4"><strong>संलग्नक:</strong></div>
                    <div class="col-md-8">
                        <a href="{{ asset('storage/' . $message->attachment) }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fas fa-download me-1"></i>Download
                        </a>
                    </div>
                </div>
                @endif
                <div class="row mb-3">
                    <div class="col-md-4"><strong>मिति:</strong></div>
                    <div class="col-md-8">{{ $message->created_at->format('Y-m-d H:i:s') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">कार्यहरू</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contact-messages.reply', $message) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">जवाफ दिनुहोस्</label>
                        <textarea class="form-control" name="admin_reply" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-reply me-2"></i>जवाफ पठाउनुहोस्
                    </button>
                </form>
                
                <hr>
                
                <form method="POST" action="{{ route('admin.contact-messages.resolve', $message) }}">
                    @csrf
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-check me-2"></i>Resolve as Done
                    </button>
                </form>
                
                <hr>
                
                <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary w-100">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
            </div>
        </div>
        
        @if($message->admin_reply)
        <div class="card mt-3">
            <div class="card-header">पठाइएको जवाफ</div>
            <div class="card-body">
                <p>{{ $message->admin_reply }}</p>
                <small class="text-muted">Replied: {{ $message->updated_at->format('Y-m-d H:i:s') }}</small>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
