@extends('layouts.layout_utama')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Order Pembelian</h2>
                    <div class="breadcrumb-wrapper col-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" id="formop" novalidate>
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <input type="text" id="id" class="form-control" name="id" value="{{$datapo->id}}" autocomplete="off" readonly hidden required>
                                        <div class="row" style="margin-top: 10px">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                  
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">PO Type<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="OP_Type" id="OP_Type1" value="CASH">
                                                        <label class="form-check-label" for="inlineRadio1">CASH</label>
                                                    </div>
                                                    <div class="form-check form-check-inline col-md-3">
                                                        <input class="form-check-input" type="radio" name="OP_Type" id="OP_Type2" value="NON CASH">
                                                        <label class="form-check-label" for="inlineRadio2">NON CASH</label>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">NO PO<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="OP_Number" value="{{$datapo->OP_Number}}" class=" form-control"
                                                            name="OP_Number" readonly>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Tanggal<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="OP_Date"  value="{{$datapo->OP_Date}}" class=" form-control"
                                                            name="OP_Date">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Mata Uang<span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <select class="select2 form-control" id="Cur_Code"  name="Cur_Code" required>
                                                            <option selected="" value="">Pilih Mata Uang ...</option>
                                                            @foreach ($matauang as $uang)
                                                            <option @if($uang->Cur_Code == $datapo->Cur_Code) selected @endif value="{{ $uang->Cur_Code }}">{{$uang->Cur_Code."-".$uang->Cur_Name}}</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Kurs<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="OP_Currate" class="form-control" name="OP_Currate" value="1.0">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Supplier<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <div class="input-group">
                                                            <input type="text" id="Sup_Code"name="Sup_Code"style="width: auto;"value="{{$datapo->Sup_Code}}"class="form-control input-sm"  readonly required>
                                                            <div class="input-group-append" id="button-addon4">
                                                                <button type="button" class="btn btn-info btn-sm" onclick="showsupplier()"><span class="fa fa-search-plus"></span></button>
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="deletefield('supplier')"><span class="fa fa-eraser"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Supplier Name<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <fieldset class="form-group">
                                                            <textarea class="form-control"
                                                                id="Sup_Name" name="Sup_Name"  rows="3"
                                                                placeholder="Textarea" readonly>{{$supname}}</textarea>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Tanggal Kirim<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="OP_EtdDate" value={{$datapo->OP_EtdDate}} class="js-flatpickr form-control bg-white"
                                                            name="OP_EtdDate">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Tanggal Datang<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="OP_EtaDate" value={{$datapo->OP_EtaDate}} class="js-flatpickr form-control bg-white"
                                                            name="OP_EtaDate">
                                                    </div>
                                                </div>
                                             
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Note<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <fieldset class="form-group">
                                                            <textarea class="form-control"
                                                                id="OP_Note" name="OP_Note" rows="3"
                                                                placeholder="Textarea" >{{$datapo->OP_Note}}</textarea>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Tempat Kirim<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="tempat_kirim" class="form-control" required readonly
                                                            name="tempat_kirim" value="MARGOMULYO INDAH C-1" readonly>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Total Harga Barang<span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="totalharbar"
                                                            class="form-control numeric" name="totalharbar" value={{$datapo->OP_Tvalcurr}} required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                  
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Diskon (%) <span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="total_potong_persen" onkeyup="totalhargaheader()"  class="form-control" value="{{$datapo->OP_PctDisc}}" name="total_potong_persen"required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Diskon Nominal <span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-2 controls">
                                                        <input type="text" id="total_potong_nominal1" onkeyup="totaldiskonrpheader()" readonly class="form-control numeric" value="{{$datapo->OP_ValDisc}}" name="total_potong_nominal1"required>
                                                    </div>
                                                    <div class="col-md-2 controls">
                                                        <input type="text" id="total_potong_nominal2"  onkeyup="totaldiskonrpheader2()" readonly class="form-control numeric" value="{{$datapo->OP_ValDisc}}" name="total_potong_nominal2"required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder"></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="number" id="blank4" class="form-control" value="0" name="blank4" hidden required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Total Sebelum PPn <span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="total_sebelum_ppn"   onkeyup="" class="form-control numeric" value="" name="total_sebelum_ppn" readonly required>
                                                    </div>
                                                  
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder"></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="blank4" class="form-control" value="0" name="blank4" hidden required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Pajak Pertambahan Nilai <span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="total_pajak" onkeyup="totalhargaheader()" class="form-control numeric" value="{{$datapo->OP_Tvallppn}}" name="total_pajak" required>
                                                    </div>
                                                  
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Biaya Lain-Lain </label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="biaya_lain" class="form-control"  name="biaya_lain" value="{{$datapo->OP_Cnote}}"required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Total Biaya Lain </label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="total_biaya_lain" class="form-control numeric"  onkeyup="totalhargaheader()" value="{{$datapo->OP_Charges}}" name="total_biaya_lain" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder"></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="blank3" class="form-control" value="0" name="blank3" hidden required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Total Akhir <span class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <input type="text" id="total_akhir" class="form-control numeric"  name="total_akhir"required>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3><small class="font-b"><ins>Order Pembelian Detail </ins></small></h3>
                                    </div>
                                </div>
                                <br>
                                <div class="card-content">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="bom_tab_detail" data-toggle="tab"
                                                href="#tabpdetail" role="tab" aria-controls="bom_detail"
                                                aria-selected="true">Order Pembelian Detail</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-1">
                                        <div class="tab-pane active" id="tabpdetail">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" id="formopdetail" novalidate>
                                                            <div class="form-body">
                                                                <div class="row" style="margin-top: 10px">
                                                                    <div class="col-12">
                                                                        <div class="form-group row">
                                                                            <input type="text" id="no_urut" name="no_urut"
                                                                                style="width: auto;display:none;" value=""
                                                                                class="form-control input-sm" hidden>
                                                                            <input type="text" id="id_db" name="id_db"
                                                                                style="width: auto;display:none;" value=""
                                                                                class="form-control input-sm" hidden>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">No PP<span
                                                                                        class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <div class="input-group">
                                                                                    <input type="text" id="pp_number" name="pp_number"style="width: auto;"value=""class="form-control input-sm" required>
                                                                                    <div class="input-group-append"
                                                                                        id="button-addon4">
                                                                                        <button type="button"
                                                                                            class="btn btn-info btn-sm"
                                                                                            onclick="showpp()"><span
                                                                                                class="fa fa-search-plus">
                                                                                            </span></button>
                                                                                        <button type="button"
                                                                                            class="btn btn-danger btn-sm"
                                                                                            onclick="deletefielddetail('pp')"><span
                                                                                                class="fa fa-eraser">
                                                                                            </span></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                          
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Tanggal</label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="PP_DateDetail" class=" form-control"
                                                                                    name="PP_DateDetail" readonly>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Tanggal Kedatangan<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="OP_DueDateDetail" class="js-flatpickr form-control bg-white"
                                                                                    name="OP_DueDateDetail">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Item Code<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="Inv_Code" class="form-control" name="Inv_Code" required readonly>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Item Name<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="Inv_Name" class="form-control" name="Inv_Name" required readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">PP Note<span  class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <fieldset class="form-group">
                                                                                    <textarea class="form-control" id="ppdtl_note" rows="3" placeholder="Textarea" readonly></textarea>
                                                                                </fieldset>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">OP Note<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <fieldset class="form-group">
                                                                                    <textarea class="form-control" id="OP_DtlNote" rows="3" placeholder="Textarea"></textarea>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Qty<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="number" id="qty"
                                                                                    class="form-control" name="qty" value="0" onkeyup="hargakeyup()" required>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Harga<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <input type="text" id="Harga" class="form-control numeric" onkeyup="hargakeyup()"  value="0" name="Harga" required>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder"></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="blank2" class="form-control" name="blank2" required hidden >
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Diskon %<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="diskon_persen" class="form-control percentage" onkeyup="hargakeyup()" name="diskon_persen" value="0" required>
                                                                            </div>
                                                                        
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder"></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="blank2" class="form-control" name="blank2" required hidden >
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Diskon Rp<span class="required">*</span></label>
                                                                            </div>
                                                                            <div class="col-md-4 ">
                                                                                <input type="text" id="diskon_rupiah" class="form-control numeric" onkeyup="discountnominal()" value="0" name="diskon_rupiah" required>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder"></label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="blank2" class="form-control" name="blank2" required hidden >
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label class="font-weight-bolder">Total</label>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="Total" class="form-control numeric" name="Total" value="0" required readonly>
                                                                            </div>
                                                                            <div class="col-md-4 controls">
                                                                                <input type="text" id="qtyold" class="form-control numeric" name="qtyold" value="0" required hidden readonly>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <button type="button" class="btn btn-warning"
                                                    onclick="AddtolistPPDetail()" data-toggle="tooltip"
                                                    data-placement="top" title="Add To List"><span id="ppfaddtolistspan"
                                                        class="fa fa-plus">Add To List</span></button>
                                            </div>
                                            <div class="row" style="margin-top: 50px">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover-animation mb-0"
                                                            id="table-pp-detail">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th style="width: 5%">No</th>
                                                                    <th style="display:none;" style="width: 10%">ID</th>
                                                                    <th style="width:10%">Tanggal Kedatangan</th>
                                                                    <th style="width: 10%">Kode Barang</th>
                                                                    <th style="width: 10%">Nama Barang</th>
                                                                    <th style="width: 10%">NO PP</th>
                                                                    <th style="width: 10%">Qty</th>
                                                                    <th style="width: 10%">Harga</th>
                                                                    <th style="width: 10%">Diskon (%)</th>
                                                                    <th style="width: 10%">Diskon (Rp)</th>
                                                                    <th style="width: 10%">Total Harga</th>
                                                                    <th style="width: 10%">OP Detail Note</th>
                                                                    <th style="display:none;" style="width: 10%">Qty Old</th>
                                                                    <th style="width: 5%">Action</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="row-body-pp-detail">
                                                                <?php $i=1;
                                                                $datadetail = $datapo->trs_OP_Dtl;                                                            
                                                            ?>
                                                            @foreach ($datadetail as $detail)
                                                                
                                                                {{$datapersen=0}}
                                                                {{$datapersen = $detail->OP_Itemdsc / ($detail->OP_Itemqty * $detail->OP_Itemprc) * 100 }}
                                                                {{$totalharga =  ((int) $detail->OP_Itemqty * (int)$detail->OP_Itemprc) - $detail->OP_Itemdsc }}
                                                                {{$opqty = str_replace('.','',$detail->OP_Itemqty)}}
                                                                <tr id="trppetail{{$i}}">
                                                                    <td>{{$i}}</td>
                                                                    <td style="display:none;" >{{ $detail->id}}</td>
                                                                    <td >{{ $detail->op_duedate}}</td>
                                                                    <td >{{ $detail->Inv_Code}}</td>
                                                                    <td >{{ $detail->OP_DtlNote}}</td>
                                                                    <td>{{ $detail->PP_Number}}</td>
                                                                    <td>{{ (int) $detail->OP_Itemqty}}</td>
                                                                    <td>{{  number_format($detail->OP_Itemprc, 2, ",", ".")}}</td>
                                                                    <td>{{ $datapersen}}</td>
                                                                    <td>{{ number_format($detail->OP_Itemdsc, 2, ",", ".")}}</td>
                                                                    <td>{{  number_format($totalharga, 2, ",", ".")}}</td>
                                                                    <td>{{ $detail->OP_DtlNote}}</td>
                                                                    <td  style="display:none;" >{{ (int) $detail->OP_Itemqty}}</td>
                                                                    <td>
                                                                        <button type="button" name="button" value="{{$i}} " class="btn btn-primary btn-sm btnSelectEdit"  onclick="editRow({{$i}})"><span class="fa a fa-pencil-square-o"></span></button>
                                                                        <button type="button" name="button" value="{{$i}} " class="btn btn-danger btn-sm btnSelectDeleteTooling"  onclick="deleteRow({{$i}})"><span class="fa fa-trash"></span></button>
                                                                    </td>
                                                                </tr>
                                                                <?php $i++; ?>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" id="btnDataMPF" class="btn btn-success">Save</button>
                                    &nbsp;
                                    <a href="{{ url('pcin_tra_purchase_order') }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <div class="modal fade" id="showsupplier" role="dialog" aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark white">
                        <h6 class="modal-title">Add Supplier</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table nowrap scroll-horizontal-vertical" id="table_modal_supplier">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">No</th>
                                                    <th style="width: 10%">Supplier Code</th>
                                                    <th style="width: 10%">Supplier Name</th>
                                                    <th style="width: 10%">Supplier Address</th>
                                                    <th style="width: 10%">Supplier City</th>
                                                    <th style="width: 10%">Supplier Country</th>
                                                    <th style="width: 5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="row-detail-modal">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showpp" role="dialog" aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark white">
                        <h6 class="modal-title">Add PP</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table nowrap scroll-horizontal-vertical" id="table_modal_pp">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">No</th>
                                                    <th style="width: 10%">PP Number</th>
                                                    <th style="width: 10%">Tanggal</th>
                                                    <th style="width: 10%">Kode Item</th>
                                                    <th style="width: 10%">Nama Item</th>
                                                    <th style="width: 10%">Qty</th>
                                                    <th style="width: 10%">PP Note</th>
                                                    <th style="width: 10%">Status</th>
                                                    <th style="width: 5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="row-detail-modal">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Basic Floating Label Form section end -->
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //set value radio button
            var dataupdate = {!! json_encode($datapo) !!};
            var optype = dataupdate.OP_Number.substring(0,2);
            if(optype=="PO"){
                console.log("PO");
                $('#OP_Type2').prop('checked',true);
            }else if(optype=="RC"){
                $('#OP_Type1').prop('checked',true);
            }
             //set value radio button

            //set value grand total
            total_sebelum_ppn= parseFloat(dataupdate.OP_Tvalcurr) -  parseFloat(dataupdate.OP_ValDisc);
            $("#total_sebelum_ppn").val(total_sebelum_ppn);
            
            var grand_todal = (total_sebelum_ppn * parseInt(dataupdate.OP_Currate)) + parseFloat(dataupdate.OP_Charges) + parseFloat(dataupdate.OP_Tvallppn) 
            $("#total_akhir").val(grand_todal);
            
            // AutoNumeric.set('#total_sebelum_ppn',total_sebelum_ppn);
            //console.log(dataupdate);
           
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var today = year + "-" + month + "-" + day;
            $("#OP_Date").attr("value", today);
            $("#PP_DateDetail").attr("value", today);
            $('#OP_Date').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
            $('#OP_EtdDate').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
            $('#OP_EtaDate').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
            $('#pp_duedatedetail').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
            $('#OP_DueDateDetail').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
           
            var table_modal_document;
            anElement = AutoNumeric.multiple('.numeric', {
                currencySymbol : '',
                digitGroupSeparator: '.',
                decimalCharacter :',',
                decimalPlaces:0,
                minimumValue:0,
            });
            
            //new AutoNumeric('.percentage','percentageEU2dec')
        });
        //DEKLARASI BEBERAPA VARIABLE
        var countRow = 0;
        var countRow2 = 0;
        var countRow3 = 0;
        var countRow4 = 0;
        var nomor = 0;
        var nomor2 = 0;
        var datadetailpp = [];
        var parameterdetail = 0;
        //var sumtotbarheader =0;
       
        //PROPERTIES POPUP
        //BUAT SET VALUE  POPUP HEADER
        function adddata(kode,name, field) {
            if (field == "supplier") {
                $("#Sup_Code").val(kode);
                $("#Sup_Name").text(name);
                $('#showsupplier').modal('hide');
            }
        }
        //JIKAHAPUS FIELD POPUP HEADER
        function deletefield(name) {
            if (name == "supplier") {
                $("#Sup_Code").val("");
                $("#Sup_Name").val("");
            }
        }
         //BUAT SET VALUE  POPUP DETAIL
        function adddatadetail(params,params, field) {
             console.log(params);
             var data = params.split("_");
            if (field == "pp") {
                var pp_number = data[0];
                var tanggal = data[1];
                var item_code = data[2];
                var item_name = data[3];
                var qty = data[4];
                var ppdtl = data[5];
                console.log(ppdtl,"dtlpp");
                var ppdetaildate = data[7];

                $("#pp_number").val(pp_number);
                $("#Inv_Code").val(item_code);
                $("#Inv_Name").val(item_name);
                $("#qty").val(qty);
                $("#qty").val(qty);
                $("#ppdtl_note").text(ppdtl);
                $("#OP_DueDateDetail").val(ppdetaildate);
                $('#showpp').modal('hide');
            }
        }
        //JIKAHAPUS FIELD POPUP DETAIL
        function deletefielddetail(name) {
            if (name == "pp") {
                $("#pp_number").val("");
                $("#Inv_Code").val("");
                $("#Inv_Name").val("");
                $("#qty").val(0);
                $("#ppdtl_note").text("");
               // $('#showpp').modal('hide');
            }
        }
        //perhitungandetailform
        function hargakeyup(){
            //inisialisai data awal
            var qty = parseInt($("#qty").val());
            var harga = $("#Harga").val();
            var replaceharga = harga.replaceAll('.','');
            var disc_persen =  $("#diskon_persen").val();
            var disc_ominal =  $("#diskon_rupiah").val();
            
           
            //PROSES perhitungan
            var hasil = parseInt(qty) * parseInt(replaceharga);
            var diskon_nominal = parseFloat(hasil) * (parseFloat(disc_persen) /100);
            //HASIL
            AutoNumeric.set('#diskon_rupiah',diskon_nominal);
            var hasil_akhir = parseFloat(hasil) - parseFloat(diskon_nominal);
            AutoNumeric.set('#Total',hasil_akhir);
        }

        function discountnominal(){
            //inisialisai data awal
            var qty = parseInt($("#qty").val());
            var harga = $("#Harga").val();
            var replaceharga = harga.replaceAll('.','');
            var disc_persen =  $("#diskon_persen").val();
            //var replacedisc_persen = disc_persen.replaceAll('%','');
            var disc_nominal =  $("#diskon_rupiah").val();
            var replacedisc_nominal = parseInt(disc_nominal.replaceAll('.',''));
            console.log(replacedisc_nominal,"nominal")
           
            //PROSES perhitungan
            var hasil = parseInt(qty) * parseInt(replaceharga);
            var diskon_percent = replacedisc_nominal / hasil *100;
           
            var diskon_nominal = parseFloat(hasil) * (parseFloat(diskon_percent) /100);
            //HASIL
            $("#diskon_persen").val(diskon_percent);
            var hasil_akhir = parseFloat(hasil) - parseFloat(diskon_nominal);
            AutoNumeric.set('#Total',hasil_akhir);
          
         }


         function totalhargaheader(){
            var totharbar =$("#totalharbar").val();
            var replaceharga = parseInt(totharbar.replaceAll('.',''));
            var totdiscpersen =  parseFloat($("#total_potong_persen").val());
            var disc_nominal1 =  $("#total_potong_nominal1").val();
            var repdisc_nominal1 =  disc_nominal1.replaceAll(".","");
            var disc_nominal2 =  $("#total_potong_nominal2").val();
            var repdisc_nominal2 =  disc_nominal2.replaceAll(".","");
            var total_pajak =  $("#total_pajak").val();
            var reptotal_pajak =total_pajak.replaceAll(".","");
            var totalbiayalain = $("#total_biaya_lain").val();
            var reptotalbiayalain =totalbiayalain.replaceAll(".","");
            //PROSES perhitungan
            var diskon_nominal = parseFloat(replaceharga) * (parseFloat(totdiscpersen) /100);
            //HASIL
            AutoNumeric.set('#total_potong_nominal1',diskon_nominal);
            AutoNumeric.set('#total_potong_nominal2',diskon_nominal);

            var hasilsebelumppn = (parseFloat(replaceharga) - parseFloat(diskon_nominal));
            var hasilsesudahppn = hasilsebelumppn +  parseFloat(reptotal_pajak)  + parseFloat(reptotalbiayalain);
            AutoNumeric.set('#total_sebelum_ppn',hasilsebelumppn);
            AutoNumeric.set('#total_akhir',hasilsesudahppn);
         }

         function totaldiskonrpheader(){
            var totharbar =$("#totalharbar").val();
            var replaceharga = parseInt(totharbar.replaceAll('.',''));
            var totdiscpersen =  parseFloat($("#total_potong_persen").val());
            var disc_nominal1 =  $("#total_potong_nominal1").val();
            var repdisc_nominal1 =  disc_nominal1.replaceAll(".","");
            var totalbiayalain = $("#total_biaya_lain").val();
            var reptotalbiayalain = totalbiayalain.replaceAll(".","");
            
            

            //PROSES perhitungan
            var diskon_percent = parseFloat(repdisc_nominal1) / replaceharga *100;
            var diskon_nominal = parseFloat(replaceharga) * (parseFloat(diskon_percent) /100);

            $("#total_potong_persen").val(diskon_percent);
            var hasil_akhir = parseFloat(replaceharga) - parseFloat(diskon_nominal) - parseFloat(reptotalbiayalain);
            AutoNumeric.set('#total_sebelum_ppn',hasil_akhir);
            AutoNumeric.set('#total_akhir',hasil_akhir);
         }

         function totaldiskonrpheader2(){
            var totharbar =$("#totalharbar").val();
            var replaceharga = parseInt(totharbar.replaceAll('.',''));
            var totdiscpersen =  parseFloat($("#total_potong_persen").val());
            var disc_nominal1 =  $("#total_potong_nominal2").val();
            var repdisc_nominal1 =  disc_nominal1.replaceAll(".","");
            var totalbiayalain = $("#total_biaya_lain").val();
            var reptotalbiayalain = totalbiayalain.replaceAll(".","");
            
            

            //PROSES perhitungan
            var diskon_percent = parseFloat(repdisc_nominal1) / replaceharga *100;
            var diskon_nominal = parseFloat(replaceharga) * (parseFloat(diskon_percent) /100);

            $("#total_potong_persen").val(diskon_percent);
            var hasil_akhir = parseFloat(replaceharga) - parseFloat(diskon_nominal) - parseFloat(reptotalbiayalain);
            AutoNumeric.set('#total_sebelum_ppn',hasil_akhir);
            AutoNumeric.set('#total_akhir',hasil_akhir);
         }

        //perhitungandetailform
        //fungsi show popup!
        function showsupplier() {
            $("#table_modal_supplier").dataTable().fnDestroy()
            $('#table_modal_supplier').DataTable({
                processing: true,
                lengthMenu: [10, 25, 30],
                serverSide: true,
                ajax: '<?= url('pcin_tra_purchase_order/get-supplier') ?>',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'Sup_Code',
                        name: 'Sup_Code'
                    },
                    {
                        data: 'Sup_Name',
                        name: 'Sup_Name'
                    },
                    {
                        data: 'Sup_Address',
                        name: 'Sup_Address'
                    },
                    {
                        data: 'Sup_City',
                        name: 'Sup_City'
                    },
                    {
                        data: 'Sup_Country',
                        name: 'Sup_Country'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#showsupplier').modal('show');
        }
          //fungsi show popup!!!
          function showpp() {
            $("#table_modal_pp").dataTable().fnDestroy()
            $('#table_modal_pp').DataTable({
                processing: true,
                lengthMenu: [10, 25, 30],
                serverSide: true,
                ajax: '<?= url('pcin_tra_purchase_order/get-pp') ?>',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'PP_Number',
                        name: 'PP_Number'
                    },
                    {
                        data: 'PP_Date',
                        name: 'PP_Date'
                    },
                    {
                        data: 'Inv_Code',
                        name: 'item.Inv_Code'
                    },
                    {
                        data: 'Inv_Name',
                        name: 'item.Inv_Name'
                    },
                    {
                        data: 'PP_Itemqty',
                        name: 'dtl.PP_Itemqty'
                    },
                    {
                        data: 'PP_DtlNote',
                        name: 'dtl.PP_DtlNote'
                    },
                    {
                        data: 'PP_Flagop',
                        name: 'PP_Flagop'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#showpp').modal('show');
        }
        //ADDLIST data utama
        function AddtolistPPDetail() {
            if (document.getElementById("ppfaddtolistspan").innerText == "Add To List") {
                console.log("masuk");
                countRow = countRow + 1;
                var id, OP_duedate,pp_number,item_code,item_name,op_note,qty,harga,diskon_persen,diskon_rupiah,total,qtyold;
                var trHTML = '';
                id = 0;
                var sumtotbarheader =0;
                pp_number = $("#pp_number").val();
                OP_duedate = $("#OP_DueDateDetail").val();
                item_code= $("#Inv_Code").val();
                item_name= ($("#ppdtl_note").text()!=' ')?$("#ppdtl_note").text():$("#Inv_Name").val();
                op_note = $("#OP_DtlNote").val();
                qty= $("#qty").val();
                harga = $("#Harga").val();
                diskon_persen = $("#diskon_persen").val();
                diskon_rupiah = $("#diskon_rupiah").val();
                total = $("#Total").val();
                qtyold = $("#qtyold").val();
                if (  pp_number == ""|| item_code == ""|| item_name=="" ||op_note== "" ||qty== "0"|| harga == "0") {
                    Swal.fire({
                        text: 'Lengkapi Data Detail',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                } else {
                    var datadetailpp = $('#table-pp-detail tr:last').find("td");
                    trHTML += '<tr id="trppetail' + countRow + '">';
                    trHTML += '<td>' + countRow + '</td>';
                    trHTML += '<td style="display:none;">' + id + '</td>';
                    trHTML += '<td>' + OP_duedate + '</td>';
                    trHTML += '<td>' + item_code + '</td>';
                    trHTML += '<td>' + item_name + '</td>';
                    trHTML += '<td>' + pp_number + '</td>';
                    trHTML += '<td>' + qty + '</td>';
                    trHTML += '<td>' + harga + '</td>';
                    trHTML += '<td>' + diskon_persen + '</td>';
                    trHTML += '<td>' + diskon_rupiah + '</td>';
                    trHTML += '<td>' + total + '</td>';
                    trHTML += '<td>' + op_note+ '</td>';
                    trHTML += '<td>' + qtyold+ '</td>';
                    trHTML += '<td>';
                    trHTML += '<button type="button" name="button" value=" ' + countRow +' " class="btn btn-primary btn-sm btnSelectEdit"  onclick="editRow(' + countRow +')"><span class="fa fa-pencil-square-o"></span></button>'
                    trHTML += '<button type="button" name="button" value=" ' + countRow +' " class="btn btn-danger btn-sm btnSelectDelete"  onclick="deleteRow(' + countRow +')"><span class="fa fa-trash"></span></button>'
                    trHTML += '</td>';
                    trHTML += '</tr>';
                    $("#row-body-pp-detail").append(trHTML);
                    $("#no_urut").val("");
                    $("#id_db").val("");
                    $("#pp_number").val("");
                    $("#OP_DueDateDetail").val("");
                    $("#Inv_Code").val("");
                    $("#Inv_Name").val("");
                    $("#ppdtl_note").text(" ");
                    $("#OP_DtlNote").text(" ");
                    $("#qty").val("0");
                    $("#qtyold").val("0");
                    AutoNumeric.set('#Harga',"0");
                    $("#diskon_persen").val("0");
                    AutoNumeric.set('#diskon_rupiah',"0");
                    AutoNumeric.set('#Total',"0");
                           

                    //sumheader
                    // sumtotbarheader = parseFloat(sumtotbarheader) + parseFloat(total.replaceAll('.',''));
                    //summary total header
                    $('#row-body-pp-detail > tr').each(function() {
                         var data = $(this).find("td");
                         sumtotbarheader = sumtotbarheader  + parseInt(data[10].textContent.replaceAll('.',''));
                         
                    });
                    //set value header
                    AutoNumeric.set('#totalharbar',sumtotbarheader);
                    AutoNumeric.set('#total_sebelum_ppn',sumtotbarheader);
                    AutoNumeric.set('#total_akhir',sumtotbarheader);
                    //console.log(sumtotbarheader);
                }
            } else if (document.getElementById("ppfaddtolistspan").innerText == "Update") {
                var id, OP_duedate,pp_number,item_code,item_name,op_note,qty,harga,diskon_persen,diskon_rupiah,total,qtyold;
                var trHTML = '';
                sumtotbarheader =0;
                no_urut_table = $('#no_urut').val();
                id_db = $("#id_db").val();
                pp_number = $("#pp_number").val();
                OP_duedate = $("#OP_DueDateDetail").val();
                item_code= $("#Inv_Code").val();
                item_name= ($("#ppdtl_note").text()!=" ")?$("#ppdtl_note").text():$("#Inv_Name").val();
                op_note = $("#OP_DtlNote").val();
                qty= $("#qty").val();
                harga = $("#Harga").val();
                diskon_persen = $("#diskon_persen").val();
                diskon_rupiah = $("#diskon_rupiah").val();
                total = $("#Total").val();
                qtyold= $("#qtyold").val();
                console.log(pp_number,"PPNUMBER");
                console.log(item_code,"itemcode");
                console.log(item_name,"itemname");
                console.log(op_note,"opnote");
                console.log(qty,"qty");
                console.log(harga,"harga");
               
                
                if (  pp_number == ""|| item_code == ""|| item_name=="" ||op_note== "" ||qty== "0"|| harga == "0") {
                    Swal.fire({
                        text: 'Lengkapi Data Detail',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                } else {     
                    var id = "trppetail" + no_urut_table;
                    var tr = $("#" + id).find("td");
                    console.log(tr, "isi tr");
                    tr[0].textContent = no_urut_table;
                    tr[1].textContent = id_db;
                    tr[2].textContent = OP_duedate;
                    tr[3].textContent = item_code;
                    tr[4].textContent = item_name;
                    tr[5].textContent = pp_number;
                    tr[6].textContent = qty;
                    tr[7].textContent = harga;
                    tr[8].textContent = diskon_persen;
                    tr[9].textContent = diskon_rupiah;
                    tr[10].textContent =total;
                    tr[11].textContent = op_note;
                    tr[12].textContent = qtyold;
 
                    $("#no_urut").val("");
                    $("#id_db").val("");
                    $("#pp_number").val("");
                    $("#OP_DueDateDetail").val("");
                    $("#Inv_Code").val("");
                    $("#Inv_Name").val("");
                    $("#ppdtl_note").text(" ");
                    $("#OP_DtlNote").text(" ");
                    $("#qty").val("0");
                    $("#qtyold").val("0");
                    AutoNumeric.set('#Harga',"0");
                    $("#diskon_persen").val("0");
                    AutoNumeric.set('#diskon_rupiah',"0");
                    AutoNumeric.set('#Total',"0");
                    
                    $('#row-body-pp-detail > tr').each(function() {
                         var data = $(this).find("td");
                         console.log(data[10].textContent);
                         sumtotbarheader = sumtotbarheader  + parseInt(data[10].textContent.replaceAll('.',''));
                         
                    });
                    console.log(sumtotbarheader);
                    AutoNumeric.set('#totalharbar',sumtotbarheader);
                    AutoNumeric.set('#total_sebelum_ppn',sumtotbarheader);
                    AutoNumeric.set('#total_akhir',sumtotbarheader);
                    //console.log(sumtotbarheader);

                    document.getElementById("ppfaddtolistspan").innerHTML = "";
                    document.getElementById("ppfaddtolistspan").innerHTML = "Add To List";
                }
            }
        }

        function editRow(index) {
            //table-sales-order-detail
            $("#table-pp-detail").on('click', '.btnSelectEdit', function() {
                document.getElementById("ppfaddtolistspan").innerHTML = "";
                document.getElementById("ppfaddtolistspan").innerHTML = "Update";

                var currentRow = $(this).closest("tr");
                
                var no_urut_table = currentRow.find("td:eq(0)").text(); // get current row 1st TD value
                var id_db = currentRow.find("td:eq(1)").text(); // get current row 1st TD value
                var OP_duedate = currentRow.find("td:eq(2)").text();
                var item_code = currentRow.find("td:eq(3)").text();
                var item_name = currentRow.find("td:eq(4)").text();
                var pp_number = currentRow.find("td:eq(5)").text(); // get current row 2nd TD
                var qty = currentRow.find("td:eq(6)").text(); // get current row 3rd TD
                var harga = currentRow.find("td:eq(7)").text(); // get current row 4rd TD    
                var diskon_persen = currentRow.find("td:eq(8)").text(); // get current row 5rd TD  
                var diskon_nominal = currentRow.find("td:eq(9)").text(); // get current row 6rd TD
                var total = currentRow.find("td:eq(10)").text(); // get current row 6rd TD
                var op_note = currentRow.find("td:eq(11)").text(); // get current row 6rd TD
                var qtyold = currentRow.find("td:eq(12)").text(); // get current row 6rd TD
                  
                //SET VALUE FIELD DARI TABLE ROW YANG SUDAH DI GET
                $("#no_urut").val(no_urut_table);
                $("#id_db").val(id_db);
                $("#pp_number").val(pp_number);
                $("#OP_DueDateDetail").val(OP_duedate);
                $("#Inv_Code").val(item_code);
                $("#Inv_Name").val(item_name);
                $("#ppdtl_note").text(item_name);
                $("#OP_DtlNote").text(op_note);
                $("#qty").val(qty);
                $("#qtyold").val(qtyold);
                AutoNumeric.set('#Harga',harga);
                $("#diskon_persen").val(diskon_persen);
                AutoNumeric.set('#diskon_rupiah',diskon_nominal);
                AutoNumeric.set('#Total',total);
            });
        }

        function deleteRow(index) {
            //DELETE ROW TABLE DETAIL UTAMA 
            $('#row-body-pp-detail tr').on('click', '.btnSelectDelete', function() {
                Swal.fire({
                    text: 'Apakah anda yakin menghapus data ?',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: `Yes`,
                    denyButtonText: `No`,
                    customClass: {
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var tid = "";
                        // tid = $(this).attr('id');
                        // console.log(tid,"tid")
                        var datadelete = $(this).closest("tr");
                        var tid = $(this).closest("tr").attr('id');
                        console.log(datadelete);
                        $('#' + tid).remove();
                    } else if (result.isDenied) {
                        return false;
                    }
                });
            });
        }
        $('#btnDataMPF').click(function(e) {
            e.preventDefault();
            // Code goes here
            save(); // your onclick function call here

        });
        //save data
        function save() {
            //deklarasi data
            var dataarray = $('#formop').serialize({
                // checkboxesAsBools: true
            });


            var pcin_tra_purchase_oder_detail = [];
            var url = "";
            savemethod = "add"

            //ambil data table detail dan masukan ke array
            $('#row-body-pp-detail > tr').each(function() {
                var data = $(this).find("td");
                pcin_tra_purchase_oder_detail.push({
                    id_db: data[1].textContent,
                    op_duedate: data[2].textContent,
                    Inv_Code: data[3].textContent,
                    pp_number: data[5].textContent,
                    OP_Itemqty: data[6].textContent,
                    OP_Itemprc:data[7].textContent,
                    OP_Itemdsc:data[9].textContent,
                    OP_DtlNote:data[11].textContent,
                    OP_Itmqtybp:0,
                    OP_DtlFlag:"A",
                    qtyold:data[12].textContent,
                });
            });
            var opnumber = $("#OP_Number").val();
            var params = opnumber.replace("/", "_");
            $.ajax({
                url: "<?php echo url('pcin_tra_purchase_order/update/') ?>"+"/"+params,
                type: "POST",
                data: dataarray + '&pcin_tra_purchase_order_detail=' + JSON.stringify(pcin_tra_purchase_oder_detail),
                dataType: "JSON",
                success: function(data) {
                    if (data.success == "True") {
                        Swal.fire({
                            text: 'Berhasil Simpan',
                            icon: 'success',
                            confirmButtonText: `Yes`,
                            customClass: {
                                confirmButton: 'order-2',
                                denyButton: 'order-3',
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('pcin_tra_purchase_order') }}";
                            } else if (result.isDenied) {
                                return false;
                            }
                        });
                    } else if (data.errors) {
                        var values = '';
                        for (var i = 0; i < data.errors.length; i++) {
                            var replace = data.errors[i].replaceAll(" diisi", " diisi !!!! <br>");
                            data.errors[i] = replace;
                        }
                        Swal.fire({
                            html: data.errors,
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                    }
                },
            });
        }
    </script>
@endsection
