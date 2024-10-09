@extends("layouts.master")

@section("title")
Buat Account Baru!
@endsection

@section("contentTitle")
<h2>Sign Up Form</h2>
@endsection

@section("content")
     <form action="/welcome" method="POST">
      @csrf
      <label>First Name:</label>
      <br />
      <input type="text" name="first_name" />
      <br /><br />
      <label>Last Name:</label>
      <br />
      <input type="text" name="last_name" />
      <br /><br />
      <label>Gender:</label>
      <br />
      <input type="radio" name="gender" value="Male" /> Male <br />
      <input type="radio" name="gender" value="Female" /> Female <br />
      <input type="radio" name="gender" value="Others" /> Others <br />
      <br />
      <label>Nationality:</label>
      <br />
      <select name="nationality">
        <option value="Indonesian">Indonesian</option>
        <option value="Singaporean">Singaporean</option>
        <option value="Malaysian">Malaysian</option>
        <option value="Australian">Australian</option>
      </select>
      <br /><br />
      <label>Languange Spoken:</label> <br />
      <input type="checkbox" /> Bahasa Indonesia <br />
      <input type="checkbox" /> English <br />
      <input type="checkbox" /> Others <br />
      <br />
      <label>Bio:</label><br />
      <textarea name="bio" cols="30" rows="10"></textarea>
      <br /><br />
      <button type="submit">Sign Up</button>
    </form>
@endsection
   