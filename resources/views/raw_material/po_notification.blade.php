<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		td{
			padding-right: 5px;
			padding-left: 5px;
			padding-top: 0px;
			padding-bottom: 0px;
		}
		th{
			padding-right: 5px;
			padding-left: 5px;			
		}
	</style>
</head>
<body>
	<div>
		<center>
			<img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('mirai.jpg')))}}" alt=""><br>
			<p style="margin: 0px;">This is an automatic email from YMPI’s MIRAI system.<br>Please do not reply to this address.</p>
		</center>
		<br>

		<div style="width: 100%; margin: auto;">
			<center>
				<table style="border: none; width: 60%;">
					<tr>
						<th style="font-size: 18px; background-color: #b762c1; padding-bottom: 15px; padding-top: 15px; font-weight: bold;">
							<p>
								Purchase Order Confirmation Report<br>
								PT Yamaha Musical Products Indonesia
							</p>
						</th>
					</tr>
					<tr>
						<td style="font-size: 14px; background-color: #dfa2e7; padding-bottom: 10px; padding-top: 10px; text-align: center;">
							<p>
								Vendor Code : {{ $data['vendor_code'] }}<br>
								Vendor Name : {{ $data['vendor_name'] }}<br>
								PO Number : {{ $data['po_number'] }}<br>
								Confirmation At : {{ date('d-M-Y H:i:s', strtotime($data['delivery']->po_confirm_at)) }}<br>
								@if(count($data['notes']) > 0 )
								Note :
								@else
								Note : -
								@endif
							</p>
							@php
							if(count($data['notes']) > 0){
								print_r('<center>');
								print_r('<table style="margin-bottom: 5px; border:1px solid black; border-collapse: collapse; width: 90%;">');
								print_r('<tr>');
								print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 15%; text-align: center;">Item Line</td>');
								print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 15%; text-align: center;">GMC</td>');
								print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 35%; text-align: center;">Material</td>');
								print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 35%; text-align: center;">Note</td>');
								print_r('</tr>');

								for ($i=0; $i < count($data['notes']); $i++) { 
									print_r('<tr>');
									print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 15%; text-align: center;">'.$data['notes'][$i]->item_line.'</td>');
									print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 15%; text-align: center;">'.$data['notes'][$i]->material_number.'</td>');
									print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 35%;">'.$data['notes'][$i]->material_description.'</td>');
									print_r('<td style="vertical-align: middle; background-color: #dfa2e7; padding: 1px 2px 1px 2px; border: 1px solid black; width: 35%;">'.$data['notes'][$i]->note.'</td>');
									print_r('</tr>');
								}
								print_r('</table>');
								print_r('</center>');
							}
							@endphp
						</td>
					</tr>

					

					<tr>
						<th style="font-size: 16px; background-color: #dfa2e7; padding-bottom: 10px; padding-top: 10px; font-weight: bold; vertical-align: middle;">
							Thank you for confirming the PO via website YMPI
						</th>
					</tr>
				</table>
			</center>
		</div>
	</div>
</body>
</html>