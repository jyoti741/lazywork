@extends('layouts.portal')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-slate-900 via-red-950 to-slate-900 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/20 text-red-400 text-xs font-bold border border-red-500/30 mb-3">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse-fast"></span>
                    24/7 Rapid Response & Emergency Services
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Emergency Hotlines & Public Services</h1>
                <p class="text-slate-300 text-sm sm:text-base mt-2 max-w-2xl">
                    Immediate emergency dispatch numbers, civic hotline desk directory, and specialized municipal service requests for all citizens.
                </p>
            </div>

            <div class="bg-red-950/80 p-4 rounded-2xl border border-red-800/80 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-red-600 text-white flex items-center justify-center font-bold text-xl shadow-lg shadow-red-600/30">
                    <i data-lucide="phone-call" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="text-[10px] text-red-300 uppercase font-extrabold tracking-wider">Central Emergency Toll-Free</span>
                    <div class="text-2xl font-black text-white">112 / 100</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Hotlines Grid Section -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-extrabold uppercase tracking-wider px-3 py-1 rounded-full bg-red-100 text-red-800">
                1-Click Dial Directory
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2">National & State Emergency Hotlines</h2>
            <p class="text-slate-600 text-xs sm:text-sm mt-1">Tap any call button to directly connect with emergency dispatch control rooms.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Police -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-red-500/10 rounded-bl-full"></div>
                <div class="w-12 h-12 rounded-xl bg-red-100 text-red-700 flex items-center justify-center mb-4">
                    <i data-lucide="shield" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-red-600 bg-red-50 px-2 py-0.5 rounded">Police Control Room</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">100 / 112</h3>
                <p class="text-xs text-slate-500 mt-2">Crime reporting, public distress, accident emergency, and immediate law enforcement dispatch.</p>
                <a href="tel:100" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-md shadow-red-600/20">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Police Control
                </a>
            </div>

            <!-- Fire Brigade -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mb-4">
                    <i data-lucide="flame" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-amber-700 bg-amber-50 px-2 py-0.5 rounded">Fire & Rescue Service</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">101</h3>
                <p class="text-xs text-slate-500 mt-2">Fire outbreaks, building collapse, hazardous gas leaks, and trapped individual rescue operations.</p>
                <a href="tel:101" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-md shadow-amber-600/20">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Fire Dept
                </a>
            </div>

            <!-- Ambulance -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-4">
                    <i data-lucide="ambulance" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Medical Ambulance</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">102 / 108</h3>
                <p class="text-xs text-slate-500 mt-2">Critical medical emergencies, trauma transport, maternal care ambulance, and hospital routing.</p>
                <a href="tel:102" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-md shadow-emerald-600/20">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Medical Unit
                </a>
            </div>

            <!-- Disaster Management -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-4">
                    <i data-lucide="waves" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-blue-700 bg-blue-50 px-2 py-0.5 rounded">Disaster Response Cell</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">1070 / 1077</h3>
                <p class="text-xs text-slate-500 mt-2">Flooding, storm damage, earthquake relief, cyclone alert, and community shelter assistance.</p>
                <a href="tel:1070" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-md shadow-blue-700/20">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Disaster Cell
                </a>
            </div>

            <!-- Women Helpline -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-pink-100 text-pink-700 flex items-center justify-center mb-4">
                    <i data-lucide="user-check" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-pink-700 bg-pink-50 px-2 py-0.5 rounded">Women Safety Helpline</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">1091</h3>
                <p class="text-xs text-slate-500 mt-2">Confidential distress support, harassment intervention, and legal guidance for women safety.</p>
                <a href="tel:1091" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-pink-600 hover:bg-pink-700 text-white font-bold text-xs flex items-center justify-center gap-2">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Women Helpline
                </a>
            </div>

            <!-- Cyber Crime -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center mb-4">
                    <i data-lucide="lock" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded">National Cyber Fraud</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">1930</h3>
                <p class="text-xs text-slate-500 mt-2">Financial cyber fraud reporting, unauthorized bank deductions, identity theft, and online harassment.</p>
                <a href="tel:1930" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-indigo-700 hover:bg-indigo-800 text-white font-bold text-xs flex items-center justify-center gap-2">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Cyber Desk
                </a>
            </div>

            <!-- Child Helpline -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center mb-4">
                    <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-purple-700 bg-purple-50 px-2 py-0.5 rounded">Child Protection Desk</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">1098</h3>
                <p class="text-xs text-slate-500 mt-2">24x7 free emergency phone service for children in need of care, protection, and rescue.</p>
                <a href="tel:1098" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-purple-700 hover:bg-purple-800 text-white font-bold text-xs flex items-center justify-center gap-2">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Child Helpline
                </a>
            </div>

            <!-- Senior Citizen Helpline -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center mb-4">
                    <i data-lucide="heart-pulse" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-teal-700 bg-teal-50 px-2 py-0.5 rounded">Senior Citizen Assistance</span>
                <h3 class="text-2xl font-black text-slate-900 mt-1">14567</h3>
                <p class="text-xs text-slate-500 mt-2">Elder abuse reporting, medical aid coordination, legal counsel, and pension assistance desk.</p>
                <a href="tel:14567" class="mt-4 w-full py-2.5 px-4 rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-xs flex items-center justify-center gap-2">
                    <i data-lucide="phone" class="w-4 h-4"></i> Call Elder Helpline
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Interactive SOS Dispatch Request -->
<section class="py-16 bg-white border-y border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-red-950 via-slate-900 to-red-950 p-8 sm:p-12 rounded-3xl text-white shadow-2xl relative overflow-hidden border border-red-900/50">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-3 h-3 bg-red-500 rounded-full animate-ping"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-red-400">Rapid Assistance Request</span>
            </div>

            <h3 class="text-2xl sm:text-3xl font-extrabold">Need Immediate Dispatch Assistance?</h3>
            <p class="text-xs sm:text-sm text-slate-300 mt-2 max-w-xl">
                If you are witnessing a hazardous civic situation (live wire, severe road block, chemical spill), send an instant dispatch alert to the control room.
            </p>

            <form onsubmit="handleSosSubmit(event)" id="sosForm" class="mt-8 space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" id="sosName" required placeholder="Your Name" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    <input type="tel" id="sosPhone" required placeholder="Mobile Number for Callback" pattern="[0-9]{10}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <select id="sosType" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-red-500">
                        <option value="">-- Incident Type --</option>
                        <option value="Live Wire / Electrical Danger">Live Electrical Wire Hanging</option>
                        <option value="Severe Water Pipeline Burst">Major Water Pipeline Burst</option>
                        <option value="Road Block / Tree Fall">Fallen Tree / Road Obstruction</option>
                        <option value="Gas / Chemical Odor Leak">Chemical / Gas Odor Hazard</option>
                    </select>

                    <input type="text" id="sosLocation" required placeholder="Current Location / Landmark" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                </div>

                <button type="submit" class="w-full py-3.5 px-6 rounded-xl bg-red-600 hover:bg-red-700 text-white font-extrabold text-sm shadow-lg shadow-red-600/40 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="radio" class="w-4 h-4"></i> Transmit Dispatch SOS Signal
                </button>
            </form>

            <div id="sosResult" class="hidden mt-6 p-4 rounded-xl bg-red-900/50 border border-red-700 text-center space-y-2">
                <div class="w-10 h-10 rounded-full bg-red-600 text-white flex items-center justify-center mx-auto">
                    <i data-lucide="radio-tower" class="w-5 h-5"></i>
                </div>
                <h4 class="font-bold text-white text-base">Emergency Signal Transmitted</h4>
                <p class="text-xs text-red-200">Ref: <strong class="text-white font-mono">SOS-2026-9912</strong> • Control room team will call your mobile within 3 minutes.</p>
            </div>
        </div>
    </div>
</section>

<!-- Department Directory Section -->
<section id="department-directory" class="py-16 bg-slate-50 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-extrabold uppercase tracking-wider px-3 py-1 rounded-full bg-blue-100 text-blue-800">
                Public Directory
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2">Municipal Departments & Helplines</h2>
            <p class="text-slate-600 text-xs sm:text-sm mt-1">Direct office contact emails, working desk hours, and officer contacts.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Dept 1 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center">
                        <i data-lucide="building" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">Municipal Public Works (PWD)</h4>
                        <span class="text-[11px] text-slate-500">Roads, Bridges & Infrastructure</span>
                    </div>
                </div>
                <div class="space-y-1.5 text-xs text-slate-600 border-t border-slate-100 pt-3">
                    <p class="flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 text-slate-400"></i> Direct: 011-2345-6701</p>
                    <p class="flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i> pwd.complaints@janseva.gov.in</p>
                    <p class="flex items-center gap-2"><i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i> Hours: Mon - Sat (09:00 - 17:30)</p>
                </div>
                <a href="{{ route('home') }}#file-complaint" class="block w-full text-center py-2 rounded-lg bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-xs font-bold text-slate-700">
                    File PWD Grievance
                </a>
            </div>

            <!-- Dept 2 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                        <i data-lucide="trash" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">Solid Waste & Sanitation Board</h4>
                        <span class="text-[11px] text-slate-500">Garbage, Cleaning & Drainage</span>
                    </div>
                </div>
                <div class="space-y-1.5 text-xs text-slate-600 border-t border-slate-100 pt-3">
                    <p class="flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 text-slate-400"></i> Direct: 011-2345-6702</p>
                    <p class="flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i> sanitation@janseva.gov.in</p>
                    <p class="flex items-center gap-2"><i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i> Hours: 24/7 Sanitation Control Room</p>
                </div>
                <a href="{{ route('home') }}#file-complaint" class="block w-full text-center py-2 rounded-lg bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-xs font-bold text-slate-700">
                    File Sanitation Grievance
                </a>
            </div>

            <!-- Dept 3 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center">
                        <i data-lucide="droplet" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">City Water Board & Sewage</h4>
                        <span class="text-[11px] text-slate-500">Water Supply & Pipelines</span>
                    </div>
                </div>
                <div class="space-y-1.5 text-xs text-slate-600 border-t border-slate-100 pt-3">
                    <p class="flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 text-slate-400"></i> Direct: 011-2345-6703</p>
                    <p class="flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i> water.helpdesk@janseva.gov.in</p>
                    <p class="flex items-center gap-2"><i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i> Hours: Mon - Sun (08:00 - 20:00)</p>
                </div>
                <a href="{{ route('home') }}#file-complaint" class="block w-full text-center py-2 rounded-lg bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-xs font-bold text-slate-700">
                    File Water Grievance
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function handleSosSubmit(e) {
        e.preventDefault();
        document.getElementById('sosForm').classList.add('hidden');
        document.getElementById('sosResult').classList.remove('hidden');
    }
</script>
@endpush
