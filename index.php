<?php
$page_title = "CareStride — Licensed In-Home Physiotherapy Services in Lahore | theCareStride.com";
$page_meta_desc = "CareStride (theCareStride.com) provides certified Doctor of Physical Therapy (DPT) home visits in Lahore. Specialized back & sciatica pain, post-op joint rehab, stroke neuro care & child rehab across DHA, Johar Town, Gulberg & Model Town.";
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/breadcrumbs.php';
?>

<!-- Hero Section (DallasSpine Premium Full-Width Style) -->
<section class="relative bg-slate-900 text-white pt-16 pb-24 overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <img src="<?php echo site_url('assets/images/hero.jpg'); ?>" alt="CareStride In-Home Physical Therapy Lahore" class="w-full h-full object-cover opacity-25">
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/95 to-sky-950/80"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="max-w-3xl space-y-6">
      
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/20 border border-sky-400/30 text-sky-300 text-xs font-bold uppercase tracking-wider">
        <span class="w-2 h-2 rounded-full bg-sky-400 animate-ping"></span>
        Doctor of Physical Therapy (DPT) Home Visits in Lahore
      </div>

      <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight">
        Accident, Injury & Post-Op <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-blue-300 to-sky-200">Physical Therapy</span> Delivered Near You.
      </h1>

      <p class="text-lg text-sky-100/90 leading-relaxed font-normal">
        Skip hospital travel and long wait times. <strong class="text-white font-semibold">CareStride</strong> (theCareStride.com) sends certified Doctors of Physical Therapy equipped with portable electrotherapy, ultrasound, and exercise equipment directly to your home in Lahore.
      </p>

      <!-- Key Trust Highlights -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-sm text-sky-100 font-medium">
        <div class="flex items-center gap-2">
          <svg class="w-5 h-5 text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
          <span>PNC & PMDC Verified DPT Doctors</span>
        </div>
        <div class="flex items-center gap-2">
          <svg class="w-5 h-5 text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
          <span>Hospital-Grade Portable TENS & Ultrasound</span>
        </div>
        <div class="flex items-center gap-2">
          <svg class="w-5 h-5 text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
          <span>1-on-1 Dedicated 45–60 Min Care</span>
        </div>
        <div class="flex items-center gap-2">
          <svg class="w-5 h-5 text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
          <span>Serving DHA, Johar Town, Gulberg & Model Town</span>
        </div>
      </div>

      <!-- Action CTA Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 pt-4">
        <a href="<?php echo site_url('book-home-visit/'); ?>" class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-extrabold text-base bg-gradient-to-r from-sky-500 to-blue-600 text-white shadow-xl shadow-sky-500/30 hover:from-sky-600 hover:to-blue-700 transition-all text-center">
          Book Doctor Home Visit
          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
        <a href="tel:<?php echo PHONE_RAW; ?>" class="inline-flex items-center justify-center px-7 py-4 rounded-xl font-bold text-base bg-white/10 hover:bg-white/20 text-white border border-white/20 backdrop-blur-md transition-all text-center">
          <svg class="w-5 h-5 mr-2 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          Call Direct: <?php echo PHONE_NUMBER; ?>
        </a>
      </div>

    </div>
  </div>

  <!-- Horizontal Trust Bar Under Hero -->
  <div class="mt-16 border-t border-sky-900/60 pt-6 bg-slate-950/60 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center text-sky-200 text-xs font-semibold">
      <div>
        <div class="text-2xl font-extrabold text-white">5,000+</div>
        <div class="text-slate-400 mt-0.5">Home Patients Treated</div>
      </div>
      <div>
        <div class="text-2xl font-extrabold text-white">100%</div>
        <div class="text-slate-400 mt-0.5">Verified DPT Doctors</div>
      </div>
      <div>
        <div class="text-2xl font-extrabold text-white">45 Mins</div>
        <div class="text-slate-400 mt-0.5">Standard Arrival Time</div>
      </div>
      <div>
        <div class="text-2xl font-extrabold text-white">4.9 / 5.0</div>
        <div class="text-slate-400 mt-0.5">Patient Satisfaction</div>
      </div>
    </div>
  </div>
</section>

<!-- Services Grid Section with Condition Visual Images (DallasSpine Style) -->
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="text-center max-w-3xl mx-auto mb-16">
    <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-4 py-1.5 rounded-full border border-sky-100">CareStride Specialized Programs</span>
    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 mb-4">Accident, Injury & Physical Therapy Conditions</h2>
    <p class="text-slate-600 text-base leading-relaxed">We deliver hospital-grade physical therapy directly to your home for acute, post-surgical, and neurological conditions in Lahore.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($services as $svc): ?>
      <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden group hover:-translate-y-1">
        <div>
          <!-- Service Condition Visual Image -->
          <div class="relative h-52 overflow-hidden bg-slate-100">
            <img src="<?php echo site_url('assets/images/services/' . $svc['slug'] . '.jpg'); ?>" alt="<?php echo htmlspecialchars($svc['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
            <span class="absolute bottom-3 left-4 text-xs font-bold text-white bg-sky-600/90 backdrop-blur-md px-3 py-1 rounded-full">
              In-Home Care
            </span>
          </div>

          <!-- Content Body -->
          <div class="p-6 space-y-4">
            <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-sky-600 transition-colors">
              <?php echo htmlspecialchars($svc['title']); ?>
            </h3>
            <p class="text-slate-600 text-sm leading-relaxed">
              <?php echo htmlspecialchars($svc['summary']); ?>
            </p>
            
            <div class="space-y-2 pt-2 border-t border-slate-100">
              <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block">Conditions Treated:</span>
              <?php foreach (array_slice($svc['conditions'], 0, 3) as $cond): ?>
                <div class="text-xs text-slate-700 flex items-center gap-2 font-medium">
                  <svg class="w-4 h-4 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                  <span><?php echo htmlspecialchars($cond); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <div class="p-6 pt-0">
          <a href="<?php echo site_url('physiotherapy-at-home/' . $svc['slug'] . '/'); ?>" class="w-full py-3 bg-sky-50 hover:bg-sky-600 text-sky-700 hover:text-white font-extrabold text-xs rounded-xl text-center block transition-all">
            Explore Treatment Protocol →
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Featured Physiotherapists Section (DallasSpine Clean Doctor Cards) -->
<section class="py-20 bg-slate-50 border-y border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
      <div>
        <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-white px-3.5 py-1.5 rounded-full border border-sky-200">Sargodha Medical College & Riphah Alumni</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Our Certified Doctor Team</h2>
        <p class="text-slate-600 text-sm mt-1">Licensed Doctors of Physical Therapy (DPT) ready for home visits across Lahore.</p>
      </div>
      <a href="<?php echo site_url('physiotherapists/'); ?>" class="inline-flex items-center text-sm font-extrabold text-sky-600 hover:text-sky-800">
        View All Doctors (<?php echo count($physiotherapists); ?>) →
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($physiotherapists as $dr): ?>
        <div class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all flex flex-col justify-between space-y-5">
          <div>
            <div class="flex items-center gap-4 mb-4">
              <?php if (!empty($dr['image'])): ?>
                <img src="<?php echo site_url('uploads/doctors/' . $dr['image']); ?>" alt="<?php echo htmlspecialchars($dr['name']); ?>" class="w-20 h-20 rounded-2xl object-cover border border-sky-200 shrink-0 shadow-md">
              <?php else: ?>
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold flex items-center justify-center text-2xl shrink-0 shadow-md">
                  <?php 
                    $parts = explode(' ', $dr['name']);
                    echo htmlspecialchars(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
                  ?>
                </div>
              <?php endif; ?>
              <div>
                <h3 class="font-bold text-slate-900 text-lg leading-tight"><?php echo htmlspecialchars($dr['name']); ?></h3>
                <span class="text-xs text-sky-600 font-bold block mt-0.5"><?php echo htmlspecialchars($dr['title']); ?></span>
                <span class="text-[11px] text-slate-500 block font-medium mt-0.5"><?php echo htmlspecialchars($dr['degrees']); ?></span>
              </div>
            </div>

            <div class="space-y-2 text-xs text-slate-600 mb-4 bg-slate-50 p-4 rounded-2xl border border-slate-100">
              <div class="flex justify-between">
                <span class="text-slate-500">Experience:</span>
                <span class="font-bold text-slate-900"><?php echo htmlspecialchars($dr['experience']); ?></span>
              </div>
              <div class="flex justify-between">
                <span class="text-slate-500">Served Areas:</span>
                <span class="font-semibold text-slate-800"><?php echo htmlspecialchars(is_array($dr['areas']) ? implode(', ', array_slice($dr['areas'], 0, 3)) : $dr['areas']); ?></span>
              </div>
            </div>
          </div>

          <div class="flex items-center gap-3 pt-2">
            <a href="<?php echo site_url('physiotherapists/' . $dr['slug'] . '/'); ?>" class="flex-1 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold text-center text-xs rounded-xl transition-colors">
              View Doctor Profile
            </a>
            <a href="<?php echo site_url('book-home-visit/?therapist=' . $dr['slug']); ?>" class="flex-1 py-3 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-bold text-center text-xs rounded-xl shadow-md shadow-sky-500/20 transition-all">
              Book Visit
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Patient Testimonials & Recovery Stories (DallasSpine Premium Feedback Cards) -->
<section class="py-20 bg-white border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-4 py-1.5 rounded-full border border-sky-100">Verified Lahore Patient Reviews</span>
      <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 mb-4">Patient Recovery Stories & Feedback</h2>
      <p class="text-slate-600 text-base leading-relaxed">Read how CareStride in-home physical therapy restored mobility, relieved severe pain, and helped patients recover without leaving home.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <!-- Testimonial 1 -->
      <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/90 shadow-sm flex flex-col justify-between space-y-6 relative hover:shadow-md transition-shadow">
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-1 text-amber-400">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            </div>
            <span class="text-[11px] font-bold text-sky-700 bg-sky-100 px-2.5 py-1 rounded-md">Post-Knee Surgery</span>
          </div>

          <p class="text-slate-700 text-sm leading-relaxed italic">
            "After my knee replacement surgery, travelling to a clinic in Lahore traffic was impossible. Dr. Mubashir came to our home in DHA Phase 5 with portable electrotherapy equipment. Within 3 weeks, I was walking comfortably without support."
          </p>
        </div>

        <div class="pt-4 border-t border-slate-200/80 flex items-center justify-between">
          <div>
            <h4 class="font-bold text-slate-900 text-sm">Ch. Tariq Mahmood</h4>
            <span class="text-xs text-slate-500">DHA Phase 5, Lahore</span>
          </div>
          <span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded border border-emerald-200">Verified Patient</span>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/90 shadow-sm flex flex-col justify-between space-y-6 relative hover:shadow-md transition-shadow">
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-1 text-amber-400">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            </div>
            <span class="text-[11px] font-bold text-sky-700 bg-sky-100 px-2.5 py-1 rounded-md">Severe Sciatica Pain</span>
          </div>

          <p class="text-slate-700 text-sm leading-relaxed italic">
            "I suffered from lower back radiating nerve pain for months. Dr. Irfan assessed my spinal alignment and designed a tailored stretch protocol. CareStride's home care is punctual, professional, and genuinely effective."
          </p>
        </div>

        <div class="pt-4 border-t border-slate-200/80 flex items-center justify-between">
          <div>
            <h4 class="font-bold text-slate-900 text-sm">Mrs. Shahida Parveen</h4>
            <span class="text-xs text-slate-500">Johar Town, Lahore</span>
          </div>
          <span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded border border-emerald-200">Verified Patient</span>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/90 shadow-sm flex flex-col justify-between space-y-6 relative hover:shadow-md transition-shadow">
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-1 text-amber-400">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            </div>
            <span class="text-[11px] font-bold text-sky-700 bg-sky-100 px-2.5 py-1 rounded-md">Stroke Neuro Rehab</span>
          </div>

          <p class="text-slate-700 text-sm leading-relaxed italic">
            "My father suffered a stroke affecting his left side. Dr. Rashid’s specialized neurological gait rehabilitation at home restored his confidence and balance. We are immensely grateful to CareStride."
          </p>
        </div>

        <div class="pt-4 border-t border-slate-200/80 flex items-center justify-between">
          <div>
            <h4 class="font-bold text-slate-900 text-sm">Usman Chaudhry</h4>
            <span class="text-xs text-slate-500">Gulberg III, Lahore</span>
          </div>
          <span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded border border-emerald-200">Verified Patient</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Homepage FAQ Section -->
<section class="py-20 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="text-center max-w-2xl mx-auto mb-14">
    <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-3.5 py-1.5 rounded-full border border-sky-100">CareStride Help Center</span>
    <h2 class="text-3xl font-extrabold text-slate-900 mt-3">Frequently Asked Questions</h2>
    <p class="text-slate-600 text-sm mt-1">Everything you need to know about CareStride home visits in Lahore.</p>
  </div>

  <div class="space-y-4">
    <?php foreach ($faqs_list as $i => $faq): ?>
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:border-sky-300 transition-colors">
        <h3 class="text-base font-bold text-slate-900 flex items-start gap-3">
          <span class="w-6 h-6 rounded-full bg-sky-100 text-sky-700 text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5"><?php echo $i+1; ?></span>
          <?php echo htmlspecialchars($faq['q']); ?>
        </h3>
        <p class="text-slate-600 text-xs leading-relaxed pl-9 mt-2"><?php echo htmlspecialchars($faq['a']); ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-8 text-center text-xs text-slate-500">
    Have specific medical questions? <a href="<?php echo site_url('contact/'); ?>" class="text-sky-600 font-bold hover:underline">Contact CareStride clinical coordinator</a> or call <a href="tel:<?php echo PHONE_RAW; ?>" class="font-bold text-slate-900"><?php echo PHONE_NUMBER; ?></a>.
  </div>
</section>

<!-- CTA Banner -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
  <div class="bg-gradient-to-r from-sky-600 via-blue-600 to-slate-900 rounded-3xl p-8 sm:p-12 text-white shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
    <div class="space-y-3 max-w-2xl">
      <div class="text-xs font-bold text-sky-200 uppercase tracking-widest">theCareStride.com — Doctor Home Care</div>
      <h2 class="text-3xl font-extrabold tracking-tight">Need Urgent Physical Therapy or Post-Op Recovery at Home?</h2>
      <p class="text-sky-100 text-sm leading-relaxed">Book a certified CareStride Doctor of Physical Therapy today. Call <strong class="text-white"><?php echo PHONE_NUMBER; ?></strong> or request online.</p>
    </div>
    <a href="<?php echo site_url('book-home-visit/'); ?>" class="shrink-0 px-8 py-4 rounded-xl font-extrabold bg-white text-sky-700 hover:bg-sky-50 transition-colors shadow-lg text-center">
      Book Doctor Visit
    </a>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
