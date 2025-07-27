<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class UFValue extends Component
{
    public $uf;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $response = Http::get('https://mindicador.cl/api/uf');
        $data = $response->json();
        $this->uf = $data['serie'][0]['valor'] ?? 'No disponible';
    }

         
    public function render(): View|Closure|string
    {
        return view('components.u-f-value');
    }
}
