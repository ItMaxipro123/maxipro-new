<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8" />

  <title>Packing List (商业发票)</title>

  <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> -->

  <style type="text/css">

    @page { margin: 0px; }

    /*@font-face {

      font-family: 'Firefly Sung';

      src: url(http://eclecticgeek.com/dompdf/fonts/cjk/fireflysung.ttf) format('truetype');

    }*/

    body { margin: 15px; }

    * {

      color: #555;

      font-family: 'Tahoma', sans-serif;

      /*font-family: 'Firefly Sung', 'Tahoma', sans-serif;*/

      font-size: 0;

      line-height: normal;

    }

    /*h1{

      font-family: 'Firefly Sung', 'Tahoma', sans-serif;

    }

    strong{

      font-family: 'Firefly Sung', 'Tahoma', sans-serif;

    }*/

    .container{

      width: 100%;

    }

    p{

      color: #000;

      font-size: 12px;

    }

    td{

      color: #000;

    }

    th{

      padding: 2px;

      text-align: center;

      background: #000;

      color: #fff;

      height: 30px;

    }

  </style>

</head>

<body onload="window.print();">

  @php

    $modulus      = 20 - $sumitem;

  @endphp



  <!-- PACKING LIST -->

  <div class="container">

    <div class="row">

      <table style="width: 100%;" align="center">

        <tr>

          <td style="text-align: center;padding: 15px;">

            <h1><strong style="color: #000;font-size: 20px;">{{$invoice_data['msg']['fclcontainer']['name']}}</strong></h1>

            <p>

            {{$invoice_data['msg']['fclcontainer']['address']}}<br>

            {{$invoice_data['msg']['fclcontainer']['city']}}<br>

            {{$invoice_data['msg']['fclcontainer']['phone']}}

            </p>

          </td>

        </tr>

      </table>

    </div>

  </div>

  <div class="container">

    <div class="row">

      <table style="width: 100%;">

        <tr>

          <td valign="top" style="width: 60%;">

            <table style="width: 100%">

              <tr>

                <td valign="top" style="width: 23px;">

                  <p>To :</p>

                </td>

                <td valign="top" style="text-align: left;">

                  <p>

                    PT. Maxipro Group Indonesia<br>Jl. Waspada 42, Kel. Bongkaran Kec. Pabean Cantian

                    Surabaya Indonesia

                    +62818757777

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

                  <p>

                  Date :   {{$invoice_data['msg']['fclcontainer']['date']}}<br>
                    Invoice No : {{$invoice_data['msg']['fclcontainer']['mode_admin'] == '1' ? '' : 'INV-'}}{{$invoice_data['msg']['fclcontainer']['invoice_no']}}<br>

                    PL No : PL-{{ $invoice_data['msg']['fclcontainer']['packing_no']}}<br>
                    

                    @php

                         $duedate = date('Y-m-d', strtotime($invoice_data['msg']['fclcontainer']['date']. '+1 month'));

                    @endphp



                    Due Date : {{$duedate}}<br>

                  </p>

                </td>

              </tr>

            </table>

          </td>

        </tr>

      </table>

    </div>

  </div>

  <div class="container">

    <div class="row">

      <table style="width: 100%;" align="center">

        <tr>

          <td style="text-align: center;padding: 15px;">

            <h1><strong style="color: #000;font-size: 20px;">PACKING LIST <br></strong></h1>

          </td>

        </tr>

      </table>

    </div>

  </div>

  <div class="container">

    <div class="row">

      <table style="width: 100%;border-collapse: collapse;" border="1">

        <tr>

          <td rowspan="2" style="text-align: center;"><p style="margin: 0;font-weight: bold;">No</p></td>

          <td rowspan="2" style="text-align: center;"><p style="margin: 0;font-weight: bold;">Description</p></td>

          <td rowspan="2" style="text-align: center;"><p style="margin: 0;font-weight: bold;">HSCODE<br>海关编码</p></td>

          <td colspan="3" style="text-align: center;"><p style="margin: 0;font-weight: bold;">Dimension 尺寸 (CM)</p></td>

          <td colspan="2" style="text-align: center;"><p style="margin: 0;font-weight: bold;">Quantity</p></td>

          <td rowspan="2" style="text-align: center;"><p style="margin: 0;font-weight: bold;">GW (KG)<br>总重量</p></td>

          <td rowspan="2" style="text-align: center;"><p style="margin: 0;font-weight: bold;">NW (KG)<br>净重</p></td>

          <td rowspan="2" style="text-align: center;"><p style="margin: 0;font-weight: bold;">CBM (M3)<br>立方米</p></td>

        </tr>

        <tr>

          <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">Length<br>长度</p></td>

          <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">Width<br>宽度</p></td>

          <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">Height<br>高度</p></td>

          <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">Qty<br>数量</p></td>

          <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">UOM<br>测量单位</p></td>

        </tr>



        @php

          $allqty     = 0;

          $allnw      = 0;

          $allgw      = 0;

          $allcbm     = 0;

          $number     = 0;

        @endphp

        @foreach($invoice_data['msg']['list_comercial_invoice'] as $result)

        

              

              @php

                $allqty = $allqty + $result['qty'];

                $allnw  = $allnw + $result['nett_weight'];

                $allgw  = $allgw + $result['gross_weight'];

                $allcbm = $allcbm + $result['cbm'];

              @endphp



              <tr>

                <td style="text-align: center;"><p style="margin: 0;">{{$number+1}}</p></td>

                <td style="text-align: left;"><p style="margin: 0;">{{$result['name_english']}}</p></td>

                <td style="text-align: right;"><p style="margin: 0;">{{$result['hs_code']}}</p></td>

                <td style="text-align: right;"><p style="margin: 0;">{{$result['length_p']}}</p></td>

                <td style="text-align: right;"><p style="margin: 0;">{{$result['width_p']}}</p></td>

                <td style="text-align: right;"><p style="margin: 0;">{{$result['height_p']}}</p></td>

                <td colspan="2" style="text-align: center;"><p style="margin: 0;">{{number_format($result['qty'])}} Unit</p></td>

                <td style="text-align: right;"><p style="margin: 0;">{{$result['nett_weight']}}</p></td>

                <td style="text-align: right;"><p style="margin: 0;">{{$result['gross_weight']}}</p></td>

                <td style="text-align: right;"><p style="margin: 0;">{{$result['cbm']}}</p></td>

              </tr>

              

              @php

                $number++;

              @endphp

              

          

        @endforeach



        @for($i = 1; $i <= $modulus; $i++)

          <tr>

            <td style="text-align: center;"><p style="margin: 0;">{{$sumitem + $i}}</p></td>

            <td style="text-align: left;"><p style="margin: 0;"></td>

            <td style="text-align: right;"><p style="margin: 0;"></td>

            <td style="text-align: center;"><p style="margin: 0;"></td>

            <td style="text-align: right;"><p style="margin: 0;"></td>

            <td style="text-align: right;"><p style="margin: 0;"></td>

            <td colspan="2" style="text-align: right;"><p style="margin: 0;"></td>

            <td style="text-align: right;"><p style="margin: 0;"></td>

            <td style="text-align: right;"><p style="margin: 0;"></td>

            <td style="text-align: right;"><p style="margin: 0;"></td>

          </tr>

        @endfor



        <tr>

          <td colspan="6" style="text-align: right;"><p style="margin: 0;">Total</p></td>

          <td colspan="2" style="text-align: center;"><p style="margin: 0;">{{number_format($allqty)}} Unit</p></td>

          <td style="text-align: right;"><p style="margin: 0;">{{$allnw}}</p></td>

          <td style="text-align: right;"><p style="margin: 0;">{{$allgw}}</p></td>

          <td style="text-align: right;"><p style="margin: 0;">{{$allcbm}}</p></td>

        </tr>

      </table>

    </div>

  </div>

  <div class="container" style="margin-top: 30px;">

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