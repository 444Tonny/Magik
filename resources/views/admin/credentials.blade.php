<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@100;200;400;500;700&display=swap" rel="stylesheet">
</head>
</head>
<body>
    <header></header>

    @extends('admin.layout')

    @section('content')


    <!-- (B) MAIN -->
    <main id="pgmain">
      <h2>UPDATE ADMIN PASSWORD</h2>
      @if(session('success'))
          <p class='message-success'>{{ session('success') }}</p>
      @endif

      @if(session('error'))
          <p class='message-error'>{{ session('error') }}</p>
      @endif

      <form method="POST" action="" id='credentials'>
        @csrf
        @method('PUT')
        <label class='labcredentials' for="current_password">Current Password:</label>
        <input class='inputcredentials' type="password" name="current_password" required>
        @error('current_password')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <label class='labcredentials' for="new_password">New Password:</label>
        <input class='inputcredentials' type="password" name="new_password" required>
        @error('new_password')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <label class='labcredentials' for="confirm_password">Confirm Password:</label>
        <input class='inputcredentials' type="password" name="confirm_password" required>
        @error('confirm_password')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <button class='btncredentials' type="submit">Update</button>
    </form>
    <!-- ... -->
    </main>

    @endsection

    <footer></footer>
</body>
</html>
