@extends('plantilla')
@section("titulo")
Registro
@endsection

@section("script")
/js/validateRegister.js
@endsection


@section('principal')

  <main class="mainregister">
        <section class="main-register">


      <form action="/registeradmin" method="post" class="register" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="logo" id="form-logo">
            <a href="#">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
            <p>Admin register</p>
          </div>

        	<div class="form-items" class="form-group">
            <input id="register-name"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{old('name')}}" placeholder="Nombre" autofocus>
            	<div class="invalid-feedback"></div>
            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
              <p>&nbsp;</p>
				  </div>
          <div class="form-items">
           <input id="register-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{old('email')}}" placeholder="Email" autofocus>
           	<div class="invalid-feedback"></div>
           @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
           <p>&nbsp;</p>
					</div>
          <div class="form-items">
          	<input id="register-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" value="" placeholder="Contraseña">
            	<div class="invalid-feedback"></div>
            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
            <p>&nbsp;</p>
					</div>
          <div class="form-items">
            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value=""placeholder="Repita su Contraseña">
            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
            <p>&nbsp;</p>
          </div>

  {{-- <div class="form-item">
    <label>Pais:</label>
    <select class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" id="country">
        <option value="">Elegí</option>
    </select>
    @if ($errors->has('country'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('country') }}</strong>
        </span>
    @endif
</div>

<div class="form-item d-none" id="citiesCol">
<label>Provincia</label>
<select class="form-control" name="cities" id="cities"></select>
</div> --}}


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

				<!-- <div class="form-items gender"> -->
					<!-- <label for="gender">Genero: &nbsp;</label> -->
					<!-- <input type="radio" name="gender" value="masculino" checked> Masculino -->
					<!-- <input type="radio" name="gender" value="femenino"> Femenino -->
          <!-- <input type="radio" name="gender" value="femenino"> Otro -->

				<!-- </div> -->
<br>


          </div>
              <input class="form-items"id="register-submit"type="submit" name="submit" value="REGISTRATE">
      </section>

      <span class="background-login"></span>
    </main>

@endsection
