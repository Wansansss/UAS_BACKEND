@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Product</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/update-product') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Product Id</label>
                                        <input class="form-control py-4" name="id" type="text" placeholder="" value="{{$products->id}}" readonly/>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Product Code</label>
                                        <input class="form-control py-4" name="code" type="text" placeholder="" value="{{$products->product_code}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Product Name</label>
                                        <input class="form-control py-4" name="update_name" type="text" placeholder="" value="{{$products->name}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Category</label>
                                        <input class="form-control py-4" name="update_category" type="text" placeholder="" value="{{$products->category}}"/>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Stock</label>
                                        <input class="form-control py-4" name="update_stock" type="text" placeholder="" value="{{$products->stock}}" readonly/>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Buy Price (PerUnit)</label>
                                        <input class="form-control py-4 currencyInput" name="update_unit_price" type="text" placeholder="" value="{{$products->unit_price}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Sale Price(PerUnit)</label>
                                        <input class="form-control py-4 currencyInput" name="update_sale_price" type="text" placeholder="" value="{{$products->sales_unit_price}}"/>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Gallery</label>
                                        <input name="photo" type="file" />
                                    </div>
                                </div> -->
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<script>
    $(document).ready(function() {
        // Format currency dalam Rupiah saat halaman dimuat
        $('.currencyInput').each(function() {
            var value = $(this).val();
            $(this).val(formatRupiah(value));
        });

        // Format currency dalam Rupiah saat pengguna mengetik
        $('.currencyInput').on('input', function() {
            var value = $(this).val();
            $(this).val(formatRupiah(value));
        });
    });

    // Fungsi untuk mengubah angka menjadi format Rupiah
    function formatRupiah(angka) {
        // Menghilangkan karakter non-digit
        var number_string = numeral(angka.replace(/[^0-9]/g, '')).format('0,0');
        
        // Mengembalikan hasil format Rupiah
        return 'Rp ' + number_string.replace(/,/g, '.');
    }
</script>



@endsection