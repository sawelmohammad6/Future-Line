@props(['story' => []])
@php
    $videoKey = $story['video_key'] ?? '';
    $youtubeUrl = trim((string) ($story['youtube_url'] ?? config('frontend_images.videos.' . $videoKey . '.youtube_url')));
    $manualThumbnail = trim((string) ($story['thumbnail'] ?? config('frontend_images.videos.' . $videoKey . '.thumbnail')));
    $storyImage = $manualThumbnail !== ''
        ? frontend_image_value($manualThumbnail)
        : (youtube_thumbnail($youtubeUrl) ?? frontend_image_value(''));
    $storyLink = $youtubeUrl !== '' ? $youtubeUrl : route('about');
    $storyLinkLabel = ($youtubeUrl !== '' ? 'Watch video: ' : 'View story: ') . ($story['title'] ?? 'Video testimonial');
@endphp
<article class="group overflow-hidden border border-slate-200 bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-950/5">
    <a href="{{ $storyLink }}" @if ($youtubeUrl !== '') target="_blank" rel="noopener noreferrer" @endif class="relative block aspect-video overflow-hidden bg-emerald-950" aria-label="{{ $storyLinkLabel }}">
        <img src="{{ $storyImage }}" alt="{{ $story['title'] ?? 'Video testimonial' }} thumbnail" loading="lazy" decoding="async" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        <div class="absolute inset-0 bg-emerald-950/25"></div>
        <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-white/70 bg-white/95 pl-1 text-emerald-800 shadow-lg transition-colors group-hover:bg-emerald-700 group-hover:text-white" aria-hidden="true"><svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7L8 5Z"/></svg></span>
    </a>
    <div class="p-5"><p class="text-xs font-bold uppercase tracking-[0.14em] text-emerald-700">{{ $story['category'] ?? '' }}</p><h3 class="mt-2 text-lg font-bold leading-6 text-slate-950">{{ $story['title'] ?? '' }}</h3><p class="mt-3 text-sm text-slate-600">{{ $story['name'] ?? '' }} <span class="px-1 text-slate-300">|</span> {{ $story['location'] ?? '' }}</p></div>
</article>
