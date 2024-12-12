<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8" />

  <title>Sales Contract (销货合同)</title>

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

    $countdetail  = count($invoice_data['msg']['fclcontainer']['detail']);

    $modulus    = 20 - $countdetail;

  @endphp



  <!-- PROFORMA INVOICE -->

  <div class="container">

    <div class="row">

      <table>

        <tr>

          <td colspan="8" style="text-align: center;">

            <h1 styl="font-size:26px;"><strong style="color: #000;font-size: 26px;">{{$invoice_data['msg']['fclcontainer']['name']}}</strong></h1>

          </td>

        </tr>

        <tr>

          <td colspan="8" style="text-align: center;">

            <p style="font-size:12px;">{{$invoice_data['msg']['fclcontainer']['address']}}</p>

          </td>

        </tr>
        <tr>
        
      
          <td colspan="8" style="text-align: center;">

            <p style="font-size:12px;">{{$invoice_data['msg']['fclcontainer']['city']}}</p>

          </td>

        </tr>
        <tr>
        
      
          <td colspan="8" style="text-align: center;">

            <p style="font-size:12px;">{{$invoice_data['msg']['fclcontainer']['phone']}}</p>

          </td>

        </tr>



        <tr>

          <td colspan="8" style="text-align: center;font-weight: bold;"><p style="margin: 0;"></p></td>

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
                  <td>
                    <p>PT. Maxipro Group Indonesia</p>
                  </td>
                  <td>
                    <p>Date : {{$invoice_data['msg']['fclcontainer']['date']}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Jl. Waspada 42, Kel. Bongkaran Kec. Pabean Cantian</p>
                  </td>
                  <td>
                    <p>Invoice No : {{$invoice_data['msg']['fclcontainer']['mode_admin'] == '1' ? '' : 'INV-'}}{{$invoice_data['msg']['fclcontainer']['invoice_no']}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Surabaya Indonesia</p>
                  </td>
                  <td>
                    <p>PL No : PL-{{$invoice_data['msg']['fclcontainer']['packing_no']}}</p>
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

          <td colspan="8" style="text-align: center; height:50px;">

            <h1><strong style="color: #000;font-size: 20px;">SALES CONTRACT <br> 销货合同</strong></h1>

          </td>

        </tr>



        <tr>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">No</p></td>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Model</p></td>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Description</p></td>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">HSCODE</p></td>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Quantity</p></td>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">PKGS CTNS</p></td>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Unit Price</p></td>

          <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Ammount</p></td>

        </tr>

        @php

          $alltotal     = 0;

          $allqty       = 0;

          $allpkgs      = 0;
          $matauang_kode='';
          $matauang_simbol='';
            foreach($invoice_data['msg']['matauang'] as $index => $result_matauang){
                if($result_matauang['id']== $invoice_data['msg']['fclcontainer']['id_matauang']){
                    $matauang_simbol =  $result_matauang['simbol'];
                    $matauang_kode = $result_matauang['kode'];
                }
            }
        @endphp

        @foreach($invoice_data['msg']['list_comercial_invoice'] as $key => $result)

          @php

            $allqty     = $allqty + $result['qty'];

            $allpkgs    = $allpkgs + $result['pkgs'];



            if($matauang_simbol === '$'){


              $alltotal     = $alltotal + $result['total_price_without_tax'];

              $unit_price   = $result['unit_price_without_tax'];

              $total_price  = $result['total_price_without_tax'];
            }else{

              
              $alltotal = $alltotal + $result['total_price_usd'];

              $unit_price   = $result['unit_price_usd'];

              $total_price  = $result['total_price_usd'];
              


            }

          @endphp



          <tr>

            <td style="text-align: center;border: 1px solid #000;"><p style="margin: 0;">{{$key+1}}</p></td>

            <td style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$result['model']}}</p></td>

            <td style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$result['name_english']}}</p></td>

            <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{$result['hs_code']}}</p></td>

            <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{number_format($result['qty'])}}</p></td>

            <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{number_format($result['pkgs'])}}</p></td>

            <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{$matauang_simbol}} {{number_format($unit_price, 2)}}</p></td>

            <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{$matauang_simbol}} {{number_format($total_price, 2)}}</p></td>

          </tr>

        @endforeach

        <tr>

          <td colspan="4" style="text-align: right;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Total</p></td>

          <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{number_format($allqty)}}</p></td>

          <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{number_format($allpkgs)}}</p></td>

          <td colspan="2" style="text-align: right;border: 1px solid #000;"><p style="margin: 0;"></p></td>

        </tr>

        <tr>

          <td colspan="7" style="text-align: right;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">FOB Value</p></td>

          <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{$matauang_simbol}} {{number_format($alltotal, 2)}}</p></td>

        </tr>

        <tr>

          <td colspan="7" style="text-align: right;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Freight Cost</p></td>

          <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{$matauang_simbol}} {{number_format($invoice_data['msg']['fclcontainer']['freight_cost'], 2)}}</p></td>

        </tr>

        <tr>

          <td colspan="7" style="text-align: right;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Insurance</p></td>

          <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{$matauang_simbol}} {{number_format($invoice_data['msg']['fclcontainer']['insurance'], 2)}}</p></td>

        </tr>

        <tr>

          <td colspan="7" style="text-align: right;border: 1px solid #000;"><p style="margin: 0;font-weight: bold;">Total Ammount {{$invoice_data['msg']['fclcontainer']['incoterms']}} {{$invoice_data['msg']['fclcontainer']['location']}}</p></td>

          <td style="text-align: right;border: 1px solid #000;"><p style="margin: 0;">{{$matauang_simbol}} {{number_format($alltotal + $invoice_data['msg']['fclcontainer']['freight_cost'] + $invoice_data['msg']['fclcontainer']['insurance'], 2)}}</p></td>

        </tr>



        <tr>

          <td colspan="8" style="text-align: center;font-weight: bold;"><p style="margin: 0;"></p></td>

        </tr>



        <tr>

          <td colspan="8" style="text-align: center;font-weight: bold;border: 1px solid #000;"><p style="margin: 0;">NOTES</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Incoterms</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['incoterms']}} {{$invoice_data['msg']['fclcontainer']['location']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Term Of Payment</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['term_of_payment']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Delivery Date</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['delivery_date']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Package</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['package']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Guarantee</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['guarantee']}} Year</p></td>

        </tr>



        <tr>

          <td colspan="8" style="text-align: center;font-weight: bold;"><p style="margin: 0;"></p></td>

        </tr>



        <tr>

          <td colspan="8" style="text-align: center;font-weight: bold;border: 1px solid #000;"><p style="margin: 0;">PAYMENT</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Currency</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$matauang_kode}} - {{$matauang_simbol}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Bank Name</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['bank_name']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Bank Address</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['bank_address']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Swift Code</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['swift_code']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Account No</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['account_no']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Beneficiary Name</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['beneficiary_name']}}</p></td>

        </tr>

        <tr>

          <td colspan="2" style="text-align: left;width: 20%;border: 1px solid #000;"><p style="margin: 0;">Beneficiary Address</p></td>

          <td colspan="6" style="text-align: left;border: 1px solid #000;"><p style="margin: 0;">{{$invoice_data['msg']['fclcontainer']['beneficiary_address']}}</p></td>

        </tr>



        <tr>

          <td colspan="8" style="text-align: center;font-weight: bold;"><p style="margin: 0;"></p></td>

        </tr>



        <tr>

          <td colspan="1"></td>
          <td colspan="2"><p>The Buyer</p></td>
          <td colspan="3"></td>

          <td colspan="2"><p>The Seller</p></td>

        </tr>

        <tr>

          <td colspan="1"></td>
          <td colspan="3"><img src="https://maxipro.id/images/website/ttdmaxipro.jpg" alt="" style="width: 150px;margin-top: 0;"></td>
          <td colspan="4"></td>
        </tr>

      </table>

    </div>

  </div>

</body>

</html>