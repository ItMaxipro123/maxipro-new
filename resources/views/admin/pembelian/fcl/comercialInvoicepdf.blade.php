<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">


  <title>Commercial Invoice (商业发票)</title>



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

  

  <!-- PURCHASE ORDER -->

  <div class="container">

    <div class="row">

      <table style="width: 100%;" align="center">

        <tr>

          <td style="text-align: center;">

          <h1><strong style="color: #000;font-size: 15px;">{{$invoice_data['msg']['fclcontainer']['name']}}</strong></h1>

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
                                              line-height: 1.5;">PT. Maxipro Group Indonesia<br>Jl. Waspada 42, Kel. Bongkaran Kec. Pabean Cantian Surabaya Indonesia 
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

                      Date :  {{$invoice_data['msg']['fclcontainer']['date']}}<br>

                      Invoice No : {{$invoice_data['msg']['fclcontainer']['mode_admin'] == '1' ? '' : 'INV-'}}{{$invoice_data['msg']['fclcontainer']['invoice_no']}}<br>

                      PL No : PL-{{$invoice_data['msg']['fclcontainer']['packing_no']}}<br>



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

              <h1><strong style="color: #000;font-size: 15px;">COMMERCIAL INVOICE <br> </strong></h1>

            </td>

          </tr>

      </table>

      <table style="width: 100%;border-collapse: collapse;" border="1">

          <tr>

            <td style="text-align: center;width:5%;"><p style="margin: 0;font-weight: bold; margin-bottom: 12px;
            line-height: 2;">No</p></td>

            <td style="text-align: center;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">Model</p></td>

            <td style="text-align: center;width:25%"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">Description</p></td>

            <td style="text-align: center;width:10%;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
            line-height: 2;">HSCODE</p></td>

            <td style="text-align: center;width:10%;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
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
                if($result_matauang['id']== $invoice_data['msg']['fclcontainer']['id_matauang']){
                    $matauang_simbol =  $result_matauang['simbol'];
                    $matauang_kode = $result_matauang['kode'];
                }
            }

            @endphp
            @foreach($invoice_data['msg']['list_comercial_invoice'] as $result)
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
              line-height: 2;">{{$matauang_simbol}} {{number_format($invoice_data['msg']['fclcontainer']['freight_cost'], 2)}}</p></td>

            </tr>
            <tr>

              <td colspan="7" style="text-align: right;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
              line-height: 2;">Insurance</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$matauang_simbol}} {{number_format($invoice_data['msg']['fclcontainer']['insurance'], 2)}}</p></td>

            </tr>
            <tr>

              <td colspan="7" style="text-align: right;"><p style="margin: 0;font-weight: bold;margin-bottom: 12px;
              line-height: 2;">Total Ammount {{$invoice_data['msg']['fclcontainer']['incoterms']}} {{$invoice_data['msg']['fclcontainer']['location']}}</p></td>

              <td style="text-align: right;"><p style="margin: 0;margin-bottom: 12px;
              line-height: 2;">{{$matauang_simbol}} {{number_format($alltotal + $invoice_data['msg']['fclcontainer']['freight_cost'] + $invoice_data['msg']['fclcontainer']['insurance'], 2)}}</p></td>

            </tr>
      </table>

    </div>
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
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['incoterms']}} {{$invoice_data['msg']['fclcontainer']['location']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Term Of Payment</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['term_of_payment']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Delivery Date</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['delivery_date']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Package</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['package']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Guarantee</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['guarantee']}} Year</p></td>

            </tr>

        </table>

   
           

    </div>

    <div class="row">

        <table style="width: 100%;border-collapse: collapse;" border="1">

            <tr>

              <td style="text-align: center;font-weight: bold;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">PAYMENT</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Currency</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$matauang_kode}} - {{$matauang_simbol}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Bank Name</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['bank_name']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Bank Address</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['bank_address']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Swift Code</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['swift_code']}}</p></td>

            </tr>

            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Account No</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['account_no']}}</p></td>

            </tr>
            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Beneficiary Name</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['beneficiary_name']}}</p></td>

            </tr>
            <tr>

              <td style="text-align: left;width: 20%"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">Beneficiary Addres</p></td>

              <td style="text-align: left;"><p style="margin: 0; margin-bottom: 12px;
              line-height: 2;">{{$invoice_data['msg']['fclcontainer']['beneficiary_address']}}</p></td>

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