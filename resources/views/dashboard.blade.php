


<h1>Dashboard</h1>


<p>Welcome, {{ Auth::user()->name }}!</p>
<p>{{Auth::user()->email }}</p>
  
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
