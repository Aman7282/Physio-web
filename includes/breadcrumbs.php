<?php
function render_breadcrumbs($items = []) {
    $html = '<nav class="flex text-xs font-medium text-slate-500 py-3 mb-6 border-b border-slate-200" aria-label="Breadcrumb">';
    $html .= '<ol class="inline-flex items-center space-x-1 md:space-x-2">';
    $html .= '<li class="inline-flex items-center">';
    $html .= '<a href="' . site_url('') . '" class="hover:text-teal-600 inline-flex items-center">';
    $html .= '<svg class="w-3.5 h-3.5 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>';
    $html .= 'Home</a></li>';

    foreach ($items as $item) {
        $html .= '<li><div class="flex items-center">';
        $html .= '<svg class="w-3.5 h-3.5 text-slate-300 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>';
        if (isset($item['link']) && !empty($item['link'])) {
            $html .= '<a href="' . site_url($item['link']) . '" class="hover:text-teal-600">' . htmlspecialchars($item['name']) . '</a>';
        } else {
            $html .= '<span class="text-slate-800 font-semibold">' . htmlspecialchars($item['name']) . '</span>';
        }
        $html .= '</div></li>';
    }

    $html .= '</ol></nav>';
    return $html;
}
?>
