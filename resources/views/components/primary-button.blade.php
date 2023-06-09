@props(['value'])

<button
    {{ $attributes->merge(['class' => 'middle none center rounded-lg bg-slate-900 py-3 px-6 my-3 font-sans text-xs font-bold uppercase text-white shadow-md shadow-slate-900/20 transition-all hover:shadow-lg hover:shadow-slate-900/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none', 'data-ripple-light' => 'true']) }}>
    {{ $value ?? $slot }}
</button>
