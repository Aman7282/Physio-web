  </main> <!-- End Main -->

  <!-- Footer -->
  <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
        
        <!-- Brand Info -->
        <div class="lg:col-span-2 space-y-4">
          <a href="<?php echo site_url(''); ?>" class="inline-block">
            <img src="<?php echo site_url('assets/images/logo.png'); ?>" alt="CareStride Logo" class="h-10 w-auto bg-white p-1.5 rounded-xl shadow-sm">
          </a>
          <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
            CareStride (theCareStride.com) is Lahore's premier licensed home physical therapy service. We deliver hospital-grade rehabilitation, post-op care, and senior mobility directly to your doorstep.
          </p>
          <div class="flex flex-wrap items-center gap-2 text-xs text-slate-400 pt-2">
            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-sky-950 text-sky-300 font-medium border border-sky-800">
              ✓ PNC & PMDC Certified Doctors
            </span>
            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-sky-950 text-sky-300 font-medium border border-sky-800">
              ✓ Portable Ultrasound & TENS
            </span>
          </div>
        </div>

        <!-- Quick Links: Services -->
        <div>
          <h3 class="text-xs font-semibold text-sky-400 uppercase tracking-wider mb-4">Core Services</h3>
          <ul class="space-y-2 text-xs">
            <?php foreach ($services as $s_slug => $s_item): ?>
              <li><a href="<?php echo site_url('physiotherapy-at-home/' . $s_slug . '/'); ?>" class="hover:text-sky-300 transition-colors"><?php echo htmlspecialchars($s_item['title']); ?></a></li>
            <?php endforeach; ?>
            <li class="pt-1"><a href="<?php echo site_url('physiotherapy-at-home/'); ?>" class="text-sky-400 font-medium hover:underline">View All Services →</a></li>
          </ul>
        </div>

        <!-- Quick Links: Locations & Practice -->
        <div>
          <h3 class="text-xs font-semibold text-sky-400 uppercase tracking-wider mb-4">Lahore Coverage</h3>
          <ul class="space-y-2.5 text-xs">
            <li><a href="<?php echo site_url('locations/lahore/dha/'); ?>" class="hover:text-sky-300 transition-colors">DHA Lahore (Phase 1 to 9)</a></li>
            <li><a href="<?php echo site_url('locations/lahore/johar-town/'); ?>" class="hover:text-sky-300 transition-colors">Johar Town Phase 1 & 2</a></li>
            <li><a href="<?php echo site_url('locations/lahore/gulberg/'); ?>" class="hover:text-sky-300 transition-colors">Gulberg I, II, III</a></li>
            <li><a href="<?php echo site_url('locations/lahore/model-town/'); ?>" class="hover:text-sky-300 transition-colors">Model Town & Garden Town</a></li>
            <li><a href="<?php echo site_url('locations/lahore/'); ?>" class="hover:text-sky-300 transition-colors font-medium text-sky-400">All Coverage Zones →</a></li>
          </ul>
        </div>

        <!-- Quick Links: Company & Support -->
        <div>
          <h3 class="text-xs font-semibold text-sky-400 uppercase tracking-wider mb-4">Support & Info</h3>
          <ul class="space-y-2.5 text-xs">
            <li><a href="<?php echo site_url('book-home-visit/'); ?>" class="hover:text-sky-300 transition-colors font-semibold text-sky-300">Book Home Visit</a></li>
            <li><a href="<?php echo site_url('pricing/'); ?>" class="hover:text-sky-300 transition-colors">Visit Fees & Charges</a></li>
            <li><a href="<?php echo site_url('how-it-works/'); ?>" class="hover:text-sky-300 transition-colors">How It Works</a></li>
            <li><a href="<?php echo site_url('about/'); ?>" class="hover:text-sky-300 transition-colors">About CareStride Team</a></li>
            <li><a href="<?php echo site_url('faqs/'); ?>" class="hover:text-sky-300 transition-colors">Frequently Asked Questions</a></li>
            <li><a href="<?php echo site_url('contact/'); ?>" class="hover:text-sky-300 transition-colors">Contact Support</a></li>
            <li><a href="<?php echo site_url('resources/'); ?>" class="hover:text-sky-300 transition-colors">Patient Education Blog</a></li>
          </ul>
        </div>

      </div>

      <!-- Bottom Bar & Legal Policies -->
      <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-500">
        <p>© <?php echo date('Y'); ?> CareStride (theCareStride.com). All rights reserved.</p>
        <div class="flex items-center gap-6">
          <a href="<?php echo site_url('privacy/'); ?>" class="hover:text-slate-400 transition-colors">Privacy Policy</a>
          <a href="<?php echo site_url('terms/'); ?>" class="hover:text-slate-400 transition-colors">Terms of Service</a>
          <a href="<?php echo site_url('cancellation-refund/'); ?>" class="hover:text-slate-400 transition-colors">Cancellation & Refund Policy</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Quick Button -->
  <a href="<?php echo WHATSAPP_LINK; ?>?text=Hello%20PhysioHome%20Lahore,%20I%20would%20like%20to%20book%20a%20home%20physiotherapy%20visit." target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-50 bg-emerald-500 hover:bg-emerald-600 text-white p-3.5 rounded-full shadow-2xl transition-transform hover:scale-110 flex items-center justify-center group" title="Chat on WhatsApp">
    <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
    <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-300 ease-in-out text-xs font-semibold pl-0 group-hover:pl-2">
      Fast WhatsApp Booking
    </span>
  </a>

</body>
</html>
