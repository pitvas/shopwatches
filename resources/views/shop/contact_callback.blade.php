
<div class="container" style="padding: 10em;border: 2px solid black;">
<form action="{{ action('MailSetting@send') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <h3>Callback Form</h3>
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control"  name="name" placeholder="Vasja">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Phone</label>
    <input type="text" class="form-control" name="phone" placeholder="+375 68 2890311">
  </div>
  <!--<div class="form-group">-->
    <input type="submit" class="btn btn-primary" value="Callback">
  </div>
</form>
</div>