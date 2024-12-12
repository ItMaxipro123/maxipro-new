<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8" />

  <title>Packing List (商业发票)</title>

  <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> -->

  <style type="text/css">

body {
            font-family: 'Arial Unicode MS', 'Microsoft YaHei', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
  </style>

</head>

<body>

  @php

    $countdetail  = count($invoice_data['msg']['commercialinvoice']['detail']);

    $modulus    = 20 - $countdetail;

  @endphp



  <!-- PROFORMA INVOICE -->

  <div class="container">

    <div class="row">

      <table>

        <tr>

          <td colspan="11" style="text-align: center;">

            <h1 styl="font-size:26px;"><strong style="color: #000;font-size: 26px;">{{$invoice_data['msg']['commercialinvoice']['name']}}</strong></h1>

          </td>

        </tr>

        <tr>

          <td colspan="11" style="text-align: center;">

            <p style="font-size:12px;">{{$invoice_data['msg']['commercialinvoice']['address']}}</p>

          </td>

        </tr>
        <tr>
        
      
          <td colspan="11" style="text-align: center;">

            <p style="font-size:12px;">{{$invoice_data['msg']['commercialinvoice']['city']}}</p>

          </td>

        </tr>
        <tr>
        
      
          <td colspan="11" style="text-align: center;">

            <p style="font-size:12px;">{{$invoice_data['msg']['commercialinvoice']['phone']}}</p>

          </td>

        </tr>



        <tr>

          <td colspan="11" style="text-align: center;font-weight: bold;"><p style="margin: 0;"></p></td>

        </tr>



        <tr>
          <td>
            To :
          </td>
            <td>

                <table>
                    <tr>
    
                        <td>
        
                            <p></p>
                        </td>
                        
                    </tr>
                </table>
            </td>
            <td>

              <table>
                <tr>
                  <td colspan="2">
                    <p>PT. Maxipro Group Indonesia</p>
                  </td>
                  <td colspan="3">
                    <p>Date : {{$invoice_data['msg']['commercialinvoice']['date']}}</p>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <p>Jl. Waspada 42, Kel. Bongkaran Kec. Pabean Cantian</p>
                  </td>
                  <td colspan="3">
                    <p>Invoice No : {{$invoice_data['msg']['commercialinvoice']['mode_admin'] == '1' ? '' : 'INV-'}}{{$invoice_data['msg']['commercialinvoice']['invoice_no']}}</p>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <p>Surabaya Indonesia</p>
                  </td>
                  <td colspan="3">
                    <p>PL No : PL-{{$invoice_data['msg']['commercialinvoice']['packing_no']}}</p>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: left;">
                    <p>6281222</p>
                  </td>
                </tr>
              </table>

            </td>

          

        </tr>



        <tr>

          <td colspan="11" style="text-align: center; height:50px;">

            <h1><strong style="color: #000;font-size: 20px;">PACKING LIST<br> 商业发票 </strong></h1>

          </td>

        </tr>
        <tr>
            <td colspan="11" style="text-align: center;">
            </td>
        </tr>
        <tr>
        <td rowspan="2" style="text-align: center; width: 3%;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">No</p>
        </td>
        <td rowspan="2" style="text-align: center; width: 15%;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Description</p>
        </td>
        <td rowspan="2" style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">HSCODE<br>海关编码</p>
        </td>
        <td colspan="3" style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Dimension 尺寸 (CM)</p>
        </td>
        <td colspan="2" style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Quantity</p>
        </td>
        <td rowspan="2" style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">PKGS CTNS</p>
        </td>
        <td rowspan="2" style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">GW (KG)<br>总重量</p>
        </td>
        <td rowspan="2" style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">NW (KG)<br>净重</p>
        </td>
        <td rowspan="2" style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">CBM (M3)<br>立方米</p>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Length<br>长度</p>
        </td>
        <td style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Width<br>宽度</p>
        </td>
        <td style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Height<br>高度</p>
        </td>
        <td style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Qty<br>数量</p>
        </td>
        <td style="text-align: center;border: 1px solid #000;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">UOM<br>测量单位</p>
        </td>
    </tr>

    @php
            $jumlah=0;
            $gw=0;
            $nw=0;
            $cbm=0;
            $pckgs=0;
        @endphp
        @for($i = 0; $i < $modulus; $i++)
        <tr>
            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height:   {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['name_english']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $i + 1 }}
                </p>
            </td>

            @if(isset($invoice_data['msg']['commercialinvoice']['detail'][$i]))
            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height:  {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['name_english']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['name_english'] }}
                </p>
            </td>
            @else
            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: 0.75; position: relative; top: -2px; font-size: 7px;">
                </p>
            </td>
            @endif

            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['hs_code']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['hs_code'] ?? '' }}
                </p>
            </td>

            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['length_p']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['length_p'] ?? '' }}
                </p>
            </td>

            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['width_p']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['width_p'] ?? '' }}
                </p>
            </td>

            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['height_p']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['height_p'] ?? '' }}
                </p>
            </td>

            <td colspan="2" style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['qty']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['qty'] ?? '' }}
                    {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['qty']) ? ' Unit' : '' }}
                    @php
                    $jumlah += $invoice_data['msg']['commercialinvoice']['detail'][$i]['qty'] ??0;
                    @endphp
                </p>
            </td>
            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['gross_weight']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['pkgs'] ?? '' }}
                    @php
                    $pckgs += $invoice_data['msg']['commercialinvoice']['detail'][$i]['pkgs'] ??0;
                    @endphp
                </p>
            </td>
            

            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['nett_weight']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['nett_weight'] ?? '' }}
                    @php
                    $nw += $invoice_data['msg']['commercialinvoice']['detail'][$i]['nett_weight'] ??0;
                    @endphp
                </p>
            </td>
            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['gross_weight']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['gross_weight'] ?? '' }}
                    @php
                    $gw +=$invoice_data['msg']['commercialinvoice']['detail'][$i]['gross_weight'] ??0;
                    @endphp
                </p>
            </td>

            <td style="text-align: center; vertical-align: middle;border: 1px solid #000;">
                <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['cbm']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                    {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['cbm'] ?? '' }}
                    @php
                    $cbm += $invoice_data['msg']['commercialinvoice']['detail'][$i]['cbm'] ?? 0;
                    @endphp
                </p>
            </td>
        </tr>
        @endfor
        <tr>
          <td colspan="6" style="text-align: center; vertical-align: middle;height:20px;border: 1px solid #000;">
              <h3 style="font-size:9px; margin: 0; position: relative; line-height: 0.7; text-align:right;">Total</h3>
          </td>
          <td colspan="3" style="text-align: center; vertical-align: middle;height:20px;border: 1px solid #000;">
              <h3 style="font-size:9px; margin: 0; position: relative; line-height: 0.7; text-align:right;">{{$jumlah }} Unit</h3>
          </td>
  
          <td style="text-align: center; vertical-align: middle;height:20px;border: 1px solid #000;">
              <h3 style="font-size:9px; margin: 0; position: relative; line-height: 0.7; text-align:right;">{{ $nw }}</h3>
          </td>
          <td style="text-align: center; vertical-align: middle;height:20px;border: 1px solid #000;">
              <h3 style="font-size:9px; margin: 0; position: relative; line-height: 0.7; text-align:right;">{{ $gw }}</h3>
          </td>
          
          <td style="text-align: center; vertical-align: middle;height:20px;border: 1px solid #000;">
              <h3 style="font-size:9px; margin: 0; position: relative; line-height: 0.7; text-align:right;">{{ $cbm }}</h3>
          </td>
            
        </tr>

        <tr>

          <td colspan="8" style="text-align: center;font-weight: bold;"><p style="margin: 0;"></p></td>

        </tr>



        <tr>

          
          <td colspan="9"></td>

          <td colspan="2"><p>The Seller</p></td>

        </tr>



      </table>

    </div>

  </div>

</body>

</html>