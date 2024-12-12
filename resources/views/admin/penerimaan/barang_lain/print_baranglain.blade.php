<!DOCTYPE html>

<html>

<head>

	<title>Print Out Penerimaan Barang Lain</title>

	<!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> -->

	<style type="text/css">

		@page { margin: 0px; }

		body { margin: 0px; }

		* {

			color: #555;

			font-family: 'SansSerif', sans-serif;

			font-size: 0;

			line-height: normal;

		}

		.container{

			width: 100%;

		}

		.row{

			padding: 5px;

		}

		td{

			color: #000;

		}

	</style>

</head>

<body onload="window.print();" text="#000000" link="#000000" alink="#000000" vlink="#000000" style="letter-spacing: 1px;">



	@for($i = 0; $i < $Data['msg']['numberofpage']; $i++)

		@php

			$end 		= ($i+1) * 5;

			$start 		= $end-4;

		@endphp

		<div class="container" style="margin-bottom: 45px;">

			<div class="row">

				<table style="width: 93%;" align="center">

					<tr>

						<td>

							<table style="width: 100%;" align="center">

								<tr>

									<td style="white-space: nowrap; text-indent: 0px;text-align: center;">

										{{-- <h1 style="margin-top: 30px;text-align: left;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 14px;">PT. MAXIPRO GROUP INDONESIA</span></h1> --}}

										<h1 style="margin-top: 30px;margin-bottom: 7px;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 14px;">TANDA TERIMA BARANG LAIN</span></h1>

										<p><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">NOMOR : {{$Data['msg']['penerimaan']['kode']}}</span></p>

									</td>

								</tr>

							</table>

						</td>

					</tr>

					<tr>

						<td style="width: 100%;text-align: center;">

							<table style="width: 100%;">

								<tr>

									<td valign="top" style="width: 40%;">

										<table style="width: 100%">

											<tr>

												<td style="white-space: nowrap; text-indent: 0px;text-align: left;">

													<p style="color: #000;font-size: 12px;">

														<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Tanggal : {{$Data['msg']['penerimaan']['tgl_terima']}}</span><br>

														<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Pengirim : {{$Data['msg']['penerimaan']['pengirim']}}</span><br>

														<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Penerima : {{$Data['msg']['teknisi']['name']}} </span><br>

													</p>

												</td>

											</tr>

										</table>

									</td>

									<td style="width: 25%;text-align: center;"></td>

									<td valign="top" style="width: 35%;"></td>

								</tr>

							</table>

						</td>

					</tr>

				</table>

				<table style="width: 93%;" align="center">

					<tr>

						<td>

							<table style="width: 100%;margin-bottom: 10px;height: 150px;">

								<tr>

									<td valign="top">

										<table style="width: 100%;border-collapse: collapse;">

											<tr style="border: 2px solid #000;">

												<td style="white-space: nowrap; text-indent: 0px;text-align: left;width: 40%;padding: 3px;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Nama Barang</span></td>

												<td style="white-space: nowrap; text-indent: 0px;text-align: center;width: 15%;padding: 3px;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Jumlah</span></td>

												<td style="white-space: nowrap; text-indent: 0px;text-align: left;padding: 3px;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Keterangan</span></td>

											</tr>

								            @foreach($Data['msg']['detail'] as $key => $result)

								            	@php

								            		$number 	= $key + 1;

								            	@endphp



								            	@if($number >= $start && $number <= $end)

									              	<tr>

										                <td valign="top" style="text-align: left;width: 40%;padding: 3px;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">{{$result['name']}}</span></td>

										                <td valign="top" style="white-space: nowrap; text-indent: 0px;text-align: center;width: 15%;padding: 3px;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">{{$result['qty']}}</span></td>

										                <td valign="top" style="white-space: nowrap; text-indent: 0px;text-align: left;padding: 3px;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">{{$result['keterangan']}}</span></td>

										            </tr>

									            @endif

								            @endforeach

										</table>

									</td>

								</tr>

							</table>

						</td>

					</tr>

					<tr>

						<td>

							<table style="width: 100%;border-collapse: collapse;border-width: 2px;border: 2px solid #000;" border="1">

								<tr>

					            	<td style="white-space: nowrap; text-indent: 0px;padding: 3px;border-width: 2px;">

										<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Keterangan,</span>

									</td>

									<td style="white-space: nowrap; text-indent: 0px;width: 15%;padding: 3px;border-width: 2px;">

										<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Pengirim,</span>

									</td>

									<td style="white-space: nowrap; text-indent: 0px;width: 15%;padding: 3px;border-width: 2px;">

										<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">Diterima Oleh,</span>

									</td>

					            </tr>

					            <tr>

					            	<td valign="top" style="white-space: nowrap; text-indent: 0px;padding: 3px;text-align: left;border-width: 2px;height: 90px;">

					            		<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">{{$Data['msg']['penerimaan']['keterangan']}}</span>

					            	</td>

									<td valign="bottom" style="white-space: nowrap; text-indent: 0px;width: 15%;padding: 3px;text-align: center;border-width: 2px;height: 90px;">

										<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;">({{$Data['msg']['penerimaan']['pengirim']}})</span>

									</td>

									<td valign="bottom" style="white-space: nowrap; text-indent: 0px;width: 15%;padding: 3px;text-align: center;border-width: 2px;height: 90px;">

										<span style="font-family: 'SansSerif', sans-serif;font-weight: bold;color: #000;font-size: 12px;"></span>

									</td>

					            </tr>

							</table>

							<table style="width: 100%;">

								<tr>

									<td style="white-space: nowrap; text-indent: 0px;text-align: left;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;font-size: 11px;color: #000;">Dicetak Oleh : {{$Data['msg']['teknisi']['name']}}</span></td>

									<td style="white-space: nowrap; text-indent: 0px;text-align: right;"><span style="font-family: 'SansSerif', sans-serif;font-weight: bold;font-size: 11px;color: #000;">Page {{$i+1}} of {{$Data['msg']['numberofpage']}}</span></td>

								</tr>

							</table>

						</td>

					</tr>

				</table>

			</div>

		</div>

	@endfor

</body>

</html>