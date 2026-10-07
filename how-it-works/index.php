<?php
$page_title = "How CareStride Home Physiotherapy Works | 4-Step Patient Care Process";
$page_meta_desc = "Learn how CareStride (theCareStride.com) in-home physical therapy works in Lahore. From online booking to doctor arrival, 60-min treatment & custom home recovery roadmap.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([['name' => 'How It Works']]); ?>

  <div class="text-center max-w-3xl mx-auto mb-16">
    <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-3.5 py-1.5 rounded-full border border-sky-100">Seamless Patient Experience</span>
    <h1 class="text-4xl font-extrabold text-slate-900 mt-3 mb-4">How CareStride Home Care Works</h1>
    <p class="text-slate-600 text-base leading-relaxed">From your initial inquiry to your complete rehabilitation roadmap, we make getting professional physical therapy at home in Lahore effortless.</p>
  </div>

  <!-- Step by Step Detailed Cards -->
  <div class="space-y-8 max-w-4xl mx-auto">
    
    <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm flex flex-col md:flex-row gap-6 items-start hover:border-sky-300 transition-colors">
      <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-2xl flex items-center justify-center shrink-0 shadow-md shadow-sky-500/20">1</div>
      <div class="space-y-2">
        <h2 class="text-2xl font-bold text-slate-900">Step 1: Simple Online or WhatsApp Request</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
          Select your required physiotherapy program (Back Pain, Post-Op Joint Rehab, Stroke Neuro, Senior Mobility) and specify your location in Lahore. Submit your request via our online booking form or message our hotline on WhatsApp.
        </p>
      </div>
    </div>

    <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm flex flex-col md:flex-row gap-6 items-start hover:border-sky-300 transition-colors">
      <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-2xl flex items-center justify-center shrink-0 shadow-md shadow-sky-500/20">2</div>
      <div class="space-y-2">
        <h2 class="text-2xl font-bold text-slate-900">Step 2: Doctor Matching & Confirmation Call</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
          Our clinical coordinator reviews your case and pairs you with a specialized Doctor of Physical Therapy (DPT) matching your medical requirements and gender preference. We confirm your appointment time and doctor profile details.
        </p>
      </div>
    </div>

    <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm flex flex-col md:flex-row gap-6 items-start hover:border-sky-300 transition-colors">
      <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-2xl flex items-center justify-center shrink-0 shadow-md shadow-sky-500/20">3</div>
      <div class="space-y-2">
        <h2 class="text-2xl font-bold text-slate-900">Step 3: Clinical Home Assessment & Portable Therapy</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
          Your assigned DPT doctor arrives carrying sanitized portable electrotherapy modalities (TENS / IFT / Therapeutic Ultrasound) and exercise kits. The 45–60 minute visit includes complete assessment, hands-on joint mobilization, and pain therapy.
        </p>
      </div>
    </div>

    <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm flex flex-col md:flex-row gap-6 items-start hover:border-sky-300 transition-colors">
      <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-2xl flex items-center justify-center shrink-0 shadow-md shadow-sky-500/20">4</div>
      <div class="space-y-2">
        <h2 class="text-2xl font-bold text-slate-900">Step 4: Custom Home Exercise Plan & Follow-Up Care</h2>
        <p class="text-slate-600 text-sm leading-relaxed">
          After your treatment, your doctor provides a customized home exercise program (HEP) for family or caregiver support. For long-term conditions, discounted 6-session or 12-session recovery packages are available.
        </p>
      </div>
    </div>

  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
