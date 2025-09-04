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
        background: linear-gradient(135deg, #f0f4ff 0%, #ffffff 100%);
        min-height: 100vh;
        padding: 2rem 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        margin: 0 auto;
        max-width: 850px;
        border: 1px solid #e5eaf5;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-header h2 {
        color: #2563eb; /* biru primary */
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 2rem;
    }

    .form-header p {
        color: #64748b;
        font-size: 1.05rem;
    }

    .form-label {
        font-weight: 600;
        color: #1e293b;
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
    }

    .form-control:focus, .form-select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        background: #fff;
    }

    .file-input-label {
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-input-label:hover {
        border-color: #2563eb;
        background: rgba(37, 99, 235, 0.05);
    }

    .file-input-text {
        color: #475569;
    }

    /* Quill styling */
    .quill-container {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .quill-container.focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .ql-toolbar {
        border-bottom: 1px solid #e2e8f0 !important;
        background: #f8fafc;
    }

    .btn {
        border-radius: 12px;
        font-weight: 600;
        letter-spacing: 0.3px;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #2563eb 0%, #4338ca 100%);
        color: white;
        border: none;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(37, 99, 235, 0.4);
    }

    .btn-secondary {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        color: #334155;
    }

    .btn-secondary:hover {
        background: #f1f5f9;
    }

    .form-note {
        background: rgba(37, 99, 235, 0.05);
        border: 1px solid rgba(37, 99, 235, 0.2);
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        color: #1e40af;
        font-size: 0.9rem;
    }

    .form-note i {
        color: #2563eb;
    }
</style>

</head>
<body>
    <div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2><i class="bi bi-newspaper"></i> Tambah Berita Baru</h2>
            <p>Lengkapi data berita yang akan ditambahkan</p>
        </div>

        <div class="row g-4">
            <!-- Kolom kiri -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-type-h1"></i> Judul Berita *</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul berita...">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-link-45deg"></i> Slug URL *</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="url-friendly-slug">
                        <button class="btn btn-outline-primary">Generate dari Judul</button>
                    </div>
                    <small class="text-muted">Slug akan digunakan sebagai URL berita</small>
                </div>
            </div>

            <!-- Kolom kanan -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-image"></i> Gambar Utama</label>
                    <input type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-folder2-open"></i> Kategori</label>
                    <select class="form-select">
                        <option>Pilih kategori...</option>
                        <option>Berita</option>
                        <option>Blog</option>
                        <option>Umum</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-calendar"></i> Tanggal</label>
                    <input type="date" class="form-control">
                </div>
            </div>
        </div>

        <!-- Full width konten berita -->
        <div class="mb-3">
            <label class="form-label"><i class="bi bi-file-text"></i> Konten Berita *</label>
            <textarea class="form-control" rows="6" placeholder="Tulis konten berita di sini..."></textarea>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="reset" class="btn btn-secondary">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
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
