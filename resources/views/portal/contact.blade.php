@extends('layouts.portal')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold border border-blue-500/30 mb-3">
                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-blue-400"></i>
                Official Contact & Zonal Desk Directory
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Contact Civic Authorities & Offices</h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Reach municipal headquarters, visit regional zonal desks, submit escalation notices, or browse citizen service FAQs.
            </p>
        </div>
    </div>
</section>

<!-- Contact Form & Info Cards -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Info Column -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900">Headquarters & Support Desk</h2>
                    <p class="text-xs text-slate-600 mt-1">Official state public grievance administrative headquarters.</p>
                </div>

                <!-- Info Box 1 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-800 flex items-center justify-center shrink-0">
                        <i data-lucide="building-2" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">Main Administration Complex</h4>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                            JanSeva Grievance Bhawan, Sector 10 Civil Secretariat, Central City - 110001
                        </p>
                    </div>
                </div>

                <!-- Info Box 2 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0">
                        <i data-lucide="phone-call" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">Toll-Free Public Helpline</h4>
                        <p class="text-xs text-slate-600 mt-1">Toll-Free: <strong>1800-111-9999</strong> (24x7 Active Desk)</p>
                        <p class="text-xs text-slate-600">Landline Desk: <strong>011-2980-4400</strong></p>
                    </div>
                </div>

                <!-- Info Box 3 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center shrink-0">
                        <i data-lucide="mail" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">Official Email Desk</h4>
                        <p class="text-xs text-slate-600 mt-1">Grievances: <strong>support@janseva.gov.in</strong></p>
                        <p class="text-xs text-slate-600">Escalations: <strong>nodalofficer@janseva.gov.in</strong></p>
                    </div>
                </div>

                <!-- Simulated Map Box -->
                <div class="bg-slate-900 p-6 rounded-2xl text-white space-y-3 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Public Visiting Desk Hours</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    </div>
                    <p class="text-sm font-semibold text-slate-200">Monday – Friday: 10:00 AM to 05:00 PM</p>
                    <p class="text-xs text-slate-400">Citizens can meet Zonal Officers without prior appointment during visiting hours.</p>
                </div>
            </div>

            <!-- Right Contact Form Column -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-200">
                    <div class="pb-6 border-b border-slate-100 mb-6">
                        <h3 class="text-xl font-extrabold text-slate-900">Citizen Inquiry & Feedback Form</h3>
                        <p class="text-xs text-slate-500 mt-1">Use this form for general inquiries, feedback, or grievance escalations.</p>
                    </div>

                    <form id="contactForm" onsubmit="handleContactSubmit(event)" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Your Full Name <span class="text-red-500">*</span></label>
                                <input type="text" required placeholder="John Doe" 
                                       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Mobile Number <span class="text-red-500">*</span></label>
                                <input type="tel" required pattern="[0-9]{10}" placeholder="10-digit mobile" 
                                       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Inquiry Category <span class="text-red-500">*</span></label>
                                <select required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600 bg-slate-50">
                                    <option value="General Inquiry">General Civic Inquiry</option>
                                    <option value="Escalation">Escalation of Delayed Ticket</option>
                                    <option value="Portal Feedback">Portal Feedback & Suggestions</option>
                                    <option value="RTI Query">RTI Information Query</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Ticket Reference ID (If Escalation)</label>
                                <input type="text" placeholder="e.g. GOV-2026-8812" 
                                       class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Message / Inquiry Details <span class="text-red-500">*</span></label>
                            <textarea rows="4" required placeholder="Type your message or inquiry here..." 
                                      class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600"></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 px-6 rounded-xl bg-blue-900 hover:bg-blue-950 text-white font-extrabold text-sm shadow-md transition-all flex items-center justify-center gap-2">
                            <i data-lucide="send" class="w-4 h-4"></i> Submit Inquiry Message
                        </button>
                    </form>

                    <div id="contactSuccess" class="hidden p-6 rounded-2xl bg-emerald-50 border border-emerald-300 text-center space-y-2">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 text-white flex items-center justify-center mx-auto">
                            <i data-lucide="check" class="w-6 h-6"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 text-base">Inquiry Submitted Successfully</h4>
                        <p class="text-xs text-slate-600">Reference Token: <strong class="text-blue-900 font-mono">INQ-2026-7781</strong> • Our helpdesk officer will respond via email/SMS within 24 hours.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Zonal Offices Directory -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-extrabold uppercase tracking-wider px-3 py-1 rounded-full bg-blue-100 text-blue-800">
                Regional Hubs
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2">Municipal Zonal Offices</h2>
            <p class="text-slate-600 text-xs sm:text-sm mt-1">Visit your nearest ward zonal office for offline grievance submissions and public hearings.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Office 1 -->
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-blue-100 text-blue-800 px-2 py-0.5 rounded">North Zone</span>
                    <span class="text-xs text-slate-400 font-mono">Wards 1 - 5</span>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">North Zonal Municipal Hub</h4>
                <p class="text-xs text-slate-600">Sector 4 Community Complex, North Ave</p>
                <p class="text-xs text-slate-500 font-medium">Zonal Officer: Er. Rajesh Sharma</p>
                <div class="pt-2 border-t border-slate-200 text-xs font-bold text-blue-900">Ph: 011-4560-9001</div>
            </div>

            <!-- Office 2 -->
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded">South Zone</span>
                    <span class="text-xs text-slate-400 font-mono">Wards 6 - 10</span>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">South Zonal Civic Center</h4>
                <p class="text-xs text-slate-600">Industrial Estate Main Gate, South Highway</p>
                <p class="text-xs text-slate-500 font-medium">Zonal Officer: Smt. Priya Verma</p>
                <div class="pt-2 border-t border-slate-200 text-xs font-bold text-blue-900">Ph: 011-4560-9002</div>
            </div>

            <!-- Office 3 -->
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-amber-100 text-amber-800 px-2 py-0.5 rounded">East Zone</span>
                    <span class="text-xs text-slate-400 font-mono">Wards 11 - 14</span>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">East Administrative Desk</h4>
                <p class="text-xs text-slate-600">Green Park Administrative Building</p>
                <p class="text-xs text-slate-500 font-medium">Zonal Officer: Shri Alok Nandi</p>
                <div class="pt-2 border-t border-slate-200 text-xs font-bold text-blue-900">Ph: 011-4560-9003</div>
            </div>

            <!-- Office 4 -->
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded">West Zone</span>
                    <span class="text-xs text-slate-400 font-mono">Wards 15 - 18</span>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">West Tech Hub Zonal Office</h4>
                <p class="text-xs text-slate-600">Cyber City Circle, West Suburb</p>
                <p class="text-xs text-slate-500 font-medium">Zonal Officer: Er. Vikram Roy</p>
                <div class="pt-2 border-t border-slate-200 text-xs font-bold text-blue-900">Ph: 011-4560-9004</div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Citizen FAQ Accordion -->
<section id="faq-section" class="py-16 bg-slate-50 border-t border-slate-200 scroll-mt-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-xs font-extrabold uppercase tracking-wider px-3 py-1 rounded-full bg-blue-100 text-blue-800">
                Citizen Help
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2">Frequently Asked Questions</h2>
            <p class="text-slate-600 text-xs sm:text-sm mt-1">Common queries regarding grievance registration and SLA resolution rules.</p>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <button onclick="toggleFaq(1)" class="w-full p-5 text-left font-bold text-slate-900 text-sm flex justify-between items-center hover:bg-slate-50">
                    <span>How do I track my complaint status after filing?</span>
                    <i data-lucide="chevron-down" id="faqIcon-1" class="w-4 h-4 text-slate-400 transition-transform"></i>
                </button>
                <div id="faqBody-1" class="hidden p-5 pt-0 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    Every complaint generates a unique 10-digit Ticket ID (e.g. <code>GOV-2026-98124</code>). You can enter this ID into the "Track Complaint" search bar on the homepage header or hero section to view assigned officers and real-time status.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <button onclick="toggleFaq(2)" class="w-full p-5 text-left font-bold text-slate-900 text-sm flex justify-between items-center hover:bg-slate-50">
                    <span>What is the standard SLA time for issue resolution?</span>
                    <i data-lucide="chevron-down" id="faqIcon-2" class="w-4 h-4 text-slate-400 transition-transform"></i>
                </button>
                <div id="faqBody-2" class="hidden p-5 pt-0 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    SLA resolution times vary by category: Streetlights & Electrical issues (12-24 hours), Garbage & Sanitation (24 hours), Potholes & Road Repairs (48 hours), and Building Encroachments (up to 72 hours).
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <button onclick="toggleFaq(3)" class="w-full p-5 text-left font-bold text-slate-900 text-sm flex justify-between items-center hover:bg-slate-50">
                    <span>Can I escalate if my issue is closed without proper fix?</span>
                    <i data-lucide="chevron-down" id="faqIcon-3" class="w-4 h-4 text-slate-400 transition-transform"></i>
                </button>
                <div id="faqBody-3" class="hidden p-5 pt-0 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    Yes! Before a ticket is permanently closed, an OTP is sent to your mobile. If you are dissatisfied with the field officer's work, you can select "Re-open Ticket" or submit an escalation notice via the Contact page.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <button onclick="toggleFaq(4)" class="w-full p-5 text-left font-bold text-slate-900 text-sm flex justify-between items-center hover:bg-slate-50">
                    <span>Is citizen identity kept confidential for safety complaints?</span>
                    <i data-lucide="chevron-down" id="faqIcon-4" class="w-4 h-4 text-slate-400 transition-transform"></i>
                </button>
                <div id="faqBody-4" class="hidden p-5 pt-0 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    Absolutely. For complaints regarding illegal encroachments, public harassment, or hazardous safety violations, citizen contact details are masked from public logs and accessible only to authorized nodal officers.
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function handleContactSubmit(e) {
        e.preventDefault();
        document.getElementById('contactForm').classList.add('hidden');
        document.getElementById('contactSuccess').classList.remove('hidden');
    }

    function toggleFaq(index) {
        const body = document.getElementById(`faqBody-${index}`);
        const icon = document.getElementById(`faqIcon-${index}`);
        if (body) {
            body.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    }
</script>
@endpush
