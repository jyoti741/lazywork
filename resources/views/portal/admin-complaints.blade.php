@extends('layouts.portal')

@section('content')

<!-- Admin Passcode Gate (Shown when not authenticated) -->
<div id="adminAuthGate" class="min-h-[70vh] flex items-center justify-center py-16 bg-slate-900 px-4">
    <div class="max-w-md w-full bg-slate-950 rounded-3xl p-8 border border-slate-800 shadow-2xl text-center relative overflow-hidden">
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl"></div>
        
        <div class="w-16 h-16 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-amber-400 flex items-center justify-center mx-auto mb-5 shadow-lg shadow-amber-500/10">
            <i data-lucide="lock" class="w-8 h-8"></i>
        </div>

        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/20 text-amber-300 text-xs font-bold border border-amber-500/30 mb-3">
            <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> Restricted Municipal Access
        </span>

        <h2 class="text-2xl font-black text-white">Admin Officer Verification</h2>
        <p class="text-xs text-slate-400 mt-1">Please enter the Nodal Officer security passcode to access complaint management.</p>

        <form onsubmit="handleAdminLogin(event)" class="mt-6 space-y-4 text-left">
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Admin Passcode</label>
                <div class="relative">
                    <input type="password" id="adminPasscodeInput" required placeholder="Enter Passcode" autofocus
                           class="w-full px-4 py-3.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/30 text-center font-mono text-lg tracking-widest">
                    <span class="absolute right-3 top-3.5 text-slate-500">
                        <i data-lucide="key" class="w-5 h-5"></i>
                    </span>
                </div>
                <div id="authErrorMessage" class="hidden mt-2 text-xs font-bold text-red-400 text-center flex items-center justify-center gap-1">
                    <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Invalid Admin Passcode. Please try again.
                </div>
            </div>

            <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-black text-sm shadow-lg shadow-amber-500/20 transition-all flex items-center justify-center gap-2">
                <i data-lucide="unlock" class="w-4 h-4"></i> Unlock Admin Dashboard
            </button>
        </form>

        <div class="mt-6 pt-4 border-t border-slate-900 text-center">
            <span class="text-[11px] text-slate-500">Authorized Personnel Only • IP Logged</span>
        </div>
    </div>
</div>

<!-- Admin Dashboard Content (Hidden until authenticated) -->
<div id="adminDashboardContent" class="hidden">
    
    <!-- Header Banner -->
    <section class="bg-gradient-to-r from-slate-950 via-slate-900 to-blue-950 text-white py-12 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/20 text-amber-300 text-xs font-bold border border-amber-500/30 mb-3">
                        <i data-lucide="shield-check" class="w-3.5 h-3.5 text-amber-400"></i>
                        Official Nodal Officer Administration Desk
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Municipal Complaint Management Panel</h1>
                    <p class="text-slate-300 text-sm mt-1">
                        Central officer dashboard for reviewing public grievances, assigning field engineers, tracking SLA deadlines, and approving resolutions.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <button onclick="exportReport()" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs border border-slate-700 flex items-center gap-2">
                        <i data-lucide="download" class="w-4 h-4 text-slate-400"></i> Export Report (CSV)
                    </button>
                    <button onclick="adminLogout()" class="px-4 py-2.5 rounded-xl bg-red-950/80 hover:bg-red-900 text-red-300 font-bold text-xs border border-red-800 flex items-center gap-2">
                        <i data-lucide="log-out" class="w-4 h-4 text-red-400"></i> Lock Session
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- KPI Metrics Grid Section -->
    <section class="py-8 bg-slate-100 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                
                <!-- Metric 1 -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Total Received</span>
                        <span class="text-2xl font-black text-slate-900 mt-1 block">142</span>
                        <span class="text-[10px] text-slate-400 font-medium">+14 new today</span>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-800 flex items-center justify-center font-bold">
                        <i data-lucide="inbox" class="w-5 h-5"></i>
                    </div>
                </div>

                <!-- Metric 2 -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-700 block">Pending Review</span>
                        <span class="text-2xl font-black text-amber-600 mt-1 block" id="kpiPending">18</span>
                        <span class="text-[10px] text-amber-700 font-medium">Needs assignment</span>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                    </div>
                </div>

                <!-- Metric 3 -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-700 block">Active In Field</span>
                        <span class="text-2xl font-black text-blue-700 mt-1 block" id="kpiField">34</span>
                        <span class="text-[10px] text-blue-600 font-medium">Field teams working</span>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold">
                        <i data-lucide="wrench" class="w-5 h-5"></i>
                    </div>
                </div>

                <!-- Metric 4 -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 block">Resolved Today</span>
                        <span class="text-2xl font-black text-emerald-600 mt-1 block" id="kpiResolved">86</span>
                        <span class="text-[10px] text-emerald-600 font-medium">98.2% SLA compliance</span>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                        <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                    </div>
                </div>

                <!-- Metric 5 -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-red-700 block">SLA Overdue</span>
                        <span class="text-2xl font-black text-red-600 mt-1 block">4</span>
                        <span class="text-[10px] text-red-600 font-bold">Requires escalation</span>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-red-50 text-red-700 flex items-center justify-center font-bold">
                        <i data-lucide="alert-triangle" class="w-5 h-5"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Admin Management Table Section -->
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Controls & Search Bar -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs mb-6 space-y-4">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    
                    <!-- Search Input -->
                    <div class="w-full md:w-96 relative">
                        <input type="text" id="adminSearch" oninput="filterAdminTable()" placeholder="Search Ticket ID, Complainant, Ward or Officer..." 
                               class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600">
                        <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-3"></i>
                    </div>

                    <!-- Department Filter Dropdown -->
                    <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
                        <select id="adminDeptFilter" onchange="filterAdminTable()" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold bg-slate-50">
                            <option value="all">All Departments</option>
                            <option value="Roads & Potholes">Roads & Potholes (PWD)</option>
                            <option value="Sanitation & Garbage">Sanitation & Waste</option>
                            <option value="Street Lighting & Power">Electrical Board</option>
                            <option value="Water Leakage & Drainage">Water & Sewage</option>
                            <option value="Public Safety & Traffic">Public Safety</option>
                        </select>

                        <select id="adminStatusFilter" onchange="filterAdminTable()" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold bg-slate-50">
                            <option value="all">All Statuses</option>
                            <option value="Pending Review">Pending Review</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Escalated">Escalated</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Complaints Admin Data Table -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-700">
                        <thead class="bg-slate-900 text-slate-200 uppercase font-extrabold text-[11px] tracking-wider">
                            <tr>
                                <th class="py-4 px-6">Ticket ID & Urgency</th>
                                <th class="py-4 px-6">Grievance Title & Ward</th>
                                <th class="py-4 px-6">Complainant Contact</th>
                                <th class="py-4 px-6">Assigned Nodal Officer</th>
                                <th class="py-4 px-6">SLA Status</th>
                                <th class="py-4 px-6 text-center">Status Action</th>
                                <th class="py-4 px-6 text-right">Admin Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium" id="adminTableBody">
                            
                            <!-- Row 1 -->
                            <tr class="admin-row hover:bg-slate-50 transition-colors" data-ticket="GOV-2026-98412" data-dept="Roads & Potholes" data-status="In Progress">
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-mono font-bold text-blue-900">#GOV-2026-98412</div>
                                    <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-extrabold bg-red-100 text-red-800">
                                        High Priority
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900 text-sm">Deep Pothole Hazard</div>
                                    <div class="text-[11px] text-slate-500">Ward 4 (Central Market) • Roads & Potholes</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-bold text-slate-800">Rajesh Kumar</div>
                                    <div class="text-[11px] text-slate-500">Ph: 98765-43210</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-bold text-slate-800">Er. Suresh Kumar</div>
                                    <div class="text-[11px] text-slate-500">PWD Division 2</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="inline-flex items-center text-xs font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">
                                        <i data-lucide="clock" class="w-3 h-3 mr-1"></i> Today 18:00
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center whitespace-nowrap">
                                    <select onchange="updateRowStatus(this, 'GOV-2026-98412')" class="px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 font-bold text-xs">
                                        <option value="In Progress" selected>In Progress</option>
                                        <option value="Pending Review">Pending Review</option>
                                        <option value="Resolved">Resolved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <button onclick="openAdminManageModal('GOV-2026-98412', 'Deep Pothole Hazard', 'Ward 4', 'Er. Suresh Kumar')" 
                                            class="px-3 py-1.5 rounded-lg bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs flex items-center gap-1 ml-auto">
                                        <i data-lucide="settings" class="w-3.5 h-3.5"></i> Manage
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="admin-row hover:bg-slate-50 transition-colors" data-ticket="GOV-2026-98901" data-dept="Sanitation & Garbage" data-status="Pending Review">
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-mono font-bold text-blue-900">#GOV-2026-98901</div>
                                    <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-extrabold bg-amber-100 text-amber-800">
                                        Medium Priority
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900 text-sm">Uncollected Waste Dump</div>
                                    <div class="text-[11px] text-slate-500">Ward 8 (East Residential) • Sanitation</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-bold text-slate-800">Vikram Malhotra</div>
                                    <div class="text-[11px] text-slate-500">Ph: 98112-99001</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="text-red-600 font-bold">Unassigned</div>
                                    <div class="text-[11px] text-slate-400">Sanitation Cell</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="inline-flex items-center text-xs font-bold text-slate-700 bg-slate-100 px-2.5 py-1 rounded-lg">
                                        24h SLA Remaining
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center whitespace-nowrap">
                                    <select onchange="updateRowStatus(this, 'GOV-2026-98901')" class="px-3 py-1.5 rounded-lg border border-slate-300 bg-slate-100 text-slate-800 font-bold text-xs">
                                        <option value="Pending Review" selected>Pending Review</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Resolved">Resolved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <button onclick="openAdminManageModal('GOV-2026-98901', 'Uncollected Waste Dump', 'Ward 8', 'Unassigned')" 
                                            class="px-3 py-1.5 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs flex items-center gap-1 ml-auto">
                                        <i data-lucide="user-plus" class="w-3.5 h-3.5"></i> Assign Officer
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="admin-row hover:bg-slate-50 transition-colors" data-ticket="GOV-2026-98330" data-dept="Water Leakage & Drainage" data-status="In Progress">
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-mono font-bold text-blue-900">#GOV-2026-98330</div>
                                    <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-extrabold bg-red-600 text-white">
                                        CRITICAL HAZARD
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900 text-sm">Major Water Feeder Pipe Burst</div>
                                    <div class="text-[11px] text-slate-500">Ward 12 (South Industrial) • Water Supply</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-bold text-slate-800">Sunil Patel</div>
                                    <div class="text-[11px] text-slate-500">Ph: 97110-44112</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-bold text-slate-800">Hydro Repair Team 4</div>
                                    <div class="text-[11px] text-slate-500">Water Board Division</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="inline-flex items-center text-xs font-bold text-red-700 bg-red-50 px-2.5 py-1 rounded-lg border border-red-200">
                                        <i data-lucide="alert-circle" class="w-3 h-3 mr-1"></i> Immediate 6h
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center whitespace-nowrap">
                                    <select onchange="updateRowStatus(this, 'GOV-2026-98330')" class="px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 font-bold text-xs">
                                        <option value="In Progress" selected>In Progress</option>
                                        <option value="Pending Review">Pending Review</option>
                                        <option value="Resolved">Resolved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <button onclick="openAdminManageModal('GOV-2026-98330', 'Major Water Pipe Burst', 'Ward 12', 'Hydro Repair Team 4')" 
                                            class="px-3 py-1.5 rounded-lg bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs flex items-center gap-1 ml-auto">
                                        <i data-lucide="settings" class="w-3.5 h-3.5"></i> Manage
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr class="admin-row hover:bg-slate-50 transition-colors" data-ticket="GOV-2026-97810" data-dept="Street Lighting & Power" data-status="Resolved">
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-mono font-bold text-blue-900">#GOV-2026-97810</div>
                                    <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-extrabold bg-emerald-100 text-emerald-800">
                                        Standard
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900 text-sm">Flickering Streetlight Repair</div>
                                    <div class="text-[11px] text-slate-500">Ward 15 (West Tech Hub) • Electrical Board</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-bold text-slate-800">Anita Sharma</div>
                                    <div class="text-[11px] text-slate-500">Ph: 98100-22334</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="font-bold text-slate-800">Electrical Crew B</div>
                                    <div class="text-[11px] text-slate-500">Power Distribution</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="inline-flex items-center text-xs font-bold text-emerald-800 bg-emerald-100 px-2.5 py-1 rounded-lg">
                                        Completed in 14h
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center whitespace-nowrap">
                                    <select onchange="updateRowStatus(this, 'GOV-2026-97810')" class="px-3 py-1.5 rounded-lg border border-emerald-300 bg-emerald-50 text-emerald-900 font-bold text-xs">
                                        <option value="Resolved" selected>Resolved</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Pending Review">Pending Review</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <button onclick="openAdminManageModal('GOV-2026-97810', 'Flickering Streetlight', 'Ward 15', 'Electrical Crew B')" 
                                            class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-900 text-white font-bold text-xs flex items-center gap-1 ml-auto">
                                        <i data-lucide="eye" class="w-3.5 h-3.5"></i> Review Log
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</div>

<!-- Admin Manage & Dispatch Modal -->
<div id="adminManageModal" class="fixed inset-0 z-50 bg-slate-900/75 backdrop-blur-xs hidden flex items-center justify-center p-4 overflow-y-auto" onclick="toggleModal('adminManageModal')">
    <div class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 relative my-8" onclick="event.stopPropagation()">
        
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold">
                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-slate-900">Admin Action Desk</h3>
                    <p class="text-xs text-slate-500" id="admModalTicket">Ticket ID: GOV-2026-98412</p>
                </div>
            </div>
            <button onclick="toggleModal('adminManageModal')" class="text-slate-400 hover:text-slate-600 p-1">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form onsubmit="saveAdminAction(event)" class="mt-6 space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Grievance Summary</label>
                <input type="text" id="admModalTitle" readonly class="w-full px-4 py-2.5 rounded-xl bg-slate-100 border border-slate-200 text-xs font-bold text-slate-800">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Assign Nodal Officer / Department</label>
                    <select id="admModalOfficer" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold bg-slate-50">
                        <option value="Er. Suresh Kumar (PWD)">Er. Suresh Kumar (PWD Div 2)</option>
                        <option value="Sanitation Inspector Roy">Sanitation Inspector Roy</option>
                        <option value="Electrical Repair Crew B">Electrical Repair Crew B</option>
                        <option value="Hydro Repair Team 4">Hydro Repair Team 4</option>
                        <option value="Traffic Signal Cell">Traffic Signal Cell</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Update Status State</label>
                    <select id="admModalStatus" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-800 bg-amber-50">
                        <option value="Pending Review">Pending Review</option>
                        <option value="In Progress" selected>In Progress / Dispatched</option>
                        <option value="Resolved">Resolved & OTP Dispatched</option>
                        <option value="Rejected">Rejected (Out of Municipal Scope)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Official Nodal Inspection Note</label>
                <textarea rows="3" placeholder="Enter official progress notes or instructions for field crew..." 
                          class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600"></textarea>
            </div>

            <div class="pt-2 border-t border-slate-100 flex justify-end gap-3">
                <button type="button" onclick="toggleModal('adminManageModal')" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-950 text-white font-bold text-xs shadow-md">
                    Save Changes & Update Portal
                </button>
            </div>
        </form>

    </div>
</div>

@endsection

@push('scripts')
<script>
    const ADMIN_PASSCODE = '1234';

    // Check session authentication on load
    document.addEventListener('DOMContentLoaded', () => {
        if (sessionStorage.getItem('admin_authenticated') === 'true') {
            showDashboard();
        }
    });

    function handleAdminLogin(e) {
        e.preventDefault();
        const input = document.getElementById('adminPasscodeInput').value.trim();
        const errMsg = document.getElementById('authErrorMessage');

        if (input === ADMIN_PASSCODE) {
            sessionStorage.setItem('admin_authenticated', 'true');
            if (errMsg) errMsg.classList.add('hidden');
            showDashboard();
        } else {
            if (errMsg) errMsg.classList.remove('hidden');
            document.getElementById('adminPasscodeInput').value = '';
            document.getElementById('adminPasscodeInput').focus();
        }
    }

    function showDashboard() {
        document.getElementById('adminAuthGate').classList.add('hidden');
        document.getElementById('adminDashboardContent').classList.remove('hidden');
    }

    function adminLogout() {
        sessionStorage.removeItem('admin_authenticated');
        document.getElementById('adminDashboardContent').classList.add('hidden');
        document.getElementById('adminAuthGate').classList.remove('hidden');
        document.getElementById('adminPasscodeInput').value = '';
    }

    function filterAdminTable() {
        const query = document.getElementById('adminSearch').value.toLowerCase().trim();
        const dept = document.getElementById('adminDeptFilter').value;
        const status = document.getElementById('adminStatusFilter').value;

        const rows = document.querySelectorAll('.admin-row');

        rows.forEach(row => {
            const rTicket = row.getAttribute('data-ticket').toLowerCase();
            const rDept = row.getAttribute('data-dept');
            const rStatus = row.getAttribute('data-status');
            const textContent = row.innerText.toLowerCase();

            const matchesDept = (dept === 'all' || rDept === dept);
            const matchesStatus = (status === 'all' || rStatus === status);
            const matchesQuery = (query === '' || rTicket.includes(query) || textContent.includes(query));

            if (matchesDept && matchesStatus && matchesQuery) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function updateRowStatus(selectElem, ticketId) {
        const newStatus = selectElem.value;
        const row = selectElem.closest('tr');
        if (row) {
            row.setAttribute('data-status', newStatus);
            if (newStatus === 'Resolved') {
                selectElem.className = "px-3 py-1.5 rounded-lg border border-emerald-300 bg-emerald-50 text-emerald-900 font-bold text-xs";
            } else if (newStatus === 'In Progress') {
                selectElem.className = "px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 font-bold text-xs";
            } else {
                selectElem.className = "px-3 py-1.5 rounded-lg border border-slate-300 bg-slate-100 text-slate-800 font-bold text-xs";
            }
        }
    }

    function openAdminManageModal(ticketId, title, ward, officer) {
        document.getElementById('admModalTicket').innerText = 'Ticket ID: ' + ticketId;
        document.getElementById('admModalTitle').value = title + ' (' + ward + ')';
        toggleModal('adminManageModal');
    }

    function saveAdminAction(e) {
        e.preventDefault();
        alert('Admin Action Saved! Nodal assignment updated and live status refreshed.');
        toggleModal('adminManageModal');
    }

    function exportReport() {
        alert('Exporting Municipal Grievance Report (CSV format). Download initiated.');
    }
</script>
@endpush
