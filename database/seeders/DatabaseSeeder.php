<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\LeadDetail;
use App\Models\LeadFile;
use App\Models\LeadStat;
use App\Models\LeadQuestion;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        LeadQuestion::factory()->create([
            'question' => 'Jak jste se o nás dozvěděli?',
        ]);

        // Generuj 20 leadů
        Lead::factory(20)->create()->each(function ($lead) {
            

            LeadDetail::factory(rand(0,3))->create([
                'lead_id' => $lead->id,
            ]);

            // Pro ~ polovina leadů vytvoř 1 dokument (dummy)
            if (rand(0,1)) {
                LeadFile::factory()->create([
                    'lead_id' => $lead->id,
                ]);
            }
        });

        $startDate = now()->subDays(14);
        for ($i = 0; $i < 15; $i++) {
            $date = $startDate->copy()->addDays($i)->toDateString();
            if (!LeadStat::where('date', $date)->exists()) {
                LeadStat::factory()->create([
                    'date' => $date,
                ]);
            }
        }

    }
}