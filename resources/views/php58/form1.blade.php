<form method="POST" action="">
    @csrf
    <fieldset style="width: 300px; margin:20px auto;">
    <legend>Form</legend>
    <input type="text" name="txt" required>
    <input type="submit" value="submit">
    </fieldset>
    <h1>{{ Request::get('txt')}}</h1>
</form>
