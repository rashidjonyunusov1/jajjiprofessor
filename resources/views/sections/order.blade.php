<div class="container-fluid py-5">
    <div class="container">
        @foreach($orders as $item)
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5"><span class="pr-2">O'rindiqni buyurtma qiling</span></p>
                    <h1 class="mb-4">{{ $item->title }}</h1>
                    <p>{{ $item->description }}</p>
                    <ul class="list-inline m-0">
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>{{ $item->categoryone }}</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>{{ $item->categorytwo }}</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>{{ $item->categorythree }}</li>
                    </ul>
                    <!-- <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a> -->
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">O'rindiqni buyurtma qiling</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Ismingiz" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control border-0 p-4" placeholder="Telefon raqamingiz" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px;">
                                        <option selected>{{ $item->classes }}</option>
                                        <option value="1">Group Bugirsoq</option>
                                        <option value="2">Group Alpomish</option>
                                        <option value="3">Group Profesor</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit">Yuborish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>