<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">


  <title>Packing List (商业发票)</title>



  <style type="text/css">

    @page 
    body 

      *{

        color: #555;

        /*font-family: 'Tahoma', sans-serif;*/

        font-family: 'Tahoma', sans-serif;

        font-size: 0;

        line-height: normal;

      }


   

   

      p {
        color: #000;
        font-size: 8px;
        
      }


    td{

      color: #000;

    }

    th{

 

      text-align: center;

      background: #000;

      color: #fff;

      height: 30px;

    }


  
  </style>
  
</head>

<body onload="window.print();">
@php

$modulus      = 20 ;

@endphp
  

  <!-- PURCHASE ORDER -->

  <div class="container">

    <div class="row">

      <table style="width: 100%;" align="center">

        <tr>

          <td style="text-align: center;">

          <h1><strong style="color: #000;font-size: 20px;">{{$invoice_data['msg']['fclcontainer']['name']}}</strong></h1>

          <p>

            {{$invoice_data['msg']['fclcontainer']['address']}}<br>

            {{$invoice_data['msg']['fclcontainer']['city']}}<br>

            {{$invoice_data['msg']['fclcontainer']['phone']}}

          </p>

          </td>

        </tr>

      </table>
      <table style="width: 100%;">

          <tr>

            <td valign="top" style="width: 60%;">

                <table style="width: 100%">

                  <tr>

                    <td valign="top" style="width: 27px;">

                      <p  style="margin-bottom: 12px;
                      line-height: 1.5;">To :</p>

                    </td>

                    <td valign="top" style="text-align: left;width:100%;">

                    <p style="margin-bottom: 12px;
                                              line-height: 1.5;">PT. Maxipro Group Indonesia<br>
                        Jl. Waspada 42, Kel. Bongkaran Kec. Pabean Cantian Surabaya Indonesia 
                        <br>+62818757777<br>
                    </p>

                    </td>

                  </tr>

                </table>

            </td>

            <td valign="top" style="width: 10%;text-align: center;"></td>

            <td valign="top" style="width: 30%;">

              <table style="width: 100%">

                <tr>

                  <td style="text-align: left;">

                      <p style="margin-bottom: 12px;
                      line-height: 1.5;">

                    Date :   {{$invoice_data['msg']['fclcontainer']['date']}}<br>
                    Invoice No : {{$invoice_data['msg']['fclcontainer']['mode_admin'] == '1' ? '' : 'INV-'}}{{$invoice_data['msg']['fclcontainer']['invoice_no']}}<br>

                    PL No : PL-{{ $invoice_data['msg']['fclcontainer']['packing_no']}}<br>
                    

                    @php

                         $duedate = date('Y-m-d', strtotime($invoice_data['msg']['fclcontainer']['date']. '+1 month'));

                    @endphp

                    </p>

                  </td>

                </tr>

              </table>

            </td>

          </tr>

      </table>
      <table style="width: 100%;" align="center">

          <tr>

            <td style="text-align: center;padding: 15px;">

              <h1><strong style="color: #000;font-size: 15px;">PACKING LIST<br> </strong></h1>

            </td>

          </tr>

      </table>

      <table style="width: 100%; border-collapse: collapse;" border="1">
    <tr>
        <td rowspan="2" style="text-align: center; width: 3%;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">No</p>
        </td>
        <td rowspan="2" style="text-align: center; width: 15%;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Description</p>
        </td>
        <td rowspan="2" style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">HSCODE<br>海关编码</p>
        </td>
        <td colspan="3" style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Dimension 尺寸 (CM)</p>
        </td>
        <td colspan="2" style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Quantity</p>
        </td>
        <td rowspan="2" style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">GW (KG)<br>总重量</p>
        </td>
        <td rowspan="2" style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">NW (KG)<br>净重</p>
        </td>
        <td rowspan="2" style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">CBM (M3)<br>立方米</p>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Length<br>长度</p>
        </td>
        <td style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Width<br>宽度</p>
        </td>
        <td style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Height<br>高度</p>
        </td>
        <td style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">Qty<br>数量</p>
        </td>
        <td style="text-align: center;">
            <p style="margin: 0; font-weight: bold; font-size: 7px;">UOM<br>测量单位</p>
        </td>
    </tr>
    @php
        $jumlah=0;
    @endphp
    @for($i = 0; $i < $modulus; $i++)
    <tr>
        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height:   {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['name_english']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $i + 1 }}
            </p>
        </td>

        @if(isset($invoice_data['msg']['commercialinvoice']['detail'][$i]))
        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height:  {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['name_english']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['name_english'] }}
            </p>
        </td>
        @else
        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: 0.75; position: relative; top: -2px; font-size: 7px;">
            </p>
        </td>
        @endif

        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['hs_code']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['hs_code'] ?? '' }}
            </p>
        </td>

        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['length_p']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['length_p'] ?? '' }}
            </p>
        </td>

        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['width_p']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['width_p'] ?? '' }}
            </p>
        </td>

        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['height_p']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['height_p'] ?? '' }}
            </p>
        </td>

        <td colspan="2" style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['qty']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['qty'] ?? '' }}
                @php
                $jumlah += $invoice_data['msg']['commercialinvoice']['detail'][$i]['qty'] ??0;
                @endphp
            </p>
        </td>

        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['gross_weight']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['gross_weight'] ?? '' }}
            </p>
        </td>

        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['nett_weight']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['nett_weight'] ?? '' }}
            </p>
        </td>

        <td style="text-align: center; vertical-align: middle;">
            <p style="margin: 0; padding: 0 0 2px 0; display: inline-block; line-height: {{ isset($invoice_data['msg']['commercialinvoice']['detail'][$i]['cbm']) ? '1.25' : '0.5' }}; position: relative; top: -2px; font-size: 7px;">
                {{ $invoice_data['msg']['commercialinvoice']['detail'][$i]['cbm'] ?? '' }}
            </p>
        </td>
    </tr>
    @endfor
    <tr>
      <td colspan="6" style="text-align: center; vertical-align: middle;height:20px;">
    <h3 style="font-size:9px; margin: 0; position: relative; line-height: 0.7; text-align:right;">Total</h3>
</td>
      <td colspan="5" style="text-align: center; vertical-align: middle;height:20px;">
    <h3 style="font-size:9px; margin: 0; position: relative; line-height: 0.7; text-align:right;">{{ $jumlah }}</h3>
</td>
        
    </tr>
</table>

    </div>
    


  </div>

  <!-- <div class="container">

      <div class="row">

       

       
      </div>

  </div> -->

  <!-- <div class="container" >
  </div> -->
    
  <div class="container" >
      <div class="row">

        <table style="width: 100%;">

            <tr>

            <td style="width: 70%;"></td>

            <td><p>The Seller</p></td>

            </tr>

        </table>

      </div>          

  </div>
 
</body>

</html>