<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/data.php';

$seo_title = isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME . ' | ' . SITE_TAGLINE;
$seo_desc = isset($page_meta_desc) ? $page_meta_desc : 'Licensed Doctor of Physical Therapy (DPT) home visits in Lahore. Specialized back pain, post-surgery knee/hip rehab, stroke neuro care & senior mobility.';
$canonical_url = current_full_url();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($seo_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($seo_desc); ?>">
  <meta name="keywords" content="physiotherapy at home lahore, home physiotherapist dha lahore, johar town physio, post knee replacement rehab lahore, sciatica relief home care, female physiotherapist lahore">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

  <!-- Open Graph / Social SEO -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo htmlspecialchars($seo_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($seo_desc); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
  <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">

  <!-- Schema.org Medical & Local Business SEO Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "MedicalClinic",
    "name": "<?php echo SITE_NAME; ?>",
    "description": "<?php echo htmlspecialchars($seo_desc); ?>",
    "url": "<?php echo site_url(); ?>",
    "telephone": "<?php echo PHONE_NUMBER; ?>",
    "email": "<?php echo CONTACT_EMAIL; ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Phase 5 Commercial",
      "addressLocality": "Lahore",
      "addressRegion": "Punjab",
      "postalCode": "54000",
      "addressCountry": "PK"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 31.4707,
      "longitude": 74.4101
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
      "opens": "08:00",
      "closes": "21:00"
    },
    "medicalSpecialty": ["Physiotherapy", "PhysicalTherapy", "Neurology", "Orthopedics"]
  }
  </script>

  <!-- Google Fonts: Plus Jakarta Sans (DallasSpine Premium Clean Typography) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Tailwind CSS provided by Antigravity CDN -->
  <script src="https://www.gstatic.com/antigravity/web/dev/tailwindcss.min.js"></script>
  <style>
    body {
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col antialiased selection:bg-teal-100 selection:text-teal-900">

  <!-- Top Announcement / Hotline Bar -->
  <div class="bg-sky-950 text-sky-100 text-xs py-2 px-4 border-b border-sky-800">
    <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
      <div class="flex items-center gap-3">
        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-sky-500/20 text-sky-300 border border-sky-400/30">
          <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse mr-1.5"></span>
          Lahore Doctor Home Visits Active
        </span>
        <span class="hidden md:inline text-sky-200">theCareStride.com — Professional In-Home Physiotherapy</span>
      </div>
      <div class="flex items-center gap-4 text-xs">
        <a href="tel:<?php echo PHONE_RAW; ?>" class="hover:text-sky-300 transition-colors flex items-center gap-1 font-medium">
          <svg class="w-3.5 h-3.5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          Direct Line: <?php echo PHONE_NUMBER; ?>
        </a>
        <a href="<?php echo WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="hover:text-emerald-300 transition-colors flex items-center gap-1 font-medium text-emerald-300">
          <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
          WhatsApp Booking
        </a>
      </div>
    </div>
  </div>

  <!-- Header Navigation -->
  <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-sky-100 shadow-sm" id="mainHeader">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        
        <!-- Logo -->
        <a href="<?php echo site_url(''); ?>" class="flex items-center gap-3 group shrink-0">
          <img src="<?php echo site_url('assets/images/logo.png'); ?>" alt="CareStride - Home Physiotherapy Lahore" class="h-11 w-auto object-contain">
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="hidden lg:flex items-center space-x-1 font-medium text-sm text-slate-700">
          <a href="<?php echo site_url(''); ?>" class="nav-link px-3.5 py-2 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition-colors">Home</a>
          
          <!-- Services Dropdown -->
          <div class="relative group">
            <a href="<?php echo site_url('physiotherapy-at-home/'); ?>" class="nav-link px-3.5 py-2 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition-colors inline-flex items-center gap-1">
              Physiotherapy Services
              <svg class="w-4 h-4 text-slate-400 group-hover:text-sky-600 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </a>
            <div class="absolute left-0 mt-1 w-72 bg-white rounded-xl shadow-xl border border-sky-100 py-2 hidden group-hover:block z-50">
              <div class="px-3 py-1.5 text-xs font-semibold text-sky-500 uppercase tracking-wider">Specialized Therapies</div>
              <?php foreach ($services as $s_slug => $s_item): ?>
                <a href="<?php echo site_url('physiotherapy-at-home/' . $s_slug . '/'); ?>" class="block px-4 py-2 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium"><?php echo htmlspecialchars($s_item['title']); ?></a>
              <?php endforeach; ?>
            </div>
          </div>

          <a href="<?php echo site_url('physiotherapists/'); ?>" class="nav-link px-3.5 py-2 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition-colors">Our Doctors</a>
          
          <!-- Locations Dropdown -->
          <div class="relative group">
            <a href="<?php echo site_url('locations/lahore/'); ?>" class="nav-link px-3.5 py-2 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition-colors inline-flex items-center gap-1">
              Lahore Coverage
              <svg class="w-4 h-4 text-slate-400 group-hover:text-sky-600 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </a>
            <div class="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-xl border border-sky-100 py-2 hidden group-hover:block z-50">
              <div class="px-3 py-1.5 text-xs font-semibold text-sky-500 uppercase tracking-wider">Served Neighborhoods</div>
              <a href="<?php echo site_url('locations/lahore/dha/'); ?>" class="block px-4 py-2 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">DHA Lahore (All Phases)</a>
              <a href="<?php echo site_url('locations/lahore/johar-town/'); ?>" class="block px-4 py-2 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">Johar Town</a>
              <a href="<?php echo site_url('locations/lahore/gulberg/'); ?>" class="block px-4 py-2 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">Gulberg I, II, III</a>
              <a href="<?php echo site_url('locations/lahore/model-town/'); ?>" class="block px-4 py-2 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 font-medium">Model Town</a>
            </div>
          </div>

          <a href="<?php echo site_url('pricing/'); ?>" class="nav-link px-3.5 py-2 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition-colors">Pricing</a>
          <a href="<?php echo site_url('how-it-works/'); ?>" class="nav-link px-3.5 py-2 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition-colors">How It Works</a>
          <a href="<?php echo site_url('resources/'); ?>" class="nav-link px-3.5 py-2 rounded-lg hover:text-sky-600 hover:bg-sky-50 transition-colors">Patient Guides</a>
        </nav>

        <!-- CTA Buttons -->
        <div class="hidden lg:flex items-center gap-3">
          <a href="<?php echo site_url('book-home-visit/'); ?>" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl font-bold text-sm bg-gradient-to-r from-sky-500 to-blue-600 text-white shadow-md shadow-sky-500/25 hover:from-sky-600 hover:to-blue-700 transition-all hover:scale-[1.02]">
            Book Home Visit
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
          </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="flex lg:hidden items-center gap-2">
          <a href="<?php echo site_url('book-home-visit/'); ?>" class="px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-sky-600 text-white">Book</a>
          <button id="mobileMenuBtn" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="p-2 rounded-lg text-slate-600 hover:bg-slate-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
        </div>

      </div>
    </div>

    <!-- Mobile Drawer Navigation -->
    <div id="mobileMenu" class="hidden lg:hidden border-b border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3">
      <div class="font-semibold text-xs text-slate-400 uppercase tracking-wider mb-1">Navigation</div>
      <a href="<?php echo site_url(''); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">Home</a>
      <a href="<?php echo site_url('physiotherapy-at-home/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">All Physiotherapy Services</a>
      <div class="pl-4 space-y-1 text-sm border-l-2 border-teal-100 my-1">
        <?php foreach ($services as $s_slug => $s_item): ?>
          <a href="<?php echo site_url('physiotherapy-at-home/' . $s_slug . '/'); ?>" class="block py-1 text-slate-600 hover:text-teal-600">• <?php echo htmlspecialchars($s_item['title']); ?></a>
        <?php endforeach; ?>
      </div>
      <a href="<?php echo site_url('physiotherapists/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">Physiotherapist Team</a>
      <a href="<?php echo site_url('locations/lahore/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">Lahore Coverage Areas</a>
      <a href="<?php echo site_url('pricing/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">Pricing & Packages</a>
      <a href="<?php echo site_url('how-it-works/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">How It Works</a>
      <a href="<?php echo site_url('about/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">About Us</a>
      <a href="<?php echo site_url('faqs/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">FAQs & Help</a>
      <a href="<?php echo site_url('contact/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">Contact Us</a>
      <a href="<?php echo site_url('resources/'); ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-teal-50">Patient Education</a>
      <div class="pt-2">
        <a href="<?php echo site_url('book-home-visit/'); ?>" class="w-full inline-flex items-center justify-center px-4 py-3 rounded-xl font-bold bg-teal-600 text-white shadow-md">Book Home Visit Now</a>
      </div>
    </div>
  </header>

  <main class="flex-grow">
