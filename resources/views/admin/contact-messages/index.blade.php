@extends('admin.layouts.app')

@section('title', 'Contact Messages - Admin')

@section('page-title', 'सम्पर्क सन्देशहरू')

@section('content')
<div class="card">
    <div class="card-header">सम्पर्क सन्देशहरू</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>नाम</th>
                        <th>फोन</th>
                        <th>विषय</th>
                        <th>मिति</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr class="{{ $message->is_read ? '' : 'table-warning' }}">
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ Str::limit($message->subject, 40) }}</td>
                        <td>{{ $message->created_at->format('Y-m-d') }}</td>
                        <td>
                            @if($message->status === 'resolved')
                            <span class="badge bg-success">Resolved</span>
                            @elseif($message->status === 'processing')
                            <span class="badge bg-info">Processing</span>
                            @else
                            <span class="badge bg-warning">New</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $messages->links() }}
    </div>
</div>
@endsection
