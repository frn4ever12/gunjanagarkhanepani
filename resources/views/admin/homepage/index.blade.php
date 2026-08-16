@extends('admin.layouts.app')

@section('title', 'Homepage Management - Admin')

@section('page-title', 'गृहपृष्ठ व्यवस्थापन')

@section('content')
<div class="card">
    <div class="card-header">गृहपृष्ठ खण्डहरू</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.homepage.update') }}">
            @csrf
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>खण्ड</th>
                            <th>सक्षम</th>
                            <th>क्रम</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                        <tr>
                            <td>{{ $section->title }}</td>
                            <td>
                                <input type="checkbox" name="section_{{ $section->id }}" value="1" {{ $section->is_enabled ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="number" name="order_{{ $section->id }}" value="{{ $section->order }}" class="form-control form-control-sm" style="width: 80px;">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
        </form>
    </div>
</div>
@endsection
