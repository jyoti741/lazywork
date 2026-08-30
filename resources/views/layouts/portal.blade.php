<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    @include('partials.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="h-full bg-slate-50 text-slate-900 antialiased font-sans flex flex-col selection:bg-blue-600 selection:text-white">

    <!-- Top Emergency Announcement Bar -->
    <div class="bg-slate-900 text-slate-200 text-xs py-2 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-3">
                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-amber-500/20 text-amber-400 border border-amber-500/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-1.5 animate-pulse-fast"></span>
                    Official Portal
                </span>
                <span class="text-slate-300 font-medium">Government Public Grievance Redressal & Disaster Response Cell</span>
            </div>
            <div class="flex items-center space-x-6 text-slate-300">
                <a href="tel:100" class="hover:text-red-400 transition-colors flex items-center gap-1 font-semibold">
                    <i data-lucide="phone-call" class="w-3.5 h-3.5 text-red-500"></i> Police: <span class="text-white">100</span>
                </a>
                <a href="tel:101" class="hover:text-amber-400 transition-colors flex items-center gap-1 font-semibold">
                    <i data-lucide="flame" class="w-3.5 h-3.5 text-amber-500"></i> Fire: <span class="text-white">101</span>
                </a>
                <a href="tel:102" class="hover:text-emerald-400 transition-colors flex items-center gap-1 font-semibold">
                    <i data-lucide="ambulance" class="w-3.5 h-3.5 text-emerald-500"></i> Ambulance: <span class="text-white">102</span>
                </a>
                <div class="h-3 w-px bg-slate-700 hidden sm:block"></div>
                <a href="{{ route('admin.complaints') }}" class="text-amber-400 hover:text-amber-300 flex items-center gap-1 font-bold">
                    <i data-lucide="user-cog" class="w-3.5 h-3.5"></i> Admin Officer Desk
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Branding / Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-blue-900 via-blue-800 to-indigo-900 text-amber-400 flex items-center justify-center shadow-md shadow-blue-900/20 group-hover:scale-105 transition-transform">
                        <i data-lucide="landmark" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-extrabold text-lg text-slate-900 tracking-tight">JanSeva Portal</span>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-blue-100 text-blue-800">Govt. Official</span>
                        </div>
                        <p class="text-xs text-slate-500 font-medium">Public Complaint & Citizen Service Gateway</p>
                    </div>
                </a>

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="{{ route('home') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-all {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700 border border-blue-200/60 shadow-xs' : 'text-slate-600 hover:text-blue-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5"><i data-lucide="home" class="w-4 h-4"></i> Home</span>
                    </a>
                    <a href="{{ route('complaints') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-all {{ request()->routeIs('complaints') ? 'bg-blue-50 text-blue-700 border border-blue-200/60 shadow-xs' : 'text-slate-600 hover:text-blue-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5"><i data-lucide="list-checks" class="w-4 h-4 text-blue-600"></i> Complaints</span>
                    </a>
                    <a href="{{ route('services') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-all {{ request()->routeIs('services') ? 'bg-blue-50 text-blue-700 border border-blue-200/60 shadow-xs' : 'text-slate-600 hover:text-blue-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5"><i data-lucide="shield-alert" class="w-4 h-4 text-red-500"></i> Emergency</span>
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-semibold transition-all {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-700 border border-blue-200/60 shadow-xs' : 'text-slate-600 hover:text-blue-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5"><i data-lucide="phone-forwarded" class="w-4 h-4"></i> Contact</span>
                    </a>
                    <a href="{{ route('admin.complaints') }}" 
                       class="px-3 py-2 rounded-lg text-sm font-bold transition-all {{ request()->routeIs('admin.complaints') ? 'bg-amber-50 text-amber-800 border border-amber-300 shadow-xs' : 'text-amber-700 hover:text-amber-900 hover:bg-amber-50' }}">
                       <span class="flex items-center gap-1.5"><i data-lucide="user-cog" class="w-4 h-4 text-amber-600"></i> Admin Panel</span>
                    </a>
                </nav>

                <!-- Header Actions -->
                <div class="hidden lg:flex items-center space-x-3">
                    <button onclick="toggleModal('trackModal')" class="px-4 py-2.5 rounded-lg text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-all flex items-center gap-2">
                        <i data-lucide="search" class="w-4 h-4 text-slate-500"></i> Track Ticket
                    </button>
                    <a href="{{ route('home') }}#file-complaint" class="px-5 py-2.5 rounded-lg text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-900/20 hover:shadow-lg transition-all flex items-center gap-2">
                        <i data-lucide="plus-circle" class="w-4 h-4"></i> File Grievance
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center gap-2">
                    <button onclick="toggleModal('mobileNav')" class="p-2.5 rounded-lg text-slate-600 hover:bg-slate-100">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation Drawer -->
    <div id="mobileNav" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden" onclick="toggleModal('mobileNav')">
        <div class="fixed top-0 right-0 w-80 h-full bg-white p-6 shadow-2xl flex flex-col justify-between" onclick="event.stopPropagation()">
            <div>
                <div class="flex items-center justify-between pb-6 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-blue-900 text-amber-400 flex items-center justify-center">
                            <i data-lucide="landmark" class="w-4 h-4"></i>
                        </div>
                        <span class="font-bold text-slate-900">JanSeva Portal</span>
                    </div>
                    <button onclick="toggleModal('mobileNav')" class="p-2 rounded-lg text-slate-400 hover:text-slate-600">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
                <div class="mt-6 flex flex-col space-y-2">
                    <a href="{{ route('home') }}" class="px-4 py-3 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700">Home</a>
                    <a href="{{ route('complaints') }}" class="px-4 py-3 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700">View All Complaints</a>
                    <a href="{{ route('admin.complaints') }}" class="px-4 py-3 rounded-lg text-base font-bold text-amber-800 bg-amber-50">Admin Officer Panel</a>
                    <a href="{{ route('services') }}" class="px-4 py-3 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700">Emergency & Services</a>
                    <a href="{{ route('contact') }}" class="px-4 py-3 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700">Contact Us & Offices</a>
                </div>
            </div>
            <div class="space-y-3 pt-6 border-t border-slate-100">
                <button onclick="toggleModal('mobileNav'); toggleModal('trackModal')" class="w-full py-3 rounded-lg text-sm font-semibold text-slate-700 bg-slate-100 text-center">Track Complaint</button>
                <a href="{{ route('home') }}#file-complaint" onclick="toggleModal('mobileNav')" class="block w-full py-3 rounded-lg text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-center shadow-md">File Grievance</a>
            </div>
        </div>
    </div>

    <!-- Main Content Injection -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Global Track Ticket Modal -->
    <div id="trackModal" class="fixed inset-0 z-50 bg-slate-900/70 backdrop-blur-xs hidden flex items-center justify-center p-4" onclick="toggleModal('trackModal')">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-100" onclick="event.stopPropagation()">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                        <i data-lucide="search-check" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-slate-900">Track Complaint Status</h3>
                        <p class="text-xs text-slate-500">Enter your 10-digit Ticket Tracking ID</p>
                    </div>
                </div>
                <button onclick="toggleModal('trackModal')" class="text-slate-400 hover:text-slate-600 p-1">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <form onsubmit="handleTrackSearch(event)" class="mt-6 space-y-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1">Grievance Ticket ID</label>
                    <div class="relative">
                        <input type="text" id="modalTicketId" placeholder="e.g. GOV-2026-98412" required
                               class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20 font-mono text-sm font-semibold uppercase">
                        <span class="absolute right-3 top-3 text-slate-400">
                            <i data-lucide="ticket" class="w-5 h-5"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="w-full py-3 px-4 rounded-xl bg-blue-900 hover:bg-blue-950 text-white font-bold text-sm shadow-md transition-all">
                    Search Ticket Status
                </button>
            </form>
            <div id="modalTrackResult" class="mt-4 hidden p-4 rounded-xl bg-slate-50 border border-slate-200">
                <!-- Dynamic result inserted via JS -->
            </div>
        </div>
    </div>

    <!-- Official Government Portal Footer -->
    <footer class="bg-slate-950 text-slate-300 mt-20 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
                <!-- Col 1: Government Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-amber-500/10 border border-amber-500/30 text-amber-400 flex items-center justify-center">
                            <i data-lucide="landmark" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-white text-base">JanSeva Grievance Redressal</h4>
                            <p class="text-xs text-slate-400">Department of Public Service & e-Governance</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed pr-6">
                        An official centralized online portal designed to facilitate quick resolution of citizen complaints regarding municipal services, public safety, infrastructure, utilities, and emergency services with complete transparency and accountability.
                    </p>
                    <div class="flex items-center space-x-3 pt-2">
                        <span class="inline-flex items-center px-2.5 py-1 rounded text-[11px] font-semibold bg-emerald-900/40 text-emerald-300 border border-emerald-700/50">
                            <i data-lucide="shield-check" class="w-3.5 h-3.5 mr-1"></i> ISO 27001 Certified Portal
                        </span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded text-[11px] font-semibold bg-blue-900/40 text-blue-300 border border-blue-700/50">
                            <i data-lucide="clock" class="w-3.5 h-3.5 mr-1"></i> 24x7 Active Desk
                        </span>
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div class="space-y-3">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-slate-100">Portal Navigation</h5>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3 h-3 text-slate-600"></i> Portal Home</a></li>
                        <li><a href="{{ route('complaints') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3 h-3 text-slate-600"></i> Citizen Complaints</a></li>
                        <li><a href="{{ route('admin.complaints') }}" class="text-amber-400 hover:text-amber-300 font-bold transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3 h-3 text-amber-500"></i> Officer Admin Panel</a></li>
                        <li><a href="{{ route('services') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3 h-3 text-slate-600"></i> Emergency Hotlines</a></li>
                        <li><a href="{{ route('contact') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3 h-3 text-slate-600"></i> Contact Offices</a></li>
                    </ul>
                </div>

                <!-- Col 3: Key Departments -->
                <div class="space-y-3">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-slate-100">Key Departments</h5>
                    <ul class="space-y-2 text-xs">
                        <li class="text-slate-400 flex items-center gap-2"><i data-lucide="truck" class="w-3.5 h-3.5 text-blue-400"></i> Municipal Sanitation</li>
                        <li class="text-slate-400 flex items-center gap-2"><i data-lucide="construction" class="w-3.5 h-3.5 text-amber-400"></i> Roads & Infrastructure</li>
                        <li class="text-slate-400 flex items-center gap-2"><i data-lucide="zap" class="w-3.5 h-3.5 text-amber-300"></i> Electricity & Streetlights</li>
                        <li class="text-slate-400 flex items-center gap-2"><i data-lucide="droplet" class="w-3.5 h-3.5 text-cyan-400"></i> Water Supply & Sewage</li>
                        <li class="text-slate-400 flex items-center gap-2"><i data-lucide="shield" class="w-3.5 h-3.5 text-red-400"></i> Public Safety & Traffic</li>
                    </ul>
                </div>

                <!-- Col 4: Emergency Contacts -->
                <div class="space-y-3">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-red-400 flex items-center gap-1">
                        <i data-lucide="phone-call" class="w-3.5 h-3.5"></i> Emergency Hotlines
                    </h5>
                    <div class="space-y-2 text-xs bg-slate-900/80 p-3.5 rounded-xl border border-slate-800">
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Police Control Room:</span>
                            <a href="tel:100" class="font-bold text-red-400 hover:underline">100</a>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Fire Brigade:</span>
                            <a href="tel:101" class="font-bold text-amber-400 hover:underline">101</a>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Ambulance Service:</span>
                            <a href="tel:102" class="font-bold text-emerald-400 hover:underline">102</a>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Disaster Cell:</span>
                            <a href="tel:1070" class="font-bold text-blue-400 hover:underline">1070</a>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Women Helpline:</span>
                            <a href="tel:1091" class="font-bold text-pink-400 hover:underline">1091</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Bar -->
            <div class="mt-12 pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p>&copy; 2026 JanSeva Public Grievance Portal. All Rights Reserved. Govt. of India / Municipal Authority.</p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-slate-300">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-300">Terms of Service</a>
                    <a href="#" class="hover:text-slate-300">Hyperlinking Policy</a>
                    <a href="#" class="hover:text-slate-300">Accessibility Statement</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Master Interactive Scripts -->
    <script>
        // Lucide Icons initialization
        lucide.createIcons();

        // Modal toggle helper
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.toggle('hidden');
            }
        }

        // Handle ticket tracking search demo
        function handleTrackSearch(e) {
            e.preventDefault();
            const input = document.getElementById('modalTicketId').value.trim();
            const resultBox = document.getElementById('modalTrackResult');
            if (!resultBox) return;

            resultBox.classList.remove('hidden');
            resultBox.innerHTML = `
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-blue-800 bg-blue-100 px-2 py-0.5 rounded">Ticket Found</span>
                    <span class="inline-flex items-center text-xs font-semibold px-2 py-0.5 rounded bg-amber-100 text-amber-800">
                        <span class="w-1.5 h-1.5 bg-amber-600 rounded-full mr-1"></span> In Progress
                    </span>
                </div>
                <h4 class="font-bold text-sm text-slate-900 mb-1">Ticket ID: ${input.toUpperCase()}</h4>
                <p class="text-xs text-slate-600 mb-2">Category: Streetlight & Electrical Repair (Ward 14)</p>
                <div class="text-[11px] text-slate-500 space-y-1">
                    <p>• Filed: August 26, 2026 at 14:30 IST</p>
                    <p>• Assigned to: Executive Engineer (Electrical Dept)</p>
                    <p>• Expected Resolution: Within 24 Hours</p>
                </div>
            `;
        }
    </script>
    @stack('scripts')
</body>
</html>
