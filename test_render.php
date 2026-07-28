<?php
require __DIR__.'/vendor/autoload.php';
\ = require_once __DIR__.'/bootstrap/app.php';
\ = \->make(Illuminate\Contracts\Console\Kernel::class);
\->bootstrap();
\ = \App\Models\Admission::all();
\ = view('admin.dashboard', ['admissions' => \, 'blogs' => [], 'sliders' => [], 'galleries' => [], 'certificates' => [], 'fees' => []])->render();
if (strpos(\, 'profile-modal-') !== false) {
    print('Modals are rendered in HTML!');
} else {
    print('MODALS ARE MISSING');
}
