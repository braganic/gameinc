@extends('plantilla')
@section('principal')

      <form action="\register" method="post" class="register" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="logo" id="form-logo">
            <a href="#">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
          </div>

        	<div class="form-items">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{old('name')}}" placeholder="Nombre" autofocus>
            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
              <p>&nbsp;</p>
				  </div>
          <div class="form-items">
           <input id="register-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{old('email')}}" placeholder="Email" autofocus>
           @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
           <p>&nbsp;</p>
					</div>
          <div class="form-items">
          	<input id="register-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" value="" placeholder="Contraseña">
            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
            <p>&nbsp;</p>
					</div>
          <div class="form-items">
            <input type="password" class="form-control{{ $errors->has('password_confirm') ? ' is-invalid' : '' }}" name="password_confirm" value=""placeholder="Repita su Contraseña">
            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
            <p>&nbsp;</p>
          </div>

					<div class="form-items-profile">
						<label for="file-upload" class="custom-file-upload" name="avatar" value="perfil">Subir foto de perfil</label>
						<input id="file-upload" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" type="file" name="avatar"/>
            @if ($errors->has('avatar'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('avatar') }}</strong>
                              </span>
                          @endif
            <p>&nbsp;</p>
					</div>

					<div class="form-items gender">
						<!-- <label for="gender">Genero: &nbsp;</label> -->
						<input type="radio" name="gender" value="masculino" checked> Masculino
						<input type="radio" name="gender" value="femenino"> Femenino
					</div>
<br>
          <div class="form-items-agree">
              <label for="agree">Acepto los terminos y condiciones</label>
							<input type="checkbox" name="acepto" value="">

          </div>
              <input class="form-items"id="register-submit"type="submit" name="submit" value="REGISTRATE">
      </section>

      <span class="background-login"></span>
    </main>

@endsection
