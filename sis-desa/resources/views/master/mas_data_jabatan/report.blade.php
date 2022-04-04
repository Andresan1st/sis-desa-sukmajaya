<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- BEGIN: Vendor CSS-->
        <style>
                body{
                    font-family: arial, sans-serif;
                }    
                #tb1{
                    border: 1px solid !important;
                    border-collapse: collapse !important;
                    border-spacing: 0px !important;
                    width: 100%;
                
                }

                table td.tb1td{
                    border: 1px solid !important;
                    border-collapse: collapse !important;
                    color: black;
                    white-space:nowrap;
                    margin:0px !important;
                   
                }
                #tb2{
                    border: 1px solid !important;
                    border-collapse: collapse !important;
                    border-spacing: 0px !important;
                    width: 100%;
                    padding:0;
                    table-layout: fixed;
                }

                table td.tb2tdheader{
                    border: 1px solid !important;
                    border-collapse: collapse !important;
                    color: black;
                    text-align: center;
                    white-space:nowrap;
                    font-size: 10pt;
                   
                }
                table td.tb2td{
                    border: 1px solid !important;
                    border-collapse: collapse !important;
                    color: black;
                   padding: 0 !important;
                   margin: 0 !important;
                  
                }
                
                table td.tb2tdtfoot{
                    border: 1px solid !important;
                    border-collapse: collapse !important;
                    color: black;
                    white-space:nowrap;
                    text-align: center;
                }
        </style>
    </head>

    <body style="font-weight: normal;">
        <div>
            <table id="tb1">
                <tr>
                    <td class="tb1td" style="width:100%" >
                        <span>
                            {{-- <img  style="display:inline-block;" src="{{$pathfile}}"  alt="avatar" height="35" width="35" /> --}}
                            <p style="text-align:center;vertical-align:top;display:inline-block; font-size:12pt; margin-left:20px ;margin-right:50px; " > PT.INDOWIRE PRIMA INDUSTRINDO<br> MARGOMULYO INDAH C-1, SURABAYA </p> 
                        </span>
                    </td>
                    <td class="tb1td"  style="width:100%;"  >
                        <h3  style=" text-align:center; font-weight: bold !important;  margin-left:40px ;margin-right:50px; " > PURCHASE ORDER </h3> 
                    </td>
                    <td class="tb1td" style="width:100%;" >
                        <p style="margin-left:10px;text-align:left;font-size:10pt !important;margin-right:20px" > No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:IWPI-07-008<br> Rev.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 2<br>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 06/10/2010 </p> 
                    </td>
                </tr>
                 <tr>
                    <td class="tb1td" style="border-right: 0px solid !important;" >
                        <p style="text-align:left;margin-left:20px; font-size:10pt;position: absolute;" >TO : <b>{{$supplier->Sup_Name}}</b><br>{{$supplier->Sup_Address}}<br>{{$supplier->Sup_City}} </p> 
                    </td>
                    <td class="tb1td" style="border-left: 0px solid !important; border-right: 0px solid !important;">
                        <p style="text-align:center;  vertical-align:top; font-size:10pt;" >{{$datahdr->OP_Number}}</p> 
                        
                    </td>
                    <td class="tb1td"  style="border-left: 0px solid !important;" >
                        <p style="text-align:left; font-size:10pt;" >Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:{{str_replace(' 00:00:00.000','',$datahdr->OP_Date);}}<br>Delivery Date      :{{str_replace(' 00:00:00.000','',$datahdr->OP_EtdDate);}}
                    </td>
                </tr>
                D<tr>
                    <td class="tb1td" colspan="2" >
                        <p style="text-align:left;margin-left:20px;vertical-align:top;position:absolute; font-size:10pt;" >Note : {{$datahdr->OP_Note}} </p> 
                    </td>
                    <td class="tb1td" style="padding: 0">
                        <p style="text-align:justify;margin-left:20px;vertical-align:top; font-size:9pt;" >Term Of Payment&nbsp;&nbsp; :30 Day  </p>
                        <p style="text-align:justify;margin-left:20px;font-size:9pt;" >Place Of Deliver&nbsp;&nbsp;&nbsp; : MARGOMULYO INDAH C-1  </p>
                        <p style="text-align:justify;margin-left:20px;font-size:9pt;" >Other</p>
                        <p style="text-align:center;font-weight:bold; font-size:10pt;" >Please acknowdledge this order by returning<br>signed duplicate by fax or facsimile</p>
      
                    </td>
                   
                </tr>
                
            </table>
            <table id="tb2">
                <tr class="">
                    <td  class="tb2tdheader" style="  width:10px !important;">No</td>
                    <td  class="tb2tdheader" style="  width:10px;" >Arrival <br> Date</td>
                    <td  class="tb2tdheader" style="  width:10px;" >Code</td>
                    <td  class="tb2tdheader"  style="  width:10px;">Description</td>
                    <td  class="tb2tdheader"  style="  width:10px;">PR NO.</td>
                    <td  class="tb2tdheader"  style="  width:10px;">QTY</td>
                    <td  class="tb2tdheader"  style="  width:10px;">UNIT</td>
                    <td  class="tb2tdheader"  style="  width:10px;">PRICE<br> ({{$datahdr->Cur_Code}})</td>
                    <td  class="tb2tdheader"  style="  width:10px;">Disc</td>
                    <td  class="tb2tdheader"  style="  width:5px;">Total<br>({{$datahdr->Cur_Code}})</td>
                </tr>
         <tbody>
                <?php $i=1; 
                    $totaldetail = $datahdr->OP_Tvalcurr;
                    $totaldiskon = $datahdr->OP_ValDisc;
                    $totalsebelumppn =$totaldetail - $totaldiskon;
                    $grandtotal = $totalsebelumppn + $datahdr->OP_Tvallppn + $datahdr->OP_Charges;
                    $datadetail = $datadtl;   
                ?>
                @foreach ($datadetail as $datadtl)
                    {{$datapersen=0}}
                    {{$datapersen = $datadtl->OP_Itemdsc / ($datadtl->OP_Itemqty * $datadtl->OP_Itemprc) * 100 }}
                    {{$totalharga =  ((int) $datadtl->OP_Itemqty * (int)$datadtl->OP_Itemprc) - $datadtl->OP_Itemdsc }}
                    {{$opqty = str_replace('.','',$datadtl->OP_Itemqty)}}
                    <tr>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{$i}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{$datadtl->op_duedate}}</td>
                        <td class="tb2td"style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{$datadtl->Inv_Code}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{$datadtl->OP_DtlNote}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt; ">{{$datadtl->PP_Number}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{(int) $datadtl->OP_Itemqty}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{$datadtl->Mes_Name}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{  number_format($datadtl->OP_Itemprc, 2, ",", ".")}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important; text-align: center; font-size:10pt;">{{$datapersen}}</td>
                        <td class="tb2td" style="padding:0px !important;height:50px; border-top: 0px solid !important; border-bottom: 0px solid !important;text-align: center; font-size:10pt;">{{number_format($totalharga, 2, ",", ".")}}</td>
                    </tr>
                    <?php $i++ ?>
                    {{-- @if ( $i >10 )
                            <div style="page-break-before:always;"> </div>
                    @endif --}}
                @endforeach
              
            </tbody>
        
            <tfoot>
                <tr>
                    <td valign="top" class="tb2tdtfoot" colspan="2" style="border-bottom: 0px solid !important; padding:0px;" >
                        <p style="text-align: center;font-size:10pt; "> Preapare By,</p>
                    </td>
                    <td valign="top" class="tb2tdtfoot"   style="border-bottom: 0px solid !important; padding:0px;"   >
                        <p style="text-align: center;font-size:10pt;">  Checked By, </p>
                    </td>
                    <td valign="top" class="tb2tdtfoot"    style="border-bottom: 0px solid !important; padding:0px;"  >
                        <p style="text-align: center;font-size:10pt;">  Approved By,  </p>
                    </td>
                    <td valign="top" class="tb2tdtfoot"  colspan="2"   style="border-bottom: 0px solid !important; padding:0px;" >
                        <p style="text-align: center;font-size:10pt;">  Confirm By, </p>
                    </td>
                    <td valign="top" class="tb2tdtfoot"  colspan="3" >
                        <p style="text-align: center;font-size:10pt; padding:0px;">   Sub Total,  </p>
                        <p style="text-align: center;font-size:10pt; padding:0px; border-bottom:1px solid !important;">   Discount&nbsp;{{(float)$datahdr->OP_PctDisc}}%  </p>
                        <p style="text-align: center;font-size:10pt; height:2px;">   Total ({{$datahdr->Cur_Code}}) </p>
                        <p style="text-align: center;font-size:10pt; height:2px;">   VAT&nbsp;{{($datahdr->OP_Tvallppn==0)?"0%":"10%"}}  </p>
                        <p style="text-align: center;font-size:10pt; height:2px;">   &nbsp;&nbsp;{{($datahdr->OP_Cnote=="")?"":$datahdr->OP_Cnote}}  </p>
                    </td> 
                    <td valign="top" class="tb2tdtfoot"  >
                        <p style="text-align: left;font-size:10pt;  padding:0px; text-align:center;">   {{number_format($datahdr->OP_Tvalcurr, 2, ",", ".")}}  </p>
                        <p style="text-align: left;font-size:10pt;  padding:0px;  text-align:center; border-bottom:1px solid !important;">  {{(float)$datahdr->OP_ValDisc}}  </p>
                        <p style="text-align: center;font-size:10pt">  {{number_format($totalsebelumppn, 2, ",", ".")}} </p>
                        <p style="text-align: center;font-size:10pt">    {{(float)$datahdr->OP_Tvallppn}}   </p>
                        <p style="text-align: center;font-size:10pt">  {{number_format($datahdr->OP_Charges, 2, ",", ".")}} </p>
                    </td>
                </tr>
            
               
                <tr>

                    <td class="tb2tdtfoot"  colspan="2">
                        Purchasing
                    </td>
                    <td class="tb2tdtfoot"  colspan="1">
                        Manager
                    </td>
                    <td class="tb2tdtfoot"  colspan="1">
                        Director
                    </td>
                    <td class="tb2tdtfoot"  colspan="2">
                        Supplier
                    </td>
                    <td class="tb2tdtfoot"  colspan="3">
                        End Total
                    </td>
                    <td class="tb2tdtfoot"  >
                        <p style="text-align: center;font-size:10pt">  {{number_format($grandtotal, 2, ",", ".")}} </p>
                    </td>
                </tr>
                
                </tfoot> 
            </table>
        </div>
    </body>
</html>