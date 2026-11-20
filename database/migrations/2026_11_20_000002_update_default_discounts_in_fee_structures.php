<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\FeeStructure;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            FeeStructure::whereNull('discount_boys')
                ->orWhere('discount_boys', 0)
                ->update(['discount_boys' => 20]);

            FeeStructure::whereNull('discount_girls')
                ->orWhere('discount_girls', 0)
                ->update(['discount_girls' => 40]);

            FeeStructure::whereNull('offer_active')
                ->update(['offer_active' => true]);
        } catch (\Throwable $e) {
            // Safe fallback
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
