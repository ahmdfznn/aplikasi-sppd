@props(['label', 'name', 'value'])


<div class="relative h-11 w-full min-w-[200px] my-2">
    <input
        class="peer h-full w-full border-b border-slate-500 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-slate-700 outline outline-0 transition-all placeholder-shown:border-slate-500/50 focus:border-pink-500 focus:outline-0 disabled:border-0 disabled:bg-slate-50"
        placeholder=" " name="{{ $name }}" value="{{ $value }}" />
    <label
        class="after:content[''] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-slate-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-pink-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-slate-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-pink-500 peer-focus:after:scale-x-100 peer-focus:after:border-pink-500 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-slate-500">
        {{ $label }}
    </label>
</div>
