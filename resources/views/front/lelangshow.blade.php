@extends('layouts.front')

@section('style')

<style>
    .alert {

        padding: 15px;

        margin-bottom: 20px;

        border: 1px solid transparent;

        border-radius: 4px;

    }

    .alert-success {

        color: #3c763d;

        background-color: #dff0d8;

        border-color: d6e9c6;

    }

    </style>
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/product_page.css') }}" rel="stylesheet">

@endsection

@section('content')

<div class="container margin_30">

    <div class="row">

        <div class="col-md-6">
            <div class="all">
                <div class="slider">
                    <div class="owl-carousel owl-theme main">
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photo) }});" class="item-box"></div>
                        @if (!empty($lelang->photoa))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photoa) }});" class="item-box"></div>
                        @endif
                        @if (!empty($lelang->photob))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photob) }});" class="item-box"></div>
                        @endif
                        @if (!empty($lelang->photoc))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photoc) }});" class="item-box"></div>
                        @endif
                        @if (!empty($lelang->photod))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photod) }});" class="item-box"></div>
                        @endif
                    </div>
                    <div class="left nonl"><i class="ti-angle-left"></i></div>
                    <div class="right"><i class="ti-angle-right"></i></div>
                </div>
                <div class="slider-two">
                    <div class="owl-carousel owl-theme thumbs">
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photo) }});" class="item active"></div>
                        @if (!empty($lelang->photoa))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photoa) }});" class="item"></div>
                        
                        @endif
                        
                        @if (!empty($lelang->photob))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photob) }});" class="item"></div>
                        @endif
                        @if (!empty($lelang->photoc))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photoc) }});" class="item"></div>
                        @endif
                        @if (!empty($lelang->photod))
                        <div style="background-image: url({{ asset('admin/lelang/'.$lelang->photod) }});" class="item"></div>
                        @endif
                    </div>
                    <div class="left-t nonl-t"></div>
                    <div class="right-t"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="breadcrumbs">

                <ul>

                    <li><a href="{{ route('front') }}">Home</a></li>

                    <li><a href="{{ route('front.lelang') }}">Lelang</a></li>

                    <li>{{ $lelang->title }}</li>

                </ul>

            </div>

            <!-- /page_header -->

            <div class="prod_info">

                <h1>{{ $lelang->title }}</h1>

                <br>

                <p><b>Detail:</b><br>{{ $lelang->detail }}</p>
   
                    <div class="row">
   
                        <div class="col-xl-5 col-lg-5 col-md-6 col-6">
   
                            <table>
   
                                <tr>
   
                                    <td>Jenis ikan</td>
   
                                    <td>:</td>
   
                                    <td>{{ $lelang->jenis_ikan }}</td>
   
                                </tr>
   
                                <tr>
   
                                    <td>Kwalitas</td>
   
                                    <td>:</td>
   
                                    <td>{{ $lelang->kualitas }}</td>
   
                                </tr>
   
                                <tr>
   
                                    <td>Quantity</td>
   
                                    <td>:</td>
   
                                    <td>{{ $lelang->qty }}</td>
   
                                </tr>
   
                            </table>
   
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-8 col-md-6">

                            <div class="price_main"><span class="new_price">Open Bid: Rp. {{ number_format($lelang->harga_awal) }}</span></div>

                        </div>

                    </div>

                    <br>

                    @guest

                    <div class="row">

                        <div class="col-lg-9 col-md-6">

                            <div class="btn_add_to_cart">

                                <a href="{{ route('login') }}" class="btn_1">Hanya Member Yang Dapat Melakukan Penawaran. Klik Disini Untuk Masuk Atau Daftar</a>

                            </div>

                        </div>  

                    </div>

                    @else
                  
                    @if (Auth::user()->status == 'Actived')
                  
                    <form action="{{ route('front.lelang.bid') }}" method="POST">
                  
                        @csrf

                        @if(session('success'))

                        <div class="alert alert-success"> 

                            {{session('success')}}                  
          
                        </div>          
           
                        @endif  

                        <div class="row">                 
            
                            <input type="hidden" name="id_lelang" value="{{ $lelang->id }}">    
            
                            <div class="col-lg-6 col-md-6">

                                <input type="number" name="bid" class="form-control">

                            </div>

                            <div class="col-lg-4 col-md-6">

                                <div class="btn_add_to_cart">           
           
                                    <button type="submit" class="btn_1">Bid</button>

                                </div>         
              
                            </div> 

                        </div>
                    
                    </form> 
                   
                    @elseif(Auth::user()->status == 'Submission')
                   
                    <div class="btn_add_to_cart">

                        <a href="#" class="btn_1">Proses Verifikasi. Saat ini pengajuan anda menjadi member sedang proses verifikasi.</a>

                    </div>

                    @endif                   
             
                    @endguest                      

                </div>

            </div>        
  
        </div>

    </div>
  
<div class="tabs_product">

    <div class="container">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>Username</th>

                    <th>Penawaran</th>

                </tr>

            </thead>


            @foreach ($bid as $data)    
          
            <tbody>
          
                <tr>
          
                    <td>
          
                        {{ substr($data->user->name, 0, 3) }}xxxxxx
                       
                        {{-- {{ substr($bid->name,0, 3) }}xxxxxx --}}
                    </td>
          
                    <td>Rp. {{number_format( $data->bid) }}</td>
          
                </tr>
          
            </tbody>

            @endforeach
           
            @if (count($bid)==0)
            <tr><td colspan='6' align='center'>Belum ada penawaran</td></tr>
            @endif

        </table>

    </div>

</div>

<br>

@endsection

@section('script')

<!-- SPECIFIC SCRIPTS -->

<script  src="{{ asset('front/js/carousel_with_thumbs.js') }}"></script>

@endsection