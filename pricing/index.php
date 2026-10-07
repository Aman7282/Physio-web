<?php
$page_title = "CareStride Visit Fees & Package Pricing | theCareStride.com";
$page_meta_desc = "Transparent pricing for CareStride home physical therapy in Lahore. Single visit rates and discounted 6-session & 12-session stroke/post-op packages.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <?php echo render_breadcrumbs([['name' => 'Pricing & Packages']]); ?>

  <div class="text-center max-w-3xl mx-auto mb-16">
    <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-4 py-1.5 rounded-full border border-sky-100">CareStride Official Rates</span>
    <h1 class="text-4xl font-extrabold text-slate-900 mt-3 mb-4">Physiotherapy Visit Fees & Packages</h1>
    <p class="text-slate-600 text-base leading-relaxed">No hidden costs. Transparent session rates with full clinical assessment and electrotherapy equipment included.</p>
  </div>

  <!-- Pricing Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Single Visit -->
    <div class="bg-white rounded-3xl p-8 border border-sky-100 shadow-sm hover:shadow-xl transition-all flex flex-col justify-between">
      <div>
        <h2 class="text-xl font-extrabold text-slate-900 mb-2">Single Home Visit</h2>
        <p class="text-xs text-slate-500 mb-6 font-medium">Ideal for acute pain evaluation or single treatment session.</p>
        <div class="text-4xl font-extrabold text-slate-900 mb-1">PKR 3,500 <span class="text-xs text-slate-400 font-normal">/ visit</span></div>
        <div class="text-xs text-slate-500 mb-6 font-medium">45 to 60 minutes session</div>

        <ul class="space-y-3 text-xs text-slate-700 border-t border-slate-100 pt-6">
          <li class="flex items-center gap-2">✓ Clinical Spinal / Joint Assessment</li>
          <li class="flex items-center gap-2">✓ Electrotherapy (TENS / Ultrasound)</li>
          <li class="flex items-center gap-2">✓ Manual Mobilization & Exercises</li>
          <li class="flex items-center gap-2">✓ Free Travel in Standard Covered Zones</li>
        </ul>
      </div>
      <a href="<?php echo site_url('book-home-visit/'); ?>" class="mt-8 w-full py-4 bg-slate-900 hover:bg-slate-800 text-white font-extrabold rounded-xl text-xs text-center block transition-colors">
        Book Single Session
      </a>
    </div>

    <!-- 6 Session Package -->
    <div class="bg-white rounded-3xl p-8 border-2 border-sky-500 shadow-2xl relative flex flex-col justify-between">
      <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 bg-gradient-to-r from-sky-500 to-blue-600 text-white text-xs font-extrabold rounded-full uppercase tracking-wider shadow-md">
        Most Popular for Post-Op & Sciatica
      </div>
      <div>
        <h2 class="text-xl font-extrabold text-slate-900 mb-2">6-Session Recovery Package</h2>
        <p class="text-xs text-slate-500 mb-6 font-medium">Save PKR 3,000 on structured recovery programs.</p>
        <div class="text-4xl font-extrabold text-sky-600 mb-1">PKR 18,000</div>
        <div class="text-xs text-slate-500 mb-6 font-medium">Effective rate: PKR 3,000 / visit</div>

        <ul class="space-y-3 text-xs text-slate-700 border-t border-slate-100 pt-6">
          <li class="flex items-center gap-2 font-semibold text-slate-900">✓ Everything in Single Visit</li>
          <li class="flex items-center gap-2">✓ Dedicated Same Primary Doctor</li>
          <li class="flex items-center gap-2">✓ Mid-Term Progress Audit</li>
          <li class="flex items-center gap-2">✓ Printed Home Exercise Booklet</li>
          <li class="flex items-center gap-2 text-sky-600 font-bold">✓ Priority Time Slot Scheduling</li>
        </ul>
      </div>
      <a href="<?php echo site_url('book-home-visit/?package=6-session'); ?>" class="mt-8 w-full py-4 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-extrabold rounded-xl text-xs text-center block shadow-md shadow-sky-500/20 transition-all">
        Select 6-Session Package
      </a>
    </div>

    <!-- 12 Session Neuro & Stroke -->
    <div class="bg-white rounded-3xl p-8 border border-sky-100 shadow-sm hover:shadow-xl transition-all flex flex-col justify-between">
      <div>
        <h2 class="text-xl font-extrabold text-slate-900 mb-2">12-Session Stroke / Neuro Care</h2>
        <p class="text-xs text-slate-500 mb-6 font-medium">Comprehensive long-term neuro & elderly rehab.</p>
        <div class="text-4xl font-extrabold text-slate-900 mb-1">PKR 33,000</div>
        <div class="text-xs text-slate-500 mb-6 font-medium">Effective rate: PKR 2,750 / visit</div>

        <ul class="space-y-3 text-xs text-slate-700 border-t border-slate-100 pt-6">
          <li class="flex items-center gap-2 font-semibold text-slate-900">✓ Dedicated Neuro/Geriatric Physio</li>
          <li class="flex items-center gap-2">✓ Bobath / PNF Motor Training</li>
          <li class="flex items-center gap-2">✓ Caregiver Handling Education</li>
          <li class="flex items-center gap-2">✓ Environmental Fall Safety Audit</li>
        </ul>
      </div>
      <a href="<?php echo site_url('book-home-visit/?package=12-session'); ?>" class="mt-8 w-full py-4 bg-slate-900 hover:bg-slate-800 text-white font-extrabold rounded-xl text-xs text-center block transition-colors">
        Select 12-Session Package
      </a>
    </div>
  </div>

  <!-- Fee Policies -->
  <div class="mt-16 bg-sky-50/60 rounded-3xl p-8 border border-sky-100 text-xs text-slate-600 space-y-3">
    <h3 class="font-extrabold text-slate-900 text-sm mb-2">Important Fee & Travel Terms:</h3>
    <p>• <strong>Travel Fee:</strong> FREE across DHA, Johar Town, Gulberg, Model Town, Garden Town, Faisal Town, Cantt. A modest PKR 300 - 500 travel fee applies for outer zones (Bahria Town, Raiwind Road).</p>
    <p>• <strong>Cancellation Policy:</strong> Free cancellation up to 4 hours before scheduled appointment. See full details on our <a href="<?php echo site_url('cancellation-refund/'); ?>" class="text-sky-600 font-bold underline">Cancellation & Refund Policy</a> page.</p>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
