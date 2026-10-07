<?php
$page_title = "Patient Education & Home Exercise Guides | PhysioHome Lahore";
$page_meta_desc = "Clinician-reviewed patient articles & exercise guides on sciatica stretches, post-op knee replacement timelines & senior fall prevention.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([['name' => 'Patient Education']]); ?>

  <div class="text-center max-w-3xl mx-auto mb-12">
    <span class="text-xs font-semibold text-teal-600 uppercase tracking-widest bg-teal-50 px-3 py-1 rounded-full">Clinician-Reviewed Guides</span>
    <h1 class="text-4xl font-extrabold text-slate-900 mt-3 mb-4">Patient Education & Exercise Guides</h1>
    <p class="text-slate-600 text-base">Read evidence-based recovery articles, ergonomic advice, and exercise guides written by senior physiotherapists.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <?php foreach ($articles as $art): ?>
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg transition-all flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between text-xs text-slate-500 mb-3">
            <span class="px-2.5 py-0.5 rounded-full bg-teal-50 text-teal-700 font-semibold"><?php echo htmlspecialchars($art['category']); ?></span>
            <span><?php echo htmlspecialchars($art['read_time']); ?></span>
          </div>
          <h2 class="text-xl font-bold text-slate-900 mb-3 leading-snug"><?php echo htmlspecialchars($art['title']); ?></h2>
          <p class="text-slate-600 text-xs leading-relaxed mb-4"><?php echo htmlspecialchars($art['summary']); ?></p>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs">
          <span class="text-slate-400">Reviewed by <?php echo htmlspecialchars($art['reviewed_by']); ?></span>
          <a href="<?php echo site_url('resources/' . $art['slug'] . '/'); ?>" class="font-bold text-teal-600 hover:underline">
            Read Article →
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
