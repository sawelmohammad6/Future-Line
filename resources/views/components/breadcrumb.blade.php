@props(['items' => []])
<nav aria-label="Breadcrumb" class="text-sm text-slate-500">
    <ol class="flex flex-wrap gap-2"><li><a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a></li>@foreach($items as $item)<li>/</li><li>{{ $item }}</li>@endforeach</ol>
</nav>
