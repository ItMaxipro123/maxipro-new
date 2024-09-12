<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8" />

  <title>Purchase Order (商业发票)</title>

  <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> -->

  <style type="text/css">

    @page { margin: 0px; }

    @font-face {

      font-family: 'Firefly Sung';

      src: url(http://eclecticgeek.com/dompdf/fonts/cjk/fireflysung.ttf) format('truetype');

    }

    body { margin: 15px; }

    * {

      color: #555;

      /*font-family: 'Tahoma', sans-serif;*/

      font-family: 'Firefly Sung', 'Tahoma', sans-serif;

      font-size: 0;

      line-height: normal;

    }

    h1{

      font-family: 'Firefly Sung', 'Tahoma','noto_sans_cjk', sans-serif;

    }
    
    strong{

      font-family: 'Firefly Sung', 'Tahoma', sans-serif;

    }

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

  

  <!-- PURCHASE ORDER -->

  <div class="container">

    <div class="row">

      <table style="width: 100%;" align="center">

        <tr>

          <td style="text-align: center;padding: 15px;">

            <h1><strong style="color: #000;font-size: 20px;">PT. Maxipro Group Indonesia</strong></h1>

            <p>

              Jl. Waspada 42, Kel. Bongkaran Kec. Pabean Cantian<br>

              Surabaya Indonesia<br>

              +62818757777

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

                <td valign="top" style="width: 2em;">
                  @foreach( $data2['nama_supplier'] as $index =>$result)
                  <p>  
                  To :
                   {{ $result }} 
                  </p>
                  @endforeach
                </td>

                <!-- <td valign="top" style="text-align: left;">

                  <p>


                  </p>

                </td> -->

              </tr>

            </table>

          </td>

          <td valign="top" style="width: 10%;text-align: center;"></td>

          <td valign="top" style="width: 30%;">

            <table style="width: 100%">

              <tr>

                <td style="text-align: left;">

                  <p>

                  

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

            <h1><strong style="color: #000;font-size: 20px;">PURCHASE ORDER <br> 商业发票</strong></h1>

          </td>

        </tr>

      </table>

    </div>

  </div>

  <div class="container">

    <div class="row">

      <table style="width: 100%;border-collapse: collapse;" border="1">
        <thead>

          <tr>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">No</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">Picture</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">Description</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;">Quantity</p></td>

            
          </tr>
        </thead>

      


      <tbody>

      @foreach ($data2['nama_barang'] as $index => $item)
            <tr>
                <td style="text-align: center;"><p style="margin: 0;">{{ $index + 1 }}</p></td>
                <td style="text-align: center;">
                    <img src="{{ $data2['image'][$index] }}" alt="Image" style="width: 100px; height: auto;" />
                </td>
                <td style="text-align: center;">
                    <p style="margin: 0;">
                        {{ $data2['new_kode'][$index] }} <br>
                        {{ $data2['nama_barang_english'][$index] }} <br>
                        {{ $data2['nama_barang_china'][$index] }} <br>
                        {{ $item }}
                    </p>
                </td>
                <td style="text-align: center;"><p style="margin: 0;">{{ $data2['jml_permintaan'][$index] }}</p></td>
            </tr>
        @endforeach

      </tbody>

      


      </table>

    </div>

  </div>

 

  <div class="container" style="margin-top: 20px;">

    <div class="row">

      <table style="width: 100%;border-collapse: collapse;">

        <tr>

          <td colspan="2" style="text-align: center;font-weight: bold;"><p style="color: transparent;margin: 0;">PAYMENT</p></td>

        </tr>

        <tr>

          <td style="text-align: left;width: 20%"><p style="margin: 0;color: transparent;">Currency</p></td>

          <td style="text-align: left;"><p style="margin: 0;color: transparent;"></p></td>

        </tr>

        <tr>

          <td style="text-align: left;width: 20%"><p style="margin: 0;color: transparent;">Bank Name</p></td>

          <td style="text-align: left;"><p style="margin: 0;color: transparent;"></p></td>

        </tr>

        <tr>

          <td style="text-align: left;width: 20%"><p style="margin: 0;color: transparent;">Bank Address</p></td>

          <td style="text-align: left;"><p style="margin: 0;color: transparent;"></p></td>

        </tr>

        <tr>

          <td style="text-align: left;width: 20%"><p style="margin: 0;color: transparent;">Swift Code</p></td>

          <td style="text-align: left;"><p style="margin: 0;color: transparent;"></p></td>

        </tr>

        <tr>

          <td style="text-align: left;width: 20%"><p style="margin: 0;color: transparent;">Account No</p></td>

          <td style="text-align: left;"><p style="margin: 0;color: transparent;"></p></td>

        </tr>

        <tr>

          <td style="text-align: left;width: 20%"><p style="margin: 0;color: transparent;">Beneficiary Name</p></td>

          <td style="text-align: left;"><p style="margin: 0;color: transparent;"></p></td>

        </tr>

        <tr>

          <td style="text-align: left;width: 20%"><p style="margin: 0;color: transparent;">Beneficiary Address</p></td>

          <td style="text-align: left;"><p style="margin: 0;color: transparent;"></p></td>

        </tr>

      </table>

    </div>

  </div>

  <div class="container" style="margin-top: 30px;">

    <div class="row">

      <table style="width: 100%;">

        <tr>

          <td style="width: 70%;"></td>

          <td>

            <p>The Buyer</p>
            <img src="https://maxipro.id/images/website/ttdmaxipro.jpg" alt="" style="width: 200px;margin-top: 0;">
           
          </td>

        </tr>

      </table>

    </div>

  </div>

</body>

</html>