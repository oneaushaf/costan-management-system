@extends('template.layout')
@section('content')
<h5 class="container p-3 mb-2 text-white text-center col-6 mt-5 rounded" style = background-color:rgb(12,11,61);>
    Tagihan Saya</h5>

    <div class="container ">
    <p class="mt-5 container text-black col-3 "> 
    <mark class = "rounded text-white align-text-center" style="background-color: green;"><span data-feather="check-square" class="align-text-center "></span></mark> = Lunas          
    <mark class="rounded text-white " style="background-color: red;"><span data-feather="x-square" class="align-text-center "></span></mark> = Belum Lunas </mark></p>
    </div>

    <div class="container my-5 col-6 card">
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="text-center"scope="col">Paydate</th>
            <th class="text-center" scope="col">Pembayaran</th>
            <th class="text-center" scope="col">Ket</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
            <tr>
                <td class="text-center" >{{$contract->until}}</td>
                <td class="text-center" >Rp. {{number_format($contract->payment, 0, '.', '.')}}</td>
                <td class="rounded text-center text-white col-2"
                    @if ($contract->accepted == TRUE)
                        style=" background-color: green ;"> <span data-feather="check-square" class="align-text-center "></span>
                    @else
                        style=" background-color:red ;"> <span data-feather="x-square" class="align-text-center "></span>
                    @endif
                </td>
            </tr> 
            @endforeach
        {{-- <tr>
            <td class="text-center" >Mei</td>
            <td class="text-center" >Rp. 750.000</td>
            <td class="text-center" >Rp. 750.000</td>
            <td class="rounded text-center text-white col-2" style=" background-color:red ;"> BL</td>
        </tr> --}}
        </tbody>
    </table>
    @if ($date->isPast())
        <h6 class="container p-3 col-4 text-center rounded" style="color: red;"> Anda belum membayar tagihan </h6>
    @endif
    </div>

<div style="width: 18rem;" class="container card">
    <div class="row justify-content-center">
        <form class="text-center" action="/user/bill" method="post" >
            @csrf
            <label for="months" name="months">Select durasi</label>
                <select name="months" class="form-control" id="months" >
                    <option value="1">1 Bulan</option>
                    <option value="3">3 Bulan</option>
                    <option value="6">6 Bulan</option>
                    <option value="12">12 Bulan</option>
                </select>
            <button class="text-white btn btn-primary mt-3 mb-3" type="submit">Bayar sekarang</button>
        </form>
    </div>
</div>

<br>
<div class="text-center">
    <a class="text-white btn btn-success" href="#"> <i class="fab fa-whatsapp"></i> Konfirmasi pembayaran</a>
</div>
<br><br>
@endsection
