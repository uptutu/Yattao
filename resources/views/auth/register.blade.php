@extends('layouts.app')

@section('styles')

@endsection()

@section('content')
    <div class="container" style="margin: 150px auto; ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">注册</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail 地址</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">密码</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">确认密码</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('captcha') ? ' has-error' : '' }}">
                                <label for="captcha" class="col-md-4 control-label text-md-right">验证码</label>

                                <div class="col-md-6">

                                    <div id="cbox"></div>
                                </div>
                            </div>

                            <input type="hidden" name="token" value="" id="token" />
                            <input type="hidden" name="authenticate" value="" id="authenticate" />

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        注册
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

    @section('scripts')

        <script src="https://www.yunpian.com/static/official/js/libs/riddler-sdk-0.2.1.js"></script>

        <!--初始化-->
        <script>
            window.onload = function () {

                // 初始化
                new YpRiddler({
                    expired: 10,
                    mode: 'dialog',
                    container: document.getElementById('cbox'),
                    appId: '2d2e4108e82b467ca0555f33b4afeb5a',
                    version: 'v1',
                    onError: function (param) {
                        if(param.code == 429) {
                            alert('请求过于频繁，请稍后再试！')
                            return
                        }
                        // 异常回调
                        console.error('验证服务异常')
                    },
                    onSuccess: function (validInfo, close) {
                        // 成功回调
                        // alert(`验证通过！token=${validInfo.token}, authenticate=${validInfo.authenticate}`)
                        document.getElementById("token").value = validInfo.token;
                        document.getElementById("authenticate").value = validInfo.authenticate;
                        close()
                    },
                    onFail: function (code, msg, retry) {
                        // 失败回调
                        alert('出错啦：' + msg + ' code: ' + code)
                        retry()
                    },
                    beforeStart: function (next) {
                        console.log('验证马上开始')
                        next()
                    },
                    onExit: function() {
                        // 退出验证 （仅限dialog模式有效）
                        console.log('退出验证')
                    }
                })
            }
        </script>
    @endsection()



