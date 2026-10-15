<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'duration',
        'course_fee',
        'certification',
        'discount_boys',
        'discount_girls',
        'boys_fee',
        'girls_fee',
        'offer_tag',
        'offer_active',
        'badge_color',
        'course_slug',
    ];

    protected $casts = [
        'offer_active' => 'boolean',
        'discount_boys' => 'integer',
        'discount_girls' => 'integer',
    ];

    /**
     * Extract raw numeric fee (e.g. "₹15,000" => 15000)
     */
    public function getNumericFeeAttribute(): int
    {
        $raw = preg_replace('/[^\d]/', '', $this->course_fee ?? '');
        return !empty($raw) ? (int)$raw : 0;
    }

    /**
     * Check if course has any active discount
     */
    public function hasDiscount(): bool
    {
        return $this->offer_active && (($this->discount_boys && $this->discount_boys > 0) || ($this->discount_girls && $this->discount_girls > 0));
    }

    /**
     * Get Boys Discounted Fee formatted (e.g. "₹12,000")
     */
    public function getBoysDiscountedFeeAttribute(): string
    {
        if (!empty($this->boys_fee)) {
            return $this->boys_fee;
        }

        if ($this->hasDiscount() && $this->discount_boys > 0 && $this->numeric_fee > 0) {
            $discountAmount = ($this->numeric_fee * $this->discount_boys) / 100;
            $final = round($this->numeric_fee - $discountAmount);
            return '₹' . number_format($final);
        }

        return $this->course_fee;
    }

    /**
     * Get Girls Discounted Fee formatted (e.g. "₹9,000")
     */
    public function getGirlsDiscountedFeeAttribute(): string
    {
        if (!empty($this->girls_fee)) {
            return $this->girls_fee;
        }

        if ($this->hasDiscount() && $this->discount_girls > 0 && $this->numeric_fee > 0) {
            $discountAmount = ($this->numeric_fee * $this->discount_girls) / 100;
            $final = round($this->numeric_fee - $discountAmount);
            return '₹' . number_format($final);
        }

        return $this->course_fee;
    }
}
