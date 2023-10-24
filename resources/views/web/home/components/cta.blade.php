<section class="relative block bg-primary">
    <div class="px-5 md:px-10">
        <div class="py-16 md:py-24 lg:py-32">
            <div class="mx-auto w-full max-w-7xl rounded-[60px] bg-neutral px-4">
                <div class="py-16 md:py-24 lg:py-32">
                    <div class="mx-auto w-full max-w-3xl max-[479px]:px-2">
                        <div class="text-center">
                            <div class="mb-8 md:mb-12 lg:mb-16">
                                <h2 class="mb-4 mt-6 text-3xl font-extrabold text-white md:text-5xl">Atau Ingin Mencoba
                                    Sebelum Membeli?</h2>
                            </div>
                            <div
                                class="mx-auto mb-6 flex max-w-[640px] grid-cols-[1.25fr_1fr_1fr] flex-nowrap items-center justify-center gap-0 max-[479px]:flex-col sm:items-center md:mb-10 lg:mb-12">
                                @php
                                    $trialFeatures = ['Semua Fitur Hazzy', '30 Hari Trial', 'Bisa Langsung Upgrade'];
                                @endphp
                                @foreach ($trialFeatures as $trialFeature)
                                    <div class="ml-2 mr-2 flex flex-row items-center max-[479px]:mt-2 md:ml-4 md:mr-4">
                                        <div class="mr-2 inline-block h-8 w-8 max-w-full bg-accent rounded-full"></div>
                                        <p class="text-white">{{ $trialFeature }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <a href="#"
                                class="inline-block cursor-pointer border border-solid border-accent bg-accent px-8 py-4 text-center font-bold text-white transition hover:border-secondary hover:bg-secondary rounded-lg">Mulai, yuk!</a>
                            <p class="text-[#e6e6e6] mt-4">Tidak perlu informasi pembayaran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
