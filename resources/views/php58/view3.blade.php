{{'<h1>hello thang</h1>'}}
{!!'<h1>hello thang</h1>'!!}
<?php
    $n =6;
?>
@if($n % 2 == 0)
    {!!'<h1>5 la so chan</h1>'!!}
@else
{!!'<h1>5 la so le</h1>'!!}
@endif
<table cellpadding="5" border="1" style="width: 300px; border-collapse:collapse;">
    @for($i=1;$i<=5;$i++)
    <tr>
        <td @if ($i % 2 ==0)
                style="background: yellow; "
            @endif>
            <?php echo $i; ?>
        </td>
    </tr>
    @endfor
</table>
