<div class="container-fluid py-5">
    <div class="container">
        @foreach($about as $item)
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="/files/{{ $item->img }}" width="700px">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">So'nggi maqola</span></p>
                    <h1 class="mb-4">{{ $item->title }}</h1>
                    <p>{{ $item->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>