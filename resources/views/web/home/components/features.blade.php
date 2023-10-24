<section class="relative bg-neutral">
    <div class="px-5 md:px-10">
        <div class="mx-auto w-full max-w-7xl">
            <div class="flex-col flex gap-y-20 max-[479px]:gap-[60px] items-center lg:items-center py-20 lg:py-24">
                <div class="flex-col flex items-center gap-y-[16px] sm:gap-y-4">
                    <h2 class="text-center font-extrabold text-3xl sm:text-4xl lg:text-5xl text-white">Fitur <span class="text-accent">Hazzy</span> yang Bikin <br>Kamu Bilang <span class="text-accent">'Wow'!</span></h2>
                    <p class="text-center text-[#e6e6e6] text-base sm:text-base">Kami punya serangkaian fitur keren di Hazzy yang bisa bikin manajemen risiko jadi lebih mudah. <br>Ayo, kita intip lebih dalam!
                    </p>
                </div>
                <div class="flex-col flex items-start gap-y-20">
                    <div
                        class="grid min-w-full border border-solid border-primary bg-primary max-[991px]:gap-[30px] max-[767px]:gap-[24px] max-[479px]:gap-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 p-5 sm:p-[24px] md:p-[30px] lg:p-10 rounded-lg sm:rounded-xl lg:rounded-2xl">

                        @foreach ($features as $feature)
                            <div class="p-0 lg:p-[24px]">
                                <div
                                    class="flex-col flex min-h-full items-start gap-y-[5px] border border-solid border-primary bg-neutral p-5 md:p-[24px] rounded-lg sm:rounded-xl">
                                    <img src="{{ $feature->image }}"
                                        alt=""
                                        class="inline-block h-52 max-w-full object-cover rounded-lg mx-auto">
                                    <div class="flex-col flex min-w-full items-start gap-y-[4px]">
                                        <div class="font-bold text-base sm:text-lg md:text-xl text-white">{{ $feature->title }}</div>
                                        <p class="text-[#e6e6e6] text-base sm:text-base">{{ $feature->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
