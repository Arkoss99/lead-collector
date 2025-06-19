<?php

namespace App\Exports;

use App\Models\LeadStat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DailyLeadStatsExport implements FromCollection, WithHeadings
{
    protected $date;


    public function __construct($date)
    {
        $this->date = $date; 
    }

    public function collection()
    {
        return LeadStat::where('date', $this->date)
            ->orderBy('date', 'asc')
            ->select('date', 'new_count', 'contacted_count', 'closed_count', \DB::raw('(new_count + contacted_count + closed_count) as total_count'))
            ->get();
    }
    public function headings(): array 
    {
        return [
            'Date',
            'New Leads Count',
            'Contacted Leads Count',
            'Closed Leads Count',
            'Total Leads Count'
        ];
    }
}
