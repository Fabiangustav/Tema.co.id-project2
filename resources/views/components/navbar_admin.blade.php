<div>
            <nav class="navbar">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-light me-3" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div>
                        {{-- Dynamic Page Title & Breadcrumb based on current route --}}
                        @php
                            $route = Route::currentRouteName();
                            $title = 'Dashboard';
                            $breadcrumbs = [['title' => 'Home', 'url' => route('admin.dashboard')]];
                            
                            if(str_contains($route, 'berita')) {
                                $title = 'Berita';
                                $breadcrumbs[] = ['title' => 'Berita', 'url' => route('admin.berita.index')];
                            } 
                            elseif(str_contains($route, 'blog')) {
                                $title = 'Blog';
                                $breadcrumbs[] = ['title' => 'Blog', 'url' => route('admin.blog.index')];
                            }
                            elseif(str_contains($route, 'about')) {
                                $title = 'About Us';
                                $breadcrumbs[] = ['title' => 'About', 'url' => route('admin.about.edit')];
                            }
                            elseif(str_contains($route, 'users')) {
                                $title = 'Users';
                                $breadcrumbs[] = ['title' => 'Users', 'url' => route('admin.users.index')];
                            }
                            elseif(str_contains($route, 'settings')) {
                                $title = 'Settings';
                                $breadcrumbs[] = ['title' => 'Settings', 'url' => route('admin.settings.index')];
                            }

                            if(str_contains($route, '.create')) {
                                $breadcrumbs[] = ['title' => 'Create', 'url' => '#'];
                            }
                            elseif(str_contains($route, '.edit')) {
                                $breadcrumbs[] = ['title' => 'Edit', 'url' => '#'];
                            }
                        @endphp

                        <h6 class="mb-0" id="pageTitle">{{ $title }}</h6>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                @foreach($breadcrumbs as $breadcrumb)
                                    @if($loop->last)
                                        <li class="breadcrumb-item active">{{ $breadcrumb['title'] }}</li>
                                    @else
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    {{-- Search Box --}}
                    <div class="search-box me-3">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    
                    {{-- User Dropdown --}}
                    <div class="dropdown">
                        <button class="btn btn-outline-light" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> Admin
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('admin.users.edit', auth()->id()) }}">
                                <i class="bi bi-person me-2"></i>Profile
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}">
                                <i class="bi bi-gear me-2"></i>Settings
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>                            <?php
                            Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
                                Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
                                Route::resource('berita', 'BeritaController');
                                Route::resource('blog', 'BlogController');
                                Route::resource('users', 'UserController');
                                Route::get('about/edit', 'AboutController@edit')->name('about.edit');
                                Route::put('about/update', 'AboutController@update')->name('about.update');
                                Route::get('settings',
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
</div>