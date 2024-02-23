<h1>Register</h1>


<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" id="" placeholder="Name">
    <input type="email" name="email" id="" placeholder="email">
    <input type="password" name="password" id="" placeholder="password">
    <button type="submit">register</button>
</form>