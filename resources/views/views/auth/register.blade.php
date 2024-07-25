@extends('layouts.authentikasi')

@section('content')
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Registration form -->
                <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="panel registration-form">
                                <div class="panel-body">
                                    <div class="text-center">
                                        <img src={{url('/public/assets/images/pupr.jpg')}} alt="logo_pupr" style="width: 120px"/>
                                        <h5 class="content-group-lg">REGISTRASI AKUN REKOMENDASI LISENSI LSP <small class="display-block">* semua form wajib di isi</small></h5>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" value="{{old('username')}}" autofocus required>
                                            <div class="form-control-feedback">
                                                <i class="icon-user-plus text-muted"></i>
                                            </div>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" name="nama_lsp" class="form-control @error('nama_lsp') is-invalid @enderror" placeholder="Nama Lembaga Sertifikasi Profesi" value="{{old('nama_lsp')}}" autofocus required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>
                                                @error('nama_lsp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{old('email')}}" autofocus required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                    <select class="select-search" name="kategori_pembentuk">
                                                    <option value="900">Pilih Kategori Pembentuk</option>
                                                      <option value="APT">Asosiasi Profesi Terakreditasi</option>
                                                      <option value="LPPK">Lembaga Pendidikan dan Pelatihan Kerja</option>      
                                                    </select>
                                                @error('asosiasi_pendiri')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                    <select class="select-search" name="asosiasi_pendiri">
                                                    <option value="900">Pilih Asosiasi</option>
                                                      @foreach ($asosiasi as $item)
                                                      <option value="{{$item->id}}">{{$item->asosiasi}}</option>    
                                                      @endforeach
                                                    </select>
                                                @error('asosiasi_pendiri')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                    <select class="select-search" name="asosiasi_pendiri_1">
                                                        <option value="900">Pilih Asosiasi</option>
                                                      @foreach ($asosiasi as $item)
                                                      <option value="{{$item->id}}">{{$item->asosiasi}}</option>    
                                                      @endforeach
                                                    </select>
                                                @error('asosiasi_pendiri')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                    <select class="select-search" name="asosiasi_pendiri_2">
                                                        <option value="900">Pilih Asosiasi</option>
                                                      @foreach ($asosiasi as $item)
                                                      <option value="{{$item->id}}">{{$item->asosiasi}}</option>    
                                                      @endforeach
                                                    </select>
                                                @error('asosiasi_pendiri')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" value="{{old('alamat')}}" autofocus required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                                @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input name="no_kontak" type="text" class="form-control @error('no_kontak') is-invalid @enderror" placeholder="No Telepon" value="{{old('no_kontak')}}" autofocus required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-phone text-muted"></i>
                                                </div>
                                                @error('no_kontak')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autofocus required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input id="nama_penanggung_jawab" type="text" class="form-control" name="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab" autofocus required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                                @error('nama_penanggung_jawab')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autofocus required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group has-feedback">
                                        <div class="form-group">
                                        <label id="term">Term : </label>
                                        <textarea class="form-control" rows="5" id="term" style="resize:none; nowrap; text-align: justify; white-space: normal;" readonly>
                                            Dengan ini saya menyatakan bahwa seluruh data yang saya masukkan dalam aplikasi ini adalah benar, valid, terkini termasuk identitas
                                            yang saya gunakan untuk login ke Aplikasi ini dan saya lakukan dengan
                                            penuh kesadaran (tanpa paksaan).
                                            Segala inkonsistensi data yang akan berakibat pada konsekuensi hukum,
                                            yang mana dapat dikategorikan atau diduga sebagai pemalsuan identitas,
                                            akan menjadi tanggung jawab saya sepenuhnya sesuai dengan hukum yang
                                            berlaku di wilayah Negara Kesatuan Repubilik Indonesia.
                                            Pernyataan persetujuan elektronik ini dilakukan secara sadar
                                            dan penuh tanggung jawab dan telah sesuai dengan Undang-Undang
                                            No. 11 Tahun 2018 tentang Informasi dan Transaksi Elektronik
                                            (beserta perubahan-perubahan dan peraturan-peraturan pelaksanaan terkait).
                                        </textarea>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                            <div class="checker disabled">
                                                <span class="checked">
                                                    <input disabled type="checkbox" checked name="term" />
                                                </span>
                                            </div>
                                                    "Terima Aturan"
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <a href="{{route('login')}}" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login</a>
                                        <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /registration form -->


                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2021. <a href="#">Lembaga Pengembangan Jasa Konstruksi</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
@endsection
