@extends('admin.layouts.app')

@section('title', 'Upload Gallery Images - Admin')

@section('page-title', 'चित्रहरू अपलोड गर्नुहोस्: {{ $album->name }}')

@section('content')
<div class="card">
    <div class="card-header">चित्रहरू अपलोड गर्नुहोस्</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.gallery.store-images', $album) }}" enctype="multipart/form-data">
            @csrf
            
            <div id="image-upload-container">
                <div class="mb-3 image-upload-item">
                    <label class="form-label">चित्र *</label>
                    <input type="file" class="form-control" name="images[]" required>
                    <small class="text-muted">JPEG, JPG, PNG, GIF, WEBP (Max: 5MB)</small>
                </div>
            </div>
            
            <button type="button" class="btn btn-secondary mb-3" onclick="addImageField()">
                <i class="fas fa-plus me-2"></i>थप चित्र
            </button>
            
            <div class="mb-3">
                <label class="form-label">शीर्षकहरू (comma-separated)</label>
                <input type="text" class="form-control" name="titles[]" placeholder="Image 1 Title, Image 2 Title, ...">
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरणहरू (comma-separated)</label>
                <textarea class="form-control" name="descriptions[]" rows="2" placeholder="Image 1 Description, Image 2 Description, ..."></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-upload me-2"></i>अपलोड गर्नुहोस्
            </button>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>

<script>
function addImageField() {
    const container = document.getElementById('image-upload-container');
    const newItem = document.createElement('div');
    newItem.className = 'mb-3 image-upload-item';
    newItem.innerHTML = `
        <label class="form-label">चित्र</label>
        <input type="file" class="form-control" name="images[]">
        <small class="text-muted">JPEG, JPG, PNG, GIF, WEBP (Max: 5MB)</small>
    `;
    container.appendChild(newItem);
}
</script>
@endsection
