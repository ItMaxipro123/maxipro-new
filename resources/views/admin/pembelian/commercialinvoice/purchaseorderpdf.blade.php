<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">


  <title>Purchase Order (商业发票)</title>



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

            <h1><strong style="color: #000;font-size: 15px;">PT. Maxipro Group Indonesia</strong></h1>

            <p >

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

                    <td valign="top" style="width: 23px;">

                      <p>To :</p>

                    </td>

                    <td valign="top" style="text-align: left;">

                      <p>

                        {{$invoice_data['msg']['commercialinvoice']['name']}}<br>

                        {{$invoice_data['msg']['commercialinvoice']['address']}}

                        {{$invoice_data['msg']['commercialinvoice']['city']}}

                        {{$invoice_data['msg']['commercialinvoice']['phone']}}

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

                      Date :  {{$invoice_data['msg']['commercialinvoice']['date']}}<br>

                      Invoice No : {{$invoice_data['msg']['commercialinvoice']['mode_admin'] == '1' ? '' : 'INV-'}}{{$invoice_data['msg']['commercialinvoice']['invoice_no']}}<br>

                      PL No : PL-{{$invoice_data['msg']['commercialinvoice']['packing_no']}}<br>



                      @php

                      $duedate = date('Y-m-d', strtotime($invoice_data['msg']['commercialinvoice']['date']. '+1 month'));

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

              <h1><strong style="color: #000;font-size: 15px;">PURCHASE ORDER <br> </strong></h1>

            </td>

          </tr>

        </table>

        <table style="width: 100%;border-collapse: collapse;" border="1">

          <tr>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold; margin-bottom: 12px;
            line-height: 2;">No</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">Model</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">Description</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">HSCODE</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">Quantity</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">PKGS CTNS</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">Unit Price</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">Ammount</p></td>

          </tr>
            @php
            $number       = 1;
            $matauang_simbol='';
            $allqty=0;
            $allpkgs=0;
            $alltotal=0;
            $matauang_kode='';
            foreach($invoice_data['msg']['matauang'] as $index => $result_matauang){
                if($result_matauang['id']== $invoice_data['msg']['commercialinvoice']['id_matauang']){
                    $matauang_simbol =  $result_matauang['simbol'];
                    $matauang_kode = $result_matauang['kode'];
                }
            }

            @endphp
            @foreach($invoice_data['msg']['commercialinvoice']['detail'] as $result)
            <tr>
              @php
              $allqty =  $allqty+ $result['qty'];
              $allpkgs = $allpkgs + $result['pkgs'];
              $alltotal = $alltotal + $result['total_price_usd'];
              @endphp
              <td style="text-align: center;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$number++}}</p></td>

              <td style="text-align: left;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$result['model']}}</p></td>

              <td style="text-align: left;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$result['name_english']}}</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$result['hs_code']}}</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{number_format($result['qty'])}}</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{number_format($result['pkgs'])}}</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{ $matauang_simbol }} {{ number_format($result['unit_price_usd'],2) }}</p></td>
              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{ $matauang_simbol }} {{ number_format($result['total_price_usd'],2) }}</p></td>



            </tr>
            @endforeach
            <tr>

              <td colspan="4" style="text-align: right;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
              line-height: 2;">Total</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{number_format($allqty)}}</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{number_format($allpkgs)}}</p></td>

              <td colspan="2" style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;"></p></td>

            </tr>

            <tr>

              <td colspan="7" style="text-align: right;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
              line-height: 2;">FOB Value</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$matauang_simbol}} {{number_format($alltotal, 2)}}</p></td>

            </tr>
            <tr>

              <td colspan="7" style="text-align: right;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
              line-height: 2;">Freight Cost</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$matauang_simbol}} {{number_format($invoice_data['msg']['commercialinvoice']['freight_cost'], 2)}}</p></td>

            </tr>
            <tr>

              <td colspan="7" style="text-align: right;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
              line-height: 2;">Insurance</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$matauang_simbol}} {{number_format($invoice_data['msg']['commercialinvoice']['insurance'], 2)}}</p></td>

            </tr>
            <tr>

              <td colspan="7" style="text-align: right;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
              line-height: 2;">Total Ammount {{$invoice_data['msg']['commercialinvoice']['incoterms']}} {{$invoice_data['msg']['commercialinvoice']['location']}}</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$matauang_simbol}} {{number_format($alltotal + $invoice_data['msg']['commercialinvoice']['freight_cost'] + $invoice_data['msg']['commercialinvoice']['insurance'], 2)}}</p></td>

            </tr>
        </table>
      </div>

  </div>

  






  <div class="container" style="margin-top: 20px;">

    <div class="row">

        <table style="width: 100%;border-collapse: collapse;" border="1">

            <tr>

              <td style="text-align: center;font-weight: bold;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">NOTES</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Incoterms</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['commercialinvoice']['incoterms']}} {{$invoice_data['msg']['commercialinvoice']['location']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Term Of Payment</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['commercialinvoice']['term_of_payment']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Delivery Date</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['commercialinvoice']['delivery_date']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Package</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['commercialinvoice']['package']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Guarantee</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['commercialinvoice']['guarantee']}} Year</p></td>

            </tr>

        </table>

        <table style="width: 100%; border-collapse: collapse;">

        <tr>
          <td colspan="2" style="text-align: center; font-weight: bold; padding: 0;">
            <p style="margin: 0; line-height: 1;">PAYMENT</p>
          </td>
        </tr>

        <tr>
          <td style="text-align: left; width: 20%; padding: 0;">
            <p style="margin: 0; line-height:1;">Currency</p>
          </td>
          <td style="text-align: left; height:auto; width:100%">
            <p style="margin: 0; line-height:1;">{{$matauang_kode}} - {{$matauang_simbol}}</p>
          </td>
        </tr>

        <tr>
          <td style="text-align: left; width: 20%; padding: 0;">
            <p style="margin: 0; line-height:0.75;">Bank Name</p>
          </td>
          <td style="text-align: left; height:auto; width:100%">
            <p style="margin: 0; line-height:0.75;">{{$invoice_data['msg']['commercialinvoice']['bank_name']}}</p>
          </td>
        </tr>
        

        @if($matauang_kode == 'USD')
          <tr>
            <td style="text-align: left; width: 20%; padding: 0;">
              <p style="margin: 0; line-height: 0.75;">Bank Address</p>
            </td>
            <td style="text-align: left; height:auto; width:100%">
              <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['bank_address']}}</p>
            </td>
          </tr>

          <tr>
            <td style="text-align: left; width: 20%; padding: 0;">
              <p style="margin: 0; line-height: 0.75;">Swift Code</p>
            </td>
            <td style="text-align: left; height:auto; width:100%">
              <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['swift_code']}}</p>
            </td>
          </tr>
      
          @else
          <tr>
        
          <td style="text-align: left;width: 20%">
            <p style="margin: 0; line-height: 0.75;">Bank Address
            </p>
          </td>

          <td style="text-align: left; height:auto; width:100%">
              <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['bank_address']}}
              </p>
          </td>


          </tr>

          <tr>

          <td style="text-align: left;width: 20%">
            <p style="margin: 0; line-height: 0.75;">Swift Code
            </p>
          </td>

          <td style="text-align: left; height:auto; width:100%">
            <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['swift_code']}}
            </p>
          </td>

          </tr>

          @endif

          <tr>

          <td style="text-align: left;width: 20%">
          <p style="margin: 0; line-height: 0.75;">Account No
          </p>
          </td>

          <td style="text-align: left; height:auto; width:100%">
          <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['account_no']}}
          </p>
          </td>

          </tr>

          <tr>

          <td style="text-align: left;width: 20%">
          <p style="margin: 0; line-height: 0.75;">Beneficiary Name
          </p>
          </td>

          <td style="text-align: left; height:auto; width:100%">
          <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['beneficiary_name']}}
          </p>
          </td>

          </tr>

          @if($matauang_kode == 'USD')

          <tr>

          <td style="text-align: left;width: 20%">
            <p style="margin: 0; line-height: 0.75;">Beneficiary Address
            </p>
          </td>

          <td style="text-align: left; height:auto; width:100%">
            <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['beneficiary_address']}}
            </p>
          </td>

          </tr>

          @else

          <tr>

          <td style="text-align: left;width: 20%">
            <p style="margin: 0; line-height: 0.75;">Beneficiary Address
            </p>
          </td>

          <td style="text-align: left; height:auto; width:100%">
            <p style="margin: 0; line-height: 0.75;">{{$invoice_data['msg']['commercialinvoice']['beneficiary_address']}}
            </p>
          </td>

          </tr>
          @endif

</table>


    </div>
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