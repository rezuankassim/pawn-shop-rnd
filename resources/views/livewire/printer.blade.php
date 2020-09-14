<div>
    <ul class="space-y-6">
        @foreach ($printers as $printer)
            <li class="flex items-center justify-between">
                <span class="font-medium">{{ $printer->name() }}</span>

                <button wire:click="print('{{$printer->id()}}')" type="button" class="bg-indigo-300 p-2 rounded-md text-indigo-700 hover:bg-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </li>
        @endforeach
    </ul>
    
</div>
