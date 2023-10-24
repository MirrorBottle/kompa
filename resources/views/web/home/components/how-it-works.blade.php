<section class="relative block bg-primary">
    <img src="https://assets.website-files.com/646f65e37fe0275cfb808405/646f68133fc5cb4e29ed28f9_How%20It%20Works%20BG.svg"
        alt="" class="absolute inset-[0%] -z-[1] inline-block h-full w-full max-w-full object-cover">
    <div class="px-5 md:px-10">
        <div class="mx-auto w-full max-w-7xl">
            <div class="py-16 md:py-24 lg:py-32">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-sm font-bold uppercase text-accent">3 Langkah Mudah</p>
                    <h2 class="mb-4 mt-6 font-extrabold text-white text-3xl md:text-5xl">Jadi, Bagaimana <span class="text-accent">Hazzy</span> Bekerja?
                    </h2>
                    <div class="mx-auto mt-4 max-w-[528px] mb-8 md:mb-12 lg:mb-16">
                        <p class="text-[#e6e6e6]">Pakai Hazzy itu simpel banget, cuma ada tiga langkah aja. Yuk, kita
                            lihat caranya</p>
                    </div>
                </div>
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 md:gap-4 lg:gap-6 justify-items-center sm:justify-items-stretch">
                    @foreach ($steps as $step)
                        <div class="grid grid-flow-row grid-cols-1 gap-4 bg-secondary rounded-xl p-8 md:p-10">
                            <div
                                class="flex h-12 w-12 flex-col items-center justify-center rounded-full bg-primary text-white">
                                <p class="text-xl font-bold">1</p>
                            </div>
                            <div class="text-xl font-semibold text-white">{{ $step->title }}</div>
                            <div class="text-sm text-[#e6e6e6]">{{ $step->desc }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
