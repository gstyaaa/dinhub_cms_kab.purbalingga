@php
    $siteSettings = \App\Models\SiteSetting::getSettings();
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-primary" href="{{ route('home') }}">
            <img src="{{ asset(config('dishub.logo', 'images/new-dinhub.png')) }}"
                alt="Logo {{ config('dishub.short_name', 'Dinhub Purbalingga') }}"
                height="42"
                class="object-fit-contain">
            <span class="fs-6 fs-lg-5">{{ strtoupper(config('dishub.short_name', 'Dinhub Purbalingga')) }}</span>
        </a>

        {{-- Desktop Navigation Links (Visible on Desktop >= 992px) --}}
        <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarDesktop">
            <ul class="navbar-nav ms-auto align-items-center gap-1">

                {{-- Beranda --}}
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2 px-3 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door text-primary fs-6"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                {{-- Profil --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-inline-flex align-items-center gap-2 px-3 {{ request()->routeIs('profile.*') ? 'active' : '' }}"
                        href="{{ route('profile.about') }}"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-building text-primary fs-6"></i>
                        <span>Profil</span>
                        <i class="bi bi-chevron-down ms-1 text-secondary fs-7 dropdown-chevron-icon"></i>
                    </a>
                    <ul class="dropdown-menu shadow border-0 rounded-4 p-2">
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('profile.about') ? 'active' : '' }}"
                                href="{{ route('profile.about') }}">
                                <i class="bi bi-info-circle text-primary fs-6"></i>
                                <span>Tentang Dinas</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('profile.vision-mission') ? 'active' : '' }}"
                                href="{{ route('profile.vision-mission') }}">
                                <i class="bi bi-compass text-primary fs-6"></i>
                                <span>Visi & Misi</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('profile.duties') ? 'active' : '' }}"
                                href="{{ route('profile.duties') }}">
                                <i class="bi bi-list-check text-primary fs-6"></i>
                                <span>Tugas Pokok & Fungsi</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('profile.organization') ? 'active' : '' }}"
                                href="{{ route('profile.organization') }}">
                                <i class="bi bi-diagram-3 text-primary fs-6"></i>
                                <span>Struktur Organisasi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- PPID --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-inline-flex align-items-center gap-2 px-3 {{ request()->routeIs('ppid.*') ? 'active' : '' }}"
                        href="{{ route('ppid.index') }}"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-shield-check text-primary fs-6"></i>
                        <span>PPID</span>
                        <i class="bi bi-chevron-down ms-1 text-secondary fs-7 dropdown-chevron-icon"></i>
                    </a>
                    <ul class="dropdown-menu shadow border-0 rounded-4 p-2">
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('ppid.index') ? 'active' : '' }}"
                                href="{{ route('ppid.index') }}">
                                <i class="bi bi-person-badge text-primary fs-6"></i>
                                <span>Profil PPID</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('ppid.program') ? 'active' : '' }}"
                                href="{{ route('ppid.program') }}">
                                <i class="bi bi-calendar-event text-primary fs-6"></i>
                                <span>Program & Kegiatan</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('ppid.sakip') ? 'active' : '' }}"
                                href="{{ route('ppid.sakip') }}">
                                <i class="bi bi-journal-text text-primary fs-6"></i>
                                <span>SAKIP</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('ppid.peraturan') ? 'active' : '' }}"
                                href="{{ route('ppid.peraturan') }}">
                                <i class="bi bi-file-earmark-text text-primary fs-6"></i>
                                <span>Peraturan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Standar Pelayanan --}}
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2 px-3 {{ request()->routeIs('standar-pelayanan') ? 'active' : '' }}" href="{{ route('standar-pelayanan') }}">
                        <i class="bi bi-award text-primary fs-6"></i>
                        <span>Standar Pelayanan</span>
                    </a>
                </li>

                {{-- Berita --}}
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2 px-3 {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                        <i class="bi bi-newspaper text-primary fs-6"></i>
                        <span>Berita</span>
                    </a>
                </li>

                {{-- Galeri --}}
                @if($siteSettings->gallery_active ?? true)
                    <li class="nav-item">
                        <a class="nav-link d-inline-flex align-items-center gap-2 px-3 {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">
                            <i class="bi bi-images text-primary fs-6"></i>
                            <span>Galeri</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>

        {{-- Mobile Hamburger Button (Only visible on Mobile < 992px) --}}
        <button class="navbar-toggler border-0 shadow-none p-1 d-lg-none"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#mobileSidebarDrawer"
            aria-controls="mobileSidebarDrawer"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Mobile Offcanvas Drawer (Only visible & triggered on Mobile) --}}
        <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="mobileSidebarDrawer" aria-labelledby="mobileSidebarDrawerLabel">
            <div class="offcanvas-header bg-white border-bottom py-3">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset(config('dishub.logo', 'images/new-dinhub.png')) }}"
                        alt="Logo" height="32" class="object-fit-contain">
                    <span class="fw-bold text-primary fs-6 mb-0" id="mobileSidebarDrawerLabel">
                        {{ strtoupper(config('dishub.short_name', 'Dinhub Purbalingga')) }}
                    </span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body py-3">
                <ul class="navbar-nav gap-2">

                    {{-- Beranda --}}
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door text-primary fs-6"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    {{-- Profil (Native HTML5 Details Accordion) --}}
                    <li class="nav-item">
                        <details class="mobile-dropdown-details" {{ request()->routeIs('profile.*') ? 'open' : '' }}>
                            <summary class="nav-link bg-transparent border-0 w-100 text-start d-flex justify-content-between align-items-center py-2.5 px-0 {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                                <span class="d-inline-flex align-items-center gap-3">
                                    <i class="bi bi-building text-primary fs-6"></i>
                                    <span>Profil</span>
                                </span>
                                <i class="bi bi-chevron-down text-secondary fs-6 dropdown-chevron-icon"></i>
                            </summary>
                            <ul class="list-unstyled ps-2 my-2 d-flex flex-column gap-1">
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('profile.about') ? 'active' : '' }}" href="{{ route('profile.about') }}">
                                        <i class="bi bi-info-circle text-primary fs-6 shrink-0"></i>
                                        <span>Tentang Dinas</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('profile.vision-mission') ? 'active' : '' }}" href="{{ route('profile.vision-mission') }}">
                                        <i class="bi bi-compass text-primary fs-6 shrink-0"></i>
                                        <span>Visi & Misi</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('profile.duties') ? 'active' : '' }}" href="{{ route('profile.duties') }}">
                                        <i class="bi bi-list-check text-primary fs-6 shrink-0"></i>
                                        <span>Tugas Pokok & Fungsi</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('profile.organization') ? 'active' : '' }}" href="{{ route('profile.organization') }}">
                                        <i class="bi bi-diagram-3 text-primary fs-6 shrink-0"></i>
                                        <span>Struktur Organisasi</span>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>

                    {{-- PPID (Native HTML5 Details Accordion) --}}
                    <li class="nav-item">
                        <details class="mobile-dropdown-details" {{ request()->routeIs('ppid.*') ? 'open' : '' }}>
                            <summary class="nav-link bg-transparent border-0 w-100 text-start d-flex justify-content-between align-items-center py-2.5 px-0 {{ request()->routeIs('ppid.*') ? 'active' : '' }}">
                                <span class="d-inline-flex align-items-center gap-3">
                                    <i class="bi bi-shield-check text-primary fs-6"></i>
                                    <span>PPID</span>
                                </span>
                                <i class="bi bi-chevron-down text-secondary fs-6 dropdown-chevron-icon"></i>
                            </summary>
                            <ul class="list-unstyled ps-2 my-2 d-flex flex-column gap-1">
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('ppid.index') ? 'active' : '' }}" href="{{ route('ppid.index') }}">
                                        <i class="bi bi-person-badge text-primary fs-6 shrink-0"></i>
                                        <span>Profil PPID</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('ppid.program') ? 'active' : '' }}" href="{{ route('ppid.program') }}">
                                        <i class="bi bi-calendar-event text-primary fs-6 shrink-0"></i>
                                        <span>Program & Kegiatan</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('ppid.sakip') ? 'active' : '' }}" href="{{ route('ppid.sakip') }}">
                                        <i class="bi bi-journal-text text-primary fs-6 shrink-0"></i>
                                        <span>SAKIP</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2.5 d-flex align-items-center gap-3 text-wrap {{ request()->routeIs('ppid.peraturan') ? 'active' : '' }}" href="{{ route('ppid.peraturan') }}">
                                        <i class="bi bi-file-earmark-text text-primary fs-6 shrink-0"></i>
                                        <span>Peraturan</span>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>

                    {{-- Standar Pelayanan --}}
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('standar-pelayanan') ? 'active' : '' }}" href="{{ route('standar-pelayanan') }}">
                            <i class="bi bi-award text-primary fs-6"></i>
                            <span>Standar Pelayanan</span>
                        </a>
                    </li>

                    {{-- Berita --}}
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                            <i class="bi bi-newspaper text-primary fs-6"></i>
                            <span>Berita</span>
                        </a>
                    </li>

                    {{-- Galeri --}}
                    @if($siteSettings->gallery_active ?? true)
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-3 py-2.5 {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">
                                <i class="bi bi-images text-primary fs-6"></i>
                                <span>Galeri</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>

    </div>
</nav>