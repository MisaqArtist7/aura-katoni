{{-- Payment canceled --}}
<script src="{{ asset('assets/js/tailwind.js') }}"></script>

@if (session('error'))
    <div class="mb-6 rounded-2xl border border-red-300 bg-red-50 p-4 text-red-700 shadow-sm">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-red-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v2m0 4h.01M5.93 19h12.14c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L4.2 16c-.77 1.33.19 3 1.73 3z"/>
            </svg>

            <div>
                <div class="font-yekanBakhBold">
                    پرداخت ناموفق
                </div>
                <div class="text-sm mt-1">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    </div>
@endif
