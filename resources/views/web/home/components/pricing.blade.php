<div class="relative bg-neutral">
    <div class="px-5 md:px-10">
        <div class="mx-auto w-full max-w-7xl">
            <div class="py-16 md:py-24 lg:py-32">
                <div class="rounded-[60px] bg-primary px-12 text-white py-16 md:py-24 lg:py-32">
                    <div class="mx-auto max-w-3xl text-center mb-8 md:mb-12 lg:mb-16">
                        <h2 class="mb-4 mt-6 font-extrabold text-3xl md:text-5xl"><span class="text-accent">Pricing</span> yang Gak Bikin <span class="text-accent">Pusing!</span></h2>
                        <div class="mx-auto mt-4 max-w-[528px]">
                            <p class="text-[#e6e6e6]">Hazzy punya satu rencana harga aja, tapi itu udah bikin kamu bisa akses semua fitur keren. Yuk, langsung cek harganya dan mulai manajemen risikomu!</p>
                        </div>
                    </div>
                    <div
                        class="mx-auto grid h-auto gap-4 bg-primary py-12 rounded-md w-full lg:w-full grid-cols-[1.25fr] lg:grid-cols-2 px-0 lg:px-20">
                        <div
                            class="grid h-full gap-[16px] border border-solid border-secondary px-10 py-14 rounded-xl grid-cols-1 sm:grid-cols-2">
                            @php
                                $pricingFeatures = ['Semua Fitur Hazzy', 'Support 24/7', 'Update Berkala', 'Pelatihan Online', 'Backup Data', 'Kustomisasi Laporan'];
                            @endphp
                            @foreach ($pricingFeatures as $pricingFeature)
                            <div class="flex flex-row items-center text-left">
                                <div class="inline-block h-4 w-4 max-w-full mr-4 bg-accent rounded-full"></div>
                                <p class="">{{ $pricingFeature }}</p>
                            </div>
                            @endforeach

                        </div>
                        <div class="flex flex-col items-start bg-secondary px-10 py-12 rounded-xl">
                            <div
                                class="flex w-full justify-between max-[479px]:flex-col max-[479px]:gap-[16px] items-center sm:items-center">
                                <h2 class="mb-4 mt-6 text-left font-extrabold text-3xl md:text-5xl">Rp. 700K<span
                                        class="text-sm font-light text-[#e6e6e6]">/bulan</span>
                                </h2>
                                <a href="#"
                                    class="inline-block cursor-pointer rounded-[60px] border border-solid border-accent bg-accent px-6 py-4 text-center font-bold text-white no-underline transition hover:border-primary hover:bg-primary hover:outline-0">Pesan</a>
                            </div>
                            <div class="mb-6 mt-6 w-full border-[0.5px] border-solid border-accent"></div>
                            <p class="text-sm text-[#e6e6e6]">Harga dapat berubah tanpa pemberitahuan sebelumnya. Garansi kembalian uang berlaku selama 30 hari setelah pembelian.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
