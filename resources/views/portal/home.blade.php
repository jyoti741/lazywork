@extends('layouts.portal')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 text-white overflow-hidden py-16 lg:py-24">
    <!-- Subtle Background Grid Pattern -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-40"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Column -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/20 text-blue-300 text-xs font-semibold backdrop-blur-xs">
                    <i data-lucide="shield-check" class="w-4 h-4 text-blue-400"></i>
                    <span>Direct Civic Action & Public Accountability Portal</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white leading-tight">
                    Voice Your Issues. <br class="hidden sm:inline" />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-sky-300 to-amber-300">Fast Civic Resolutions.</span>
                </h1>

                <p class="text-slate-300 text-base sm:text-lg max-w-2xl font-normal leading-relaxed">
                    Report municipal defects, pothole damage, street light outages, sanitation issues, or emergency public service disruptions directly to municipal authorities with real-time SMS & online tracking.
                </p>

                <!-- Search & Actions -->
                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#file-complaint" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold text-sm shadow-xl shadow-amber-500/20 hover:shadow-amber-500/30 transition-all flex items-center justify-center gap-2 group">
                        <i data-lucide="file-plus" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                        File a Public Complaint Now
                    </a>
                    <a href="{{ route('services') }}" class="w-full sm:w-auto px-6 py-4 rounded-xl bg-white/10 hover:bg-white/15 border border-white/20 text-white font-semibold text-sm backdrop-blur-xs transition-all flex items-center justify-center gap-2">
                        <i data-lucide="phone-call" class="w-5 h-5 text-red-400"></i>
                        Emergency Directory
                    </a>
                </div>

                <!-- Stats Badges -->
                <div class="pt-6 grid grid-cols-3 gap-4 border-t border-slate-800/80 max-w-lg mx-auto lg:mx-0">
                    <div class="text-center lg:text-left">
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">18,450+</div>
                        <div class="text-xs text-slate-400 font-medium">Cases Resolved</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-2xl sm:text-3xl font-extrabold text-amber-400">98.2%</div>
                        <div class="text-xs text-slate-400 font-medium">SLA Resolution Rate</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-2xl sm:text-3xl font-extrabold text-emerald-400">&lt; 36 hrs</div>
                        <div class="text-xs text-slate-400 font-medium">Avg Response Time</div>
                    </div>
                </div>
            </div>

            <!-- Right Hero Column: Quick Tracker Card -->
            <div class="lg:col-span-5">
                <div class="bg-slate-900/90 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-md relative">
                    <div class="absolute -top-3 right-6 bg-blue-600 text-white text-[10px] uppercase font-bold tracking-wider px-3 py-1 rounded-full shadow-sm">
                        Instant Lookup
                    </div>

                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center">
                            <i data-lucide="search-code" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Track Filed Complaint</h3>
                            <p class="text-xs text-slate-400">Check current officer assignment & status</p>
                        </div>
                    </div>

                    <form onsubmit="handleHeroSearch(event)" class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Complaint Ticket Number</label>
                            <input type="text" id="heroTicketInput" placeholder="e.g., GOV-2026-7842" required
                                   class="w-full px-4 py-3.5 rounded-xl bg-slate-950 border border-slate-700 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 text-sm font-mono tracking-wider">
                        </div>

                        <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold text-sm shadow-lg shadow-blue-600/30 transition-all flex items-center justify-center gap-2">
                            <i data-lucide="search" class="w-4 h-4"></i> Track Grievance Status
                        </button>
                    </form>

                    <!-- Hero Track Output Box -->
                    <div id="heroTrackOutput" class="mt-5 hidden p-4 rounded-2xl bg-slate-950 border border-slate-800 text-left">
                        <!-- Injected via JS -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Complaint Categories Grid Section -->
<section class="py-16 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-extrabold uppercase tracking-wider px-3 py-1 rounded-full bg-blue-100 text-blue-800">
                Departmental Coverage
            </span>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 mt-3">Public Services & Grievance Categories</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">Select a category below or use the complaint form to submit issues directly to field teams.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="group bg-slate-50 hover:bg-blue-50/50 p-6 rounded-2xl border border-slate-200 hover:border-blue-300 transition-all duration-300 shadow-xs hover:shadow-md">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="construction" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-900">Roads & Potholes</h3>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">Damaged asphalt, dangerous potholes, broken dividers, missing manhole covers, and road maintenance.</p>
                <div class="mt-4 pt-4 border-t border-slate-200/80 flex justify-between items-center text-xs">
                    <span class="text-slate-500 font-medium">Avg Resolution: <strong>48 Hours</strong></span>
                    <a href="#file-complaint" onclick="preselectCategory('Roads & Potholes')" class="text-blue-700 font-bold hover:underline flex items-center gap-1">Report <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group bg-slate-50 hover:bg-blue-50/50 p-6 rounded-2xl border border-slate-200 hover:border-blue-300 transition-all duration-300 shadow-xs hover:shadow-md">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="trash-2" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-900">Sanitation & Garbage</h3>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">Uncollected waste dumps, overflowing community bins, street sweeping requests, and bio-hazard cleanup.</p>
                <div class="mt-4 pt-4 border-t border-slate-200/80 flex justify-between items-center text-xs">
                    <span class="text-slate-500 font-medium">Avg Resolution: <strong>24 Hours</strong></span>
                    <a href="#file-complaint" onclick="preselectCategory('Sanitation & Garbage')" class="text-blue-700 font-bold hover:underline flex items-center gap-1">Report <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-slate-50 hover:bg-blue-50/50 p-6 rounded-2xl border border-slate-200 hover:border-blue-300 transition-all duration-300 shadow-xs hover:shadow-md">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="zap" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-900">Street Lighting & Power</h3>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">Flickering or broken streetlights, hanging live electrical wires, transformer sparks, and dark alley illumination.</p>
                <div class="mt-4 pt-4 border-t border-slate-200/80 flex justify-between items-center text-xs">
                    <span class="text-slate-500 font-medium">Avg Resolution: <strong>12 Hours</strong></span>
                    <a href="#file-complaint" onclick="preselectCategory('Street Lighting & Power')" class="text-blue-700 font-bold hover:underline flex items-center gap-1">Report <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group bg-slate-50 hover:bg-blue-50/50 p-6 rounded-2xl border border-slate-200 hover:border-blue-300 transition-all duration-300 shadow-xs hover:shadow-md">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 text-cyan-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="droplets" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-900">Water Leakage & Drainage</h3>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">Main pipeline bursts, low water pressure, contaminated tap water supply, and clogged storm drains.</p>
                <div class="mt-4 pt-4 border-t border-slate-200/80 flex justify-between items-center text-xs">
                    <span class="text-slate-500 font-medium">Avg Resolution: <strong>24 Hours</strong></span>
                    <a href="#file-complaint" onclick="preselectCategory('Water Leakage & Drainage')" class="text-blue-700 font-bold hover:underline flex items-center gap-1">Report <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="group bg-slate-50 hover:bg-blue-50/50 p-6 rounded-2xl border border-slate-200 hover:border-blue-300 transition-all duration-300 shadow-xs hover:shadow-md">
                <div class="w-12 h-12 rounded-xl bg-red-500/10 text-red-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="shield-alert" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-900">Public Safety & Traffic</h3>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">Broken traffic signals, illegal parking bottlenecks, stray animal hazards, and public park safety concerns.</p>
                <div class="mt-4 pt-4 border-t border-slate-200/80 flex justify-between items-center text-xs">
                    <span class="text-slate-500 font-medium">Avg Resolution: <strong>Immediate / 6h</strong></span>
                    <a href="#file-complaint" onclick="preselectCategory('Public Safety & Traffic')" class="text-blue-700 font-bold hover:underline flex items-center gap-1">Report <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="group bg-slate-50 hover:bg-blue-50/50 p-6 rounded-2xl border border-slate-200 hover:border-blue-300 transition-all duration-300 shadow-xs hover:shadow-md">
                <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="building-2" class="w-6 h-6"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-900">Building & Encroachment</h3>
                <p class="text-xs text-slate-600 mt-2 leading-relaxed">Unauthorized constructions, illegal foot-path encroachments, unsafe dilapidated structures, and noise pollution.</p>
                <div class="mt-4 pt-4 border-t border-slate-200/80 flex justify-between items-center text-xs">
                    <span class="text-slate-500 font-medium">Avg Resolution: <strong>72 Hours</strong></span>
                    <a href="#file-complaint" onclick="preselectCategory('Building & Encroachment')" class="text-blue-700 font-bold hover:underline flex items-center gap-1">Report <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive File Complaint Section -->
<section id="file-complaint" class="py-20 bg-slate-100 scroll-mt-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-blue-950 via-slate-900 to-indigo-950 rounded-t-3xl p-6 sm:p-10 text-white text-center sm:text-left relative overflow-hidden">
            <div class="relative z-10 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/20 text-amber-300 text-xs font-semibold mb-3 border border-amber-500/30">
                        <i data-lucide="edit-3" class="w-3.5 h-3.5"></i> Official Submission Form
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Register Public Grievance</h2>
                    <p class="text-slate-300 text-xs sm:text-sm mt-1">Fill out the fields below. A unique tracking ID will be generated instantly.</p>
                </div>
                <div class="hidden sm:block text-right">
                    <span class="text-xs text-slate-400 block font-medium">Guaranteed SLA Response</span>
                    <span class="text-sm font-extrabold text-amber-400">Within 24 - 48 Hours</span>
                </div>
            </div>
        </div>

        <!-- Form Body Card -->
        <div class="bg-white rounded-b-3xl p-6 sm:p-10 shadow-xl border-x border-b border-slate-200">
            <form id="complaintForm" onsubmit="submitComplaintForm(event)" class="space-y-8">
                
                <!-- Section 1: Complaint Details -->
                <div class="space-y-4">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-blue-900 flex items-center gap-2 border-b border-slate-100 pb-2">
                        <span class="w-5 h-5 rounded-full bg-blue-900 text-white flex items-center justify-center text-[10px]">1</span>
                        Issue Category & Urgency
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Department / Category <span class="text-red-500">*</span></label>
                            <select id="complaintCategory" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm font-medium focus:ring-2 focus:ring-blue-600 focus:border-blue-600 bg-slate-50">
                                <option value="">-- Select Service Department --</option>
                                <option value="Roads & Potholes">Roads & Potholes Maintenance</option>
                                <option value="Sanitation & Garbage">Sanitation & Solid Waste Management</option>
                                <option value="Street Lighting & Power">Street Lighting & Power Supply</option>
                                <option value="Water Leakage & Drainage">Water Supply & Sewage Pipeline</option>
                                <option value="Public Safety & Traffic">Public Safety & Traffic Signal Repair</option>
                                <option value="Building & Encroachment">Unauthorized Encroachment & Building</option>
                                <option value="Public Health & Parks">Public Health & Park Maintenance</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Urgency Level <span class="text-red-500">*</span></label>
                            <select id="urgencyLevel" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm font-medium focus:ring-2 focus:ring-blue-600 focus:border-blue-600 bg-slate-50">
                                <option value="Standard">Normal Priority (Standard 48h SLA)</option>
                                <option value="Medium">Medium Priority (Within 24h SLA)</option>
                                <option value="High">High Priority (Urgent Safety Risk)</option>
                                <option value="Critical">Critical Hazard (Immediate Dispatch Required)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Grievance Subject / Short Title <span class="text-red-500">*</span></label>
                        <input type="text" id="complaintTitle" required placeholder="e.g. Deep pothole causing accidents near Sector 4 Main Market" 
                               class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Detailed Description of Problem <span class="text-red-500">*</span></label>
                        <textarea id="complaintDescription" rows="4" required placeholder="Please provide specific details including exact location description, duration of problem, and any safety hazards..." 
                                  class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600"></textarea>
                    </div>
                </div>

                <!-- Section 2: Location & Citizen Contact -->
                <div class="space-y-4">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-blue-900 flex items-center gap-2 border-b border-slate-100 pb-2">
                        <span class="w-5 h-5 rounded-full bg-blue-900 text-white flex items-center justify-center text-[10px]">2</span>
                        Location & Complainant Verification
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Ward Number / Zone <span class="text-red-500">*</span></label>
                            <select id="wardZone" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm font-medium focus:ring-2 focus:ring-blue-600 focus:border-blue-600 bg-slate-50">
                                <option value="">-- Select Municipal Ward --</option>
                                <option value="Ward 1 (North District)">Ward 1 (North District)</option>
                                <option value="Ward 4 (Central Market)">Ward 4 (Central Market)</option>
                                <option value="Ward 8 (East Residential)">Ward 8 (East Residential)</option>
                                <option value="Ward 12 (South Industrial)">Ward 12 (South Industrial)</option>
                                <option value="Ward 15 (West Tech Hub)">Ward 15 (West Tech Hub)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Street Address / Landmark <span class="text-red-500">*</span></label>
                            <input type="text" id="streetAddress" required placeholder="e.g. Opposite State Bank, Ring Road Sector 7" 
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="citizenName" required placeholder="Your full name" 
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Mobile Number (SMS Updates) <span class="text-red-500">*</span></label>
                            <input type="tel" id="citizenMobile" required placeholder="10-digit mobile number" pattern="[0-9]{10}"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Email Address</label>
                            <input type="email" id="citizenEmail" placeholder="name@example.com" 
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        </div>
                    </div>
                </div>

                <!-- Section 3: Attachment simulation -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Photo / Supporting Evidence (Optional)</label>
                    <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center hover:border-blue-500 transition-colors bg-slate-50">
                        <i data-lucide="upload-cloud" class="w-8 h-8 text-slate-400 mx-auto mb-2"></i>
                        <p class="text-xs font-semibold text-slate-700">Click to upload photo of defect (PNG, JPG, max 5MB)</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Geotagged photos speed up resolution time by 40%</p>
                        <input type="file" class="hidden" id="photoUpload">
                    </div>
                </div>

                <!-- Submit Action Button -->
                <div class="pt-4 border-t border-slate-100">
                    <button type="submit" class="w-full py-4 px-6 rounded-xl bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 hover:from-blue-950 hover:to-indigo-950 text-white font-extrabold text-base shadow-xl shadow-blue-900/20 transition-all flex items-center justify-center gap-2">
                        <i data-lucide="send" class="w-5 h-5"></i> Submit Official Complaint
                    </button>
                    <p class="text-[11px] text-slate-500 text-center mt-3">
                        By submitting, you declare that the information provided is accurate to the best of your knowledge. False reporting is punishable under the Public Demarcation Act.
                    </p>
                </div>
            </form>

            <!-- Success Card Generated via JS -->
            <div id="submissionSuccessCard" class="hidden p-8 rounded-2xl bg-emerald-50 border-2 border-emerald-300 text-center space-y-6">
                <div class="w-16 h-16 rounded-full bg-emerald-600 text-white flex items-center justify-center mx-auto shadow-lg shadow-emerald-600/30 animate-bounce">
                    <i data-lucide="check-circle-2" class="w-10 h-10"></i>
                </div>
                <div>
                    <span class="px-3 py-1 rounded-full bg-emerald-200 text-emerald-900 font-extrabold text-xs uppercase tracking-wider">Complaint Registered Successfully</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-2">Grievance Ticket Created</h3>
                    <p class="text-xs text-slate-600 mt-1">An SMS notification has been dispatched to your mobile number.</p>
                </div>

                <div class="bg-white p-6 rounded-xl border border-emerald-200 text-left max-w-md mx-auto space-y-3 font-mono">
                    <div class="flex justify-between border-b border-slate-100 pb-2">
                        <span class="text-xs text-slate-500">Ticket ID:</span>
                        <span id="resTicketId" class="text-sm font-black text-blue-900">GOV-2026-98124</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-2">
                        <span class="text-xs text-slate-500">Category:</span>
                        <span id="resCategory" class="text-xs font-bold text-slate-800">Roads & Potholes</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-2">
                        <span class="text-xs text-slate-500">Assigned Dept:</span>
                        <span class="text-xs font-bold text-slate-800">Public Works Division</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Target SLA:</span>
                        <span class="text-xs font-bold text-emerald-700">Within 24 Hours</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-3">
                    <button onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-slate-900 text-white font-bold text-xs flex items-center justify-center gap-2">
                        <i data-lucide="printer" class="w-4 h-4"></i> Print Receipt
                    </button>
                    <button onclick="resetForm()" class="px-5 py-2.5 rounded-xl bg-white border border-slate-300 text-slate-700 font-bold text-xs hover:bg-slate-50">
                        Submit Another Complaint
                    </button>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Live Complaint Transparency Feed -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-wider text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full">
                    Public Audit & Transparency
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2">Live Grievance Activity Log</h2>
                <p class="text-slate-600 text-xs sm:text-sm mt-1">Real-time status updates of publicly submitted grievances across municipal wards.</p>
            </div>
            
            <div class="flex items-center space-x-2 bg-slate-100 p-1.5 rounded-xl border border-slate-200 text-xs font-semibold">
                <button onclick="filterFeed('all')" class="feed-btn px-3 py-1.5 rounded-lg bg-white shadow-xs text-blue-900 font-bold">All</button>
                <button onclick="filterFeed('resolved')" class="feed-btn px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900">Resolved</button>
                <button onclick="filterFeed('in-progress')" class="feed-btn px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900">In Progress</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="feedContainer">
            <!-- Feed Item 1 -->
            <div class="feed-item resolved bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-xs">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[11px] font-mono font-bold text-slate-500">#GOV-2026-8812</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                        <i data-lucide="check-circle" class="w-3 h-3 mr-1"></i> Resolved
                    </span>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Broken Streetlight near Ward 4 Bus Stop</h4>
                <p class="text-xs text-slate-600 mt-1">Electrical unit replaced LED fixture within 14 hours of registration.</p>
                <div class="mt-4 pt-3 border-t border-slate-200 text-[11px] text-slate-500 flex justify-between">
                    <span>Ward 4 (Central Market)</span>
                    <span>2 hours ago</span>
                </div>
            </div>

            <!-- Feed Item 2 -->
            <div class="feed-item in-progress bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-xs">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[11px] font-mono font-bold text-slate-500">#GOV-2026-8845</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800">
                        <i data-lucide="clock" class="w-3 h-3 mr-1"></i> In Progress
                    </span>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Water Pipe Burst on Sector 9 Ring Road</h4>
                <p class="text-xs text-slate-600 mt-1">Engineers on-site repairing 12-inch main supply pipeline.</p>
                <div class="mt-4 pt-3 border-t border-slate-200 text-[11px] text-slate-500 flex justify-between">
                    <span>Ward 15 (West Tech Hub)</span>
                    <span>4 hours ago</span>
                </div>
            </div>

            <!-- Feed Item 3 -->
            <div class="feed-item resolved bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-xs">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[11px] font-mono font-bold text-slate-500">#GOV-2026-8799</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                        <i data-lucide="check-circle" class="w-3 h-3 mr-1"></i> Resolved
                    </span>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Overflowing Community Dumpster Cleanup</h4>
                <p class="text-xs text-slate-600 mt-1">Sanitation crew dispatched with compactor truck; area disinfected.</p>
                <div class="mt-4 pt-3 border-t border-slate-200 text-[11px] text-slate-500 flex justify-between">
                    <span>Ward 8 (East Residential)</span>
                    <span>5 hours ago</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3-Step Process -->
<section class="py-16 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold">How Complaint Resolution Works</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">Transparent tracking from submission to field verification.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-800/60 p-8 rounded-2xl border border-slate-700 text-center relative">
                <div class="w-12 h-12 rounded-full bg-blue-600 text-white font-black text-lg flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-600/30">1</div>
                <h3 class="font-bold text-lg mb-2">1. Submit Details</h3>
                <p class="text-xs text-slate-300 leading-relaxed">Fill out the grievance form with location details and optional geotagged photos.</p>
            </div>

            <div class="bg-slate-800/60 p-8 rounded-2xl border border-slate-700 text-center relative">
                <div class="w-12 h-12 rounded-full bg-amber-500 text-slate-950 font-black text-lg flex items-center justify-center mx-auto mb-4 shadow-lg shadow-amber-500/30">2</div>
                <h3 class="font-bold text-lg mb-2">2. Auto Field Assignment</h3>
                <p class="text-xs text-slate-300 leading-relaxed">System instantly assigns the ticket to the designated ward officer with SLA countdown.</p>
            </div>

            <div class="bg-slate-800/60 p-8 rounded-2xl border border-slate-700 text-center relative">
                <div class="w-12 h-12 rounded-full bg-emerald-500 text-white font-black text-lg flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-500/30">3</div>
                <h3 class="font-bold text-lg mb-2">3. Resolution & Closure</h3>
                <p class="text-xs text-slate-300 leading-relaxed">Field officer uploads resolution proof and an OTP confirmation is sent to your mobile.</p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function preselectCategory(catName) {
        const select = document.getElementById('complaintCategory');
        if (select) {
            for (let i = 0; i < select.options.length; i++) {
                if (select.options[i].text.includes(catName) || select.options[i].value === catName) {
                    select.selectedIndex = i;
                    break;
                }
            }
        }
    }

    function handleHeroSearch(e) {
        e.preventDefault();
        const ticket = document.getElementById('heroTicketInput').value.trim();
        const output = document.getElementById('heroTrackOutput');
        if (!output) return;

        output.classList.remove('hidden');
        output.innerHTML = `
            <div class="flex items-center justify-between text-xs mb-2">
                <span class="font-bold text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">ACTIVE SLA</span>
                <span class="text-slate-400 font-mono">ID: ${ticket.toUpperCase()}</span>
            </div>
            <p class="text-sm font-bold text-white mb-1">Status: Assigned to Field Inspection Team</p>
            <p class="text-xs text-slate-400">Location: Ward 4 (Central Market Area)</p>
            <div class="mt-3 pt-2 border-t border-slate-800 flex justify-between text-[11px] text-slate-400">
                <span>Assigned: 2 hours ago</span>
                <span class="text-amber-400 font-bold">Estimated Fix: Today 18:00</span>
            </div>
        `;
    }

    function submitComplaintForm(e) {
        e.preventDefault();
        const cat = document.getElementById('complaintCategory').value;
        const randomId = 'GOV-2026-' + Math.floor(10000 + Math.random() * 90000);

        document.getElementById('complaintForm').classList.add('hidden');
        const successCard = document.getElementById('submissionSuccessCard');
        successCard.classList.remove('hidden');

        document.getElementById('resTicketId').innerText = randomId;
        document.getElementById('resCategory').innerText = cat;
        window.scrollTo({ top: document.getElementById('file-complaint').offsetTop - 80, behavior: 'smooth' });
    }

    function resetForm() {
        document.getElementById('complaintForm').reset();
        document.getElementById('complaintForm').classList.remove('hidden');
        document.getElementById('submissionSuccessCard').classList.add('hidden');
    }

    function filterFeed(type) {
        const items = document.querySelectorAll('.feed-item');
        items.forEach(item => {
            if (type === 'all') {
                item.style.display = 'block';
            } else if (item.classList.contains(type)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>
@endpush
