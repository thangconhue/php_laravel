<?php
    $s1 = Request::get('s1') != "" ? Request::get('s1') : 0;
    $s2 = Request::get('s2') != "" ? Request::get('s2') : 0;
    $tong = $s1 + $s2;
?>
<form method="POST" action="">
    @csrf
    <fieldset style="width: 300px; margin:20px auto;">
    <legend>Form</legend>
    <input type="number" name="s1" required>
    <input type="number" name="s2" required>
    <input type="submit" value="submit">
    </fieldset>
    <h1>Tong 2 so la: {{ "$s1 + $s2  = $tong"}}</h1>
</form>
