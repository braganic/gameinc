@extends('plantilla')
@section("titulo")
Crear Producto
@endsection

@section("script")
/js/validateRegister.js
@endsection


@section('principal')

  <main class="mainregister">
        <section class="main-register">


      <form action="\create" method="post" class="register" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="logo" id="form-logo">
            <a href="#">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
          </div>

        	<div class="form-items">
            <input class="form-control" type="text" name="name" value="" placeholder="Nombre" autofocus>

              <p>&nbsp;</p>
				  </div>
          <div class="form-items">
            <input class="form-control" type="text" name="stock" value="" placeholder="Stock" autofocus>

              <p>&nbsp;</p>
          </div>


          <div class="form-item">
            <label>Categoria:</label>
            <select class="form-control" name="category_id">
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-item">
          <label>Marca:</label>
          <select class="form-control" name="brand_id">
            @foreach ($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
          </select>
      </div>



					<div class="form-items-profile">
						<label for="file-upload" class="custom-file-upload" name="foto" value="foto">Subir foto del producto</label>
						 <input id="file-upload" class="form-control" type="file" name="foto"/>
            
            <p>&nbsp;</p>
					</div>

<br>

              <input class="form-items"id="register-submit"type="submit" name="submit" value="Crear Producto">
      </section>

      <span class="background-login"></span>
    </main>

@endsection
