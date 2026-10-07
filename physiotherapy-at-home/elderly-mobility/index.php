<?php
require_once __DIR__ . '/../../includes/data.php';
$service_key = 'elderly-mobility';
$svc = $services[$service_key];
$page_title = $svc['title'] . " at Home in Lahore | CareStride";
$page_meta_desc = $svc['meta_description'];
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <?php echo render_breadcrumbs([
    ['name' => 'Physiotherapy Services', 'link' => 'physiotherapy-at-home/'],
    ['name' => $svc['title']]
  ]); ?>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    <!-- Main Content -->
    <div class="lg:col-span-8 space-y-8">
      
      <!-- Top Condition Visual Image -->
      <div class="relative h-72 sm:h-96 rounded-3xl overflow-hidden shadow-lg border border-sky-100">
        <img src="<?php echo site_url('assets/images/services/' . $svc['slug'] . '.jpg'); ?>" alt="<?php echo htmlspecialchars($svc['title']); ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
        <div class="absolute bottom-6 left-6 right-6 text-white">
          <span class="text-xs font-extrabold uppercase tracking-widest bg-sky-600/90 backdrop-blur-md px-3.5 py-1.5 rounded-full inline-block mb-2">CareStride Specialized Protocol</span>
          <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight"><?php echo htmlspecialchars($svc['title']); ?> at Home</h1>
        </div>
      </div>

      <div class="bg-white rounded-3xl p-8 border border-sky-100 shadow-sm space-y-4">
        <h2 class="text-2xl font-extrabold text-slate-900">Program Overview & Treatment Approach</h2>
        <p class="text-slate-600 text-base leading-relaxed"><?php echo htmlspecialchars($svc['full_description']); ?></p>
      </div>

      <!-- Conditions Treated Box -->
      <div class="bg-white rounded-3xl p-8 border border-sky-100 shadow-sm space-y-5">
        <h2 class="text-2xl font-extrabold text-slate-900">Specific Conditions Treated in This Program</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <?php foreach ($svc['conditions'] as $c): ?>
            <div class="p-4 bg-sky-50/50 rounded-2xl border border-sky-100 flex items-center gap-3 text-sm text-slate-800 font-semibold">
              <svg class="w-5 h-5 text-sky-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              <span><?php echo htmlspecialchars($c); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- What Each Visit Includes -->
      <div class="bg-sky-50/50 rounded-3xl p-8 border border-sky-100 space-y-5">
        <h2 class="text-2xl font-extrabold text-slate-900">What Every CareStride Visit Includes</h2>
        <div class="space-y-4">
          <?php foreach ($svc['treatment_includes'] as $i => $inc): ?>
            <div class="flex items-start gap-4 p-3 bg-white rounded-2xl border border-sky-100">
              <span class="w-7 h-7 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 mt-0.5"><?php echo $i+1; ?></span>
              <span class="text-slate-700 text-sm font-medium leading-relaxed"><?php echo htmlspecialchars($inc); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      
      <!-- CareStride In-Home Equipment & Hygiene Safety Standards (Extra Clinical Section) -->
      <div class="bg-gradient-to-br from-slate-900 to-sky-950 rounded-3xl p-8 text-white shadow-xl space-y-6">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center font-bold border border-sky-400/30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          </div>
          <div>
            <h2 class="text-2xl font-extrabold text-white">CareStride Clinical Safety & Portable Equipment</h2>
            <p class="text-sky-200 text-xs mt-0.5">Hospital-grade physical therapy instruments brought directly to your bedroom.</p>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs">
          <div class="p-4 rounded-2xl bg-white/5 border border-white/10 space-y-1.5">
            <div class="font-bold text-sky-300 text-sm">✓ Portable Electrotherapy (TENS / IFT)</div>
            <p class="text-slate-300 leading-relaxed">Dual-channel electrical stimulation for fast nerve blockage, pain relief, and muscular spasm relaxation.</p>
          </div>

          <div class="p-4 rounded-2xl bg-white/5 border border-white/10 space-y-1.5">
            <div class="font-bold text-sky-300 text-sm">✓ Therapeutic Ultrasound Therapy</div>
            <p class="text-slate-300 leading-relaxed">Deep thermal soundwaves promoting cellular repair, breaking scar tissue, and speeding tendon healing.</p>
          </div>

          <div class="p-4 rounded-2xl bg-white/5 border border-white/10 space-y-1.5">
            <div class="font-bold text-sky-300 text-sm">✓ Sanitized & Sealed Accessories</div>
            <p class="text-slate-300 leading-relaxed">Single-patient sanitization protocols for all resistance bands, goniometers, and exercise tools.</p>
          </div>

          <div class="p-4 rounded-2xl bg-white/5 border border-white/10 space-y-1.5">
            <div class="font-bold text-sky-300 text-sm">✓ Custom Home Exercise Program (HEP)</div>
            <p class="text-slate-300 leading-relaxed">Digital and printed posture/exercise guide tailored for your family or caregiver to maintain progress.</p>
          </div>
        </div>
      </div>


      <!-- Relevant Physios -->
      <div>
        <h2 class="text-2xl font-extrabold text-slate-900 mb-6">Assigned Doctors for <?php echo htmlspecialchars($svc['title']); ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <?php foreach (array_slice($physiotherapists, 0, 2) as $dr): ?>
            <div class="p-5 bg-white rounded-3xl border border-sky-100 shadow-sm flex items-center justify-between gap-3">
              <div class="flex items-center gap-3">
                <?php if (!empty($dr['image'])): ?>
                  <img src="<?php echo site_url('uploads/doctors/' . $dr['image']); ?>" alt="<?php echo htmlspecialchars($dr['name']); ?>" class="w-14 h-14 rounded-2xl object-cover border border-sky-200 shrink-0">
                <?php else: ?>
                  <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold flex items-center justify-center text-sm shrink-0">
                    <?php 
                      $parts = explode(' ', $dr['name']);
                      echo htmlspecialchars(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
                    ?>
                  </div>
                <?php endif; ?>
                <div>
                  <div class="font-bold text-slate-900 text-sm leading-tight"><?php echo htmlspecialchars($dr['name']); ?></div>
                  <div class="text-xs text-sky-600 font-semibold mt-0.5"><?php echo htmlspecialchars($dr['title']); ?></div>
                  <div class="text-[11px] text-slate-500"><?php echo htmlspecialchars($dr['experience']); ?></div>
                </div>
              </div>
              <a href="<?php echo site_url('physiotherapists/' . $dr['slug'] . '/'); ?>" class="px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl shrink-0 transition-colors">
                Profile →
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>

    <!-- Sidebar Booking Widget (Prices Removed as Requested) -->
    <div class="lg:col-span-4">
      <div class="bg-white rounded-3xl p-7 border border-sky-100 shadow-xl sticky top-28 space-y-6">
        <div>
          <span class="text-xs font-bold text-sky-600 uppercase tracking-wider block mb-1">CareStride Home Session</span>
          <div class="text-2xl font-extrabold text-slate-900">Hospital-Grade Care</div>
          <div class="text-xs text-slate-500 mt-1.5 font-medium">Session Duration: <?php echo htmlspecialchars($svc['duration']); ?></div>
        </div>

        <div class="border-t border-slate-100 pt-4 space-y-3 text-xs text-slate-600">
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            <span>Full Clinical Movement Assessment</span>
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            <span>Electrotherapy & Ultrasound Brought Home</span>
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            <span>PNC & PMDC Certified DPT Doctor</span>
          </div>
        </div>

        <div class="p-4 bg-sky-50/70 rounded-2xl border border-sky-100 text-xs text-slate-600">
          For complete visit charges and discounted 6-session or 12-session packages, visit our dedicated <a href="<?php echo site_url('pricing/'); ?>" class="text-sky-600 font-extrabold hover:underline">Pricing Page →</a>.
        </div>

        <a href="<?php echo site_url('book-home-visit/?service=' . $svc['slug']); ?>" class="w-full py-4 bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-center text-sm rounded-xl block shadow-md shadow-sky-500/20 hover:from-sky-600 hover:to-blue-700 transition-all">
          Book <?php echo htmlspecialchars($svc['title']); ?> Visit
        </a>

        <a href="<?php echo WHATSAPP_LINK; ?>?text=Hi,%20I%20want%20to%20inquire%20about%20<?php echo urlencode($svc['title']); ?>" target="_blank" rel="noopener noreferrer" class="w-full py-3 bg-emerald-50 text-emerald-700 font-bold text-center text-xs rounded-xl block hover:bg-emerald-100 transition-colors">
          WhatsApp Direct Inquiry
        </a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>