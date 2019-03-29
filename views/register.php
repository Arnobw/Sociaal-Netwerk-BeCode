<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Material Design for Bootstrap fonts and icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/styles/mdb.min.css">
  <title>Register new user</title>
</head>

<body>
  <div class="container">
    <div class="col-lg-8 offset-lg-2 bg-light">
      <form class="form-horizontal mx-auto mt-5" action='' method="POST">
        <fieldset>
          <div id="legend">
            <legend class="">Register</legend>
          </div>
                    <div class="form-row">
              <div class="form-group col-md-6">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                  placeholder="Username can contain any letters or numbers, without spaces">
              </div>
              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="How old are you?">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="about">About me</label>
                <textarea class="form-control" rows="3" class="form-control" id="about" name="about"
                  placeholder="Tell others something about yourself!"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="colour">Favourite colour</label>
                <input type="text" class="form-control" id="colour" name="colour"
                  placeholder="What's your favourite colour?">
              </div>

              <div class="form-group col-md-6">
                <label for="topping">Pizza topping</label>
                <input type="text" class="form-control" id="topping" name="topping"
                  placeholder="What's your favourite pizza topping?">
              </div>
            </div>

            <button class="btn btn-primary" name="createaccount">Create Account</button>
        </fieldset>
      </form>
    </div>
  </div>

  <!-- Js magic below -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="../assets/js/mdb.min.js"
    integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
  </script>
  <script>
    $(document).ready(function () {
      $('body').bootstrapMaterialDesign();
    });
  </script>
</body>

</html>