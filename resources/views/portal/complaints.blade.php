@extends('layouts.portal')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white py-14 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold border border-blue-500/30 mb-3">
                    <i data-lucide="eye" class="w-3.5 h-3.5 text-blue-400"></i>
                    Public Civic Audit & Transparency Directory
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Public Grievances & Complaints</h1>
                <p class="text-slate-300 text-sm sm:text-base mt-1 max-w-2xl">
                    Browse all registered civic complaints, track officer assignments, and view resolution progress across all municipal wards.
                </p>
            </div>

            <a href="{{ route('home') }}#file-complaint" class="px-6 py-3.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold text-sm shadow-xl shadow-amber-500/20 transition-all flex items-center gap-2 shrink-0">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                Submit New Complaint
            </a>
        </div>
    </div>
</section>

<!-- Main Complaints Directory Section -->
<section class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Controls Bar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs mb-8 space-y-4">
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                
                <!-- Search Bar -->
                <div class="md:col-span-5 relative">
                    <input type="text" id="searchInput" oninput="filterComplaints()" placeholder="Search by Ticket ID, Ward, Subject or Keyword..." 
                           class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                    <i data-lucide="search" class="w-5 h-5 text-slate-400 absolute left-3.5 top-3.5"></i>
                </div>

                <!-- Category Filter -->
                <div class="md:col-span-4">
                    <select id="categoryFilter" onchange="filterComplaints()" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm font-medium focus:ring-2 focus:ring-blue-600 bg-slate-50">
                        <option value="all">All Service Categories</option>
                        <option value="Roads & Potholes">Roads & Potholes</option>
                        <option value="Sanitation & Garbage">Sanitation & Garbage</option>
                        <option value="Street Lighting & Power">Street Lighting & Power</option>
                        <option value="Water Leakage & Drainage">Water Supply & Drainage</option>
                        <option value="Public Safety & Traffic">Public Safety & Traffic</option>
                        <option value="Building & Encroachment">Building & Encroachment</option>
                    </select>
                </div>

                <!-- Ward Filter -->
                <div class="md:col-span-3">
                    <select id="wardFilter" onchange="filterComplaints()" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm font-medium focus:ring-2 focus:ring-blue-600 bg-slate-50">
                        <option value="all">All Municipal Wards</option>
                        <option value="Ward 1">Ward 1 (North District)</option>
                        <option value="Ward 4">Ward 4 (Central Market)</option>
                        <option value="Ward 8">Ward 8 (East Residential)</option>
                        <option value="Ward 12">Ward 12 (South Industrial)</option>
                        <option value="Ward 15">Ward 15 (West Tech Hub)</option>
                    </select>
                </div>

            </div>

            <!-- Status Tabs -->
            <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-100 text-xs">
                <div class="flex items-center space-x-2 bg-slate-100 p-1 rounded-xl font-semibold">
                    <button onclick="setStatusFilter('all')" class="status-tab-btn px-4 py-2 rounded-lg bg-white text-blue-900 shadow-xs font-bold" data-status="all">
                        All (<span id="count-all">8</span>)
                    </button>
                    <button onclick="setStatusFilter('In Progress')" class="status-tab-btn px-4 py-2 rounded-lg text-slate-600 hover:text-slate-900" data-status="In Progress">
                        In Progress (<span id="count-progress">3</span>)
                    </button>
                    <button onclick="setStatusFilter('Pending Inspection')" class="status-tab-btn px-4 py-2 rounded-lg text-slate-600 hover:text-slate-900" data-status="Pending Inspection">
                        Pending (<span id="count-pending">2</span>)
                    </button>
                    <button onclick="setStatusFilter('Resolved')" class="status-tab-btn px-4 py-2 rounded-lg text-slate-600 hover:text-slate-900" data-status="Resolved">
                        Resolved (<span id="count-resolved">3</span>)
                    </button>
                </div>

                <div class="text-slate-500 font-medium">
                    Showing <span id="visibleCount" class="font-bold text-slate-900">8</span> verified grievances
                </div>
            </div>

        </div>

        <!-- Complaints List Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="complaintsGrid">
            
            <!-- Complaint Card 1 -->
            <div class="complaint-card bg-white rounded-2xl border border-slate-200 p-6 shadow-xs hover:shadow-md transition-all space-y-4"
                 data-category="Roads & Potholes" data-ward="Ward 4" data-status="In Progress" data-ticket="GOV-2026-98412">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-blue-900 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                            #GOV-2026-98412
                        </span>
                        <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-600 animate-pulse"></span> In Progress
                        </span>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Aug 26, 2026</span>
                </div>

                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-amber-700 bg-amber-50 px-2 py-0.5 rounded">Roads & Potholes</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1 hover:text-blue-700 cursor-pointer" onclick="openDetailModal('GOV-2026-98412')">
                        Deep Pothole Hazard near Central Market Main Crossing
                    </h3>
                    <p class="text-xs text-slate-600 mt-1.5 line-clamp-2 leading-relaxed">
                        A large 3-foot wide asphalt pothole has formed following heavy rains, causing traffic congestion and motorcycle skid risks.
                    </p>
                </div>

                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-xs space-y-1">
                    <div class="flex justify-between text-slate-600">
                        <span>Location: <strong>Ward 4 (Central Market Area)</strong></span>
                        <span class="text-red-600 font-bold">Urgency: High</span>
                    </div>
                    <div class="flex justify-between text-slate-500 text-[11px]">
                        <span>Assigned: <strong>Er. Suresh Kumar (PWD)</strong></span>
                        <span>SLA Target: <strong>Today 18:00</strong></span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1">
                        <i data-lucide="user" class="w-3.5 h-3.5"></i> Complainant: Rajesh K.
                    </span>
                    <button onclick="openDetailModal('GOV-2026-98412')" class="px-4 py-2 rounded-lg bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs flex items-center gap-1.5 transition-all">
                        View Full Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

            <!-- Complaint Card 2 -->
            <div class="complaint-card bg-white rounded-2xl border border-slate-200 p-6 shadow-xs hover:shadow-md transition-all space-y-4"
                 data-category="Street Lighting & Power" data-ward="Ward 15" data-status="Resolved" data-ticket="GOV-2026-97810">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-blue-900 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                            #GOV-2026-97810
                        </span>
                        <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 flex items-center gap-1">
                            <i data-lucide="check-circle" class="w-3 h-3"></i> Resolved
                        </span>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Aug 25, 2026</span>
                </div>

                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-blue-700 bg-blue-50 px-2 py-0.5 rounded">Street Lighting & Power</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1 hover:text-blue-700 cursor-pointer" onclick="openDetailModal('GOV-2026-97810')">
                        Flickering Streetlight & Dark Alleyway in Sector 15
                    </h3>
                    <p class="text-xs text-slate-600 mt-1.5 line-clamp-2 leading-relaxed">
                        Streetlight pole #44 has been non-functional for 3 days, creating safety concerns for late evening commuters.
                    </p>
                </div>

                <div class="bg-emerald-50/60 p-3 rounded-xl border border-emerald-100 text-xs space-y-1">
                    <div class="flex justify-between text-slate-700">
                        <span>Location: <strong>Ward 15 (West Tech Hub)</strong></span>
                        <span class="text-emerald-700 font-bold">Resolved in 14h</span>
                    </div>
                    <div class="flex justify-between text-slate-500 text-[11px]">
                        <span>Fixed By: <strong>Electrical Maintenance Team B</strong></span>
                        <span>Status: <strong>OTP Verified</strong></span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1">
                        <i data-lucide="user" class="w-3.5 h-3.5"></i> Complainant: Anita S.
                    </span>
                    <button onclick="openDetailModal('GOV-2026-97810')" class="px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-950 text-white font-bold text-xs flex items-center gap-1.5 transition-all">
                        View Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

            <!-- Complaint Card 3 -->
            <div class="complaint-card bg-white rounded-2xl border border-slate-200 p-6 shadow-xs hover:shadow-md transition-all space-y-4"
                 data-category="Sanitation & Garbage" data-ward="Ward 8" data-status="Pending Inspection" data-ticket="GOV-2026-98901">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-blue-900 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                            #GOV-2026-98901
                        </span>
                        <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-slate-200 text-slate-800 flex items-center gap-1">
                            <i data-lucide="clock" class="w-3 h-3"></i> Pending Inspection
                        </span>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Aug 27, 2026</span>
                </div>

                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Sanitation & Garbage</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1 hover:text-blue-700 cursor-pointer" onclick="openDetailModal('GOV-2026-98901')">
                        Uncollected Waste Dump near Green Park Gate 2
                    </h3>
                    <p class="text-xs text-slate-600 mt-1.5 line-clamp-2 leading-relaxed">
                        Community dumpsters overflowing with household waste due to missed morning collection truck.
                    </p>
                </div>

                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-xs space-y-1">
                    <div class="flex justify-between text-slate-600">
                        <span>Location: <strong>Ward 8 (East Residential)</strong></span>
                        <span class="text-amber-600 font-bold">Urgency: Medium</span>
                    </div>
                    <div class="flex justify-between text-slate-500 text-[11px]">
                        <span>Assigned: <strong>Sanitation Inspector Roy</strong></span>
                        <span>SLA Target: <strong>Aug 28 12:00</strong></span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1">
                        <i data-lucide="user" class="w-3.5 h-3.5"></i> Complainant: Vikram M.
                    </span>
                    <button onclick="openDetailModal('GOV-2026-98901')" class="px-4 py-2 rounded-lg bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs flex items-center gap-1.5 transition-all">
                        View Full Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

            <!-- Complaint Card 4 -->
            <div class="complaint-card bg-white rounded-2xl border border-slate-200 p-6 shadow-xs hover:shadow-md transition-all space-y-4"
                 data-category="Water Leakage & Drainage" data-ward="Ward 12" data-status="In Progress" data-ticket="GOV-2026-98330">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-blue-900 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                            #GOV-2026-98330
                        </span>
                        <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-600 animate-pulse"></span> In Progress
                        </span>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Aug 26, 2026</span>
                </div>

                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-cyan-700 bg-cyan-50 px-2 py-0.5 rounded">Water Supply & Sewage</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1 hover:text-blue-700 cursor-pointer" onclick="openDetailModal('GOV-2026-98330')">
                        Clean Tap Water Pipeline Leakage on Industrial Road
                    </h3>
                    <p class="text-xs text-slate-600 mt-1.5 line-clamp-2 leading-relaxed">
                        Underground drinking water feeder pipe burst resulting in thousands of liters wasting on main arterial road.
                    </p>
                </div>

                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-xs space-y-1">
                    <div class="flex justify-between text-slate-600">
                        <span>Location: <strong>Ward 12 (South Industrial)</strong></span>
                        <span class="text-red-600 font-bold">Urgency: Critical</span>
                    </div>
                    <div class="flex justify-between text-slate-500 text-[11px]">
                        <span>Assigned: <strong>Water Board Hydro Team 4</strong></span>
                        <span>SLA Target: <strong>Within 6 Hours</strong></span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1">
                        <i data-lucide="user" class="w-3.5 h-3.5"></i> Complainant: Sunil P.
                    </span>
                    <button onclick="openDetailModal('GOV-2026-98330')" class="px-4 py-2 rounded-lg bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs flex items-center gap-1.5 transition-all">
                        View Full Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

            <!-- Complaint Card 5 -->
            <div class="complaint-card bg-white rounded-2xl border border-slate-200 p-6 shadow-xs hover:shadow-md transition-all space-y-4"
                 data-category="Public Safety & Traffic" data-ward="Ward 1" data-status="Resolved" data-ticket="GOV-2026-97640">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-blue-900 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                            #GOV-2026-97640
                        </span>
                        <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 flex items-center gap-1">
                            <i data-lucide="check-circle" class="w-3 h-3"></i> Resolved
                        </span>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Aug 24, 2026</span>
                </div>

                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-red-700 bg-red-50 px-2 py-0.5 rounded">Public Safety & Traffic</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1 hover:text-blue-700 cursor-pointer" onclick="openDetailModal('GOV-2026-97640')">
                        Broken Traffic Light Control Box at North Square
                    </h3>
                    <p class="text-xs text-slate-600 mt-1.5 line-clamp-2 leading-relaxed">
                        4-way traffic junction signal was stuck on red in all directions causing morning traffic bottleneck.
                    </p>
                </div>

                <div class="bg-emerald-50/60 p-3 rounded-xl border border-emerald-100 text-xs space-y-1">
                    <div class="flex justify-between text-slate-700">
                        <span>Location: <strong>Ward 1 (North District)</strong></span>
                        <span class="text-emerald-700 font-bold">Resolved in 3h</span>
                    </div>
                    <div class="flex justify-between text-slate-500 text-[11px]">
                        <span>Fixed By: <strong>Traffic Police Signal Cell</strong></span>
                        <span>Status: <strong>System Operational</strong></span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1">
                        <i data-lucide="user" class="w-3.5 h-3.5"></i> Complainant: Officer Miller
                    </span>
                    <button onclick="openDetailModal('GOV-2026-97640')" class="px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-950 text-white font-bold text-xs flex items-center gap-1.5 transition-all">
                        View Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

            <!-- Complaint Card 6 -->
            <div class="complaint-card bg-white rounded-2xl border border-slate-200 p-6 shadow-xs hover:shadow-md transition-all space-y-4"
                 data-category="Building & Encroachment" data-ward="Ward 4" data-status="Pending Inspection" data-ticket="GOV-2026-98105">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="font-mono text-xs font-bold text-blue-900 bg-blue-50 px-2.5 py-1 rounded-md border border-blue-200">
                            #GOV-2026-98105
                        </span>
                        <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-slate-200 text-slate-800 flex items-center gap-1">
                            <i data-lucide="clock" class="w-3 h-3"></i> Pending Inspection
                        </span>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Aug 27, 2026</span>
                </div>

                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded">Building & Encroachment</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1 hover:text-blue-700 cursor-pointer" onclick="openDetailModal('GOV-2026-98105')">
                        Illegal Footpath Construction Blocking Pedestrians
                    </h3>
                    <p class="text-xs text-slate-600 mt-1.5 line-clamp-2 leading-relaxed">
                        Temporary steel structure erected on public sidewalk forcing school children to walk on busy main road.
                    </p>
                </div>

                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-xs space-y-1">
                    <div class="flex justify-between text-slate-600">
                        <span>Location: <strong>Ward 4 (Central Market Area)</strong></span>
                        <span class="text-amber-600 font-bold">Urgency: Medium</span>
                    </div>
                    <div class="flex justify-between text-slate-500 text-[11px]">
                        <span>Assigned: <strong>Encroachment Removal Squad</strong></span>
                        <span>Inspection: <strong>Scheduled Aug 28</strong></span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1">
                        <i data-lucide="user" class="w-3.5 h-3.5"></i> Complainant: Concerned Citizen
                    </span>
                    <button onclick="openDetailModal('GOV-2026-98105')" class="px-4 py-2 rounded-lg bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs flex items-center gap-1.5 transition-all">
                        View Full Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Full Detail View Modal -->
<div id="detailModal" class="fixed inset-0 z-50 bg-slate-900/75 backdrop-blur-xs hidden flex items-center justify-center p-4 overflow-y-auto" onclick="toggleModal('detailModal')">
    <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 relative my-8" onclick="event.stopPropagation()">
        
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div>
                <span id="dtlStatusBadge" class="text-xs font-extrabold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 uppercase tracking-wider">
                    In Progress
                </span>
                <h3 class="font-black text-xl text-slate-900 mt-1" id="dtlTitle">Deep Pothole Hazard near Central Market</h3>
            </div>
            <button onclick="toggleModal('detailModal')" class="text-slate-400 hover:text-slate-600 p-2">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <div class="mt-6 space-y-6">
            <!-- Ticket Info Meta -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100 text-xs">
                <div>
                    <span class="text-slate-400 block font-medium">Ticket ID</span>
                    <strong class="font-mono text-slate-900 text-sm" id="dtlTicket">GOV-2026-98412</strong>
                </div>
                <div>
                    <span class="text-slate-400 block font-medium">Category</span>
                    <strong class="text-slate-800" id="dtlCategory">Roads & Potholes</strong>
                </div>
                <div>
                    <span class="text-slate-400 block font-medium">Ward Location</span>
                    <strong class="text-slate-800" id="dtlWard">Ward 4</strong>
                </div>
                <div>
                    <span class="text-slate-400 block font-medium">Date Filed</span>
                    <strong class="text-slate-800" id="dtlDate">Aug 26, 2026</strong>
                </div>
            </div>

            <!-- Description -->
            <div>
                <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider mb-1">Issue Description</h4>
                <p class="text-xs text-slate-700 leading-relaxed bg-slate-50/80 p-4 rounded-xl border border-slate-200/60" id="dtlDesc">
                    A large 3-foot wide asphalt pothole has formed following heavy rains, causing traffic congestion and motorcycle skid risks.
                </p>
            </div>

            <!-- Officer & SLA Box -->
            <div class="bg-blue-50/80 p-4 rounded-2xl border border-blue-100 flex justify-between items-center text-xs">
                <div>
                    <span class="text-blue-900 font-bold block">Assigned Nodal Officer</span>
                    <span class="text-slate-600">Er. Suresh Kumar (Public Works Division)</span>
                </div>
                <div class="text-right">
                    <span class="text-blue-900 font-bold block">Target SLA</span>
                    <span class="text-emerald-700 font-bold">Within 24 Hours</span>
                </div>
            </div>

            <!-- Activity Timeline -->
            <div>
                <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider mb-3">Resolution Timeline</h4>
                <div class="space-y-3 text-xs border-l-2 border-slate-200 ml-2 pl-4">
                    <div class="relative">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600 absolute -left-[21px] top-1"></span>
                        <p class="font-bold text-slate-900">Complaint Registered & Ticket ID Generated</p>
                        <p class="text-slate-400 text-[11px]">Aug 26, 2026 at 10:15 IST • Auto System</p>
                    </div>
                    <div class="relative">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 absolute -left-[21px] top-1"></span>
                        <p class="font-bold text-slate-900">Assigned to Ward 4 Field Repair Crew</p>
                        <p class="text-slate-400 text-[11px]">Aug 26, 2026 at 11:30 IST • Nodal Desk</p>
                    </div>
                    <div class="relative">
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 absolute -left-[21px] top-1"></span>
                        <p class="font-bold text-slate-500">Inspection & Hot-Mix Patching in Progress</p>
                        <p class="text-slate-400 text-[11px]">Pending completion verification</p>
                    </div>
                </div>
            </div>

            <!-- Modal Action Buttons -->
            <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row justify-between gap-3">
                <button onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs flex items-center justify-center gap-2">
                    <i data-lucide="printer" class="w-4 h-4"></i> Print Official Report
                </button>
                <button onclick="toggleModal('detailModal')" class="px-6 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs">
                    Close Details View
                </button>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    let activeStatus = 'all';

    function setStatusFilter(status) {
        activeStatus = status;
        const btns = document.querySelectorAll('.status-tab-btn');
        btns.forEach(btn => {
            if (btn.getAttribute('data-status') === status) {
                btn.className = "status-tab-btn px-4 py-2 rounded-lg bg-white text-blue-900 shadow-xs font-bold";
            } else {
                btn.className = "status-tab-btn px-4 py-2 rounded-lg text-slate-600 hover:text-slate-900";
            }
        });
        filterComplaints();
    }

    function filterComplaints() {
        const query = document.getElementById('searchInput').value.toLowerCase().trim();
        const category = document.getElementById('categoryFilter').value;
        const ward = document.getElementById('wardFilter').value;

        const cards = document.querySelectorAll('.complaint-card');
        let visible = 0;

        cards.forEach(card => {
            const cardCat = card.getAttribute('data-category');
            const cardWard = card.getAttribute('data-ward');
            const cardStatus = card.getAttribute('data-status');
            const cardTicket = card.getAttribute('data-ticket').toLowerCase();
            const textContent = card.innerText.toLowerCase();

            const matchesStatus = (activeStatus === 'all' || cardStatus === activeStatus);
            const matchesCat = (category === 'all' || cardCat === category);
            const matchesWard = (ward === 'all' || cardWard.includes(ward));
            const matchesQuery = (query === '' || cardTicket.includes(query) || textContent.includes(query));

            if (matchesStatus && matchesCat && matchesWard && matchesQuery) {
                card.style.display = 'block';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById('visibleCount').innerText = visible;
    }

    function openDetailModal(ticketId) {
        const modal = document.getElementById('detailModal');
        if (!modal) return;

        // Populate detail modal dynamically based on clicked card
        const card = document.querySelector(`[data-ticket="${ticketId}"]`);
        if (card) {
            document.getElementById('dtlTicket').innerText = ticketId;
            document.getElementById('dtlTitle').innerText = card.querySelector('h3').innerText;
            document.getElementById('dtlCategory').innerText = card.getAttribute('data-category');
            document.getElementById('dtlWard').innerText = card.getAttribute('data-ward');
            document.getElementById('dtlStatusBadge').innerText = card.getAttribute('data-status');
            document.getElementById('dtlDesc').innerText = card.querySelector('p').innerText;
        }

        modal.classList.remove('hidden');
    }
</script>
@endpush
