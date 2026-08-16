@extends('admin.layouts.app')

@section('title', 'FAQs - Admin')

@section('page-title', 'बारम्बार सोधिने प्रश्नहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>बारम्बार सोधिने प्रश्नहरू</span>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ FAQ
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>प्रश्न</th>
                        <th>श्रेणी</th>
                        <th>क्रम</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                    <tr>
                        <td>{{ Str::limit($faq->question, 80) }}</td>
                        <td>{{ $faq->category ?? '-' }}</td>
                        <td>{{ $faq->order }}</td>
                        <td>
                            @if($faq->is_published)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="d-inline">
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
        {{ $faqs->links() }}
    </div>
</div>
@endsection
