<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use Rawilk\Printing\Facades\Printing;

class Printer extends Component
{
    public $printers;

    public function mount()
    {
        $this->printers = Printing::printers();
    }

    public function hydrate()
    {
        $this->printers = Printing::printers();
    }

    public function print($id)
    {
        Printing::newPrintTask()
            ->printer($id)
            ->file(public_path('sample.pdf'))
            ->send();
    }

    public function render()
    {
        return view('livewire.printer');
    }
}
