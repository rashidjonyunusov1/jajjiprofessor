<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Bizning sinflar</span></p>
            <h1 class="mb-4">Farzandlaringiz uchun gruhni tanlang</h1>
        </div>
        <div class="row">
            @foreach($groups as $item)
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="/files/{{ $item->img }}" style="width:100%;">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $item->title }}</h4>
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Bolalar yoshi</strong></div>
                                <div class="col-6 py-1">{{ $item->age }}</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Jami o'rindiqlar</strong></div>
                                <div class="col-6 py-1">{{ $item->space }}</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Dars vaqti</strong></div>
                                <div class="col-6 py-1">{{ $item->time }}</div>
                            </div>
                            <div class="row">
                                <div class="col-6 py-1 text-right border-right"><strong>Oylik to'lov</strong></div>
                                <div class="col-6 py-1">{{ $item->money }}</div>
                            </div>
                        </div>
                        <a href="tel:+998996111300" class="btn btn-primary px-4 mx-auto mb-4">Hoziroq qo'shil</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>