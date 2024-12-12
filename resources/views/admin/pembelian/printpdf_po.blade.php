<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">


  <title>Purchase Order (商业发票)</title>



  <style type="text/css">

    @page 


    body 

     {

      color: #555;

      /*font-family: 'Tahoma', sans-serif;*/

      font-family: 'Firefly Sung', 'Tahoma', sans-serif;

      font-size: 0;

      line-height: normal;

    }

   

    p{

      color: #000;

      font-size: 10px;

    }

    td{

      color: #000;

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

            <h1><strong style="color: #000;font-size: 18px;">PT. Maxipro Group Indonesia</strong></h1>

            <p>

              Jl. Waspada 42, Kel. Bongkaran Kec. Pabean Cantian<br>

              Surabaya Indonesia<br>

              +62818757777

            </p>

          </td>

        </tr>

      </table>

    </div>
    <div class="row">

<!--       <table style="width: 100%;"> -->

        <!-- <tr> -->

          <!-- <td valign="top" style="width: 60%;"> -->

            <table style="width: 100%">

              <tr>

                <td valign="top">
                  @php
                  $previousSupplier = null;
                  @endphp
                  @foreach($data2['nama_supplier'] as $index => $result)
                  @if ($result !== $previousSupplier)
                  <p style="line-height: 0.25;">To: {{ $result }}</p>
<p style="text-align:left; text-indent: 15px; line-height: 0.25;">{{ $Data['msg']['supplier'][0]['company'] }}</p>
<p style="text-align:left; text-indent: 18px; line-height: 0.25;">{{ $Data['msg']['supplier'][0]['address'] }}</p>
<p style="text-align:left; text-indent: 18px; line-height: 0.25;">{{ $Data['msg']['supplier'][0]['city'] }}</p>
<p style="text-align:left; text-indent: 18px; line-height: 0.25;">{{ $Data['msg']['supplier'][0]['telp'] }}</p>


                  @endif
                  @php
                  $previousSupplier = $result;
                  @endphp
                  @endforeach
                </td>



              </tr>
           

            </table>

          <!-- </td> -->





          <!-- </tr> -->

   <!--    </table> -->

    </div>
 

  </div>

  



 <div class="container">
   <div class="row">

      <h1 style="text-align: center;"><strong style="color: #000;font-size: 16px;">PURCHASE ORDER <br> {{$data_title['title']}}</strong></h1>

    </div>
    <div class="row" style="width:50%;">

      

        <tr style="width:50%; text-align: center;">

          <td style="width: 100%;">

            <table style="width: 100%; border-collapse: collapse;" border="1">
              <thead>
                <tr>
                  <td style="text-align: center; width: 10%;">
                    <p style="margin: 0; font-weight: bold;">No </p>
                  </td>
                  <td style="text-align: center;width: 40%;">
                    <p style="margin: 0; font-weight: bold;">Picture</p>
                  </td>
                  <td style="text-align: center;width: 40%;">
                    <p style="margin: 0; font-weight: bold;">Description</p>
                  </td>
                  <td style="text-align: center; width: 10%;">
                    <p style="margin: 0; font-weight: bold;">Quantity</p>
                  </td>
                </tr>
              </thead>
              <tbody>
                @foreach ($data2['nama_barang'] as $index => $item)
                <tr>
                  <td style="text-align: center; width: 10%;">
                    <p style="margin: 0;">{{ $index + 1 }}</p>
                  </td>
                  <td style="text-align: center;width: 40%;">
                    <img src="{{ $data2['image'][$index] }}" alt="Image" style="width: 100px; height: auto;" />
                  </td>
                  <td style="text-align: center;width: 40%;">
                    <p style="margin: 0;">
                      {{ $data2['new_kode'][$index] }} <br>
                      {{ $data2['nama_barang_english'][$index] }} <br>
                      {{ $data2['nama_barang_china'][$index] }} <br>
                      {{ $item }}
                    </p>
                  </td>
                  <td style="text-align: center; width: 10%;">
                    <p style="margin: 0;">{{ $data2['jml_permintaan'][$index] }}</p>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </td>

        </tr>

      

    </div>

      
  </div>


 <div clas="container">
   <div class="row">

     

        <tr>

          <td style="width: 70%;"></td>

          <td>

            <p>The Buyer</p>
            <img src="https://maxipro.id/images/website/ttdmaxipro.jpg" alt="" style="width: 150px;margin-top: 0;">
           
          </td>

        </tr>

     

    </div>
 </div>

 





    



</body>

</html>