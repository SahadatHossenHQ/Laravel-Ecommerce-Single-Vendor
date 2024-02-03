<div class="wrapper">
    <!--   <p style="text-align: center;">
        <a href="{{route('home')}}">
            <img style="width: 120px;padding: 10px 0px;" src="{{asset('uploads/setting/'.setting('auth_logo'))}}" alt="">
        </a>
    </p> -->
    <br>
    <br>
    <form class="col-md-4 offset-md-4" action="{{route('register.new')}}" method="post">
        @csrf
        <ul class="cc row">
            <li class="col-6"><a href="{{route('login')}}">Login</a></li>
            <li class="col-6" style="background:#07421c;color: white;"><a>Register</a></li>
        </ul>
        <?php
        $id='admin';
        if(isset($_GET['code'])){
            $id=$_GET['code'];
        }
    ?>
        <div class="form form2 ">
            <input type="hidden" name="refer" id="refer" class="form-control @error('refer') is-invalid @enderror"
                value="{{$id}}" />
            <div class="form-group col-md-12">
                <label for="name">Name <sup style="color: red;">*</sup></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    required />
                @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="form-group col-md-6">
                <label for="username">Username (unique) <sup style="color: red;">*</sup></label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" required />
                @error('username')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div> --}}
        <div class="form-group col-md-12">
            <label for="email">Email <sup style="color: red;">*</sup></label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" />
            @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <label for="password">Phone <sup style="color: red;">*</sup></label>
            <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                required />
            @error('phone')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <label for="password">Password <sup style="color: red;">*</sup>&nbsp;&nbsp;<i id="show_pass" class="fal fa-eye"></i></label>
            <input type="password" name="password" id="password"
                class="form-control @error('password') is-invalid @enderror" required />
            @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <label for="confirm-password">Confirm Password <sup style="color: red;">*</sup></label>
            <input type="password" name="password_confirmation" id="confirm-password" class="form-control" required />
        </div>
        <input class="form-control" type="submit" value="Submit" style="background:var(--primary_color)">
</div>
</form>
@push('js')
<script>
    $(document).ready(function () {
        var showPassIcon = $('#show_pass');
        var passwordInput = $('#password');
        var confirmPasswordInput = $('#confirm-password');

        showPassIcon.on('click', function () {
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                confirmPasswordInput.attr('type', 'text');
                showPassIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                confirmPasswordInput.attr('type', 'password');
                showPassIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
@endpush
@push('css')
    <style>
        #show_pass{
            cursor: pointer;
        }
    </style>
@endpush
<br>
<span style="display: block;text-align: center;">Already have an Account? <a href="{{route('login')}}">Sign
        In</a></span>
</div>
<input type="hidden" value="{{ csrf_token() }}" name="cr" id="cr">
