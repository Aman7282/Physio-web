<?php
require_once __DIR__ . '/../../includes/data.php';
$doc_key = 'dr-ahmed-hassan';
$dr = $physiotherapists[$doc_key];
$page_title = $dr['name'] . " - " . $dr['title'] . " | Home Visit Physio Lahore";
$page_meta_desc = "Book a home visit with " . $dr['name'] . " (" . $dr['degrees'] . "). " . $dr['experience'] . " serving Johar Town, DHA & Faisal Town Lahore.";
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([
    ['name' => 'Physiotherapists', 'link' => 'physiotherapists/'],
    ['name' => $dr['name']]
  ]); ?>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    <div class="lg:col-span-8 space-y-8">
      <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm flex flex-col sm:flex-row gap-6 items-start">
        <div class="w-32 h-32 rounded-2xl bg-gradient-to-br from-teal-600 to-sky-600 text-white font-extrabold text-4xl flex items-center justify-center shrink-0 shadow-md">
          AH
        </div>
        <div class="space-y-3 flex-grow">
          <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">
            ✓ <?php echo htmlspecialchars($dr['registration']); ?>
          </div>
          <h1 class="text-3xl font-extrabold text-slate-900"><?php echo htmlspecialchars($dr['name']); ?></h1>
          <p class="text-sm font-semibold text-teal-600"><?php echo htmlspecialchars($dr['title']); ?></p>
          <p class="text-xs text-slate-500"><?php echo htmlspecialchars($dr['degrees']); ?> • <?php echo htmlspecialchars($dr['experience']); ?></p>
          
          <div class="flex items-center gap-4 text-xs text-slate-600 pt-2 border-t border-slate-100">
            <div>⭐ <strong class="text-slate-900"><?php echo htmlspecialchars($dr['rating']); ?></strong> (<?php echo $dr['reviews_count']; ?> reviews)</div>
            <div>📍 Serves: <strong class="text-slate-900"><?php echo htmlspecialchars(implode(', ', $dr['areas'])); ?></strong></div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
        <h2 class="text-xl font-bold text-slate-900">Clinical Background & Experience</h2>
        <p class="text-slate-600 text-sm leading-relaxed"><?php echo htmlspecialchars($dr['bio']); ?></p>
      </div>
    </div>

    <div class="lg:col-span-4">
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xl sticky top-28 space-y-6">
        <div>
          <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block mb-1">In-Home Visit Fee</span>
          <div class="text-3xl font-extrabold text-teal-600"><?php echo htmlspecialchars($dr['fee']); ?></div>
          <div class="text-xs text-slate-500 mt-1">Availability: <?php echo htmlspecialchars($dr['availability']); ?></div>
        </div>

        <a href="<?php echo site_url('book-home-visit/?therapist=' . $dr['slug']); ?>" class="w-full py-4 bg-gradient-to-r from-teal-600 to-sky-600 text-white font-bold text-center text-sm rounded-xl block shadow-md hover:from-teal-700 hover:to-sky-700 transition-all">
          Book Visit with Ahmed
        </a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
