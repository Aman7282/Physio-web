<?php
require_once __DIR__ . '/../../includes/data.php';
$art_key = 'fall-prevention-elderly-lahore';
$art = $articles[$art_key];
$page_title = $art['title'] . " | Patient Guide";
$page_meta_desc = $art['summary'];
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/breadcrumbs.php';
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([
    ['name' => 'Patient Education', 'link' => 'resources/'],
    ['name' => $art['title']]
  ]); ?>

  <article class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm space-y-6">
    <div class="space-y-3">
      <div class="flex items-center gap-3 text-xs">
        <span class="px-3 py-1 rounded-full bg-teal-50 text-teal-700 font-bold"><?php echo htmlspecialchars($art['category']); ?></span>
        <span class="text-slate-400">• <?php echo htmlspecialchars($art['read_time']); ?></span>
        <span class="text-emerald-700 font-semibold bg-emerald-50 px-2.5 py-0.5 rounded">✓ <?php echo htmlspecialchars($art['reviewed_by']); ?></span>
      </div>
      <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight"><?php echo htmlspecialchars($art['title']); ?></h1>
    </div>

    <div class="prose max-w-none text-slate-700 leading-relaxed text-sm">
      <?php echo $art['content']; ?>
    </div>

    <div class="mt-12 p-6 bg-slate-900 text-white rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
      <div>
        <h3 class="font-bold text-base">Need Professional Guidance for This Condition?</h3>
        <p class="text-xs text-slate-300">Book a home assessment with our senior physical therapists in Lahore.</p>
      </div>
      <a href="<?php echo site_url('book-home-visit/'); ?>" class="px-6 py-3 bg-teal-500 hover:bg-teal-600 text-white font-bold rounded-xl text-xs shrink-0 transition-colors">
        Schedule Home Assessment
      </a>
    </div>
  </article>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
