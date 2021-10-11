<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportExcel implements WithStrictNullComparison, FromView, WithStyles,WithEvents
{
    protected $view;
    protected $items;

   public function __construct( $items, $view)
   {
       $this->items = $items;
       $this->view = $view;
   }



    public function view(): View
    {
        return view($this->view , $this->items);
    }

    public function styles(Worksheet $sheet)
    {
        return [
        ];
    }

    public function registerEvents(): array
    {
        return [

            BeforeSheet::class  =>function(BeforeSheet $event){
                $event->getDelegate()->setRightToLeft(true);
            }
        ];
    }
}
