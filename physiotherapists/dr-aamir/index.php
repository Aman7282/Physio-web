<?php
require_once __DIR__ . '/../../includes/data.php';
$doc_key = 'dr-aamir';
$dr = get_doctor_by_slug($doc_key);
if (!$dr) {
    header("Location: " . site_url("physiotherapists/"));
    exit;
}
$page_title = (!empty($dr['meta_title'])) ? $dr['meta_title'] : $dr['name'] . " - " . $dr['title'] . " | CareStride Lahore";
$page_meta_desc = (!empty($dr['meta_desc'])) ? $dr['meta_desc'] : "Book a home visit with " . $dr['name'] . " (" . $dr['degrees'] . "). " . $dr['experience'] . " serving Lahore.";
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([
    ['name' => 'Our Doctors', 'link' => 'physiotherapists/'],
    ['name' => $dr['name']]
  ]); ?>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    <div class="lg:col-span-8 space-y-8">
      <div class="bg-white rounded-3xl p-8 border border-sky-100 shadow-sm flex flex-col sm:flex-row gap-6 items-start">
        <?php if (!empty($dr['image'])): ?>
          <img src="<?php echo site_url('uploads/doctors/' . $dr['image']); ?>" alt="<?php echo htmlspecialchars($dr['name']); ?>" class="w-36 h-36 rounded-2xl object-cover border border-sky-200 shrink-0 shadow-md">
        <?php else: ?>
          <div class="w-36 h-36 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-4xl flex items-center justify-center shrink-0 shadow-md">
            <?php 
              $parts = explode(' ', $dr['name']);
              echo htmlspecialchars(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
            ?>
          </div>
        <?php endif; ?>

        <div class="space-y-3 flex-grow">
          <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-sky-50 text-sky-700 text-xs font-semibold border border-sky-200">
            ✓ <?php echo htmlspecialchars($dr['registration'] ?? 'PNC / PMDC Verified DPT Doctor'); ?>
          </div>
          <h1 class="text-3xl font-extrabold text-slate-900"><?php echo htmlspecialchars($dr['name']); ?></h1>
          <p class="text-sm font-bold text-sky-600"><?php echo htmlspecialchars($dr['title']); ?></p>
          <p class="text-xs text-slate-500 font-medium"><?php echo htmlspecialchars($dr['degrees']); ?> • <?php echo htmlspecialchars($dr['experience']); ?></p>
          
          <div class="flex flex-wrap items-center gap-4 text-xs text-slate-600 pt-2 border-t border-slate-100">
            <div>⭐ <strong class="text-slate-900"><?php echo htmlspecialchars($dr['rating'] ?? '4.9 / 5.0'); ?></strong> (<?php echo $dr['reviews_count'] ?? 100; ?> patient reviews)</div>
            <div>📍 Serves: <strong class="text-slate-900"><?php echo htmlspecialchars(is_array($dr['areas']) ? implode(', ', $dr['areas']) : $dr['areas']); ?></strong></div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-3xl p-7 border border-sky-100 shadow-sm space-y-4">
        <h2 class="text-xl font-bold text-slate-900">Clinical Background & Qualifications</h2>
        <p class="text-slate-600 text-sm leading-relaxed"><?php echo htmlspecialchars($dr['bio']); ?></p>
      </div>

      <?php if (!empty($dr['specialties'])): ?>
        <div class="bg-sky-50/50 rounded-3xl p-7 border border-sky-100 space-y-4">
          <h2 class="text-xl font-bold text-slate-900">Specialized Clinical Expertise</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs text-slate-700 font-medium">
            <?php 
              $specs = is_array($dr['specialties']) ? $dr['specialties'] : explode(',', $dr['specialties']);
              foreach ($specs as $sp): 
            ?>
              <div class="p-3.5 bg-white rounded-2xl border border-sky-100 shadow-xs flex items-center gap-2">
                <svg class="w-4 h-4 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                <span><?php echo htmlspecialchars(trim($sp)); ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

    </div>

    <div class="lg:col-span-4">
      <div class="bg-white rounded-3xl p-7 border border-sky-100 shadow-xl sticky top-28 space-y-6">
        <div>
          <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">In-Home Visit Fee</span>
          <div class="text-3xl font-extrabold text-sky-600"><?php echo htmlspecialchars($dr['fee']); ?></div>
          <div class="text-xs text-slate-500 mt-1">Availability: <?php echo htmlspecialchars($dr['availability'] ?? 'Mon - Sat (9:00 AM - 7:00 PM)'); ?></div>
        </div>

        <div class="border-t border-slate-100 pt-4 space-y-3 text-xs text-slate-600">
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Comprehensive Clinical Assessment
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Portable Ultrasound & TENS Equipment
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            CareStride Verified DPT Practitioner
          </div>
        </div>

        <a href="<?php echo site_url('book-home-visit/?therapist=' . $dr['slug']); ?>" class="w-full py-4 bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-center text-sm rounded-xl block shadow-md shadow-sky-500/20 hover:from-sky-600 hover:to-blue-700 transition-all">
          Book Visit with <?php echo htmlspecialchars(explode(' ', $dr['name'])[1] ?? $dr['name']); ?>
        </a>

        <a href="<?php echo WHATSAPP_LINK; ?>?text=Hello,%20I%20want%20to%20book%20a%20home%20visit%20with%20<?php echo urlencode($dr['name']); ?>" target="_blank" rel="noopener noreferrer" class="w-full py-3 bg-emerald-50 text-emerald-700 font-bold text-center text-xs rounded-xl block hover:bg-emerald-100 transition-colors">
          WhatsApp Direct Inquiry
        </a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>