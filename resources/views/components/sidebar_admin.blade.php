<div>
    <!-- Sidebar -->
    <script src="{{ asset('js/dashboardadmin.js') }}"></script>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4>Admin Panel</h4>
            <p class="text-muted mb-0 small">Management System</p>
        </div>
        
        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-title">Main Menu</div>
                <a href="" class="menu-item active" data-target="dashboard">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Content Management</div>
                
                <a href="#" class="menu-item" data-target="berita" data-toggle="submenu">
                    <i class="bi bi-newspaper"></i> Berita <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="submenu">
                    <a href="#" class="submenu-item" data-target="berita-list">Daftar Berita</a>
                    <a href="#" class="submenu-item" data-target="berita-add">Tambah Berita</a>
                    <a href="#" class="submenu-item" data-target="berita-categories">Kategori</a>
                </div>

                <a href="#" class="menu-item" data-target="blog" data-toggle="submenu">
                    <i class="bi bi-journal-text"></i> Blog <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="submenu">
                    <a href="#" class="submenu-item" data-target="blog-list">Daftar Blog</a>
                    <a href="#" class="submenu-item" data-target="blog-add">Tambah Blog</a>
                    <a href="#" class="submenu-item" data-target="blog-tags">Tags</a>
                </div>

                <a href="#" class="menu-item" data-target="slider">
                    <i class="bi bi-images"></i> Slider
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">Website Settings</div>
                
                <a href="#" class="menu-item" data-target="about">
                    <i class="bi bi-building"></i> About Us
                </a>

                <a href="{{ route('contact') }}" class="menu-item" data-target="contact">
                    <i class="bi bi-telephone"></i> Contact
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-title">System</div>
                
                <a href="#" class="menu-item" data-target="users">
                    <i class="bi bi-people"></i> Users
                </a>
                
                <a href="#" class="menu-item" data-target="settings">
                    <i class="bi bi-gear"></i> Settings
                </a>
            </div>
        </nav>
    </div>
</div>
