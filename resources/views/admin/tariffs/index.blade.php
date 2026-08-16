@extends('admin.layouts.app')

@section('title', 'Tariffs - Admin')

@section('page-title', 'महसुल / दररेट')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>महसुल / दररेट</span>
        <a href="{{ route('admin.tariffs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ दर
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>श्रेणी</th>
                        <th>शीर्षक</th>
                        <th>एकाइ</th>
                        <th>मूल्य</th>
                        <th>प्रभावकारी मिति</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tariffs as $tariff)
                    <tr>
                        <td>{{ $tariff->category }}</td>
                        <td>{{ $tariff->title }}</td>
                        <td>{{ $tariff->unit ?? '-' }}</td>
                        <td>Rs. {{ number_format($tariff->price, 2) }}</td>
                        <td>{{ $tariff->effective_date->format('Y-m-d') }}</td>
                        <td>
                            @if($tariff->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.tariffs.edit', $tariff) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.tariffs.destroy', $tariff) }}" method="POST" class="d-inline">
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
        {{ $tariffs->links() }}
    </div>
</div>
@endsection
