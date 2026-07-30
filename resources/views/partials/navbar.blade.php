<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-primary"
            href="{{ route('home') }}">
            <img src="{{ asset(config('dishub.logo', 'images/no-image.jpg')) }}"
                alt="Logo {{ config('dishub.short_name', 'Dinhub Purbalingga') }}"
                height="42"
                class="object-fit-contain">

            <span>{{ strtoupper(config('dishub.short_name', 'Dinhub Purbalingga')) }}</span>
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMain"
            aria-controls="navbarMain"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMain">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                {{-- Beranda --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                {{-- Profil --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle {{ request()->routeIs('profile.*') ? 'active' : '' }}"
                        href="{{ route('profile.about') }}"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        Profil

                    </a>

                    <ul class="dropdown-menu shadow border-0 rounded-4">

                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profile.about') ? 'active' : '' }}"
                                href="{{ route('profile.about') }}">
                                Tentang Dinas
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profile.vision-mission') ? 'active' : '' }}"
                                href="{{ route('profile.vision-mission') }}">
                                Visi & Misi
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profile.duties') ? 'active' : '' }}"
                                href="{{ route('profile.duties') }}">
                                Tugas Pokok & Fungsi
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profile.organization') ? 'active' : '' }}"
                                href="{{ route('profile.organization') }}">
                                Struktur Organisasi
                            </a>
                        </li>

                    </ul>

                </li>

                {{-- PPID --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('ppid.*') ? 'active' : '' }}"
                        href="{{ route('ppid.index') }}"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        PPID
                    </a>
                    <ul class="dropdown-menu shadow border-0 rounded-4">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('ppid.index') ? 'active' : '' }}"
                                href="{{ route('ppid.index') }}">
                                Profil PPID
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('ppid.program') ? 'active' : '' }}"
                                href="{{ route('ppid.program') }}">
                                Program & Kegiatan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('ppid.sakip') ? 'active' : '' }}"
                                href="{{ route('ppid.sakip') }}">
                                SAKIP
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('ppid.peraturan') ? 'active' : '' }}"
                                href="{{ route('ppid.peraturan') }}">
                                Peraturan
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Berita --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                        href="{{ route('posts.index') }}">
                        Berita
                    </a>
                </li>

                {{-- Galeri --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"
                        href="{{ route('gallery.index') }}">
                        Galeri
                    </a>
                </li>

                {{-- Tanya Dinhub --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('question.*') ? 'active' : '' }}"
                        href="{{ route('question.create') }}">
                        Tanya Dinhub
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>