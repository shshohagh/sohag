<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{--env('APP_NAME')--}}</title>
</head>
<style>
    
    @page {
        margin-top: 20px;
        margin-bottom: 150px;
        margin-left: 25px;
        margin-right: 25px;
    }
    
    header {
        position: fixed; left: 0px; top: -10px; right: 0px; height: 130px;
        font-size: 20px !important;
        /*border-bottom: 1px solid #81d4fa;*/

        /** Extra personal styles **/
        
    }


    footer {
        position: fixed; left: 0px; bottom: 0px; right: 0px; height: 60px;
        font-size: 20px !important;

        /** Extra personal styles **/
        
    }

    body {
        margin-top: 140px !important;
        font-family: 'examplefont', nikosh;
    }

    li {
        list-style: none;
        float: left;
        overflow: hidden;
    }

    p {
        font-size: 13px;
    }

    .customar_info {
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid black;
        text-align: left;
        padding: 5px;
        font-size: 13px;
    }

    .invoiceIDandDate {
        text-align: right;

    }

    .clientInfo {
        background-color: red;
    }
    
    .pagenum:before {
        content: counter(page);
    }
    .page-break {
    page-break-after: always;
    }
</style>


<body>
    <header name="page-header">
        <div>
            <table style="margin-top: 10px;">
            <tr>
                <td style="border: 0px solid white;">
                    <div></div>
                </td>
                <td style="text-align: right; border: 0px solid white;">
                    <div>
                    <p style="font-size: 13px; text-align: right; overflow: hidden;"><span style="font-size: 15px; font-weight: bold;"></p>
                    </div>
                </td>
            </tr>
        </table>
        </div>
    </header>

    <footer name="page-footer">
        <table width="100%">
            
        </table>
    </footer>
    
    <main>
    <div>
        <table>
            <tr>
                <th style="border: 0px solid white;">
                    <div>
                       <div>
                        <p>
                           Bill To, <br>
                           Name: {{-- $service->name --}}<br>
                           Address: {{-- $service->address --}}<br>
                           Phone: {{-- $service->mobile --}}<br>
                           Email: {{--optional($service)->email--}}<br>
                          </p>
                          </div>
                    </div>
                </th>
                <th style="text-align: right; border: 0px solid white;">
                    <p class="invoiceIDandDate" style="font-family: Arial;">Invoice No. {{-- $service->voucher --}}<br>
                        Date: {{--date("d/m/Y",strtotime($service->date))--}}<br>
                        Purchase Order No: <b>{{-- $service->purchase_order_no --}}<br>
                        Due Date: <b>{{--date("d/m/Y",strtotime($service->due_date))--}}
                    </p>
                </th>
            </tr>
        </table>
    </div>
    
    <div>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr style="text-align: right; background-color: #dddddd;">
                    <th width="20px" scope="col" style="text-align: center;">SL</th>
                    <th width="200px" style="text-align: left;">Service Name</th>
                    <th scope="col" style="text-align: center;">Quantity</th>
                    <th scope="col" style="text-align: center;">Rate</th>
                    <th scope="col" style="text-align: center;">Amount</th>
                </tr>
            </thead>
            <tbody>
                  @php $n=1; @endphp
                  {{--@foreach($client_services as $client_service)--}}
                  <tr>
                    <td>{{--$n++--}}</td>
                    <td>{{--$client_service->service_category_name--}}</td>
                    <td width="10%">{{--$client_service->quantity--}}</td>
                    <td>{{--number_format($client_service->service_charge,2)--}}</td>
                    <td>{{--number_format($client_service->amount,2)--}}</td>
                  </tr>
                  {{--@endforeach--}}
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 8px; text-align: right;">
        <table>
        <tbody style="text-align: right;">
              <tr style="text-align: right;">
                    <td style="border-bottom: 1px solid white; border-left: 1px solid white; border-top: 1px solid white; text-align: right;"><b>Total</b></td>
                    <td style="text-align:right; width:150px;">{{-- number_format($service->service_charge, 2) --}}</td>
              </tr>
              <tr style="text-align: right;">
                    <td style="border-bottom: 1px solid white; border-left: 1px solid white; border-top: 1px solid white; text-align: right;"><b>Paid</b></td>
                    <td style="text-align:right; width:150px;">{{-- number_format($service->payment, 2) --}}</td>
              </tr>
              <tr style="text-align: right;">
                    <td style="border-bottom: 1px solid white; border-left: 1px solid white; border-top: 1px solid white; text-align: right;"><b>Due Amount</b></td>
                    <td style="text-align:right; width:150px;">{{-- number_format($service->due, 2) --}}</td>
              </tr>
              
              
         </tbody>
        </table>
    </div>
    </main>
</body>
</html>
