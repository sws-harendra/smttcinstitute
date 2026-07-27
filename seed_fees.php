<?php

use App\Models\FeeStructure;

FeeStructure::create([
    'course_name' => 'AC Repairing',
    'duration' => '3 Months',
    'course_fee' => '₹12,000',
    'certification' => 'Yes'
]);
FeeStructure::create([
    'course_name' => 'Washing Machine Repairing',
    'duration' => '2 Months',
    'course_fee' => '₹9,000',
    'certification' => 'Yes'
]);
FeeStructure::create([
    'course_name' => 'LED / LCD TV Repairing',
    'duration' => '3 Months',
    'course_fee' => '₹14,000',
    'certification' => 'Yes'
]);
FeeStructure::create([
    'course_name' => 'Mobile Repairing',
    'duration' => '3 Months',
    'course_fee' => '₹15,000',
    'certification' => 'Yes'
]);
FeeStructure::create([
    'course_name' => 'Laptop Repairing',
    'duration' => '3 Months',
    'course_fee' => '₹18,000',
    'certification' => 'Yes'
]);
echo "Fees seeded\n";
