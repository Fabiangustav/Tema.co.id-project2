<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Berita Enhanced</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%);
            min-height: 100vh;
            padding: 2rem 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin: 0 auto;
            max-width: 800px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .form-header h2 {
            color: #4a5568;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }
        
        .form-header p {
            color: #718096;
            font-size: 1.1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
            outline: none;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            z-index: 5;
        }
        
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        
        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }
        
        .file-input-label {
            display: block;
            padding: 0.75rem 1rem;
            border: 2px dashed #e2e8f0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }
        
        .file-input-label:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }
        
        .file-input-text {
            color: #718096;
            font-size: 0.95rem;
        }
        
        /* Quill Editor Styling */
        .quill-container {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }
        
        .quill-container.focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .ql-toolbar {
            border: none !important;
            border-bottom: 1px solid #e2e8f0 !important;
            background: #f8fafc;
            padding: 1rem;
        }
        
        .ql-container {
            border: none !important;
            font-size: 1rem;
            min-height: 300px;
        }
        
        .ql-editor {
            min-height: 300px;
            padding: 1rem;
        }
        
        .ql-editor.ql-blank::before {
            color: #a0aec0;
            font-style: normal;
        }
        
        /* Summary textarea styling */
        .summary-textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: center;
        }
        
        .btn {
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }
        
        .btn-secondary {
            background: #f7fafc;
            color: #4a5568;
            border: 2px solid #e2e8f0;
        }
        
        .btn-secondary:hover {
            background: #edf2f7;
            transform: translateY(-1px);
        }
        
        .slug-generate {
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }
        
        .slug-generate:hover {
            background: #5a6fd8;
        }
        
        .form-note {
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.2);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #4a5568;
            font-size: 0.9rem;
        }
        
        .form-note i {
            color: #667eea;
        }
        
        .char-count {
            font-size: 0.8rem;
            color: #718096;
            text-align: right;
            margin-top: 0.25rem;
        }
        
        @media (max-width: 768px) {
            .form-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .ql-toolbar {
                padding: 0.5rem;
            }
            
            .ql-editor {
                min-height: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-newspaper"></i> Tambah Berita Baru</h2>
                <p>Lengkapi data berita yang akan ditambahkan</p>
            </div>
            
            <div class="form-note">
                <i class="fas fa-info-circle"></i>
                <strong>Catatan:</strong> Field ID dan timestamps (created_at, updated_at) akan diisi otomatis oleh sistem.
            </div>
            
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" id="news-form">
                @csrf
                
                <!-- Judul -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-heading"></i>
                        Judul Berita <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title') }}" 
                               placeholder="Masukkan judul berita..."
                               required>
                        <i class="fas fa-pen input-icon"></i>
                    </div>
                    <div class="char-count">
                        <span id="title-count">0</span>/100 karakter
                    </div>
                    @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Slug -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-link"></i>
                        Slug URL <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="text" 
                               name="slug" 
                               id="slug" 
                               class="form-control @error('slug') is-invalid @enderror" 
                               value="{{ old('slug') }}" 
                               placeholder="url-friendly-slug"
                               required>
                        <i class="fas fa-external-link-alt input-icon"></i>
                    </div>
                    <button type="button" class="slug-generate" onclick="generateSlug()">
                        <i class="fas fa-magic"></i> Generate dari Judul
                    </button>
                    <small class="text-muted d-block mt-1">Slug akan digunakan sebagai URL berita</small>
                    @error('slug')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Content -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-align-left"></i>
                        Konten Berita <span class="text-danger">*</span>
                    </label>
                    <div class="quill-container" id="quill-container">
                        <div id="content-editor" style="height: 300px;">{{ old('content') }}</div>
                    </div>
                    <input type="hidden" name="content" id="content" required>
                    <div class="char-count">
                        <span id="content-count">0</span> karakter
                    </div>
                    @error('content')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Status -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-toggle-on"></i>
                        Status Publikasi <span class="text-danger">*</span>
                    </label>
                    <select name="status" 
                            class="form-select @error('status') is-invalid @enderror" 
                            required>
                        <option value="">Pilih Status...</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                            📝 Draft (Belum Dipublikasikan)
                        </option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                            🌐 Published (Dipublikasikan)
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Gambar -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-image"></i>
                        Gambar Utama
                    </label>
                    <div class="file-input-wrapper">
                        <input type="file" 
                               name="image" 
                               id="image" 
                               accept="image/jpeg,image/png,image/jpg,image/gif"
                               class="@error('image') is-invalid @enderror">
                        <label for="image" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt fa-2x" style="color: #667eea; margin-bottom: 0.5rem;"></i>
                            <div class="file-input-text">
                                <strong>Klik untuk upload gambar</strong><br>
                                <small>atau drag & drop file di sini</small><br>
                                <small class="text-muted">Format: JPG, PNG, GIF (Maks: 2MB)</small>
                            </div>
                        </label>
                    </div>
                    <div id="image-preview" style="margin-top: 1rem; display: none;">
                        <img id="preview-img" style="max-width: 200px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    </div>
                    @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Berita
                    </button>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>
    <script>
        // Initialize Quill editor
        const quill = new Quill('#content-editor', {
            theme: 'snow',
            placeholder: 'Tulis konten berita di sini...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'align': [] }],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        
        // Character counters
        function updateCharCount(inputId, countId, maxLength = null) {
            const input = document.getElementById(inputId);
            const counter = document.getElementById(countId);
            
            function updateCount() {
                const length = input.value.length;
                counter.textContent = length;
                
                if (maxLength && length > maxLength * 0.9) {
                    counter.parentElement.style.color = '#e53e3e';
                } else {
                    counter.parentElement.style.color = '#718096';
                }
            }
            
            input.addEventListener('input', updateCount);
            updateCount(); // Initial count
        }
        
        // Initialize character counters
        updateCharCount('title', 'title-count', 100);
        
        // Content editor character counter
        quill.on('text-change', function() {
            const length = quill.getLength() - 1; // Subtract 1 for trailing newline
            document.getElementById('content-count').textContent = length;
        });
        
        // Focus effects for Quill editor
        quill.on('selection-change', function(range) {
            const container = document.getElementById('quill-container');
            if (range) {
                container.classList.add('focus');
            } else {
                container.classList.remove('focus');
            }
        });
        
        // Auto-generate slug from title
        function generateSlug() {
            const title = document.getElementById('title').value;
            const slug = title
                .toLowerCase()
                .replace(/[^a-z0-9\s]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        }
        
        // Auto-generate slug when typing title (only if slug is empty)
        document.getElementById('title').addEventListener('input', function() {
            if (!document.getElementById('slug').value) {
                generateSlug();
            }
        });
        
        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            const label = document.querySelector('.file-input-label .file-input-text');
            
            if (file) {
                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    this.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
                
                label.innerHTML = `
                    <strong>File terpilih: ${file.name}</strong><br>
                    <small>Ukuran: ${(file.size / 1024 / 1024).toFixed(2)} MB</small><br>
                    <small>Klik untuk ganti gambar</small>
                `;
            } else {
                preview.style.display = 'none';
                label.innerHTML = `
                    <strong>Klik untuk upload gambar</strong><br>
                    <small>atau drag & drop file di sini</small><br>
                    <small class="text-muted">Format: JPG, PNG, GIF (Maks: 2MB)</small>
                `;
            }
        });
        
        // Drag and drop functionality
        const fileLabel = document.querySelector('.file-input-label');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileLabel.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            fileLabel.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            fileLabel.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight(e) {
            fileLabel.style.borderColor = '#667eea';
            fileLabel.style.background = 'rgba(102, 126, 234, 0.1)';
        }
        
        function unhighlight(e) {
            fileLabel.style.borderColor = '#e2e8f0';
            fileLabel.style.background = 'rgba(255, 255, 255, 0.8)';
        }
        
        fileLabel.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0 && files[0].type.startsWith('image/')) {
                document.getElementById('image').files = files;
                const event = new Event('change', { bubbles: true });
                document.getElementById('image').dispatchEvent(event);
            }
        }
        
        // Form submission handling
        document.getElementById('news-form').addEventListener('submit', function(e) {
            // Get content from Quill editor and put it in hidden input
            const content = quill.root.innerHTML;
            document.getElementById('content').value = content;
            
            // Validate content is not empty
            if (quill.getText().trim().length === 0) {
                e.preventDefault();
                alert('Konten berita tidak boleh kosong!');
                return false;
            }
            
            const submitBtn = document.querySelector('.btn-primary');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
        });
        
        // Validate slug format
        document.getElementById('slug').addEventListener('input', function() {
            const slug = this.value;
            const validSlug = slug.replace(/[^a-z0-9-]/g, '');
            if (slug !== validSlug) {
                this.value = validSlug;
            }
        });
        
        // Initialize content from old value if exists
        document.addEventListener('DOMContentLoaded', function() {
            const oldContent = document.getElementById('content').value;
            if (oldContent) {
                quill.root.innerHTML = oldContent;
            }
        });
    </script>
</body>
</html>