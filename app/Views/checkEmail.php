<html>
<head>
    <title>Check Email</title>
</head>
<body>

    <?= $validation->listErrors() ?>

    <?= form_open('home/checkemail') ?>

    <h5>Email</h5>
        <input type="text" name="email" value="" size="50" /><input type="submit" value="Submit" />

    </form>

</body>
</html>