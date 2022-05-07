<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        font-family: 'Times New Roman', Times, serif;
    }
</style>
<body>
    <table style=" width: 20%;float: left">
        <tr style="text-align: center; padding: 0; margin: 0;">
            <td style="font-size: 30px; width: 80%"><img src="{{public_path('logo-desa-removebg-preview.png')}}" alt=""></td>
        </tr>
    </table>
    <table style=" width: 80%; float: right;">
        <tr style="text-align: center; padding: 0; margin: 0;">
            <td style="font-size: 30px; width: 80%">PEMERINTAH KABUPATEN BEKASI</td>
        </tr>
        <tr style="text-align: center; padding: 0; margin: 0;">
            <td style="font-size: 30px; width: 80%">KECAMATAN KARANGBAHAGIA</td>
        </tr>
        <tr style="text-align: center; padding: 0; margin: 0;">
            <td style="font-size: 30px; width: 80%; font-weight: 900">DESA SUKARAYA</td>
        </tr>
        <tr style="text-align: center; padding: 0; margin: 0;">
            <td style="font-size: 13px; width: 80%;"><span>Jl. Raya Pilar – Sukatani, Sukamantri Bekasi 17535</span></td>
        </tr>
    </table>
    <hr style="margin-top: 150px">
    <table style="width: 100%; padding-top: 5px;">
        <tr style="text-align: center">
            <td style="text-transform: uppercase; font-size: 20px"><u>SURAT KETERANGAN {{$data->jenis_surat_name}}</u></td>
        </tr>
        <tr style="text-align: center">
            <td style="text-transform: capitalize; font-size: 16px"><i>Nomor : {{$surat->nomor_surat_keluar}}</i></td>
        </tr>
    </table>
    @foreach ($surat->formatsuratkeluarModel->sectionformatsuratkeluarModel as $key=> $item)
    <table style="width: 100%;padding-top: 15px">
        @if ($item->status == 'static')
            <tr>
                <td style="font-size: 16px">{!!$item->staticsectionModel->value!!}</td>
            </tr>
        @elseif ($item->status == 'subject' && $item->section_name == 'subject_1')
            <tr>
                <td style="height: 10px"></td>
                <td style="height: 10px"></td>
                <td style="height: 10px"></td>
                <td style="height: 10px"></td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">Nama</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%; text-transform: uppercase">
                    <b><b>{{$item->datasuratkeluarModel->MasdatamasyarakatModel->nama}}</b></b>
                </td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">NIK</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%">
                    {{$item->datasuratkeluarModel->MasdatamasyarakatModel->nik}}
                </td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">Tempat/ Tanggal Lahir</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%;text-transform: capitalize">
                    {{$item->datasuratkeluarModel->MasdatamasyarakatModel->tempat_lahir.' , '.\Carbon\Carbon::parse($item->datasuratkeluarModel->MasdatamasyarakatModel->tgl_lahir)->format('d-M-Y')}}
                </td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">Jenis Kelamin</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%;text-transform: capitalize">
                    {{$item->datasuratkeluarModel->MasdatamasyarakatModel->jenkel}}
                </td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">Agama</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%;text-transform: capitalize">
                    {{$item->datasuratkeluarModel->MasdatamasyarakatModel->agama}}
                </td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">Pekerjaan</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%;text-transform: capitalize">
                    {{$item->datasuratkeluarModel->MasdatamasyarakatModel->pekerjaan}}
                </td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">Status Perkawinan</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%">
                    {{$item->datasuratkeluarModel->MasdatamasyarakatModel->status_kawin}}
                </td>
            </tr>
            <tr>
                <td style="width: 10%"></td>
                <td style="width: 25%">Alamat</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%;text-transform: capitalize">
                    {{$item->datasuratkeluarModel->MasdatamasyarakatModel->alamat}}
                </td>
            </tr>
            <tr>
                <td style="height: 10px"></td>
                <td style="height: 10px"></td>
                <td style="height: 10px"></td>
                <td style="height: 10px"></td>
            </tr>
        @elseif($item->status == 'object')
            <tr>
                <td>
                    <b>{{$item->objectsectionModel->value}}</b>
                </td>
            </tr>
            <tr>
                <td style="height: 10px"></td>
            </tr>
        @elseif($item->status == 'subject' && $item->section_name == 'subject_ttd_ybs_&_kepala')
            <tr>
                <td style="padding-top: 20px;"></td>
                <td style="padding-top: 20px;"></td>
                <td style="padding-top: 20px;"></td>
            </tr>
            <tr>
                <th style="width: 30%"></th>
                <td style="width: 30%"></td>
                <td style="width: 30%; text-align: justify">Sukaraya,  {{\Carbon\Carbon::now()->format('d-M-Y')}}</td>
            </tr>
            <tr style="">
                <th style="width: 30%;text-align: left">Tanda Tangan Ybs</th>
                <td style="width: 30%"></td>
                <td style="width: 30%; text-align: justify">Kepala Desa Sukaraya</td>
            </tr>
            <tr>
                <td style="height: 50px"></td>
                <td style="height: 50px"></td>
                <td style="height: 50px"></td>
            </tr>
            <tr style="border: solid">
                <td style="width: 30%;text-transform: uppercase"><b>{{$surat->nama_pemohon}}</b></td>
                <td style="width: 30%;"></td>
                <td style="width: 30%;text-align: justify;">.....</td>
            </tr>
        @elseif($item->status == 'subject' && $item->section_name == 'subject_ttd_kepala')
        <tr>
            <td style="padding-top: 20px;"></td>
            <td style="padding-top: 20px;"></td>
            <td style="padding-top: 20px;"></td>
        </tr>
        <tr>
            <th style="width: 30%"></th>
            <td style="width: 30%"></td>
            <td style="width: 30%; text-align: justify">Sukaraya,  {{\Carbon\Carbon::now()->format('d-M-Y')}}</td>
        </tr>
        <tr style="">
            <th style="width: 30%;text-align: left"></th>
            <td style="width: 30%"></td>
            <td style="width: 30%; text-align: justify"></td>
        </tr>
        <tr>
            <td style="height: 50px"></td>
            <td style="height: 50px"></td>
            <td style="height: 50px"></td>
        </tr>
        <tr style="border: solid">
            <td style="width: 30%;"></td>
            <td style="width: 30%;"></td>
            <td style="width: 30%;text-align: justify;">.....</td>
        </tr>
        @endif
    </table>
    @endforeach
</body>
</html>