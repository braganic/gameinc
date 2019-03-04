@extends('plantilla')

@section('principal')
  <main class="main-login">
      <section class="main">
        <span class="background-login"></span>
        <div class="login-box">
          <div class="logo" id= "login-logo">
            <a class="logo-login" href="\index">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
          </div>
          <form class="" action="\login" method="POST">
            {{ csrf_field() }}
            <!--user name  -->
            <label for="email"></label>
            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email')}}" placeholder="Email" autofocus/>
            @if ($errors->has('email'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                             @endif
            <!--password  -->
            <label for="password"></label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" placeholder="Contraseña" autofocus/>
            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
						<div class="recordame">
							<input type="checkbox" name="recordame" value="recordame">
							<label for="recordame">Recordame</label>
						</div>
            <input class="log-boton"type="submit" value="LOGIN">
            <a class="text" href="#">Olvidaste tu contraseña?</a><br>
            <a class="text"href="\register">Registrarme</a>

          </form>
        </div>
      </section>
    </main>
    <span class="background-login"></span>
    
@endsection
