<?php
$page_title = "Contact CareStride — Home Visit Helpline & Booking | theCareStride.com";
$page_meta_desc = "Get in touch with CareStride (theCareStride.com) clinical dispatch team in Lahore. Phone hotline +92 309 7282547, WhatsApp booking, address DHA Phase 5 Commercial Lahore.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([['name' => 'Contact Us']]); ?>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    
    <div class="lg:col-span-5 space-y-6">
      <div>
        <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-3.5 py-1.5 rounded-full border border-sky-100">CareStride Helpline</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 mb-2">Contact Our Clinical Team</h1>
        <p class="text-slate-600 text-sm leading-relaxed">We are available for urgent Doctor of Physical Therapy (DPT) home visit dispatches and preliminary medical consultations across Lahore.</p>
      </div>

      <div class="bg-white p-7 rounded-3xl border border-slate-200/90 shadow-sm space-y-5 text-xs text-slate-700">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 font-bold flex items-center justify-center shrink-0 border border-sky-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          </div>
          <div>
            <strong class="text-slate-900 block text-sm mb-0.5">Phone Hotline & Dispatch</strong>
            <span class="text-slate-600 font-medium"><?php echo PHONE_NUMBER; ?> (Mon - Sun, 8:00 AM - 9:00 PM)</span>
          </div>
        </div>

        <div class="flex items-start gap-4 border-t border-slate-100 pt-4">
          <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 font-bold flex items-center justify-center shrink-0 border border-emerald-100">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
          </div>
          <div>
            <strong class="text-slate-900 block text-sm mb-0.5">WhatsApp Booking Direct</strong>
            <span class="text-slate-600 font-medium"><?php echo PHONE_NUMBER; ?> (Fast Response)</span>
          </div>
        </div>

        <div class="flex items-start gap-4 border-t border-slate-100 pt-4">
          <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 font-bold flex items-center justify-center shrink-0 border border-slate-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          </div>
          <div>
            <strong class="text-slate-900 block text-sm mb-0.5">CareStride Lahore Dispatch Hub</strong>
            <span class="text-slate-600 font-medium"><?php echo CLINIC_ADDRESS; ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Message Form -->
    <div class="lg:col-span-7 bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xl space-y-4">
      <h2 class="text-2xl font-bold text-slate-900">Send an Online Inquiry</h2>
      <form onsubmit="event.preventDefault(); alert('Message sent successfully! Our clinical coordinator will call you back shortly.');" class="space-y-4">
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Your Name</label>
          <input type="text" required placeholder="e.g. Ali Ahmed" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone Number</label>
          <input type="tel" required placeholder="0300 1234567" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Message / Medical Condition</label>
          <textarea rows="4" required placeholder="Describe symptoms or required home visit care..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none"></textarea>
        </div>
        <button type="submit" class="w-full py-4 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-extrabold text-sm rounded-xl transition-all shadow-md shadow-sky-500/20">
          Send Inquiry
        </button>
      </form>
    </div>

  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
