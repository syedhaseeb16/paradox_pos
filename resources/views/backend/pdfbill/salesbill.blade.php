<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head><body>
<p align="center"><strong>Tasnim Computers </strong></p>
<p align="center">PH: 0313 5982628</p>
<hr>
<p>Date: <?php echo date("M,d,Y");   ?></p>
<hr>
<table border="0" align="center">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($report as $all)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$all->name}}</td>
        <td>{{$all->quantity}}</td>
        <td>{{$all->price}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"> Grand Total </td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->price;
                        $total += $price;
                    @endphp
                @endforeach
                Rs. {{$total}}
            @endif
        </td>
    </tr>
    </tbody>
</table>
<br>
<p>prepared by: Tasnim Sadiq &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date("M,d,Y h:i:s A") . "\n";  ?> </p>
<p align="center">Thank You</p>
</body></html>


