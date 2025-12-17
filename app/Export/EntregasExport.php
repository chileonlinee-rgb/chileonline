
<?php
namespace App\Exports;

use App\Models\Entrega;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntregasExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        return Entrega::query()
            ->when($this->filters['start_date'], function($q) {
                $q->whereDate('fecha', '>=', $this->filters['start_date']);
            })
            ->when($this->filters['end_date'], function($q) {
                $q->whereDate('fecha', '<=', $this->filters['end_date']);
            })
            ->when($this->filters['vendedor'], function($q) {
                $q->where('vendedor', $this->filters['vendedor']);
            })
            ->get()
            ->map(function ($item) {
                return [
                    'Fecha' => $item->fecha,
                    'Producto' => $item->producto,
                    'Precio' => $item->precio,
                    'Comisión' => $item->comision,
                    'Vendedor' => $item->vendedor,
                    'Teléfono Vendedor' => $item->vendedor_relacion->telefono,
                    'Email Vendedor' => $item->vendedor_relacion->email
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Fecha',
            'Producto',
            'Precio',
            'Comisión',
            'Vendedor',
            'Teléfono Vendedor',
            'Email Vendedor'
        ];
    }
}

