<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>ajouterQuestion</title>
</head>
<body>
    <div class="container p-3">
    <h1 class="h1 mb-4">Question</h1>
        <form action="{{ route('question.update', $question->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="descriptionQuestion">descriptionQuestion</label>
            <textarea name="descriptionQuestion">{{ $question->descriptionQuestion }}</textarea><br><br>
            <br><br>
            <input type="submit" class="btn btn-success" value="submit">
            <input type="reset" class="btn btn-danger" value="reset">
        </form>
        <br><br>
    </div>
</body>
</html>