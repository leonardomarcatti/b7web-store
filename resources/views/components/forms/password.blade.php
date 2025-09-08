<div class="password-label">{{$label}}</div>
<div class="password-input-area">
    <input type="password" name="{{$name}}" id={{$name}} placeholder="{{$placeholder}}" required />
    <img src="{{asset('temp/icons/eyeIcon.png')}}" alt="Ícone mostrar senha" id='eye' />
</div>
@if(isset($errors->get('password')[1]) && $name == 'password_confirmation')
<small>{{ $errors->get('password')[1] }}</small>
@else
<small>{{ $error }}</small>
@endif
